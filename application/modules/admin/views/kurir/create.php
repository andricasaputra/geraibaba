<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/kurir') ?>">Kurir</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add New Kurir</li>
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
          <form class="forms-sample" action="<?php echo base_url('admin/kurir/store'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="kurir">Nama Kurir</label>
              <input type="text" class="form-control text-uppercase" id="kurir" name="kurir" autofocus>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-sm btn-primary mr-2" name="submit">Submit</button>
              <a href="<?= base_url('admin/kurir') ?>" class="btn btn-sm btn-dark">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

