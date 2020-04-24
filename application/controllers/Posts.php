<?php 

  class Posts extends CI_Controller {

    public function index($page = 'index') {

      $data['title'] = 'All Posts Listed Below';

      $this->load->view('layout/header');
      $this->load->view('posts/index', $data);
      $this->load->view('layout/footer');
    }

  }