<div class="row">
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
      <img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['cover_image']; ?>" alt="<?php echo $post['title'] ?>" class="img-fluid my-3">
    <?php endif; ?>

    <hr>
    <div class="mb-5">
      <a href="<?php echo base_url().'posts/edit/'.$post['slug'] ?>" class="btn btn-dark">Edit</a>
      <?php echo form_open('posts/delete/'.$post['id'], ['class' => 'float-right']); ?>
        <input type="submit" value='Delete' class="btn btn-danger">
      </form>
    </div>
  </div>
  <div class="col-md-2"></div>
</div>

