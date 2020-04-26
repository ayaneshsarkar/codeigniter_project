<div class="row mt-5">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <table class="table table-stripped">
      <thead class="thead-dark">
        <tr>
          <th><?php echo $title; ?></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($categories as $category): ?>
        <tr>
          <td>
          <a href="<?php echo site_url('/categories/posts/'.$category['id']) ?>"><?php echo $category['name']; ?></a>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="col-md-2"></div>
</div>

