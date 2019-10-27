  <!--Main layout-->
  <main class="mt-5 pt-5 pb-2">
    <div class="container wow fadeIn">
 
      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Transaksi</h2>

      <div class="row justify-content-center">
        <div class="col-md-9">
          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3 mt-5">
            <span class="text-muted">Status Transaksi</span>
          </h4>

        <table class="table table-responsive table-hover" style="width: 100%; text-align: center; margin-bottom: 25%" size="100">
          <tr>
            <th>No.</th>
            <th>ID Order</th>
            <th>Status Transaksi</th>
            <th>Total</th>
            <th>Status Pembayaran</th>
            <th>Waktu Transaksi</th>
            <th>Cara Pembayaran</th>
          </tr>
          <?php $i=1; ?>
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $res['order_id'] ?></td>
            <td><?php echo $res['status_message'] ?></td>
            <td><?php echo 'Rp. '.number_format($res['gross_amount'], 0, '','.') ?></td>
            <td><span class="badge <?php echo ($res['transaction_status']!= 'success') ? 'badge-danger' : 'badge-success' ?> "><?php echo $res['transaction_status'] ?></span></td>
            <td><?php echo $res['transaction_time'] ?></td>
            <td class="text-center"><a href="<?php echo $res['pdf_url'] ?>" class="btn btn-sm btn-primary"  target="_blank"><i class="fa fa-eye"></i> Lihat</a></td>
          </tr>
          <?php $i++ ?>
        </table>
      </div>
    </div>

    </div>
  </main>
  <!--Main layout-->

