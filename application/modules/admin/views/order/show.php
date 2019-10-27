<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/order') ?>">Order</a></li>
    <li class="breadcrumb-item active" aria-current="page">Order Status</li>
  </ol>
</nav>

<?php $this->load->view('layouts/message'); ?>

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body" style="font-size: 12px;">
          <div class="table-responsive">
            <table class="table table-responsive table-hover" style="width: 100%; text-align: center;">
              <tr>
                <th>ID Order</th>
                <th>Status Transaksi</th>
                <th>Total</th>
                <th>Metode Pembayaran</th>
                <th>Waktu Transaksi</th>
                <th>Kurir</th>
                <th>Resi</th>
              </tr>
              <tr>
                <td><?php echo $stt->order_id ?></td>

                <?php if($stt->transaction_status == 'cancel'): ?>

                  <td class="text-center"><span class="badge badge-danger"><?php echo $stt->transaction_status ?></span></td>

                <?php else: ?>

                  <td><span class="badge badge-success"><?php echo $stt->transaction_status ?></span></td>

                <?php endif; ?>

                <td><?php echo 'Rp. '.number_format($stt->gross_amount, 0, '','.') ?></td>

                <td><?php echo ucwords(str_replace('_', ' ', $stt->payment_type)); ?></td>

                <td><?php echo $stt->transaction_time ?></td>
                <td><?php echo strtoupper($orders['kurir']) ?></td>
                <td><?php echo $orders['resi'] ?></td>
              </tr>
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
      scroller:true
  });
});
</script>