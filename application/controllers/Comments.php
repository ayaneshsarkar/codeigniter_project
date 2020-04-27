<?php 

  class Comments extends CI_Controller {

    public function create($post_id) {
      if (!$this->session->userdata('logged_in')) {
        redirect('users/login');
      }

      $slug = $this->input->post('slug');
      $data['post'] = $this->post_model->get_posts($slug);
      $data['categories'] = $this->post_model->get_categories();

      $this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      $this->form_validation->set_rules('comment_body', 'Comment Body', 'required');

      if ($this->form_validation->run() === FALSE) {
        $this->load->view('layout/header');
        $this->load->view('posts/show', $data);
        $this->load->view('layout/footer');
      } else {
        $this->comment_model->create_comment($post_id);
        redirect('posts/'.$slug);
      }

    }

  }