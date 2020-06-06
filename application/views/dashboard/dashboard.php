<style>
  
  @media(max-width: 360px){
    /* Table */
    thead th{
      font-size: .9rem;
    }
    tbody td{
      font-size: .9rem;
    }

    /* Buttons */
    .btn-add-blog{
      width: 100%;
      margin-top: 20px;
      margin-bottom: -10px;
      font-size: .9rem;
    }
    .btn-option{
      font-size: .8rem;
      padding:2px 2px;
    }

  }

</style>

<div class="container">
  
  <div class="row justify-content-center">

    <div class="col-lg-10 col-md-10">

      <!-- shows message, if any -->
      <?= $this->session->flashdata('add_blog') ?>

      <!-- button: add blog -->
      <a href="<?= base_url('dashboard/add') ?>" class="btn btn-primary btn-add-blog">Add Blog</a>
      
      <!-- dashboard: blog datas - with pagination system -->
      <table class="table mt-4">
        <thead>
          <th>Num</th>
          <th>Title</th>
          <th class="text-center" colspan="3">Actions</th>
        </thead>
        <?php $num = $first_num; foreach($blogs_pagination as $blog) : ?>
          <tbody>
            <td><?= $num++ ?></td>
            <td><?= $blog['title'] ?></td>
            <td><a href="<?= base_url('dashboard/view/').$blog['id'] ?>" class="btn btn-primary btn-option" href="">View</a></td>
            <td><a href="<?= base_url('dashboard/edit/').$blog['id'] ?>" class="btn btn-success btn-option" href="">Edit</a></td>
            <td><a href="<?= base_url('dashboard/delete/').$blog['id'] ?>" onclick="return confirm('Are you sure want to delete this article?')" class="btn btn-danger btn-option" href="">Delete</a></td>
          </tbody>
        <?php endforeach; ?>
      </table>
      
      <!-- Pagination -->
      <nav aria-label="Page navigation example">
        <ul class="pagination">

          <!-- go to first page -->
          <li class="page-item" style="margin: 0px !important;">
            <a class="page-link" href="<?= base_url('dashboard/index/1') ?>" aria-label="Previous" style="border-radius:0 !important;border:none !important;">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>

          <!-- pagination indicators behaviors -->
          <?php if(($idp - 1) <= 0) : ?>
            <li class="page-item" style="margin: 0px !important;"><a class="page-link bg-primary text-white" href="<?= base_url('dashboard/index/').$idp ?>" style="border-radius:0 !important;"><?= $idp ?></a></li>
            <li class="page-item" style="margin: 0px !important;"><a class="page-link" href="<?= base_url('dashboard/index/').($idp + 1) ?>" style="border-radius:0 !important;"><?= $idp + 1 ?></a></li>
            <li class="page-item" style="margin: 0px !important;"><a class="page-link" href="<?= base_url('dashboard/index/').($idp + 2) ?>" style="border-radius:0 !important;"><?= $idp + 2 ?></a></li>
          <?php elseif(($idp + 1) > $total_pages) : ?>
            <li class="page-item" style="margin: 0px !important;"><a class="page-link" href="<?= base_url('dashboard/index/').($idp - 2) ?>" style="border-radius:0 !important;"><?= $idp - 2 ?></a></li>
            <li class="page-item" style="margin: 0px !important;"><a class="page-link" href="<?= base_url('dashboard/index/').($idp - 1) ?>" style="border-radius:0 !important;"><?= $idp - 1 ?></a></li>
            <li class="page-item" style="margin: 0px !important;"><a class="page-link bg-primary text-white" href="<?= base_url('dashboard/index/').$idp ?>" style="border-radius:0 !important;"><?= $idp ?></a></li>
          <?php else : ?>
            <li class="page-item" style="margin: 0px !important;"><a class="page-link" href="<?= base_url('dashboard/index/').($idp - 1) ?>" style="border-radius:0 !important;"><?= $idp - 1 ?></a></li>
            <li class="page-item" style="margin: 0px !important;"><a class="page-link bg-primary text-white" href="<?= base_url('dashboard/index/').$idp ?>" style="border-radius:0 !important;"><?= $idp ?></a></li>
            <li class="page-item" style="margin: 0px !important;"><a class="page-link" href="<?= base_url('dashboard/index/').($idp + 1) ?>" style="border-radius:0 !important;"><?= $idp + 1 ?></a></li>
          <?php endif; ?>

          <!-- go to last page -->
          <li class="page-item" style="margin: 0px !important;">
            <a class="page-link" href="<?= base_url('dashboard/index/').$total_pages ?>" aria-label="Next" style="border-radius:0 !important;border:none !important;">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>
      
    </div>
  
  </div>

</div>