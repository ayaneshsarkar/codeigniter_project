<?php 

  class Posts extends CI_Controller {

    public function index($page = 'index') {

      $data['title'] = 'All Posts Listed Below';

      $data['posts'] = $this->post_model->get_posts();

      $this->load->view('layout/header');
      $this->load->view('posts/index', $data);
      $this->load->view('layout/footer');
    }

  }