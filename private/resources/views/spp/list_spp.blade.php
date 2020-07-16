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

@include('spp.modals.pengajuan_spp')
@include('spp.modals.edit_spp_loket_from_list')

<!-- listing -->

<div class="table-responsive">
	<table class="table text-nowrap">
		<tr>
			<center>
				<th>No.</th>
				<th>No. Pengajuan</th>
				<th>No. SPP</th>
				<th>Tgl SPP</th>
				<th>Sifat Bayar</th>
				<th>Jenis Bayar</th>
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
		<?php
		$json_spp = json_encode($spp);
		?>
		<tr>
			<td>{{ $i }}</td>
			<td>{{ $spp -> id_spp }}</td>
			<td>{{ $spp -> nomor_spp }}</td>
			<td>{{ $spp -> tgl_dok_spp }}</td>
			<td>{{ $spp -> sifat_bayar }}</td>
			<td>{{ $spp -> jenis_bayar }}</td>
			<td>{{ $spp -> nama_pj }}</td>
			<td>{{ $spp -> nilai_spp }}</td>
			<td>{{ $spp -> status_spp }}</td>
			<td>{{ $spp -> nomor_sp2d }}</td>

			<!-- Roles  -->
			<td class="text-nowrap">
				@if (Auth::user() -> role == 'user_loket')
				<a href="{{ url ('/spp_detail/') }}/{{ $spp -> id_spp }}" class="btn btn-info btn-sm" name="detail">Detail</a>
				<button data-json="{{ $json_spp }}" class="btn btn-warning btn-sm edit-json">Edit</button>
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

		$('.edit-json').click(function(){
			let data = $(this).data('json')
			let keys = Object.keys(data)
			let action = "{{ url('/spp_edit_loket') }}/" + data.id_spp + "?back=" + location.href
			$('#edit_spp_loket_from_list').modal('show')

			$('#edit_spp_loket_from_list form').attr('action', action)
			for (let k of keys) {
				$('#edit_spp_loket_from_list #'+k).val(data[k])
			}
		})
	});

// function syarat(){
// 	var harga=document.getElementById("tujuan").value;
// 	document.getElementById("harga").value=harga;
// }

</script>



@endsection