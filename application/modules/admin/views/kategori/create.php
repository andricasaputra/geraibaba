<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/kategori') ?>">Kategori</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add New Kategori</li>
  </ol>
</nav>
<!-- Session Message -->
<div class="row">
  <div class="col-md-6 offset-md-3">
    <?php $this->load->view('layouts/message'); ?>
  </div>
</div>

<div class="row">
    <div class="col-4 offset-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <br>
          <form class="forms-sample" action="<?php echo base_url('admin/kategori/store'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="kategori">Nama Kategori</label>
              <input type="text" class="form-control text-uppercase" id="kategori" name="kategori" autofocus>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-sm btn-primary mr-2" name="submit">Submit</button>
              <a href="<?= base_url('admin/kategori') ?>" class="btn btn-sm btn-dark">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

