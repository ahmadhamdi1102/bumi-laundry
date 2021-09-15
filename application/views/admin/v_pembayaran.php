<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "berhasil"){
				echo "<div class='alert alert-success text-center'>Data berhasil di simpan.<span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
			}else if($_GET['pesan'] == "diubah"){
				echo "<div class='alert alert-success text-center'>Data berhasil di diubah.<span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
			}else if($_GET['pesan'] == "dihapus"){
				echo "<div class='alert alert-success text-center'>Data berhasil di hapus.<span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
					
			}else if($_GET['pesan'] == "dibayar"){
				echo "<div class='alert alert-success text-center'>Berhasil melakukan Pembayaran.<span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
					
			}
			else{
				echo "";
			}
		}
	?>

<div class="panel panel-default">
	<div class="panel-heading" >
		<div class="panel-title text-center text-white"><span  class="glyphicon glyphicon-usd"></span> Pengelolaan Pembayaran</div>
	</div>
	<div class="panel-body bg-success">
		<br>
		<div class="table-responsive">	
			<table class="table table-bordered table-hover table-striped" id="table-datatable">
				<thead>
					<tr>
						<th>#</th>
						<th>Id Pembayaran</th>
						<th>Tanggal Pemesanan</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Paket</th>
						<th>Jenis Cucian</th>
						<th>Jumlah Bayar</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($pembayaran as $data){ 
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data->id_pembayaran ?></td>
							<td><?php echo date('d/m/Y',strtotime($data->tgl_pesan)) ?></td>
							<td><?php echo $data->nama_pelanggan ?></td>
							<td><?php echo $data->alamat_pelanggan ?></td>
							<td><?php echo $data->paket ?></td>
							<td><?php echo $data->nama_cucian ?></td>
							<td><?php 
								$jml_bayar = 0;$cash = 0;
								$bayar = 0;
								$satuan = $data->jml_total;
								$kiloan = $data->jml_kilo;

								if($satuan == 0){
									$jml_bayar = "Rp. ".number_format($jml_bayar=$kiloan);
									echo $jml_bayar;
									$cash = $kiloan;
								}else{
									$jml_bayar = "Rp. ".number_format($jml_bayar=$satuan);
									echo $jml_bayar;
									
									$cash = $satuan;
								}

								if($satuan == 0){
									$bayar = $kiloan;
								}else{
									$bayar= $satuan;
								}

								


							 ?></td>
							
							

							
												
							<td> 
								 <a href="javascript:;" class="btn btn-sm btn-success" 
								data-id_pembayaran="<?php echo $data->id_pembayaran ?>"
								data-nama_pelanggan="<?php echo $data->nama_pelanggan ?>"
								data-jml_bayar="<?php echo $jml_bayar ?>"
								data-cash="<?php echo $cash ?>"
								data-bayar="<?php echo $bayar ?>"
							
								
								data-toggle="modal" 
								data-target="#ubahPenerimaan" ><span class="glyphicon glyphicon-usd"></span>  Bayar</a>

								

								
							</td>
						</tr>
						<?php 
					}
					?>
				</tbody>
			</table>
		</div>
	</div>


	<div class="panel-footer bg-success">
		<p class="text-center">&copy; ahmad hamdi</p>
	</div>

</div>





<!-- Button trigger modal -->



<!-- Modal Ubah-->
<div class="modal fade" id="ubahPenerimaan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <h4 class="modal-title" id="modelTitleId">Form Pembayaran</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

		        
				<form action="<?php echo base_url('P_Pembayaran/bayar') ?>" method="post" class="form form-horizontal"> 
					
					<input type="hidden" name="id_pembayaran" class="form-control" id="id_pembayaran">
					<div class="form-group">
						<label>Nama Pelanggan</label>
						<input class="form-control" type="text" name="nama_pelanggan" id="nama_pelanggan" readonly>
			        </div>
			        <div class="form-group">
						<label>Total Bayar :</label>
						<input class="form-control uang" type="text"  id="jml_bayar" readonly>
			        </div>
			         
					<input class="form-control uang" type="hidden" name="jml_bayar" id="cash" readonly>
			    
			        <input type="hidden" id="bayar" onchange="hitung()">
			         

			         <div class="form-group">
						<label> Bayar :</label>
						<label style="margin-left: 20px; margin-right: 4px;">Rp. </label>
						<input style="width: 82%;border: 2px solid #ddd;border-radius:4px; padding: .3em 1em;" id="hitung" class="uang" type="text" onchange="hitung()">
			        </div>

			        <div class="form-group">
			        	<label>Kembalian :</label>
			        	<label style="margin-left: 20px; margin-right: 4px;">Rp. </label>
			        	<input style="width: 76%;border: 2px solid #ddd;border-radius:4px; padding: .3em 1em;" type="text" name="" id="sisa"  disabled>
			        </div>



		              
                </div>
            </div>
            <div class="modal-footer">
            	<button onclick="return confirm('apakah jumlah bayar sesuai?')" type="submit" class="btn btn-primary">Bayar</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                
            	</form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
	$(document).ready(function(){

		$('.alert').fadeOut(8000);
		
		$("#table-datatable").dataTable();
		$( '.uang' ).mask('000.000.000', {reverse: true});

	
		

		$('#ubahPenerimaan').on('show.bs.modal', function(event){
			var div = $(event.relatedTarget);
			var modal = $(this);

			modal.find('#id_pembayaran').attr("value",div.data('id_pembayaran'));
			modal.find('#nama_pelanggan').attr("value",div.data('nama_pelanggan'));
			modal.find('#jml_bayar').attr("value",div.data('jml_bayar'));
			modal.find('#cash').attr("value",div.data('cash'));
			modal.find('#bayar').attr("value",div.data('bayar'));
			


		});

		$('#hitung').keyup(function(){
			var hitung = parseInt($(this).val().split('.').join(''));
			var bayar = parseInt($('#bayar').val());

			var total = hitung - bayar;
			var reverse = total.toString().split('').reverse('').join(''),
				ribuan = reverse.match(/\d{1,3}/g),
				ribuan = ribuan.join('.').split('').reverse('').join('');


			$('#sisa').val(ribuan);
		});
			


	

				

		
	});
</script>
