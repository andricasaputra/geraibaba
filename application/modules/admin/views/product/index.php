<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Product</li>
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
        	<a href="<?php echo base_url('admin/product/create'); ?>">
        		<button class="btn btn-icons btn-rounded btn-primary float-left mb-3 mr-3">
        			<i class="mdi mdi-plus"></i>
        		</button>
        	</a>
          <div class="table-responsive">
            <table class="display responsive table-bordered table-hover text-center" id="demo" cellpadding="5" width="150%">
              <thead>
                <tr>
        					<th>No.</th>
                  <th>Kategori</th>
                  <th>Nama Produk</th>
        					<th>Action</th>             
                  <th>Harga</th>
                  <th>Stock</th>
                  <th>Deskripsi</th>
                  <th>Modified By</th>
                  <th>Last Modified</th>
                </tr>
              </thead>
              <tbody>
              <?php $i = 1; ?>
              <?php foreach($product as $p): ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $p['kategori'] ?></td>
                  <td><?php echo $p['nama_product'] ?></td>
                  <td>
                      <a href="<?php echo base_url('admin/product/showImages'); ?>/<?php echo $p['id'] ?>" class="btn btn-outline btn-icons btn-success btn-rounded">
                        <i class="mdi mdi-eye"></i></a>  
                      <a href="<?php echo base_url('admin/product/edit'); ?>/<?php echo $p['id'] ?>" class="btn btn-outline btn-icons btn-warning btn-rounded">
                        <i class="mdi mdi-pencil"></i></a>  
                      <a href="<?php echo base_url('admin/product/delete'); ?>/<?php echo $p['id'] ?>" onclick="return confirm('Yakin ingin dihapus?')" class="btn btn-outline btn-icons btn-danger btn-rounded">
                        <i class="mdi mdi-delete-forever"></i>
                      </a> 
                  </td>
                  <!-- <td>
                    <img src="<?php echo base_url('/upload/product/'). $p['gambar_product'] ?>" class="img-xs img-thumbnail" style="width: 130px;height: 100px;">
                  </td> -->
                  <td><?php echo 'Rp. '. number_format($p['harga'], 0,',','.') ?></td>
                  <td><?php echo $p['stock'] ?></td>
                  <td class="w-25">
                    <?php 
                      $num_char = 50;
                      $char = $p['deskripsi'];
                      echo substr($char, 0, $num_char);
                    ?>
                  </td>
                  <td><?php echo $p['modified_by'] ?></td>
                  <td>
                    <?php 
                      $tanggal = $p['last_modified'];
                      echo date('l, d-m-Y', strtotime($tanggal));
                    ?>
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
<script>
$(document).ready(function(){
  $('#demo').DataTable({
      scrollX: true,
      scrollCollapse: true,
      scroller:true
  });
});
</script>