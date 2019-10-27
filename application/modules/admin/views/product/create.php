<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/product') ?>">Product</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
  </ol>
</nav>

<?php $this->load->view('layouts/message'); ?>

<div class="row">
    <div class="col-8 offset-2 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <br>
          <form class="forms-sample" action="<?php echo base_url('admin/product/store'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="merek">Nama Product</label>
              <input type="text" class="form-control text-uppercase" id="nama_product" name="nama_product" autofocus>
            </div>
            <div class="form-group">
              <label for="Kategori">Jenis Kategori</label>
              <select name="kategori" id="kategori" class="form-control">
                <option value="Pilih Kategori">Pilih Kategori</option>
                <?php foreach($kategori as $k): ?>
                <option value="<?php echo $k['id'] ?>"><?php echo $k['kategori'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="gambar_product">Gambar Product (Gunakan "ctrl" untuk memilih lebih dari satu gambar)</label>
              <input type="file" class="form-control" id="gambar_product" multiple="multiple" name="gambar_product[]">
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="number" min="0" class="form-control" id="harga" name="harga" placeholder="Rp.">
            </div>
            <div class="form-group">
              <label for="harga">Potongan Marketter (Dalam Persen)</label>
              <input type="number" min="0" max="100" class="form-control" id="pot_marketter" name="pot_marketter" placeholder="%">
            </div>
            <div class="form-group">
              <label for="berat">Berat (Gram)</label>
              <input type="number" min="0" class="form-control" id="berat" name="berat">
              <?php echo form_error('berat', '<small class="text-danger">', '</small>' ) ?>
            </div>
            <div class="form-group">
              <label for="stock">Stock</label>
              <input type="number" class="form-control" id="stock" name="stock" placeholder="Masukkan Jumlah Stock">
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi Product</label>
              <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="deskripsi form-control" placeholder="Tuliskan Deskripsi Product"></textarea>
            </div>
      			<div class="form-group">
      				<?php date_default_timezone_set('Asia/Makassar') ?>
      				<input type="text" class="form-control" name="last_modified" id="last_modified" value="<?php echo date('Y-m-d H:i:s') ?>" readonly>                      
      			</div>
            <button type="submit" class="btn btn-sm btn-primary mr-2" name="submit">Submit</button>
            <a href="<?= base_url('admin/product') ?>" class="btn btn-sm btn-dark">Cancel</a>
          </form>
        </div>
      </div>
    </div>
</div>

<script>
  
</script>

