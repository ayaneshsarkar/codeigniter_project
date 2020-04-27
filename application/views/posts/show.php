<div class="row justify-content-center align-items-center">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <h1 class="mt-4 mb-3"><?php echo $post['title']; ?></h1>
    <div class="bg-dark text-white mb-3 p-3"><?php echo $post['updated_at']; ?> on 
      <strong>
        <?php foreach($categories as $category): ?>
          <?php if ($post['category_id'] === $category['id']): ?> 
            <?php echo $category['name']; ?>
          <?php endif; ?>
        <?php endforeach; ?>
      </strong>
    </div>

    <p class="lead mb-4"><?php echo $post['body']; ?></p>

    <?php if ($post['cover_image'] != 'no_image.jpg'): ?>
      <div class="d-flex justify-content-center align-items-center my-3">
        <img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['cover_image']; ?>" alt="<?php echo $post['title'] ?>" class="img-fluid">
      </div>
    <?php endif; ?>

    <?php if ($this->session->userdata('user_id') == $post['user_id']): ?>
    <hr>
    <div class="mb-5">
      <a href="<?php echo base_url().'posts/edit/'.$post['slug'] ?>" class="btn btn-dark">Edit</a>
      <?php echo form_open('posts/delete/'.$post['id'], ['class' => 'float-right']); ?>
        <input type="submit" value='Delete' class="btn btn-danger">
      </form>
    </div>
    <?php endif; ?>

    
    <?php if (!empty($comments)): ?>
      <hr>
      <h3 class="display-5 mt-5 mb-4">Comments</h3>
      <?php foreach($comments as $comment): ?>
      <div class="card card-body mb-3 light-bg">
        <p class="lead mb-3"><?php echo $comment['body']; ?></p>
        <small>by <strong><?php echo $comment['name']; ?></strong> on <?php echo $comment['updated_at']; ?></small>
      </div>
      <?php endforeach; ?>
    <?php endif; ?>

    <div class="mb-5"></div>
    <hr>

    <h3 class="display-5 mt-5 mb-4">Add Comment</h3>
    <?php echo form_open('comments/create/'.$post['id'], ['class' => 'mb-5']) ?>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty(validation_errors())) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo validation_errors(); ?></span>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty(validation_errors())) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo validation_errors(); ?></span>
      </div>

      <div class="form-group">
        <label for="comment_body">Body</label>
        <textarea name="comment_body" rows="5" class="form-control form-control-lg mb-4 <?php echo (!empty(validation_errors())) ? 'is-invalid' : ''; ?>"></textarea>
        <span class="invalid-feedback"><?php echo validation_errors(); ?></span>
      </div>
      <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
      <input type="submit" value="Sumbit" class="btn btn-success">
    </form>
  </div>
  <div class="col-md-2"></div>
</div>

