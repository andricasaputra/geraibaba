  <style>
    .no-border{
      border: none;
      border-bottom: 1px inset #4285F4;
      border-radius: 0;
    }

    .card-body form label{
      font-weight: 500;
      font-size: 11pt;
      
    }

    input{
      background-color: #fff !important;
    }
  </style>

  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center ">Checkout form</h2>

      <!--Grid row-->
      <div class="row">
        <?php if (count($cart) == 0) { ?>
            
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="text-center">
                  <img src="<?php echo base_url() . '/assets/img/sad.png'  ?>" width="100">
                  <br><br>
                  Yaahh.. Anda Belum Memiliki Barang Belanjaan Nih
                  <br><br>
                  <a href="<?php echo base_url('member/product') ?>" class="btn btn-primary btn-lg btn-block">Belanja Sekarang</a>
                </div>
              </div>
            </div>
          </div>

        <?php } else { ?>

          <!--Grid column-->
          <div class="col-md-5 mb-4">
            
          <?php $this->load->view('layouts/message'); ?>
            <!--Card-->
            <div class="card">
              <!--Card content-->
              
              <div class="card-body">
                <div class="card-title">
                  <span class="text-muted">Informasi Pengiriman</span>
                </div>
                <form>

                  <div class="row mb-2">
                    <div class="col-md-12">
                      <label for="firstName" class="">Nama Lengkap</label>
                      <input type="text" id="firstName" class="form-control no-border" value="<?php echo ucfirst($member['nama_depan'].' '.$member['nama_belakang']) ?>" readonly>
                    </div>   
                  </div>

                  <div class="row mb-2">
                    <div class="col-md-12">
                      <label for="email" class="">Email</label>
                      <input type="text" id="email" class="form-control no-border" placeholder="Alamat Email" value="<?php echo $member['email'] ?>" readonly>
                    </div>   
                  </div>

                  <div class="row mb-2">
                    <div class="col-md-12">
                      <label for="address" class="">Alamat Pengiriman</label>
                      <textarea class="form-control no-border" id="address" name="address" rows="4"><?php echo rtrim(ucfirst($member['alamat']) . ", Kec " . $member['kecamatan'] .", ". $member['type'] ." ". $member['city_name'] . ", Provinsi " . $member['province'] . " (". $member['postal_code']. ")") 
                       ?>
                       </textarea>
                    </div>   
                  </div>

                  <div class="row mb-2">
                    <div class="col-md-12">
                      <label for="telp" class="">No HP</label>
                      <input type="number" id="telp" class="form-control no-border" name="telp" value="<?php echo $member['telp'] ?>">
                    </div>   
                  </div>

                  <div class="row mb-2">
                    <div class="col-md-12">
                      <label for="telp" class="">Catatan</label>
                      <textarea class="form-control no-border" id="userCatatan" rows="4"></textarea>
                    </div>   
                  </div>

                </form>
                <span><small><i>Note: untuk merubah nama penerima, silahkan update profil anda</i></small></span>
              </div>
            </div>
            <!--/.Card-->
          </div>
          <!--Grid column-->
          <div class="col-md-7 mb-4">
            <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Keranjang Belanja Anda</span>
            <span class="badge badge-secondary badge-pill"><?php echo count($cart); ?></span>
          </h4>

          <form action="<?php echo base_url('member/order/finish') ?>" method="post" id="payment-form">

          <table class="table table-responsive table-hover" style="width: 100%;">
            <tr>
              <th>No.</th>
              <th class="w-25">Gambar</th>
              <th class="w-25">Produk</th>
              <th class="w-25">Harga</th>
              <th class="text-center">Qty</th>
              <th class="text-right w-25">SubTotal</th>
              <th class="text-center">Delete</th>
            </tr>

            <?php $beratTotal = 0; $i=1; foreach($cart as $item): ?>
           
            <tr>
              <td><?php echo $i++ ?></td>
              <td>
                <img src="<?php echo base_url('upload/product/'. $item['gambar_product']) ?>" width="70">
              </td>
              <td><?php echo $item['name'] ?></td>
              <td><?php echo 'Rp '.number_format($item['price'], 0, '','.')?></td>
              <td><?php echo $item['qty'] ?></td>
              <td class="text-right"><?php echo 'Rp '.number_format($item['subtotal'], 0, '','.') ?></td>
              <td class="text-center">
                <a href="<?php echo base_url('member/order/delete/'. $item['rowid']) ?>" class="btn btn-sm btn-danger">
                  <i class="fa fa-times"></i>
                </a>
              </td>
            </tr>

            <input type="hidden" name="result-type" id="result-type" value="" class="result-type">
            <input type="hidden" name="result_data" id="result-data" value="" class="result-data">
            <input type="hidden" name="snap_token" id="snap_token">

            <input type="hidden" name="id" value="<?php echo $item['id'] ?>" >
            <input type="hidden" name="product_id[]" value="<?php echo $item['product_id'] ?>">
            <input type="hidden" id="name" name="name" value="<?php echo $item['name']?>">
            <input type="hidden" id="price" name="price[]" value="<?php echo $item['price'] ?>">
            <input type="hidden" id="qty" name="qty[]" value="<?php echo $item['qty'] ?>">
            <input type="hidden" id="stock" name="stock[]" value="<?php echo $item['stock'] ?>">
            <input type="hidden" id="berat" name="berat[]" value="<?php echo $item['berat'] ?>">
            <input type="hidden" id="subtotal" name="subtotal" value="<?php echo $item['subtotal']?>">
            <input type="hidden" id="alamat_pengiriman" name="alamat_pengiriman">
            <input type="hidden" id="catatan" name="catatan">

            <?php $beratTotal += $item['berat']; ?>

            <?php endforeach; ?>

          </table>

          <?php

          $total = $this->cart->total();

          echo "<span class='text-left' style='font-size:25px;'>Harga Barang : </span><span class='float-right' style='font-size:25px; font-weight: bold'>".number_format($total, 0, '','.')."</span></br>";
           ?>
           <input type="hidden" name="grandtotal" id="grandtotal" value="">
           <input type="hidden" name="kurir" id="kurir">
           <input type="hidden" name="ongkir" id="ongkir">
           <div id="jasaEkspedisi"></div>
           <div id="totalTagihan"></div>
           <div class="row mt-3">
              <div class="col-md-6">
                <a href="#" class="btn btn-primary btn-lg btn-block" data-berat="<?php echo $beratTotal; ?>" data-total="<?php echo $total; ?>" id="btnEkspedisi" data-toggle="modal" data-target="#ekspedisi">Pilih Kurir</a>
              </div>
              <div class="col-md-6">
                <button class="btn btn-primary btn-lg btn-block" type="submit" id="pay-button" disabled>Bayar Sekarang</button>
              </div>
           </div>
          </form> 
        </div>
        <div class="col-md-12">
          <a href="<?php echo base_url('member/product') ?>" class="btn btn-primary btn-lg btn-block">Lanjut Berbelanja</a>
        </div>
        <!--Grid column-->
      <?php  } ?>
      </div>
      <!--Grid row-->
    </div>
  </main>
  <!--Main layout-->

  <!-- Modal Ekspedisi Barang/ Ongkir -->
  <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" id="ekspedisi">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Jasa Pengiriman</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="ekspedisiContent"></div>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" class="btn btn-sm btn-primary">Close</button>
        </div>
      </div>
    </div>
  </div>

<!-- midtrans -->
<script>
  
  $('#pay-button').on('click', function (event) {

    event.preventDefault();

    const grandtotal = $('#grandtotal').val();
    const ongkir = $('#ongkir').val();
    const catatan = $('#catatan').val($('#userCatatan').val());
    const alamat_pengiriman = $('#alamat_pengiriman').val($('#address').val());
    const kurir = $('#kurir').val();

    if (address == '' || telp == '') {

      alert('Alamat Pengiriman dan Nomor Telpon Tidak Boleh Kosong');

      return false;
    }

    $(this).attr("disabled", "disabled");
  
    $.ajax({

      url: '<?= site_url() ?>member/order/token',
      data: {
        total: grandtotal,
        ongkir: ongkir, 
        kurir: kurir
      },
      cache: false,

      success: function(data) {

        function changeResult(type,data){
          $(".result-type").val(type);
          $(".result-data").val(JSON.stringify(data));
        }

        //console.log(data)
        $('#snap_token').val(data);

        snap.pay(data, {
          
          onSuccess: function(result){

            changeResult('success', result);
            $("#payment-form").submit();

          },

          onPending: function(result){

            changeResult('pending', result);
            $("#payment-form").submit();
          },

          onError: function(result){
            changeResult('error', result);
          }

        });
      }
    });

  });

  $('#btnEkspedisi').click(function(e){

    e.preventDefault();

    const berat = $(this).data('berat');

    $.ajax({

      url : "<?php echo base_url() . 'member/ongkir' ?>"

    }).done(function(response){

      $('#ekspedisiContent').html(response);
      $('#beratBarang').val(berat);
      $('#beratBarang').attr('disabled', 'disabled');

    }).catch(function(err){

      $('#ekspedisiContent').html('<p>oopppss... sepertinya ada sedikit gangguan, silahkan coba beberapa saat lagi</p>')
    });

  });

</script>
