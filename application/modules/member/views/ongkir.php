<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-info">
			  <div class="panel-heading">
			    <h3 class="panel-title">Asal</h3>
			  </div>
			  <div class="panel-body">

			    <select class="form-control" name="propinsi_asal" id="propinsi_asal">
			    	<option value="<?php echo $asal['province_id'] ?>" readonly selected>
			    		<?php echo $asal['province'] ?>
			    	</option>
					<!-- <option value="" selected="" readonly="">Pilih Provinsi</option>
					<?php foreach ($province as $key => $p) { 
						echo $p;
					 } ?> -->
				</select>
				<br>
				<select class="form-control" name="origin" id="origin">
					<option value="<?php echo $asal['city_id'] ?>" readonly selected>
			    		<?php echo $asal['city_name'] ?>
			    	</option>
				</select>
			  </div>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="panel panel-success">
			  <div class="panel-heading">
			    <h3 class="panel-title">Tujuan</h3>
			  </div>
			  <div class="panel-body">
			    <select class="form-control" name="propinsi_tujuan" id="propinsi_tujuan">
					<option value="<?php echo $tujuan['province_id'] ?>" readonly selected>
			    		<?php echo $tujuan['province'] ?>
			    	</option>
			    	<?php foreach ($province as $key => $p) { 
						echo $p;
					 } ?>
				</select>
				<br>
				<select class="form-control" name="destination" id="destination">
					<option value="<?php echo $tujuan['city_id'] ?>" readonly selected>
			    		<?php echo $tujuan['city_name'] ?>
			    	</option>
				</select>
			  </div>
			</div>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-md-6">
			<div class="panel panel-success">
			  <div class="panel-heading">
			    <label for="berat"><h3>Berat @gram</h3></label>
			    <input type="text" name="berat" placeholder="gram" id="beratBarang" class="form-control" readonly>
			  </div>
			</div>
		</div>

		<div class="col-md-6"> 
		    <label for="courier"><h3>Kurir</h3></label>
		    <select class="form-control" name="courier" id="courier" onchange="tampil_data('data')" required>
		    	<option value="" disabled selected>Pilih Kurir</option>
		    	<?php foreach ($kurir as $value) { ?>
		    		<option value="<?php echo $value['nama'] ?>"><?php echo strtoupper($value['nama']) ?></option>
		    	<?php } ?>
		    </select>
			<br>
		    
		</div>
	</div>

	<!-- <div class="row">
		<div class="col-md-12">
			<button type="button" onclick="tampil_data('data')" class="btn btn-info">Cek Ongkir</button>
		</div>
	</div> -->

	<div class="row">
		<div class="col col-md-12 text-center">
			<div id="hasil" class="text-center"></div>
		</div>
	</div>

	<!-- <div class="row">
		<div class="col-md-4">
			<div class="panel panel-warning">
			  <div class="panel-heading">
			    <h3 class="panel-title">Cek Resi</h3>
			  </div>
			  <div class="panel-body">
			  	<input type="text" name="no_resi" placeholder="No Resi" id="no_resi" class="form-control">
				<br>
			    <button type="button" onclick="tampil_resi('data')" class="btn btn-info">Cek Resi</button>

			  </div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="panel panel-success">
			  <div class="panel-heading">
			    <h3 class="panel-title">Cek Resi</h3>
			  </div>
			  <div class="panel-body">
			  	<ol>
				    <div id="hasil_resi">

				    </div>
			    </ol>
			  </div>
			</div>
		</div>
	</div> -->
</div>

<script src="<?php echo base_url() ?>assets/jquery/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>

	function tampil_data(act){

	  $('#hasil').html(`<img src="<?php echo base_url() . 'assets/img/loader.gif' ?>">`);

      const w = $('#origin').val();
      const x = $('#destination').val();
      const y = $('#berat').val();
      const z = $('#courier').val();
      const beratBarang = $('#beratBarang').val();

      if(w == "" || x == "" || y == "" || z == "" ){

      	alert("harap isi data dengan lengkap");

      } else {	

      	$.ajax({
          url: "<?php echo base_url() . 'member/ongkir/getEkspedisiCost' ?>",
          type: "GET",
          data : {origin: w, destination: x, berat: y, courier: z, beratBarang: beratBarang},
          success: function (ajaxData){

              $("#hasil").html(ajaxData);

              $(document).on('click', '#pilihTarif', function(){

              	const tarif = $(this).data('tarif');
              	const hargaBarang = $('#btnEkspedisi').data('total');
              	const grandTotal = Number(tarif.replace(',', '')) + Number(hargaBarang);

              	$('#jasaEkspedisi').html(`<span class='text-left' style='font-size:25px;'>Ekspedisi / Kg : </span><span class='float-right' style='font-size:25px;font-weight: bold'>${tarif.replace(',', '.')} </span>`);

              	$('#totalTagihan').html(`<span class='text-left' style='font-size:25px;'>Total : </span><span class='float-right' style='font-size:25px; font-weight: bold'>${rubah(grandTotal)}</span>`);

              	$('#grandtotal').val(grandTotal);
              	$('#kurir').val($(this).data('kurir'));
              	$('#ongkir').val(tarif.replace(',', ''));

              	setTimeout(function(){
              		$("#ekspedisi .close").click();
              	}, 1500);

              	$('#pay-button').prop("disabled", false);

              	function rubah(angka){
				   var reverse = angka.toString().split('').reverse().join(''),
				   ribuan = reverse.match(/\d{1,3}/g);
				   ribuan = ribuan.join('.').split('').reverse().join('');
				   return ribuan;
				}

              });
          }
      	});
      }
	}

	function tampil_resi(act){

      const resi = $('#no_resi').val();

      if(resi == ""){

      	alert("harap isi data dengan lengkap");

      }else{

      	$.ajax({
          url: "../ongkir/getResi",
          type: "GET",
          data : {waybill: resi},
          success: function (ajaxData){
            $("#hasil_resi").html(ajaxData);

          }
      	});
      }
 	}

	$(document).ready(function(){

		$("#propinsi_asal").change(function(){
			//console.log($('#propinsi_asal').val())
			$.post("<?php echo base_url(); ?>member/ongkir/getCity/" + $('#propinsi_asal').val(),function(res){
				$('#origin').html(res);
			});
				
		});

		$("#propinsi_tujuan").click(function(){
			$.post("<?php echo base_url(); ?>member/ongkir/getCity/"+$('#propinsi_tujuan').val(),function(res){
				$('#destination').html(res);
			});
				
		});

		/*
		$("#cari").click(function(){
			$.post("<?php echo base_url(); ?>member/ongkir/getCost/"+$('#origin').val()+'&dest='+$('#destination').val()+'&berat='+$('#berat').val()+'&courier='+$('#courier').val(),function(res){
				$('#hasil').html(res);
			});
		});
		*/
		
	});
</script>
</body>
</html>



