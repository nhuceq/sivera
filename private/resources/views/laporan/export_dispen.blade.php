	<table class="table table-bordered table-striped">
		<thead class="thead-white text-center">
			<tr>
				<th><b>No</b></th>
				<th><b>Id</b></th>
				<th><b>Nomor SPP</b></th>
				<th><b>Tgl SPP</b></th>
				<th><b>Tgl Terima</b></th>
				<th><b>Tgl BAPP</b></th>
				<th><b>Keterlambatan</b></th>
				<th><b>Jenis</b></th>
				<th><b>Penerima Hak</b></th>
				<th><b>Unit</b></th>
				<th><b>Nilai</b></th>
			</tr>	
		</thead>
		<?php $i = 1; ?>
		@foreach($data as $spp)
		<tr>
			<td>{{ $i }}</td>
			<td>{{ $spp -> id_spp }}</td>
			<td>{{ $spp -> nomor_spp }}</td>
			<td>{{ $spp -> tgl_dok_spp }}</td>
			<td>{{ $spp -> tgl_terima }}</td>
			<td>{{ $spp -> tgl_bapp }}</td>
			<td>{{ $spp -> terlambat }}</td>
			<td>{{ $spp -> sifat_bayar }}</td>
			<td>{{ $spp -> jenis_bayar }}</td>
			<td>{{ $spp -> nama_pj }}</td>
			<td>{{ $spp -> nilai_spp }}</td>
		</tr>
		<?php $i++; ?>
		@endforeach
	</table>
