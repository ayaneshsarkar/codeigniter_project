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

    public function login() {

      $data['title'] = 'Login';

      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');

      if ($this->form_validation->run() === FALSE) {
        $this->load->view('templates/header');
        $this->load->view('users/login', $data);
        $this->load->view('templates/footer');
      } else {
        // Get Username
        $username = $this->input->post('username');
        // Get and Encrypt Password
        $password = md5($this->input->post('password'));
        // Login User
        $user_id = $this->user_model->login($username, $password);

        if ($user_id) {
          // Create Session
          $user_data = [
            'user_id' => $user_id,
            'username' => $username,
            'logged_in' => true
          ];
          $this->session->set_userdata($user_data);
          // Set Message
          $this->session->set_flashdata('user_loggedin', 'You are now successfully Logged In');
          redirect('posts');
        } else {
          $this->session->set_flashdata('login_failed', 'Username or Password is incorrect!');
          redirect('users/login');
        }

      }

    }

    public function logout() {

      // Unset Session
      $this->session->unset_userdata('user_id');
      $this->session->unset_userdata('username');
      $this->session->unset_userdata('logged_in');

      $this->session->set_flashdata('user_loggedout', 'You are now successfully Logged Out');
      redirect('users/login');

    }

    public function check_username_exists($username) {
      $this->form_validation->set_message('check_username_exists', 'Username Already Exists');

      if ($this->user_model->check_username_exists($username)) {
        return true;
      } else {
        return false;
      }
    }

    public function check_email_exists($email) {
      $this->form_validation->set_message('check_email_exists', 'Email Already Exists');

      if ($this->user_model->check_email_exists($email)) {
        return true;
      } else {
        return false;
      }
    }

  }