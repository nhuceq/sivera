<!-- Modal Edit SPP Loket -->
<div class="modal fade" id="edit_spp_loket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<form class="modal-content" method="post" action="{{url('/spp_edit_loket/')}}/{{$data_spp->id_spp}}">
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
						<div class="form-group">
							<label>Nomor Pengajuan</label>
							<input type="text" class="form-control" placeholder="" name="nomor_pengajuan" readonly="" value ="{{ $data_spp -> id_spp }}">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Nomor SPP</label>
							<input type="text" class="form-control" placeholder="" name="nomor_spp" required value ="{{ $data_spp -> nomor_spp }}" readonly>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label >Tanggal Dokumen SPP</label>
							<input type="date" class="form-control" placeholder="" name="tgl_dok" required value="{{ $data_spp -> tgl_dok_spp }}" readonly>
						</div>		
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Pertanggung Jawaban</label>
							<input type="text" class="form-control" value="{{ $nama_pj }}" readonly />
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Sifat Bayar</label>
							<select class="form-control" name="sifat_bayar" readonly>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Jenis Bayar</label>
							<select class="form-control" name="jenis_bayar" readonly>
							</select>
						</div>			
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Nama Bayar</label>
							<select class="form-control" name="nama_bayar" readonly>
							</select>
						</div>		
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Keterangan SPP</label>
							<textarea class="form-control" rows="3" name="ket_spp" readonly>{{$data_spp->ket_spp}}</textarea>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Jenis Belanja</label>
							<input type="text" class="form-control" name="jenis_belanja" value="{{ $data_spp -> jenis_belanja }}" readonly>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Nilai SPP</label>
							<input type="text" class="form-control" name="nilai_spp" value="{{ $data_spp -> nilai_spp }}" readonly>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Tanggal Terima SPP</label>
							<input type="date" class="form-control" name="tgl_terima" required value="{{ $data_spp -> tgl_terima }}" >
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Tanggal Dikembalikan SPP</label>
							<input type="date" class="form-control" name="tgl_kembali" value="{{ $data_spp -> tgl_dikembalikan}}" readonly />
						</div>				
					</div>	
					<div class="col-md-4">			
						<div class="form-group">
							<label>Tanggal Penerimaan Kembali</label>
							<input type="date" class="form-control" name="tgl_terima_kembali" value="{{ $data_spp -> tgl_penerimaan_kembali }}" readonly />
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Posisi Dokumen Kembali</label>
							<input type="text" class="form-control" name="posisi_dok" value="{{ $data_spp -> posisi_dok }}" readonly />
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
