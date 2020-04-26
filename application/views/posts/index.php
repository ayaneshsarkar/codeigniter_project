<h3 class="display-4 mb-5"><?php echo $title; ?></h3>
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <?php foreach($posts as $post): ?>
        <div class="card p-5 mb-2">
          <div class="card-body">
            <h4 class="card-title"><?php echo $post['title']; ?></h4>
            <div class="bg-light p-2 mb-2">
              <small><?php echo $post['updated_at']; ?></small> in <strong><?php echo $post['name']; ?></strong>
            </div>
            <p class="card-text"><?php echo word_limiter($post['body'], 50); ?></p>
          </div>
          <?php if ($post['cover_image'] != 'no_image.jpg'): ?>
            <img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['cover_image']; ?>" alt="<?php echo $post['title'] ?>" class="card-img img-fluid mb-4">
          <?php endif; ?>
          <a href="<?php echo site_url('/posts/'.$post['slug']); ?>" class="btn btn-dark">Read More</a>
        </div>
    <?php endforeach; ?>
  </div>
  <div class="col-md-2"></div>
</div>

