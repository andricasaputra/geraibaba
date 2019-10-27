
  <!-- <a class="nav-link waves-effect" href="<?php echo base_url('member/order/checkout') ?>" style="position: fixed;bottom: 25px;z-index: 5;right: 20px;transform: rotateY(180deg);">
    <i class="fas fa-shopping-cart" style="font-size: 45px;color: #000;"></i>
    <span class="badge red z-depth-1 mr-1"><?php echo count($this->cart->contents()) ?> </span>
  </a> -->
  <style>
    .carousel-inner > .carousel-item > img {
      width: 100%;
      height:auto;
    }

    .carousel .carousel-indicators li {
      background-color: #fff;
      background-color: rgba(70, 70, 70, 0.25);
    }

    .carousel .carousel-indicators .active {
      background-color: #444;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        height: 100px;
        width: 100px;
        outline: black;
        background-size: 100%, 100%;
        border-radius: 50%;
        border: 1px solid white;
        background-image: none;
    }
  </style>
  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-4 offset-md-2 mb-4">

          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">

              <?php foreach ($productdetail['images'] as $key => $image) { ?>

                <?php if ($image['main'] == 1) { ?>

                  <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $key ?>" class="active"></li>

                <?php } else { ?>

                  <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $key ?>"></li>
                <?php } ?>

              <?php } ?>

            </ol>

            <div class="carousel-inner">

              <?php foreach ($productdetail['images'] as $key => $image) { ?>

              <?php if ($image['main'] == 1) { 
                $gambar = $image['gambar'];
              ?>

                <div class="carousel-item active">
                   <img class="d-block w-100" src="<?php echo base_url('upload/product/'. $image['gambar']) ?>" alt="$image['gambar']">
                </div>

              <?php } else { ?>

                <div class="carousel-item">
                  <img class="d-block w-100" src="<?php echo base_url('upload/product/'. $image['gambar']) ?>" alt="$image['gambar']">
                </div>

              <?php } ?>

            <?php } ?>
              
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <!--Grid column-->
        <div class="col-md-6 mb-4">
          <!--Content-->
          <form action="<?php echo base_url('member/order/add') ?>" method="post">
            <div class="p-4">
              <input type="hidden" value="<?php echo $productdetail['id'] ?>" name="id">
              <p class="lead font-weight-bold"><?php echo $productdetail['nama_product'] ?></p>
              <input type="hidden" name="nama_product" value="<?php echo $productdetail['nama_product'] ?>">
              
              <input type="hidden" name="product_id" value="<?php echo $productdetail['id'] ?>">
              <input type="hidden" name="harga" value="<?php echo $productdetail['harga'] ?>">
              <input type="hidden" name="stock" value="<?php echo $productdetail['stock'] ?>">
              <input type="hidden" name="berat" value="<?php echo $productdetail['berat'] ?>">
              <input type="hidden" name="gambar_product" value="<?php echo $gambar  ?>">

              <?php 

                  $harga = intval($productdetail['harga']);
                  $pot_reseller =  intval($productdetail['pot_reseller']) / 100;
                  $pot_marketter = intval($productdetail['pot_marketter']) / 100;

                  $harga_reseller = $harga - ($harga * $pot_reseller);
                  $harga_marketter = $harga - ($harga * $pot_marketter);

                ?>

              <p class="lead">
                <?php if ($role == 'reseller') { ?>

                    <?php if (intval($productdetail['pot_reseller']) > 0) { ?>
                      <small style="text-decoration: line-through;"><?php echo number_format($harga, 0,',','.') ?></small>
                    <?php } ?>
                
                    <strong><?php echo 'Rp '. number_format($harga_reseller, 0,',','.'); ?></strong>

                <?php } elseif ($role == 'marketter') { ?>

                    <?php if (intval($productdetail['pot_marketter']) > 0) { ?>
                    <small style="text-decoration: line-through;"><?php echo number_format($harga, 0,',','.') ?></small>
                    <?php } ?>

                    <strong><?php echo 'Rp '. number_format($harga_marketter, 0,',','.'); ?></strong>

                <?php } else{ ?>

                    <strong><?php echo 'Rp '. number_format($harga, 0,',','.'); ?></strong>

                <?php } ?>
              </p>
              <p><?php echo $productdetail['deskripsi'] ?></p>
              <h5>
                <?php if($productdetail['stock']==0): ?>
                  <small class="text-danger">Out of Stock</small>
                  <?php else: ?>
                  <small class="text-info">Jumlah Stock : <?php echo $productdetail['stock'] ?></small>
                <?php endif; ?>
              </h5>
              <input type="number" class="form-control mb-2" placeholder="Masukkan Qty" name="qty" <?php echo ($productdetail['stock'] == 0) ? 'disabled' : 'required' ?> >
              <?php echo form_error('qty', '<small class="text-danger">', '</small>') ?>
              <button class="btn btn-primary btn-block" type="submit" name="beli" <?php echo ($productdetail['stock'] == 0) ? 'disabled' : '' ?> >Beli</button>
            </div>
          </form>
          <!--Content-->
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
      <hr>
      <!--Grid row-->
      <div class="row d-flex justify-content-center wow fadeIn">
        <!--Grid column-->
        <div class="col-md-6 text-center">
          <h4 class="my-4 h4">Produk Lainnya</h4>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->

      <!--Grid row-->
      <div class="row wow fadeIn justify-content-center">
        <!--Grid column-->
        <!-- <?php foreach($product_random as $pr): ?>
          <div class="col-lg-4 col-md-12 mb-4">
            <a href="<?php echo base_url('member/product/detail/'. $pr['nama_product']) ?>">
            <img src="<?php echo base_url('/upload/product/'. $pr['gambar_product']) ?>" class="img-fluid" alt="">
            </a>
          </div>
        <?php endforeach; ?> -->
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
  </main>
  <!--Main layout-->
