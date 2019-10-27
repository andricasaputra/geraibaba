<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/product') ?>">Product</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/product/showImages') ?>/<?php echo $product_id ?>">Gambar Product</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Gambar Product</li>
  </ol>
</nav>

<?php $this->load->view('layouts/message'); ?>

<div class="row">
    <div class="col-8 offset-2 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <br>
          <form class="forms-sample" action="<?php echo base_url('admin/product/storeProductImage'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="merek">Nama Product</label>
              <input type="text" class="form-control text-uppercase" name="nama_product" value="<?php echo $product['nama_product'] ?>" disabled>
              <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
            </div>
            <div class="form-group">
              <label for="gambar_product">Gambar Product</label>
              <input type="file" class="form-control" id="gambar_product" name="gambar_product">
            </div>
            <button type="submit" class="btn btn-sm btn-primary mr-2" name="submit">Submit</button>
            <a href="<?= base_url('admin/product/showImages') ?>/<?php echo $product_id ?>" class="btn btn-sm btn-dark">Cancel</a>
          </form>
        </div>
      </div>
    </div>
</div>

