<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <title>Codeigniter III Project</title>
</head>
<body>

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
    <div class="container">
      <a href="<?php echo base_url(); ?>posts" class="navbar-brand">CodeIgniter III</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"><a href="<?php echo base_url(); ?>" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="<?php echo base_url(); ?>about" class="nav-link">About</a></li>
          <li class="nav-item"><a href="<?php echo base_url(); ?>posts" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="<?php echo base_url(); ?>categories" class="nav-link">Categories</a></li>
        </ul>
        <ul class="navbar-nav ml-auto">
        <?php if (!$this->session->userdata('logged_in')): ?>
        <li class="nav-item"><a href="<?php echo base_url(); ?>users/register" class="nav-link">Register</a></li>
        <li class="nav-item"><a href="<?php echo base_url(); ?>users/login" class="nav-link">Login</a></li>
        <?php endif; ?>
        <?php if ($this->session->userdata('logged_in')): ?>
          <li class="nav-item"><a href="<?php echo base_url(); ?>posts/create" class="nav-link">Create Post</a></li>
          <li class="nav-item"><a href="<?php echo base_url(); ?>categories/create" class="nav-link">Create Categories</a></li>
          <li class="nav-item"><a href="<?php echo base_url(); ?>users/logout" class="nav-link">Logout</a></li>
        </ul>
        <?php endif; ?>
      </div>
    </div>
  </nav>

  <div class="container">

   <!-- Flash Message -->
   <?php if ($this->session->flashdata('user_registered')): ?>
    <p class="alert alert-success"><?php echo $this->session->flashdata('user_registered'); ?></p>
  <?php endif; ?>

  <?php if ($this->session->flashdata('login_failed')): ?>
    <p class="alert alert-danger"><?php echo $this->session->flashdata('login_failed'); ?></p>
  <?php endif; ?>

  <?php if ($this->session->flashdata('user_loggedin')): ?>
    <p class="alert alert-danger"><?php echo $this->session->flashdata('user_loggedin'); ?></p>
  <?php endif; ?>

  <?php if ($this->session->flashdata('user_loggedout')): ?>
    <p class="alert alert-success"><?php echo $this->session->flashdata('user_loggedout'); ?></p>
  <?php endif; ?>

  <?php if ($this->session->flashdata('category_deleted')): ?>
    <p class="alert alert-success"><?php echo $this->session->flashdata('category_deleted'); ?></p>
  <?php endif; ?>
