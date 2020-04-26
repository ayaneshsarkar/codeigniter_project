<?php 

  class Posts extends CI_Controller {

    public function index($page = 'index') {

      $data['title'] = 'All Posts Listed Below';
      $data['categories'] = $this->post_model->get_categories();

      $data['posts'] = $this->post_model->get_posts();

      $this->load->view('layout/header');
      $this->load->view('posts/index', $data);
      $this->load->view('layout/footer');
    }

    
    public function show($slug = NULL) {

      $data['post'] = $this->post_model->get_posts($slug);
      $data['categories'] = $this->post_model->get_categories();
      $post_id = $data['post']['id'];
      $data['comments'] = $this->comment_model->get_comments($post_id);

      if (empty($data['post'])) {
        show_404();
      }

      $data['title'] = $data['post']['title'];

      $this->load->view('layout/header');
      $this->load->view('posts/show', $data);
      $this->load->view('layout/footer');

    }

    public function create() {

      $data['title'] = 'Create Post';
      $data['categories'] = $this->post_model->get_categories();

      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('body', 'Body', 'required');

      if ($this->form_validation->run() === FALSE) {
        $this->load->view('layout/header');
        $this->load->view('posts/create', $data);
        $this->load->view('layout/footer');
      } else {

        // Uplod Image
        $config['upload_path'] = './assets/images/posts';
        $config['allowed_types'] = 'jpg|gif|png';
        $config['max_size'] = '1000000';
        $config['max_width'] = '10240';
        $config['max_height'] = '7680';

        $fileName = time().$_FILES['userfile']['name'];
        $fileName = str_replace(' ', '', $fileName);
        $fileName = str_replace('_', '', $fileName);
        $config['file_name'] = $fileName;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
          $errors = ['error' => $this->upload->display_errors()];
          $cover_image = 'no_image.jpg';
        } else {
          $data = ['upload_data' => $this->upload->data()];
          $cover_image = $fileName;
        }

        $this->post_model->create_post($cover_image);
        redirect('posts');
      }

    }

    public function delete($id) {
      $this->post_model->delete_post($id);
      redirect('posts');
    }

    public function edit($slug) {

      $data['post'] = $this->post_model->get_posts($slug);
      $data['categories'] = $this->post_model->get_categories();

      if (empty($data['post'])) {
        show_404();
      }

      $data['title'] = 'Edit Post';

      $this->load->view('layout/header');
      $this->load->view('posts/edit', $data);
      $this->load->view('layout/footer');

    }

    public function update($slug) {

      // Validate Form
      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('body', 'Body', 'required');
      //$this->form_validation->set_rules('caretory_id', 'Category', 'required');

      if ($this->form_validation->run() === FALSE) {

        // Existing Post DATA
        $data['post']['title'] = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $data['post']['body'] = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_STRING);
        $data['post']['id'] = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $data['post']['slug'] = filter_var($slug, FILTER_SANITIZE_STRING);
        $data['title'] = 'Edit Post';
        $data['categories'] = $this->post_model->get_categories();

        // Load With Errors
        $this->load->view('layout/header');
        $this->load->view('posts/edit', $data);
        $this->load->view('layout/footer');
      } else {
        // Update The Database
        $this->post_model->update_post();
        redirect('posts');
      }

    }

  }