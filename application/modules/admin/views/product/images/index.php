<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/product') ?>">Product</a></li>
    <li class="breadcrumb-item active" aria-current="page">Gambar Product</li>
  </ol>
</nav>

<!-- Session Message -->
<div class="row">
  <div class="col-md-12">
    <?php $this->load->view('layouts/message'); ?>
  </div>
</div>
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
      <div class="card" style="font-size: 12px;">
        <div class="card-body">
          <a href="<?php echo base_url('admin/product/createProductImage'); ?>/<?php echo $product[0]['id'] ?>">
            <button class="btn btn-icons btn-rounded btn-primary float-left mb-3 mr-3">
              <i class="mdi mdi-plus"></i>
            </button>
          </a>
          <div class="table-responsive">
            <table class="display table-bordered table-hover text-center" style="width: 100%" cellpadding="10">
              <thead>
                <tr>
        					<th>No.</th>
                  <th>Nama Produk</th>
                  <th width="600">Gambar</th>
                  <th>Gambar Utama</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php $i = 1; ?>
              <?php foreach($product as $p): ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo  $p['nama_product'] ?></td>
                  <td>

                    <?php if (is_null($p['image_id'])) { ?>

                      Produk Belum memiliki Foto

                    <?php } else { ?>

                      <img src="<?php echo base_url('/upload/product/'). $p['gambar'] ?>" style="width: 20%">

                    <?php } ?>

                  </td>
                  <td>
                    <?php if (is_null($p['main'])) { ?>

                       <img src="<?php echo base_url('/assets/img/xmark.png') ?>" style="width: 15%">

                    <?php } else { ?>

                      <img src="<?php echo base_url('/assets/img/checklist.png')?>" style="width: 15%">

                    <?php } ?>
                  </td>
                  <td> 
                    <?php if (is_null($p['image_id'])) { ?>

                      -
                    <?php } else { ?>

                     <form action="<?php echo base_url('admin/product/setMainImages'); ?>/<?php echo $p['id'] ?>/<?php echo $p['image_id'] ?>" method="post">
                        <button type="submit" class="btn btn-outline btn-icons btn-success btn-rounded">
                        <i class="mdi mdi-key"></i>
                      </button> 
                     </form> 

                      <a href="<?php echo base_url('admin/product/deleteImage'); ?>/<?php echo $p['id'] ?>/<?php echo $p['image_id'] ?>" onclick="return confirm('Yakin ingin dihapus?')" class="btn btn-outline btn-icons btn-danger btn-rounded">
                        <i class="mdi mdi-delete-forever"></i>
                      </a> 

                    <?php } ?>
                      
                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>