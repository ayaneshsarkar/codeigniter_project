<div class="card mt-5">
  <div class="card-body">
    <h2><?php echo $title; ?></h2>
    <p class="lead">Create a Category With this Form</p>

    <?php echo form_open_multipart('categories/create'); ?>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty(validation_errors())) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo validation_errors(); ?></span>
      </div>

      <input type="submit" value="Submit" class="btn btn-success">
    </form>
  </div>
</div>