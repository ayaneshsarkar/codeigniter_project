<div class="card mt-5 mb-5">
  <div class="card-body">
    <h2 class="mb-4"><?php echo $title; ?></h2>

    <?php echo form_open_multipart('users/register') ?>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty(form_error('name'))) ? 'is-invalid' : ''; ?>" placeholder="Name">
        <span class="invalid-feedback"><?php echo form_error('name'); ?></span>
      </div>

      <div class="form-group">
        <label for="zipcode">Zipcode</label>
        <input type="text" name="zipcode" class="form-control form-control-lg <?php echo (!empty(form_error('zipcode'))) ? 'is-invalid' : ''; ?>" placeholder="Zipcode">
        <span class="invalid-feedback"><?php echo form_error('zipcode'); ?></span>
      </div>

      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control form-control-lg <?php echo (!empty(form_error('username'))) ? 'is-invalid' : ''; ?>" placeholder="Username">
        <span class="invalid-feedback"><?php echo form_error('username'); ?></span>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty(form_error('email'))) ? 'is-invalid' : ''; ?>" placeholder="Email">
        <span class="invalid-feedback"><?php echo form_error('email'); ?></span>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty(form_error('password'))) ? 'is-invalid' : ''; ?>" placeholder="Password">
        <span class="invalid-feedback"><?php echo form_error('password'); ?></span>
      </div>

      <div class="form-group mb-4">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty(form_error('confirm_password'))) ? 'is-invalid' : ''; ?>" placeholder="Confirm Password">
        <span class="invalid-feedback"><?php echo form_error('confirm_password'); ?></span>
      </div>

      <input type="submit" value="Submit" class="btn btn-success">
    </form>
  </div>
</div>