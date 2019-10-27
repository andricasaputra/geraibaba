 
<style>

    .carousel-inner > .carousel-item  > .card > img {
      width: 100%;
      height: auto;

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

   /* @media only screen and(min-width: 770px){
      .row{
          overflow: hidden; 
      }

      [class*="col-"]{
          margin-bottom: -99999px;
          padding-bottom: 99999px;
      }
    }*/
  </style>
  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">

      <!--Grid row-->
      <div class="row wow fadeIn">

        <?php if (! is_null($productdetail['nama_product'])) { ?>

        <!--Grid column-->
        <div class="col col-lg-6 col-sm mb-4 mt-5">

          <div class="row">
              <div class="col-lg-7 col-sm offset-lg-3 text-center">

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

                        <div class="card" style="width: 18rem;">
                          <img class="d-block w-100 card-img-top" src="<?php echo base_url('upload/product/'. $image['gambar']) ?>" alt="$image['gambar']" >
                        </div>

                         
              
                      </div>

                    <?php } else { ?>

                      <div class="carousel-item">

                        <div class="card" style="width: 18rem;">
                           <img class="d-block w-100 card-img-top" src="<?php echo base_url('upload/product/'. $image['gambar']) ?>" alt="$image['gambar']">
                        </div>
               
                       
                 
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
          </div>
          
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col col-lg-6 col-sm mb-4 mt-4">

          <!--Content-->
          <div class="p-4">
            
              <input type="hidden" value="<?php echo $productdetail['id'] ?>">
                <p class="lead font-weight-bold"><?php echo $productdetail['nama_product'] ?></p>
                <p class="lead">
                  <span><?php echo 'Rp '. number_format($productdetail['harga'], 0,',','.'); ?></span>
                </p>
                <p><?php echo $productdetail['deskripsi'] ?></p>
                <h5>

                  <?php if($productdetail['stock'] == 0): ?>
                    <small class="text-danger">Out of Stock</small>
                    <?php else: ?>
                    <small class="text-info">Jumlah Stock : <?php echo $productdetail['stock'] ?></small>
                  <?php endif; ?>

                </h5>
           
          </div>
          <!--Content-->

        </div>
        <!--Grid column-->
        <?php } else { ?>
          <div class="col-md-12 mb-6 mt-5 text-center">
            <div class="mb-6"><h1 class="text-center">Oooppss.. Product yang anda cari tidak ditemukan :)</h1></div>

            <a href="<?php echo base_url('home/')?>" class="btn btn-md btn-primary btn-outline-primary mt-6">Kembali ke halaman utama</a>
          </div>
          <?php } ?>
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
          <a href="<?php echo base_url('home/productDetail/'. $pr['nama_product']) ?>">
          <img src="<?php echo base_url('/upload/product/'. $pr['gambar_product']) ?>" class="img-fluid" alt="">
          </a>
        </div>
        <?php endforeach; ?> -->
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
     <?php include_once 'layouts/address.php'; ?>
  </main>
  <!--Main layout-->
