
      <section class="text-center mb-4">
          
        <!-- Session Message -->
        <div class="row">
          <div class="col">
            <?php $this->load->view('layouts/message'); ?>
          </div>
        </div>
        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <?php foreach($product as $key => $p): ?>
       
          <div class="col-lg-3 col-md-6 col-sm-4 mb-4">

            <!--Card-->
            <div class="card">

              <!--Card image-->
              <!-- Loop -->
              <div class="view overlay">
              
                <img src="<?php echo base_url('assets/img/lightbox/default-skin.png') ?>" data-src="<?php echo base_url('/upload/product/'). $p['main_image'][0] ?>" class="card-img-top lazyload"
                  alt="product"> 
                <a href="<?php echo base_url('member/product/detail/'). $p['nama_product']; ?>">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <!--Card image-->

              <!--Card content-->
              <div class="card-body text-center">
                <!--Category & Title-->
                <h5>
                  <a href="#" class="grey-text">
                    <h6><?php echo ucwords($p['kategori']) ?></h6>
                  </a>
                  <strong class="h6">
                    <a href="#" class="dark-grey-text"><?php echo $p['nama_product'] ?></a>
                  </strong>
                </h5>

                <?php 

                  $harga = intval($p['harga']);
                  $pot_reseller =  intval($p['pot_reseller']) / 100;
                  $pot_marketter = intval($p['pot_marketter']) / 100;

                  $harga_reseller = $harga - ($harga * $pot_reseller);
                  $harga_marketter = $harga - ($harga * $pot_marketter);

                ?>

                <form method="post" action="<?php echo base_url('member/order/add') ?>">

                  <h4 class="font-weight-bold blue-text">

                    <?php if ($role == 'reseller') { ?>

                      <?php if (intval($p['pot_reseller']) > 0) { ?>
                        <small style="text-decoration: line-through;"><?php echo number_format($harga, 0,',','.') ?></small>
                        <br>
                      <?php } ?>
                      
                      <strong><?php echo 'Rp '. number_format($harga_reseller, 0,',','.'); ?></strong>
                      <input type="hidden" name="harga" value="<?php echo $harga_reseller ?>">

                    <?php } elseif ($role == 'marketter') { ?>

                       <?php if (intval($p['pot_marketter']) > 0) { ?>
                        <small style="text-decoration: line-through;"><?php echo number_format($harga, 0,',','.') ?></small>
                        <br>
                      <?php } ?>

                      <strong><?php echo 'Rp '. number_format($harga_marketter, 0,',','.'); ?></strong>
                      <input type="hidden" name="harga" value="<?php echo $harga_marketter ?>">

                    <?php } else{ ?>

                        <strong><?php echo 'Rp '. number_format($harga, 0,',','.'); ?></strong>
                        <input type="hidden" name="harga" value="<?php echo $harga ?>">

                    <?php } ?>
                    
                  </h4>
                  
                  <input type="hidden" name="nama_product" value="<?php echo $p['nama_product'] ?>">
                  <input type="hidden" name="gambar_product" value="<?php echo $p['main_image'][0] ?>">     
                  <input type="hidden" name="product_id" value="<?php echo $p['id'] ?>">
                  <input type="hidden" name="kategori" value="<?php echo $p['kategori'] ?>">
                  <input type="hidden" name="stock" value="<?php echo $p['stock'] ?>">
                  <input type="hidden" name="berat" value="<?php echo $p['berat'] ?>">

                  <div class="row justify-content-center">

                    <div class="col-md-5 d-flex align-items-center justify-content-end">
                     <input type="number" name="qty" min="0" max="<?= $p['stock'] ?>" placeholder="Qty" class="form-control" <?php echo ($p['stock'] == 0) ? 'disabled' : 'required' ;?> >
                    </div>

                    <div class="col-md-7 d-flex pl-3 align-items-center">
                      <button type="submit" class="btn btn-md btn-primary btn-outline-primary" value="Beli" id="beli" <?php echo ($p['stock'] == 0) ? 'disabled' : '' ?> >
                        <span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span> Beli
                      </button>
                    </div>

                  </div>

                  <div class="row justify-content-center p-3">

                    <a href="<?php echo base_url('member/product/detail/'. $p['nama_product']) ?>" class="btn btn-primary btn-block">Detail</a>

                    <div class="p-2">
                      <span class=" <?php echo ($p['stock'] == 0) ? 'text-danger' : 'text-secondary' ?> "><?php echo 'Stock : '.$p['stock']. ' Pcs' ?></span>
                    </div>

                  </div>
                </form>

              </div>
              <!--Card content-->

            </div>
            <!--Card-->

          </div>
          <?php endforeach; ?>

        </div>
        <!--Grid row-->

      </section>
      <!--Section: Products v.3-->

      <!--Pagination-->
            <?php echo $this->pagination->create_links(); ?>
      <!--Pagination-->


    </div>

      <?php include_once 'layouts/address.php'; ?>

  </main>
  <!--Main layout-->

  <style>
    @media only screen and (max-width: 1200px){
      #gmap_canvas{
        width: 100%
      }
    }
  </style>
