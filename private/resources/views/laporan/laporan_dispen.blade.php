@extends ('layout.layout')

@section ('little')
Laporan SPP 
@endsection

@section('content')

<h3 class="text-center">Laporan SPP Dispensasi 17 Hari Kerja</h3><br>
<form method="get" action="{{url('/laporan_spp')}}" style="margin: 2rem 0 1rem">
	<table class="table">
		<tr>
			<th>Cari Berdasarkan PPK</th>
			<th>Cari Berdasarkan Status SPP</th>	
			<th>Cari Berdasarkan Bulan</th>	
			<th>Cari Berdasarkan Tahun</th>
			<th></th>
		</tr>
		<tr>
			<td>										
				<select class="form-control" name="filter_pj">
					<option selected>Semua</option>
					@foreach($list_pj as $pj)
					<option value="{{ $pj->id }}">{{ $pj->nama_pj }}</option>
					@endforeach
				</select>	
			</td>
			<td>					
				<select id="inputState" class="form-control" name="filter_status_spp">
					<option selected>Semua</option>
					<option>Upload SPM</option>
					<option>Tolak</option>
					<option>Ganti Nomor</option>
				</select>					
			</td>	
			<td>
				<select type="inputState" class="form-control" placeholder="" name="filter_bulan">
					<option selected>Semua</option>
					<option value="01">Januari</option>
					<option value="02">Februari</option>	
					<option value="03">Maret</option>	
					<option value="04">April</option>	
					<option value="05">Mei</option>	
					<option value="06">Juni</option>	
					<option value="07">Juli</option>	
					<option value="08">Agustus</option>	
					<option value="09">September</option>	
					<option value="10">Oktober</option>	
					<option value="11">November</option>	
					<option value="12">Desember</option>	
				</select>	
			</td>
			<td>
				<select type="inputState" class="form-control" name="filter_tahun">
					<option>Semua</option>						
					<option>2019</option>
					<option>2020</option>
					<option>2021</option>
					<option>2021</option>
					<option>2022</option>
					<option>2023</option>
					<option>2024</option>
					<option>2025</option>
					<option>2026</option>
					<option>2027</option>
					<option>2028</option>
					<option>2029</option>
					<option>2030</option>
				</select>
			</td>	
			<td>
				<button type="Submit" class="btn btn-primary btn-sm">Cari</button>				
			</td>
			<td>
				<a class="btn btn-primary btn-sm" href="{{ url('laporan_spp?download=true') }}">Export Semua</a>
			</td>
		</tr>
	</table>
</form>	

<div class="table-responsive">
	<table class="table text-nowrap">
		<tr>
			<center>
				<th>No.</th>
				<th>No. SPP</th>
				<th>Tgl SPP</th>
				<th>Tgl Terima</th>
				<th>Tgl BAPP</th>
				<th>Keterlambatan</th>
				<th>Jenis</th>
				<th>Penerima Hak</th>
				<th>Unit</th>
				<th>Nilai</th>
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
			<td>{{ $spp -> nomor_spp }}</td>
			<td>{{ $spp -> tgl_dok_spp }}</td>
			<td>{{ $spp -> tgl_terima }}</td>
			<td>{{ $spp -> tgl_bapp }}</td>
			<td class="text-center">{{ $spp -> terlambat }}</td>
			<td>{{ $spp -> sifat_bayar }}</td>
			<td>{{ $spp -> jenis_bayar }}</td>
			<td>{{ $spp -> nama_pj }}</td>
			<td>{{ $spp -> nilai_spp }}</td>
			<td class="text-nowrap">
				<a href="{{url ('/spp_detail/')}}/{{ $spp -> nomor_spp }}" class="btn btn-info btn-sm" name="detail">Detail</a>
			</td>
		</tr>
		<?php $i++; ?>
		@endforeach
	</table>
</div>
@endsection