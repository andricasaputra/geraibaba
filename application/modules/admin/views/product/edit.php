<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/product') ?>">Product</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
  </ol>
</nav>
<!-- Session Message -->
<div class="row">
  <div class="col-md-8">
    <?php $this->load->view('layouts/message'); ?>
  </div>
</div>

<div class="row">
    <div class="col-md-8 offset-md-2 grid-margin stretch-card col-sm-">
      <div class="card">
        <div class="card-body">
          <br>
          <form class="forms-sample" action="<?php echo base_url('admin/product/update/'. $product['id']); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="merek">Nama Product</label>
              <input type="hidden" class="form-control text-uppercase" id="id" name="id" value="<?php echo $product['id'] ?>">
              <input type="text" class="form-control text-uppercase" id="nama_product" name="nama_product" value="<?php echo $product['nama_product'] ?>" autofocus>
                <?php echo form_error('nama_product', '<small class="text-danger">', '</small>' ) ?>
            </div>
            <div class="form-group">
              <label for="Kategori">Jenis Kategori</label>
              <select class="form-control" name="kategori">
                <?php foreach($kategori as $k): ?>
                  <option value="<?php echo $k['id'] ?>" <?php if($product['id_kategori']==$k['id']){echo 'selected';} ?>><?php echo $k['kategori'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="number" min="0" class="form-control" id="harga" name="harga" value="<?php echo $product['harga'] ?>">
              <?php echo form_error('harga', '<small class="text-danger">', '</small>' ) ?>
            </div>
            <div class="form-group">
              <label for="harga">Potongan Marketter (Dalam Persen)</label>
              <input type="number" min="0" max="100" class="form-control" id="pot_marketter" name="pot_marketter" value="<?php echo $product['pot_marketter'] ?>">
              <?php echo form_error('pot_marketter', '<small class="text-danger">', '</small>' ) ?>
            </div>
            <div class="form-group">
              <label for="berat">Berat (Gram)</label>
              <input type="number" min="0" class="form-control" id="berat" name="berat" value="<?php echo $product['berat'] ?>">
              <?php echo form_error('berat', '<small class="text-danger">', '</small>' ) ?>
            </div>
            <div class="form-group">
              <label for="stock">Stock</label>
              <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $product['stock'] ?>">
              <?php echo form_error('stock', '<small class="text-danger">', '</small>' ) ?>
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi Product</label>
              <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="deskripsi form-control" placeholder="Tuliskan Deskripsi Product"><?php echo $product['deskripsi'] ?>"
              </textarea>
              <?php echo form_error('deskripsi', '<small class="text-danger">', '</small>' ) ?>
            </div>
<!--             <div class="form-group">
              <label for="url">URL</label>
              <input type="text" class="form-control" id="url" name="url" value="<?php echo $product['url'] ?>">
              <?php echo form_error('url', '<small class="text-danger">', '</small>' ) ?>
            </div> -->
      			<div class="form-group">
      				<label for="modified_by">Modified by</label>
      				<input type="text" id="modified_by" name="modified_by" class="form-control" autocomplete="off" readonly="" value="<?php echo $user['nama'] ?>">
      			</div> 
      			<div class="form-group">
      				<?php date_default_timezone_set('Asia/Jakarta') ?>
      				<input type="text" class="form-control" name="last_modified" id="last_modified" value="<?php echo date('Y-m-d H:i:s') ?>" readonly>                      
      			</div>
            <button type="submit" class="btn btn-sm btn-primary mr-2" name="submit">Submit</button>
            <a href="<?= base_url('admin/product') ?>" class="btn btn-sm btn-dark">Cancel</a>
          </form>
        </div>
      </div>
    </div>
</div>

