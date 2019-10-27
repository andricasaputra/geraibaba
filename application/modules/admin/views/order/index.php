<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Order</li>
  </ol>
</nav>

<!-- Session Message -->
<div class="row">
  <div class="col-lg-12">
    <?php $this->load->view('layouts/message'); ?>
  </div>
</div>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body" style="font-size: 12px;">
          <div class="table-responsive">
            <table class="display responsive table-hover" id="demo" cellpadding="5" width="100%" style="width: 100% ;text-align: center;">
              <thead>
                <tr>
        					<th>No.</th>
                  <th class="text-center">Order ID</th>
        					<th class="text-center">Email</th>
                  <th class="text-center">Harga Barang</th>
                  <th class="text-center">Ongkir</th>
                  <th class="text-center">Total</th>
                  <th class="text-center">Catatan</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Time</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php $i = 1; ?>
              <?php foreach($transaksi as $trx): ?>
                <tr>
                  <td class="text-center"><?php echo $i; ?></td>
                  <td class="text-center">
                   <span class="badge badge-info"><?php echo $trx->order_id ?></span>
                  </td>
                  <td class="text-center"><?php echo $trx->email ?></td>
                  <td class="text-center"><?php echo $trx->price ?></td>
                  <td class="text-center"><?php echo $trx->ongkir ?></td>
                  <td class="text-center"><?php echo $trx->total ?></td>
                  <td class="text-center"><?php echo $trx->catatan ?></td>

                  <?php if($trx->transaction_status == 'cancel'): ?>

                  <td class="text-center"><span class="badge badge-danger"><?php echo $trx->transaction_status ?></span></td>

                <?php elseif($trx->transaction_status == 'pending'): ?>

                  <td><span class="badge badge-primary"><?php echo $trx->transaction_status ?></span></td>

                <?php else: ?>

                  <td><span class="badge badge-success"><?php echo $trx->transaction_status ?></span></td>

                <?php endif; ?>

                  <td class="text-center"><?php echo $trx->time ?></td>
                  <td class="text-center">
                      <a href="<?php echo base_url('admin/order/show/'. $trx->order_id) ?>" class="btn btn-outline btn-icons btn-warning btn-rounded"><i class="mdi mdi-eye"></i></a>

                      <a href="<?php echo base_url('admin/order/resi/'. $trx->order_id) ?>" class="btn btn-outline btn-icons btn-primary btn-rounded"><i class="mdi mdi-file-document"></i></a>
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
      scrollY:"500px",
      scrollCollapse: true,
      scroller:true,
      pageLength: 10
  });
});
</script>