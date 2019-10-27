<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Kategori</li>
  </ol>
</nav>

<!-- Session Message -->
<div class="row">
  <div class="col-md-6 offset-md-3">
    <?php $this->load->view('layouts/message'); ?>
  </div>
</div>

<div class="row">
  <div class="col-lg-6 offset-lg-3 grid-margin stretch-card">
      <div class="card">
        <div class="card-body" style="font-size: 12px;">
        	<a href="<?php echo base_url('admin/kategori/create'); ?>">
        		<button class="btn btn-icons btn-rounded btn-primary float-left mb-3 mr-3">
        			<i class="mdi mdi-plus"></i>
        		</button>
        	</a>
          <div class="table-responsive">
            <table class="display responsive table-hover table-bordered" id="demo" cellpadding="5" width="100%">
              <thead>
                <tr>
                  <th>No.</th>
        					<th>Action</th>
                  <th class="text-center">Nama Kategori</th>
                </tr>
              </thead>
              <tbody>
              <?php $i = 1; ?>
              <?php foreach($kategori as $k): ?>

                <tr>
                  <td class="text-center"><?php echo $i; ?></td>
                  <td class="text-center">
                      <a href="<?php echo base_url('admin/kategori/edit'); ?>/<?php echo $k['id'] ?>" class="btn btn-outline btn-icons btn-warning btn-rounded">
                        <i class="mdi mdi-pencil"></i></a>  
                      <a href="<?php echo base_url('admin/kategori/delete'); ?>/<?php echo $k['id'] ?>" onclick="return confirm('Yakin ingin dihapus?')" class="btn btn-outline btn-icons btn-danger btn-rounded">
                        <i class="mdi mdi-delete-forever"></i>
                      </a>
                    </td>
                  <td class="text-center"><?php echo ucwords($k['kategori']) ?></td>
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
      scrollY:"500px",
      scrollCollapse: true,
      scroller:true,
      pageLength: 6
  });
});
</script>