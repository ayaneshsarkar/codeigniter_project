<h3 class="display-4 mb-5"><?php echo $title; ?></h3>

<?php foreach($posts as $post): ?>

  <div class="card card-body mb-2">
    <h4 class="card-title"><?php echo $post['title']; ?></h4>
    <div class="bg-light p-2 mb-2">
      <small><?php echo $post['created_at'] ?></small>
    </div>
    <p class="card-text"><?php echo $post['body']; ?></p>
    <a href="<?php echo site_url('/posts/'.$post['slug']); ?>" class="btn btn-dark">Read More</a>
  </div>

<?php endforeach; ?>