<!-- Modal Edit SPP Loket -->
<div class="modal fade" id="edit_spp_loket_from_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<form class="modal-content" method="post" action="">
			{{ csrf_field() }} 
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel">Form Edit SPP</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group col-md">
							<label>Nomor Pengajuan</label>
							<input type="text" class="form-control" id="id_spp" readonly>
						</div>
						<div class="form-group col-md">
							<label>Nomor SPP</label>
							<input type="text" class="form-control" id="nomor_spp" readonly>
						</div>
						<div class="form-group col-md">
							<label >Tanggal Dokumen SPP</label>
							<input type="date" class="form-control" id="tgl_dok" readonly>

						</div>		

						<div class="form-group col-md">
							<label>Pertanggung Jawaban</label>
							<input type="text" class="form-control" id="nama_pj" readonly />
						</div>

						
						<div class="form-group col-md">
							<label>Sifat Bayar</label>
							<select class="form-control" id="sifat_bayar" readonly>
							</select>
						</div>
						<div class="form-group col-md">
							<label>Jenis Bayar</label>
							<select class="form-control" id="jenis_bayar" readonly>
							</select>
						</div>			

						<div class="form-group col-md">
							<label>Nama Bayar</label>
							<select class="form-control" id="nama_bayar" readonly>
							</select>
						</div>		
						
					</div>

					<div class="col-md-4">


						<div class="form-group col-md">
							<label>Keterangan SPP</label>
							<textarea class="form-control" rows="3" id="ket_spp" readonly></textarea>
						</div>
						
						<div class="form-group col-md">
							<label>Jenis Belanja</label>
							<input type="text" class="form-control" id="jenis_belanja" readonly>
						</div>

						<div class="form-group col-md">
							<label>Nilai SPP</label>
							<input type="text" class="form-control" id="nilai_spp" readonly>
						</div>

						<div class="form-group col-md">
							<label>Tanggal Terima SPP</label>
							<input type="date" class="form-control" style="border: 1px solid green" id="tgl_terima"  name="tgl_terima" required >
						</div>
						
					</div>

					<div class="col-md-4">

						
						<div class="form-group col-md">
							<label>Tanggal Dikembalikan SPP</label>
							<input type="date" class="form-control" id="tgl_kembali" readonly>
						</div>								

						<div class="form-group col-md">
							<label>Tanggal Penerimaan Kembali</label>
							<input type="date" class="form-control" id="tgl_terima_kembali" readonly>
						</div>

						<div class="form-group col-md">
							<label>Posisi Dokumen Kembali</label>
							<input type="text" class="form-control" id="posisi_dok" readonly>
						</div>
					</div>
				</div>
			</div>		
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="Submit" class="btn btn-primary">Edit</button>
			</div>
		</form>
	</div>	
</div>	
