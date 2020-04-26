<?php 

  class User_model extends CI_Model {

    public function __construct() {
      $this->load->database();
    }

    public function register($enc_password) {

      $data = [
        'name' => $this->input->post('name'),
        'zipcode' => $this->input->post('zipcode'),
        'username' => $this->input->post('username'),
        'email' => $this->input->post('email'),
        'password' => $enc_password
      ];

      return $this->db->insert('users', $data);

    }

    public function check_username_exists($username) {

      $query = $this->db->get_where('users', ['username' => $username]);

      if (empty($query->row_array())) {
        return true;
      } else {
        return false;
      }

    }

    public function check_email_exists($email) {

      $query = $this->db->get_where('users', ['email' => $email]);
      
      if (empty($query->row_array())) {
        return true;
      } else {
        return false;
      }

    }

  }