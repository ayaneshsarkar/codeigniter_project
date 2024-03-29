<div class="card mt-5">
  <div class="card-body">
    <h2><?php echo $title; ?></h2>
    <p class="lead">Create a Post With This Form</p>

    <?php echo form_open_multipart('posts/create') ?>
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty(validation_errors())) ? 'is-invalid' : ''; ?>" placeholder="Title">
        <span class="invalid-feedback"><?php echo validation_errors(); ?></span>
      </div>
      <div class="form-group">
        <label for="body">Body</label>
        <textarea name="body" id="body" rows="5" class="form-control form-control-lg <?php echo (!empty(validation_errors())) ? 'is-invalid' : '' ?>" placeholder="Body"></textarea>
        <span class="invalid-feedback"><?php echo validation_errors(); ?></span>
      </div>
      <div class="form-group">
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-control">
          <?php foreach($categories as $category): ?>
            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="custom-file my-3">
        <input type="file" name="userfile" id="userfile" class="custom-file input">
        <label for="userfile" class="custom-file-label">Choose Your File</label>
      </div>

      <input type="submit" value="submit" class="btn btn-success">
    </form>
  </div>
</div>