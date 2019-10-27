  <!--Main layout-->
  <main class="mt-5 pt-5 pb-2">
    <div class="container wow fadeIn mt-5 mb-4">
      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Transaksi</h2>
      <div class="row justify-content-center">
        <div class="col-md-9 mb-5">
        <?php $this->load->view('layouts/message'); ?>
          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Pilih ID Order</span>
          </h4>
        <table class="table table-responsive table-hover" style="width: 100%;text-align: center;">
          <thead>
            <tr>
              <th>No</th>
              <th>ID Order</th>
              <th>Email</th>
              <th>Total</th>
              <th>Waktu Transaksi</th>
              <th>Status Pembayaran</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach($order as $o): ?>
            <tr>
              <td><?php echo $i++ ?></td>
              <td><a href="<?php echo base_url('member/order/transaksi/'. $o['order_id']) ?>"><?php echo $o['order_id'] ?></a></td>
              <td><?php echo $o['email'] ?></td>
              <td class="text-right" style="font-weight: bold;"><?php echo number_format($o['total']) ?></td>
              <td><?php echo $o['time'] ?></td>
              <td>
                <?php if ($o['transaction_status'] == 'pending') { ?>
                  <span style="font-weight: 500; font-style: italic; ;color: black"><?= $o['transaction_status'] ?></span>
                <?php } elseif($o['transaction_status'] == 'settlement') { ?>
                  <span style="font-weight: 500; font-style: italic; ;color: green"><?= $o['transaction_status'] ?></span>
                <?php } else { ?>
                  <span style="font-weight: 500; font-style: italic; ;color: red"><?= $o['transaction_status'] ?></span>
                <?php  } ?>
              </td>
              <td>
                <a href="<?php echo base_url('member/order/transaksi/'. $o['order_id']) ?>" ><span class="badge badge-primary p-2">Detail Order</span></a>

                <?php if ($o['transaction_status'] == 'pending') { ?>

                   <?php if ($o['snap_token'] != '') { ?>

                    <a href="#" id="snap" data-token="<?php echo $o['snap_token'] ?>"><span class="badge badge-success p-2 mt-2">Informasi Pembayaran</span></a>

                   <?php  } else { ?>

                      <a href="<?php echo $o['instruction_url'] ?>" data-token="<?php echo $o['instruction_url'] ?>" target="_blank"><span class="badge badge-success p-2 mt-2">Informasi Pembayaran</span></a>
                      
                   <?php } ?>
                  
                  <a href="<?php echo base_url('member/order/cancel/'. $o['order_id']) ?>" onclick="return confirm('Anda Yakin Ingin Membatalkan Pesanan Ini?')">
                    <span class="badge badge-danger p-2 mt-2">Batalkan</span>
                  </a>

                <?php  } ?>

              </td>
            </tr>
           <?php endforeach; ?>
          </tbody>
        </table>
        <a href="<?php echo base_url('member') ?>" class="btn btn-info btn-block mt-2">Back to Home</a>
        </div>
      </div>
    </div>
  </main>
  <!--Main layout-->

  <script>
    $('.table').DataTable();

    $('#snap').click(function(e){

      e.preventDefault();

      snap.pay($(this).data('token'),{
          onSuccess: function(result){
           
          },
          onPending: function(result){
            //console.log(result)
          },
          onError: function(result){

          }
      });
    });
  </script>

