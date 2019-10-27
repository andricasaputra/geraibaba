<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/order') ?>">Order</a></li>
    <li class="breadcrumb-item active" aria-current="page">Resi</li>
  </ol>
</nav>
<div class="row">
  <div class="col-lg-8 offset-lg-2 grid-margin stretch-card">
  	
	<?php $this->load->view('layouts/message'); ?>

      <div class="card">
        <div class="card-body p-5" style="font-size: 12px;">
			<form action="<?php echo base_url('admin/order/updateResi'); ?>/<?php echo $order['order_id'] ?>" method="post">
				<div class="row">
					<div class="col-md-12">
						<label for="order_id">Order Id :</label>
						<input type="text" name="order_id" class="form-control" id="order_id" value="<?php echo $order['order_id'] ?>" readonly>
		                <?php echo form_error('order_id', '<small class="text-danger">', '</small>' ) ?><br><br>

		                <label for="kurir">Alamat Pengiriman</label>
		                <textarea cols="6" class="form-control" disabled><?php echo $order['alamat_pengiriman']  ?></textarea>

		                <br><br>

		                <label for="kurir">Kurir</label>
		                <input type="text" name="kurir" class="form-control" value="<?php echo strtoupper($order['kurir'])  ?>">

		                <br><br>

						<label for="resi">Input No.Resi :</label>
						<input type="text" name="resi" class="form-control" id="resi" autofocus value="<?php echo $order['resi'] ?>">
		                <?php echo form_error('resi', '<small class="text-danger">', '</small>' ) ?><br><br>
							<button class="btn btn-primary float-right" type="submit">Submit Resi</button>
						</p>
					</div>
				</div>
			</form>
        </div>
      </div>
    </div>
</div>
