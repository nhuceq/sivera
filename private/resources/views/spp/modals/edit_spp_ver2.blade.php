<!-- Modal Edit Verifikasi 2 -->
<div class="modal fade" id="edit_verifikasi2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form method="post" action="{{url('/verifikasi2_edit/')}}/{{$data_spp->id_spp}}">

			{{ csrf_field()}}

			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">Form Edit Verifikasi Lanjutan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">			
					{{ csrf_field()}}
					<div class="form-row">
						<div class="form-group col-md">
							<label>Nomor Pengajuan</label>
							<input type="text" class="form-control" placeholder="" name="nomor_pengajuan" disabled="">
						</div>
						<div class="form-group col-md">
							<label>Nomor SPP</label>
							<input type="text" class="form-control" placeholder="" name="nomor_spp" required value ="{{ $data_spp -> nomor_spp }}" disabled>
						</div>
						<div class="form-group col-md">
							<label >Tanggal Dokumen SPP</label>
							<input type="date" class="form-control" placeholder="" value="{{ $data_spp -> tgl_dok_spp }}" disabled>
						</div>			
					</div>




					<div class="form-row">
						<div class="form-group col-md">
							<label>Staf Verifikasi</label>
							<select id="inputState" class="form-control" name="verifikator1" required disabled>
								<option {{ $data_spp->kode_ver1 == 8 ? 'selected' : '' }} >Sugeng</option>
								<option {{ $data_spp->kode_ver1 == 9 ? 'selected' : '' }} >Nata</option>
								<option {{ $data_spp->kode_ver1 == 10 ? 'selected' : '' }} >Allam</option>
								<option {{ $data_spp->kode_ver1 == 11 ? 'selected' : '' }} >Randika</option>
								<option {{ $data_spp->kode_ver1 == 4 ? 'selected' : '' }} >Nisa D.A</option>
								<option {{ $data_spp->kode_ver1 == 12 ? 'selected' : '' }} >Wawan</option>
								<option {{ $data_spp->kode_ver1 == 13 ? 'selected' : '' }} > Choirunnisa</option>
								<option {{ $data_spp->kode_ver1 == 3 ? 'selected' : '' }} >Nunu</option>	
							</select>
						</div>	

					</div>

				<!-- <div class="form-row">
						
						<div class="form-group col-md">
							<label>Kategori Catatan</label>
							<select id="inputState" class="form-control" name="kategori_catatan" required disabled>
								<option>Dokumen Belum TTD</option>
								<option>Uraian Salah</option>
								<option>Data Supplier Salah</option>
								<option>Dokumen Tidak Lengkap</option>
								<option>Salah Akun dan Perhitungan</option>
								<option>Dan lain-lain</option>
							</select>
						</div>		
					</div> -->

					<div class="form-row">
						<div class="form-group col-md">
							<label>Catatan Verifikator</label>
							<textarea class="form-control" rows="2" name="catatan_verifikator" required>{{ $data_spp -> catatan_verifikator }}</textarea>
						</div>

						<div class="form-group col-md">
							<label>Status SPP</label>
							<select id="inputState" class="form-control" name="status_spp" required>
								<option selected>-</option>
								<option value="Diteruskan kepada Pejabat Penguji SPP" @if($data_spp -> status_spp == "Diteruskan kepada Pejabat Penguji SPP") selected @endif>Diteruskan kepada Pejabat Penguji SPP</option>
								<option value="Diteruskan kepada PPSPM" @if($data_spp -> status_spp == "Diteruskan kepada PPSPM") selected @endif>Diteruskan kepada PPSPM</option>
								<option value="Upload SPM" @if($data_spp -> status_spp == "Upload SPM") selected @endif>Upload SPM</option>
								<option value="Tolak" @if($data_spp -> status_spp == "Tolak") selected @endif>Tolak</option>
								<option value="Ganti Nomor" @if($data_spp -> status_spp == "Ganti Nomor") selected @endif>Ganti Nomor</option>
							</select>									
						</div>
					</div>							
					
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="Submit" class="btn btn-primary">Edit</button>
			</div>
		</div>
	</div>
</div>
