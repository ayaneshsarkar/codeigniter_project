<?php 

  class Users extends CI_Controller {

    public function register() {

      $data['title'] = 'Sign Up';

      $this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('zipcode', 'Zipcode', 'required');
      $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email_exists');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]');

      if ($this->form_validation->run() === FALSE) {
        $this->load->view('templates/header');
        $this->load->view('users/register', $data);
        $this->load->view('templates/footer');
      } else {
        // Encrypt Password
        $enc_password = md5($this->input->post('password'));
        $this->user_model->register($enc_password);

        // Set Message
        $this->session->set_flashdata('user_registered', 'You are now successfully registered');
        
        redirect('posts');
      }

    }

    function check_username_exists($username) {
      $this->form_validation->set_message('check_username_exists', 'Username Already Exists');

      if ($this->user_model->check_username_exists($username)) {
        return true;
      } else {
        return false;
      }
    }

    function check_email_exists($email) {
      $this->form_validation->set_message('check_email_exists', 'Email Already Exists');

      if ($this->user_model->check_email_exists($email)) {
        return true;
      } else {
        return false;
      }
    }

  }