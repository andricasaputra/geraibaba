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
                <a href="<?php echo base_url('home/productDetail/'). $p['nama_product']; ?>">
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
                  <strong><?php echo 'Rp. '. number_format($p['harga'], 0,',','.'); ?></strong>
                </h4>

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


  