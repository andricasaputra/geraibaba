<?php if ($ongkir['rajaongkir']['status']['code'] == 400) { ?>
	
	<div style="padding:10px">
		<table class="table table-striped text-center">
			<td>
				<div class="alert alert-danger text-center">
			        <a href="#" class="close" data-dismiss="alert">&times;</a>
			        <strong><?php echo $ongkir['rajaongkir']['status']['description'] ?></strong>
			    </div>
			</td>
		</table>
	</div>

<?php } else { ?>

	<b><?php echo $ongkir['rajaongkir']['origin_details']['city_name'];?></b> ke 
	<b><?php echo $ongkir['rajaongkir']['destination_details']['city_name'];?></b>, 
	Berat : <b><?php echo $ongkir['rajaongkir']['query']['weight'];?> gram</b>, 
	Kurir : <b><?php echo strtoupper($ongkir['rajaongkir']['query']['courier']); ?></b>

	<?php for ($k=0; $k < count($ongkir['rajaongkir']['results']); $k++) : ?>

		 <div title="<?php echo strtoupper($ongkir['rajaongkir']['results'][$k]['name']);?>" style="padding:10px">
			 <table class="table table-striped">
				 <tr>
					 <th>No.</th>
					 <th>Jenis Layanan</th>
					 <th>ETD</th>
					 <th>Tarif</th>
					 <th>Pilih</th>
				 </tr>
				 <?php
				 for ($l=0; $l < count($ongkir['rajaongkir']['results'][$k]['costs']); $l++) {			 
				 ?>
				 <tr>
					 <td><?php echo $l+1;?></td>
					 <td>
						 <div style="font:bold 16px Arial"><?php echo $ongkir['rajaongkir']['results'][$k]['costs'][$l]['service'];?></div>
						 <div style="font:normal 11px Arial"><?php echo $ongkir['rajaongkir']['results'][$k]['costs'][$l]['description'];?></div>
					 </td>
					 <td align="center">&nbsp;<?php echo $ongkir['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];?> days</td>
					 <td align="right"><b><?php echo number_format($ongkir['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']);?></b></td>
					 <td>
					 	<a href="#" id="pilihTarif" class="btn btn-sm btn-success" data-tarif="<?php echo number_format($ongkir['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']);?>" data-kurir="<?php echo $ongkir['rajaongkir']['query']['courier'] ?>">Pilih</a>
					 </td>
				 </tr>
				 <?php
				 }
				 ?>
			 </table>
		 </div>

	 <?php endfor; ?>

 <?php } ?>