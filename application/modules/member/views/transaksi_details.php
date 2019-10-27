  <!--Main layout-->
  <main class="mt-5 pt-5 pb-2">
    <div class="container wow fadeIn mt-5 mb-4">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Transaksi Detail</h2>

      <div class="row justify-content-center">
        <div class="col-md-9">
          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3 mt-5">
            <span class="text-muted">Status Transaksi</span>
            <span><?php echo $member['nama_depan'] .' '. $member['nama_belakang'] ?></span>
          </h4>

        <table class="table table-responsive table-hover" style="width: 100%; text-align: center;">
          <tr>
            <th>ID Order</th>
            <th>Status Transaksi</th>
            <th>Total</th>
            <th>Metode Pembayaran</th>
            <th>Waktu Transaksi</th>
            <th>Kurir</th>
            <th>Nomor Resi</th>
          </tr>
          <tr>
            <td><?php echo $stt->order_id ?></td>
            <td>
              <span class="badge <?php echo ($stt->transaction_status == 'cancel') ? 'badge-danger' : 'badge-success' ?>"><?php echo $stt->transaction_status ?></span>
            </td>
            <td><?php echo 'Rp. '.number_format($stt->gross_amount, 0, '','.') ?></td>

            <td><?php echo ucwords(str_replace('_', ' ', $stt->payment_type)); ?></td>
     
            <td><?php echo $stt->transaction_time ?></td>
            <td><?php echo strtoupper( $orders['kurir']) ?></td>
            <td><?php echo $orders['resi'] ?></td>
          </tr>
        </table>
        <a href="<?php echo base_url('member/order/transaksi') ?>" class="btn btn-info btn-block mb-2">Back to Order ID</a>
        <a href="<?php echo base_url('member') ?>" class="btn btn-info btn-block">Back to Home</a>
      </div>
    </div>



    </div>
  </main>
  <!--Main layout-->

