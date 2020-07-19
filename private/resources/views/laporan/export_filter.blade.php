	<table class="table table-bordered table-striped">
		<thead class="thead-white text-center">
			<tr>
				<th><b>No</b></th>
				<th><b>Id</b></th>
				<th><b>Nomor SPP</b></th>
				<th><b>Tgl SPP</b></th>
				<th><b>Sifat Bayar</b></th>
				<th><b>Jenis Bayar</b></th>
				<th><b>Keterangan SPP</b></th>
				<th><b>Unit</b></th>
				<th><b>Jenis Belanja</b></th>
				<th><b>Nilai SPP</b></th>
				<th><b>Tanggal Terima</b></th>
				<th><b>Tanggal Input</b></th>
				<th><b>Staf Verifikasi</b></th>
				<th><b>Kasubbag Verifikasi</b></th>				
				<th><b>Tanggal Verifikasi1</b></th>
				<th><b>Tanggal Verifikasi2</b></th>
				<th><b>Tanggal Dikembalikan</b></th>
				<th><b>Tanggal Penerimaan Kembali</b></th>
				<th><b>Tanggal SPM</b></th>
				<th><b>Posisi Dokumen</b></th>
				<th><b>Jenis Dokumen</b></th>
				<th><b>Kategori Catatan</b></th>
				<th><b>Catatan Verifikator</b></th>
				<th><b>Tanggal BAPP</b></th>
				<th><b>Status SPP</b></th>
				<th><b>Tanggal SP2D</b></th>				
				<th><b>Nomor SP2D</b></th>
			</tr>
		</thead>
		<?php $i = 1; ?>
		@foreach($data as $spp)
		<tr>
			<td>{{ $i }}</td>
			<td>{{ $spp -> id_spp }}</td>
			<td>{{ $spp -> nomor_spp }}</td>
			<td>{{ $spp -> tgl_dok_spp }}</td>
			<td>{{ $spp -> sifat_bayar }}</td>
			<td>{{ $spp -> jenis_bayar }}</td>			
			<td>{{ $spp -> ket_spp }}</td>			
			<td>{{ $spp -> nama_pj }}</td>
			<td>{{ $spp -> jenis_belanja }}</td>
			<td>{{ $spp -> nilai_spp }}</td>
			<td>{{ $spp -> tgl_terima }}</td>
			<td>{{ $spp -> tgl_input }}</td>
			<td>{{ $spp -> nama_ver1 }}</td>
			<td>{{ $spp -> nama_ver2 }}</td>
			<td>{{ $spp -> tgl_verifikasi1 }}</td>
			<td>{{ $spp -> tgl_verifikasi2 }}</td>
			<td>{{ $spp -> tgl_dikembalikan }}</td>
			<td>{{ $spp -> tgl_penerimaan_kembali }}</td>
			<td>{{ $spp -> tgl_spm }}</td>
			<td>{{ $spp -> posisi_dok }}</td>
			<td>{{ $spp -> jenis_dok }}</td>
			<td>{{ $spp -> kategori_catatan }}</td>
			<td>{{ $spp -> catatan_verifikator }}</td>
			<td>{{ $spp -> tgl_bapp }}</td>
			<td>{{ $spp -> status_spp }}</td>
			<td>{{ $spp -> tgl_sp2d }}</td>
			<td>{{ $spp -> nomor_sp2d }}</td>
		</tr>
		<?php $i++; ?>
		@endforeach
	</table>
