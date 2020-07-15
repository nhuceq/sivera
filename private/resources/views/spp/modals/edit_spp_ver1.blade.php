<!-- Modal Edit Verifikasi 1 -->
<div class="modal fade" id="edit_verifikasi1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<form class="modal-content"  method="post" action="{{url('/verifikasi1_edit/')}}/{{$data_spp->id_spp}}">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel">Form Edit Verifikasi</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				{{ csrf_field()}}
				<div class="row">
					<div class="col-md-6">

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

						<div class="form-group col-md">
							<label>Tanggal BAPP</label>
							<input type="date" class="form-control" name="tgl_bpp" required value="{{ $data_spp -> tgl_bapp }}" >
						</div>

						<div class="form-group col-md">
							<label>Jenis Belanja</label>
							<input type="text" class="form-control" name="jenis_belanja" required value="{{ $data_spp -> jenis_belanja }}">
						</div>

						<div class="form-group col-md">
							<label>Kasubbag Verifikasi</label>
							<select id="inputState" class="form-control" name="verifikator2" required>								<option selected value="">--- Silakan Pilih Kasubbag Verifikasi ---</option>
								<option value="7" @if($data_spp -> kode_ver2 == "7") selected @endif>Yustinus</option>
								<option value="2" @if($data_spp -> kode_ver2 == "2") selected @endif>Farhani</option>
							</select>
						</div>		
						<div class="form-group col-md">
							<label>Nominatif/Rampung/Dispen</label>
							<select id="inputState" class="form-control" name="jenis_dok_spp" required>
								<option selected>-</option>			
								<option value="Rampung" @if($data_spp -> jenis_dok == "Rampung") selected @endif>Rampung</option>			
								<option value="Nominatif" @if($data_spp -> jenis_dok == "Nominatif") selected @endif>Nominatif</option>			

								<option value="Dispensasi 17 Hari Kerja" @if($data_spp -> jenis_dok == "Dispensasi 17 Hari Kerja") selected @endif>Dispensasi 17 Hari Kerja</option>	

							</select>
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
					<div class="col-md-6">


						<div class="form-group col-md">
							<label>Kategori Catatan</label>
							<select id="inputState" rows="7" class="form-control" name="kategori_catatan[]" multiple required>
								<option value="OK" @if($data_spp -> kategori_catatan == "OK") selected @endif>OK</option>

								<option value="Dokumen Belum TTD" @if($data_spp -> kategori_catatan == "Dokumen Belum TTD") selected @endif>Dokumen Belum TTD</option>

								<option value="Uraian Salah" @if($data_spp -> kategori_catatan == "Uraian Salah") selected @endif>Uraian Salah</option>

								<option value="Data Supplier Salah" @if($data_spp -> kategori_catatan == "Data Supplier Salah") selected @endif>Data Supplier Salah</option>
								<option value="Dokumen Tidak Lengkap" @if($data_spp -> kategori_catatan == "Dokumen Tidak Lengkap") selected @endif>Dokumen Tidak Lengkap</option>
								<option value="Salah Akun dan Perhitungan" @if($data_spp -> kategori_catatan == "Salah Akun dan Perhitungan") selected @endif>Salah Akun dan Perhitungan</option>
								<option value="Dan lain-lain" @if($data_spp -> kategori_catatan == "Dan lain-lain") selected @endif>Dan lain-lain</option>
							</select>
						</div>	

						<div class="form-group col-md">
							<label>Catatan Verifikator</label>
							<textarea class="form-control" rows="2" name="catatan_verifikator" required>{{ $data_spp -> catatan_verifikator }}</textarea>
						</div>

						<div class="form-group col-md">  
					<label>Kelengkapan Dokumen</label>	
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="defaultCheck1" disabled>
						<label class="form-check-label" for="defaultCheck1" name="syarat" value="">
							Lembar DRPP <button type="Submit">Preview</button><button type="Submit">Download</button>
						</label>
					</div>
				</div>
						
						<!-- <div class="form-group col-md">
							<label>Tanggal SPM</label>
							<input type="date" class="form-control" name="tgl_spm" required value="{{ $data_spp -> tgl_spm }}">
						</div>
						<div class="form-group col-md">
							<label>Tanggal SP2D</label>
							<input type="date" class="form-control" name="tgl_sp2d" required value="{{ $data_spp -> tgl_sp2d }}">
						</div>
						<div class="form-group col-md">
							<label>Nomor SP2D</label>
							<input type="text" class="form-control" name="nomor_sp2d" required value="{{ $data_spp -> nomor_sp2d }}">
						</div> -->
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="Submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</div>
