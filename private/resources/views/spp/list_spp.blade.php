@extends ('layout.layout')

@section ('little')
Daftar SPP 
@endsection

@section('content')

<h2><center> Daftar Surat Permintaan Pembayaran (SPP)</center></h2>

@if(Session::get('error'))
<div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif
<!-- role -->

<div class="col-30">
	<div style="margin-bottom: 15px"> 
		@if(Auth::user()->role == 'user_biasa')
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-danger float-left btn-sm" data-toggle="modal" data-target="#tambah_spp">
			Tambah Pengajuan SPP
		</button>
		@elseif(Auth::user()->role == 'admin')
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-danger float-left btn-sm" data-toggle="modal" data-target="#tambah_spp">
			Tambah Data SPP
		</button>
		@elseif(Auth::user()->role == 'user_loket')
		<!-- <button type="button" class="btn btn-danger float-left btn-sm" data-toggle="modal" data-target="#tambah_spp">
			Terima Dokumen
		</button> -->
		
		@elseif(Auth::user()->role == 'verifikator1')

		@else(Auth::user()->role == 'verifikator2')

		
		@endif
	</div>
</div>

<!-- search -->

<table>
	<tr>
		<div class="input-group col-md">
			<form method="get" action="{{url('/spp_view')}}">
				<td>					
					<input type="text" value="" class="form-control" name="cari" placeholder="Cari SPP">		
				</td>
				<td>
					<span class="input-group-btn btn-sm"><button type="Submit" class="btn btn-danger btn-sm">Cari</button></span>
				</td>
			</form>	
		</div>		
	</tr>
</table>

<br>

<!-- Modal User Biasa - Tambah Pengajuan SPP -->
<div class="modal fade" id="tambah_spp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<form class="modal-content" method="post" action="{{ url('/spp_save') }}">
			<!-- {{ csrf_field() }}  -->
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel">Form Input Pengajuan SPP</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>				
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group col-md">
							<label>Nomor Pengajuan</label>
							<input type="text" class="form-control" placeholder="Auto Generate" name="nomor_pengajuan" readonly>
						</div>
						<div class="form-group col-md">
							<label>Nomor SPP</label>
							<input type="text" class="form-control" placeholder="" name="nomor_spp" required>
						</div>
						<div class="form-group col-md">
							<label >Tanggal Dokumen SPP</label>
							<input type="date" class="form-control" placeholder="" name="tgl_dok" required>
						</div>				
						
						<div class="form-group col-md">
							<label>Pertanggung Jawaban</label>
							<select class="form-control" name="pj" required>
								<option selected>Sekretariat I (Hergy Cahyono)</option>
								<option >Sekretariat I (Digda MY Yaasin)</option>
								<option >Sekretariat I (Karlina Aucia)</option>
								<option >Sekretariat II (Ipin Triono)</option>
								<option >Sekretariat III (Iqbal Mustika Jaya)</option>
								<option >Kedeputian I (Dody Kurniawan)</option>
								<option >Kedeputian II (Erns Saptenno)</option>
								<option >Kedeputian III (Iwan Niswanto)</option>
								<option >Kedeputian IV (Ruhiyat)</option>
								<option >e-Commerce (Edi Sugito)</option>
								<option >Kedeputian V (Lutfi Mubarok)</option>
								<option >Kedeputian VI (Nurman Rudianto)</option>
								<option >KPPIP (Djoko Wibowo)</option>
								<option >Kedeputian VII (Rendyawan A)</option>
								<option >KEK (Mardi Santoso)</option>			
							</select>
						</div>

						<div class="form-group col-md">
							<label>Jenis Belanja</label>
							<select class="form-control" name="jenis_belanja" required>
								<option selected>51 - Belanja Pegawai</option>
								<option >52 - Belanja Barang</option>
								<option >53 - Belanja Modal</option>
							</select>	
						</div>

						<div class="form-group col-md">
							<label>Akun</label>
							<input type="text" class="form-control" placeholder="" name="akun" required>
						</div>

						<div class="form-group col-md">
							<label>Nilai SPP</label>
							<input type="text" id ="rupiah" class="form-control" name="nilai_spp" required>
						</div>		
						


					</div>
					
					<div class="col-md-6">
						
						
										
						<!-- <div class="form-group col-md">
							<label>Tanggal Terima SPP</label>
							<input type="date" class="form-control" name="tgl_terima" required>
						</div>	 -->

						<div class="form-group col-md">
							<label>Tanggal BAPP</label>
							<input type="date" class="form-control" name="tgl_bapp">
						</div>

						<div class="form-group col-md">
							<label>Keterangan SPP</label>
							<textarea class="form-control" rows="3" name="ket_spp" required></textarea>
						</div>		

						<div class="form-group col-md">
							<label>Sifat Bayar</label>
							<select name="sifat_bayar" id="sifat_bayar" class="form-control input-lg dynamic" data-dependent="jenis_bayar">
								<option value="">Pilih Sifat Bayar</option>
								@foreach($sifat_bayar_list as $sifat_bayar)
								<option value="{{ $sifat_bayar->sifat_bayar}}">{{ $sifat_bayar->sifat_bayar }}</option>
								@endforeach
							</select>
						</div>
						

						<div class="form-group col-md">
							<label>Jenis Bayar</label>
							<select name="jenis_bayar" id="jenis_bayar" class="form-control input-lg dynamic" data-dependent="nama_bayar">
								<option value="">Pilih Jenis Bayar</option>
							</select>
						</div>
						
						<div class="form-group col-md">
							<label>Nama Bayar</label>
							<select name="nama_bayar" id="nama_bayar" class="form-control input-lg dynamic">
								<option value="">Pilih Nama Bayar</option>
							</select>
						</div>


						{{ csrf_field() }}


						
						{{-- <div class="form-group col-md">  
							<label>Kelengkapan Dokumen</label>	
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
								<label class="form-check-label" for="defaultCheck1" name="syarat" value="{{ $sifat_bayar->sifat_bayar}}">
									Lembar DRPP <button type="Submit">Upload</button>
								</label>
							</div>
						</div> --}}
						
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

<!-- Modal User Biasa - Tambah Pengajuan SPP - Form Syarat Dokumen -->

<div class="modal" tabindex="-1" role="dialog" name="form_syarat">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- listing -->

<div class="table-responsive">
	<table class="table text-nowrap">
		<tr>
			<center>
				<th>No.</th>
				<th>No. Pengajuan</th>
				<th>No. SPP</th>
				<!-- <th>Nama Petugas</th> -->
				<th>Tgl SPP</th>
				<th>Jenis</th>
				<th>Penerima Hak</th>
				<th>Unit</th>
				<th>Nilai</th>
				<th>Status</th>
				<th>SP2D</th>
				<th class="no-wrap">Aksi</th>
			</center>
		</tr>	

		<?php
		$page=1;
		if(isset($_GET['page'])) {
			$page = $_GET['page'];
		}
		$i=($page*10)-9;	

		?>
		@foreach ($data_spp as $spp)

		<tr>
			<td>{{ $i }}</td>
			<td>{{ $spp -> id_spp }}</td>
			<td>{{ $spp -> nomor_spp }}</td>
			<!-- <td>{{ $spp -> loket_nama }}</td> -->
			<td>{{ $spp -> tgl_dok_spp }}</td>
			@if( $spp -> mekanisme_cair == 1 )
			<td>LS</td>
			@elseif( $spp -> mekanisme_cair == 2 )
			<td>UP</td>
			@elseif( $spp -> mekanisme_cair == 3 )
			<td>GUP</td>
			@else
			<td>PTUP</td>
			@endif

			@if( $spp -> penerima_hak ==1 )
			<td>Bendahara Pengeluaran</td>
			@else
			<td>Pihak Ketiga</td>	
			@endif


			<td>{{ $spp -> pj }}</td>
			<td>{{$spp -> nilai_spp }}</td>
			<td>{{ $spp -> status_spp }}</td>
			<td>{{ $spp -> nomor_sp2d }}</td>

			<!-- Roles  -->
			<td class="text-nowrap">
				@if (Auth::user() -> role == 'user_loket')
				<a href="{{ url ('/spp_detail/') }}/{{ $spp -> id_spp }}" class="btn btn-info btn-sm" name="detail">Detail</a>
				<a href="{{ url('/spp_routing/'. $spp->id_spp ) }}" class="btn btn-success btn-sm">Routing 2</a>
				@elseif (Auth::user() -> role == 'verifikator1')	
				<a href="{{ url ('/spp_detail/') }}/{{ $spp -> id_spp }}" class="btn btn-info btn-sm">Detail</a>
				@elseif (Auth::user() -> role == 'verifikator2')	
				<a href="{{ url ('/spp_detail/') }}/{{ $spp -> id_spp }}" class="btn btn-info btn-sm">Detail</a>	
				@elseif (Auth::user() -> role == 'admin')	
				<a href="{{ url ('/spp_detail/') }}/{{ $spp -> id_spp }}" class="btn btn-info btn-sm">Detail</a>
				<a href="{{ url('/spp_routing/'. $spp->id_spp ) }}" class="btn btn-success btn-sm">Routing</a>
				<button onclick="hapus('{{ $spp->id_spp }}')" class="btn btn-danger btn-sm">Hapus</button>	

				@else (Auth::user() -> role == 'user_biasa')
				<a href="{{ url ('/spp_detail/') }}/{{ $spp -> id_spp }}" class="btn btn-info btn-sm">Detail</a> 
				<a href="{{ url ('/spp_routing_spec/') }}/{{ $spp -> id_spp }}" class="btn btn-success btn-sm">Routing 1</a> 			
				@endif	




			</td>
		</tr>
		<?php $i++; ?>
		@endforeach
	</table>
</div>
{{ $data_spp->links() }}

<script type="text/javascript">
	function hapus(id_spp) {
		if( confirm('Anda yakin menghapus data ini?') ) {
			location.href = 'http://myspp.monevkeu.ekon.go.id/spp_delete/' + id_spp;
		}
		else {

		}
	}

//untuk menampilan tulisan Rp.

rupiah.addEventListener('keyup', function(e){
// tambahkan 'Rp.' pada saat form di ketik
// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
rupiah.value = formatRupiah(this.value, 'Rp. ');
});


function formatRupiah(angka, prefix){
	var number_string = angka.replace(/[^,\d]/g, '').toString(),
	split   		= number_string.split(','),
	sisa     		= split[0].length % 3,
	rupiah     		= split[0].substr(0, sisa),
	ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

	// tambahkan titik jika yang di input sudah menjadi angka ribuan
	if(ribuan){
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
	
	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

</script>


<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
	$(document).ready(function(){

		$('.dynamic').change(function()
		{
			if($(this).val() != '')
			{
				var select = $(this).attr("id");
				var value = $(this).val();
				var dependent = $(this).data('dependent');
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url:"{{ route('sppcontroller.fetch') }}",
					method:"POST",
					data:{select:select, value:value, _token:_token, dependent:dependent},
					success:function(result)
					{
						$('#'+dependent).html(result);
					}

				})
			}
		});

		$('#sifat_bayar').change(function(){
			$('#jenis_bayar').val('');
			$('#nama_bayar').val('');
			
		});

		$('#jenis_bayar').change(function(){
			$('#nama_bayar').val('');
			$('#form_syarat').show();
		});		
		
		

		// $('#nama_bayar').change(function(){
			
		// });
	});

// function syarat(){
// 	var harga=document.getElementById("tujuan").value;
// 	document.getElementById("harga").value=harga;
// }

</script>



@endsection