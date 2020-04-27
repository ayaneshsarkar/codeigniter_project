<div class="row mt-5">
  <div class="col-md-3"></div>
  <div class="col-md-6">
  <div class="card card-body">
    <table class="table table-stripped">
      <thead class="thead-dark">
        <tr>
          <th><?php echo $title; ?></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($categories as $category): ?>
        <tr>
          <td>
          <a href="<?php echo site_url('/categories/posts/'.$category['id']) ?>"><?php echo $category['name']; ?></a>
          </td>
          <td>
            <?php if ($this->session->userdata('user_id') == $category['user_id']): ?>
              <?php echo form_open('categories/delete/'.$category['id']) ?>
                <input type="submit" value="Delete" class="btn btn-danger">
              </form>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  </div>
  <div class="col-md-3"></div>
</div>

