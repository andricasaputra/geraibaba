      <section class="text-center mb-4">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <?php foreach($product as $p): ?>
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
                  <a href="" class="grey-text">
                    <h6><?php echo ucwords($p['kategori']) ?></h6>
                  </a>
                  <strong class="h6">
                    <a href="" class="dark-grey-text"><?php echo $p['nama_product'] ?></a>
                  </strong>
                </h5>

                <h4 class="font-weight-bold blue-text">
                  <strong><?php echo 'Rp '. number_format($p['harga'], 0,',','.'); ?></strong>
                </h4>

                <form method="post" action="<?php echo base_url('member/chart/add') ?>">
                  <input type="hidden" name="id" value="<?php echo $p['id'] ?>">
                  <input type="hidden" name="nama_product" value="<?php echo $p['nama_product'] ?>">
                  <input type="hidden" name="gambar_product" value="<?php echo $p['main_image'][0] ?>">
                  <input type="hidden" name="harga" value="<?php echo $p['harga'] ?>">
                  <div class="row justify-content-center">
                    <div class="col-md-5 d-flex align-items-center justify-content-end">
                      <input type="number" name="qty" min="0" max="<?= $p['stock'] ?>" placeholder="Qty" class="form-control" <?php echo ($p['stock'] == 0) ? 'disabled' : 'required' ;?>>
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

      <!-- maps -->
      <?php include_once 'layouts/address.php'; ?>
      
  </main>
  <!--Main layout-->


  <script>
    var stock = getE
  </script>

  