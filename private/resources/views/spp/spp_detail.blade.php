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
					
					<button type="button" class="btn btn-success float-left btn-sm">
						Cetak
					</button>

					@endif 

					<button type="button" class="btn btn-primary float-left btn-sm" data-toggle="modal" data-target="#kelengkapan_dokumen">
						Kelengkapan Dokumen
					</button>
				</div>
			</div>

			
			<div>
				<a href="{{ url ('/spp_view') }}">Kembali Ke Halaman Sebelumnya</a>
			</div>

		</div>

		@include('spp.modals.edit_spp_loket')
		@include('spp.modals.edit_spp_ver1')
		@include('spp.modals.edit_spp_ver2')
		@include('spp.modals.kelengkapan_dokumen')

	</div>
</div>
</div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
	const jenisDok = JSON.parse('<?php echo json_encode($jenis_dok) ?>')
	const dokHub = JSON.parse('<?php echo json_encode($dok_hub) ?>')
	const role = '{{ Auth::user()->role }}'
	const vm = new Vue({
		el: '#kelengkapan_dokumen',
		data() {
			return {
				jenisDok: jenisDok,
				dokHub: dokHub,
				isUserBiasa: role == 'user_biasa' ? true : false
			}
		},
		computed: {
			list() {
				let jenis = jenisDok
				for (let d of dokHub) {
					let i = jenis.findIndex(x => x.id_jenis_dok == d.id_jenis_dok)
					jenis[i].is_uploaded = true
				}
				return jenis
			}
		}
	})
</script>
<script>
	$(document).ready(function(){
		let qs = new URLSearchParams(location.search)
		let form = qs.get('show_form')
		if (form) {
			$('#'+form).modal('show')
		}
	})
</script>
@endsection