<div class="card mt-5 mb-5">
  <div class="card-body">
    <h2 class="mb-4"><?php echo $title; ?></h2>

    <?php echo form_open('users/login') ?>

      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control form-control-lg <?php echo (!empty(form_error('username'))) ? 'is-invalid' : ''; ?>" placeholder="Username">
        <span class="invalid-feedback"><?php echo form_error('username'); ?></span>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty(form_error('password'))) ? 'is-invalid' : ''; ?>" placeholder="Password">
        <span class="invalid-feedback"><?php echo form_error('password'); ?></span>
      </div>

      <input type="submit" value="Submit" class="btn btn-success">
    </form>
  </div>
</div>