<?php 

  class Posts extends CI_Controller {

    public function index($page = 'index') {

      $data['title'] = 'All Posts Listed Below';

      $data['posts'] = $this->post_model->get_posts();

      $this->load->view('layout/header');
      $this->load->view('posts/index', $data);
      $this->load->view('layout/footer');
    }

    
    public function show($slug = NULL) {

      $data['post'] = $this->post_model->get_posts($slug);

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

      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('body', 'Body', 'required');

      if ($this->form_validation->run() === FALSE) {
        $this->load->view('layout/header');
        $this->load->view('posts/create', $data);
        $this->load->view('layout/footer');
      } else {
        $this->post_model->create_post();
        redirect('posts');
      }

    }

  }