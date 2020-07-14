@extends ('layout.layout')

@section ('little')
Detail SPP 
@endsection

@section('content')

<!-- Bagian Listing-->


<div class="row">
	<div class="col-sm-6">
		<div class="card">
			<div class="card-body">
				<h3>Detail SPP</h3>   
				<ul class="list-group list-group-flush detail-spp">
					<li class="list-group-item">
						<label>Nomor Pengajuan </label>
						<span>: {{ $data_spp->id_spp }}</span>
					</li>
					<li class="list-group-item">
						<label>Nomor SPP </label> <span>: {{ $data_spp->nomor_spp }}
						</span>
					</li>


					<li class="list-group-item">
						<label>Nama Petugas</label> <span>: {{ $nama_loket }}</span>
					</li>

					<li class="list-group-item">
						<label>Tanggal Dokumen</label> <span>: {{ $data_spp->tgl_dok_spp }}</span>
					</li>	

					<li class="list-group-item">
						<label>Keterangan SPP</label> <span>: {{ $data_spp->ket_spp }}</span>
					</li>

					<li class="list-group-item">
						<label>Pertanggung Jawaban</label> <span>: {{ $nama_pj }}</span>
					</li>

					<li class="list-group-item">
						<label>Jenis Belanja</label> <span>: {{ $data_spp->jenis_belanja }}</span>
					</li>

					<li class="list-group-item">
						<label>Nilai SPP</label> <span>: {{ $data_spp -> nilai_spp }}</span>
					</li>

					<li class="list-group-item">
						<label>Tanggal BAPP</label> <span>:  {{ $data_spp->tgl_bapp }}</span>
						<br>

					</li>

					<li class="list-group-item">
						<label>Posisi Dokumen</label> <span>: {{ $data_spp->posisi_dok }}</span>
					</li>

					<li class="list-group-item">
						<label>Tanggal Terima </label> <span>: {{ $data_spp->tgl_terima }}</span>
						<br>			
					</li>

					<li class="list-group-item">
						<label>Tanggal Input </label> <span>:  {{ $data_spp->tgl_input }}</span>
						<br>
					</li>

					<li class="list-group-item">
						<label>Tanggal Dikembalikan</label> <span> : {{ $data_spp->tgl_dikembalikan }}</span>
						<br>
					</li>

					<li class="list-group-item">
						<label>Tanggal Penerimaan Kembali </label> <span>:  {{ $data_spp->tgl_penerimaan_kembali }}</span>
						<br>
					</li>

				</ul>

			</div>
		</div>
	</div>



	<div class="col-sm-6">
		<div class="card">
			<div class="card-body">
				<h3>Detail Verifikasi SPP</h3>
				<ul class="list-group list-group-flush detail-spp">
					<li class="list-group-item">
						<label>Staf Verifikasi </label> <span>: {{ $nama_ver1 }}
							<br>			
						</li>

						<li class="list-group-item">
							<label>Kasubbag Verifikasi </label> <span>:  {{ $nama_ver2 }}</span>
							<br>
						</li>

						<li class="list-group-item">
							<label>Jenis</label> <span>:  {{ $data_spp->jenis_dok }}</span> 
							<br>
						</li>

						<li class="list-group-item">
							<label>Kategori Catatan</label> <span>:  {{ $data_spp->kategori_catatan }}</span>
							<br>
						</li>

						<li class="list-group-item">
							<label>Catatan Verifikator</label> <span>:  {{ $data_spp->catatan_verifikator }}</span>
							<br>
						</li>						

						<li class="list-group-item">
							<label>Status SPP</label> <span>:  {{ $data_spp->status_spp }}</span>
							<br>
						</li>

						<li class="list-group-item">
							<label>Tanggal SPM</label> <span>:  {{ $data_spp->tgl_spm }}</span>
							<br>
						</li>					

						<li class="list-group-item">
							<label>Tanggal SP2D</label> <span>:  {{ $data_spp->tgl_sp2d }}</span>
							<br>
						</li>	

						<li class="list-group-item">
							<label>Nomor SP2D</label> <span>:  {{ $data_spp->nomor_sp2d }}</span>
							<br>
						</li>

					</ul>
				</div>
			</div>

			<!-- Bagian Autorisasi berdasarkan role-->

			<div class="col-30">
				<div style="margin-bottom: 15px"> 
					@if(Auth::user()->role == 'user_loket')
					<!-- Button trigger modal edit spp-->
					<button type="button" class="btn btn-primary float-left btn-sm" data-toggle="modal" data-target="#edit_spp_loket">
						Edit Data SPP
					</button><br><br>

					@elseif(Auth::user()->role =='verifikator1')
					<!-- Button trigger modal edit verifikasi-->
					<button type="button" class="btn btn-primary float-left btn-sm" data-toggle="modal" data-target="#edit_verifikasi1">
						Edit Verifikasi
					</button>

					@elseif(Auth::user()->role =='verifikator2')
					<button type="button" class="btn btn-primary float-left btn-sm" data-toggle="modal" data-target="#edit_verifikasi2">
						Edit Verifikasi Lanjutan
					</button>	

					@elseif(Auth::user()->role == 'admin')	
					<!-- Button trigger modal edit spp -->
					<button type="button" class="btn btn-primary float-left btn-sm" data-toggle="modal" data-target="#edit_spp_loket">
						Edit Data SPP
					</button>
					<!-- Button trigger modal edit verifikasi-->
					<button type="button" class="btn btn-primary float-left btn-sm" data-toggle="modal" data-target="#edit_verifikasi1">
						Edit Verifikasi
					</button>

					<!-- Button trigger modal edit verifikasi lanjutan-->
					<button type="button" class="btn btn-primary float-left btn-sm" data-toggle="modal" data-target="#edit_verifikasi2">
						Edit Verifikasi Lanjutan
					</button>

					@elseif (Auth::user()->role == 'user_biasa')	 
					

					@endif 
				</div>
			</div>

			
			<div>
				<a href="{{ url ('/spp_view') }}">Kembali Ke Halaman Sebelumnya</a>
			</div>

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
									<div class="form-group col-md">
										<label>Nomor Pengajuan</label>
										<input type="text" class="form-control" placeholder="" name="nomor_pengajuan" disabled="" value ="{{ $data_spp -> id_spp }}">
									</div>
									<div class="form-group col-md">
										<label>Nomor SPP</label>
										<input type="text" class="form-control" placeholder="" name="nomor_spp" required value ="{{ $data_spp -> nomor_spp }}" disabled>
									</div>
									<div class="form-group col-md">
										<label >Tanggal Dokumen SPP</label>
										<input type="date" class="form-control" placeholder="" name="tgl_dok" required value="{{ $data_spp -> tgl_dok_spp }}" disabled>

									</div>		

									<div class="form-group col-md">
										<label>Pertanggung Jawaban</label>
										<input type="text" class="form-control" value="{{ $nama_pj }}" readonly />
									</div>

									
									<div class="form-group col-md">
										<label>Sifat Bayar</label>
										<select class="form-control" name="mekanisme" disabled>
											<option value="1" @if($data_spp -> mekanisme_cair == "1") selected @endif>LS</option>
											<option value="2"  @if($data_spp -> mekanisme_cair == "2") selected @endif>UP</option>
											<option value="3"  @if($data_spp -> mekanisme_cair == "3") selected @endif>GUP</option>
											<option value="4"  @if($data_spp -> mekanisme_cair == "4") selected @endif>PTUP</option>
											<option value="5"  @if($data_spp -> mekanisme_cair == "5") selected @endif>GUP NIHIL</option>
											<option value="6"  @if($data_spp -> mekanisme_cair == "6") selected @endif>PTUP NIHIL</option>
										</select>
									</div>
									<div class="form-group col-md">
										<label>Jenis Bayar</label>
										<select class="form-control" name="penerima" disabled>
											<option value="1" @if($data_spp -> penerima_hak =="1") selected @endif>Bendahara Pengeluaran</option>
											<option value="2" @if($data_spp -> penerima_hak =="2") selected @endif>Pihak Ketiga</option>
										</select>
									</div>			

									
								</div>

								<div class="col-md-4">

									<div class="form-group col-md">
										<label>Nama Bayar</label>
										<select class="form-control" name="penerima" disabled>
											<option value="1" @if($data_spp -> penerima_hak =="1") selected @endif>Bendahara Pengeluaran</option>
											<option value="2" @if($data_spp -> penerima_hak =="2") selected @endif>Pihak Ketiga</option>
										</select>
									</div>		

									<div class="form-group col-md">
										<label>Keterangan SPP</label>
										<textarea class="form-control" rows="3" name="ket_spp" disabled>{{$data_spp->ket_spp}}</textarea>
									</div>
									
									<div class="form-group col-md">
										<label>Jenis Belanja</label>
										<input type="text" class="form-control" name="jenis_belanja" value="{{ $data_spp -> jenis_belanja }}" disabled>
									</div>

									<div class="form-group col-md">
										<label>Nilai SPP</label>
										<input type="text" class="form-control" name="nilai_spp" value="{{ $data_spp -> nilai_spp }}" disabled>
									</div>

									<div class="form-group col-md">
										<label>Tanggal Terima SPP</label>
										<input type="date" class="form-control" name="tgl_terima" required value="{{ $data_spp -> tgl_terima }}" >
									</div>

									

									<!-- <div class="form-group col-md">
										<label>Tanggal BAPP</label>
										<input type="date" class="form-control" name="tgl_bapp" required value="{{ $data_spp -> tgl_bapp }}">
									</div>	 -->								
								</div>

								<div class="col-md-4">

									
									<div class="form-group col-md">
										<label>Tanggal Dikembalikan SPP</label>
										<input type="date" class="form-control" name="tgl_kembali" value="{{ $data_spp -> tgl_dikembalikan}}">
									</div>								

									<div class="form-group col-md">
										<label>Tanggal Penerimaan Kembali</label>
										<input type="date" class="form-control" name="tgl_terima_kembali" value="{{ $data_spp -> tgl_penerimaan_kembali }}">
									</div>

									<div class="form-group col-md">
										<label>Posisi Dokumen Kembali</label>
										<input type="text" class="form-control" name="posisi_dok" value="{{ $data_spp -> posisi_dok }}">
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
		</div>

	</div>
</div>
</div>

@endsection