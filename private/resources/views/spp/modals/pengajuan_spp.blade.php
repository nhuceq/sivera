<!-- Modal User Biasa - Tambah Pengajuan SPP -->
<div class="modal fade" id="tambah_spp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<form class="modal-content" method="post" action="{{ url('/spp_save') }}">
			{{ csrf_field() }}
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel">Form Input Pengajuan SPP</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>				
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group col-md">
							<label>Nomor Pengajuan</label>
							<input type="text" class="form-control" placeholder="Auto Generate" name="nomor_pengajuan" readonly>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group col-md">
							<label>Nomor SPP</label>
							<input type="text" class="form-control" placeholder="" name="nomor_spp" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group col-md">
							<label >Tanggal Dokumen SPP</label>
							<input type="date" class="form-control" placeholder="" name="tgl_dok" required>
						</div>				
					</div>
					<div class="col-md-4">
						<div class="form-group col-md">
							<label>Pertanggung Jawaban</label>
							<input type="text" class="form-control" value="{{ $pj->nama_pj }}" readonly />
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group col-md">
							<label>Jenis Belanja</label>
							<select class="form-control" name="jenis_belanja" required>
								<option selected>51 - Belanja Pegawai</option>
								<option >52 - Belanja Barang</option>
								<option >53 - Belanja Modal</option>
							</select>	
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group col-md">
							<label>Akun</label>
							<input type="text" class="form-control" placeholder="" name="akun" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group col-md">
							<label>Nilai SPP</label>
							<input type="text" id ="rupiah" class="form-control" name="nilai_spp" required>
						</div>		
					</div>
					<div class="col-md-4">
						<div class="form-group col-md">
							<label>Tanggal BAPP</label>
							<input type="date" class="form-control" name="tgl_bapp">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group col-md">
							<label>Keterangan SPP</label>
							<textarea class="form-control" rows="3" name="ket_spp" required></textarea>
						</div>		
					</div>
					<div class="col-md-4">
						<div class="form-group col-md">
							<label>Sifat Bayar</label>
							<select name="sifat_bayar" id="sifat_bayar" class="form-control dynamic" data-dependent="jenis_bayar">
								<option value="" disabled selected>Pilih Sifat Bayar</option>
								@foreach($sifat_bayar_list as $sifat_bayar)
								<option value="{{ $sifat_bayar->sifat_bayar}}">{{ $sifat_bayar->sifat_bayar }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group col-md">
							<label>Jenis Bayar</label>
							<select name="jenis_bayar" id="jenis_bayar" class="form-control dynamic" data-dependent="nama_bayar">
								<option value="" disabled selected>Pilih Jenis Bayar</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group col-md">
							<label>Nama Bayar</label>
							<select name="id_bayar" id="nama_bayar" class="form-control">
								<option value="" disabled selected>Pilih Nama Bayar</option>
							</select>
						</div>
					</div>
				</div>				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="Submit" class="btn btn-primary">Simpan</button>
			</div>
		</form>
	</div>
</div>
