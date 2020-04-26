<div class="card mt-5">
  <div class="card-body">
    <h2><?php echo $title; ?></h2>
    <p class="lead">Enjoy Editing</p>

    <?php echo form_open('posts/update/'.$post['slug']); ?>
      <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty(validation_errors())) ? 'is-invalid' : ''; ?>" value="<?php echo $post['title']; ?>" placeholder="Title">
        <span class="invalid-feedback"><?php echo validation_errors(); ?></span>
      </div>
      <div class="form-group">
        <label for="body">Body</label>
        <textarea name="body" id="body" rows="5" class="form-control form-control-lg <?php echo (!empty(validation_errors())) ? 'is-invalid' : '' ?>" placeholder="Body"><?php echo $post['body']; ?></textarea>
        <span class="invalid-feedback"><?php echo validation_errors(); ?></span>
      </div>
      <div class="form-group">
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-control">
          <?php foreach($categories as $category): ?>
            <option value="<?php echo $category['id']; ?>"<?php if($category['id'] === $post['category_id']) { echo ' selected'; } ?>><?php echo $category['name']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <input type="submit" value="submit" class="btn btn-success">
    </form>
  </div>

  <!--  //if ($category['id'] === $post['category_id']) { echo ' selected'; } ?>> //echo $category['name']; ?> -->