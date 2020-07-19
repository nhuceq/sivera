<!DOCTYPE html>
<html>
<head>
	<title>Routing Slip</title>
</head>
<body>

</body>
</html>

<table border="1" width="100%" cellpadding="2">
	<tr>
		<td>
			<table border="0" width="100%" cellpadding="2">

				
				
				<tr>
					
					<td width="40%"><b>Pengirim SPP</b></td>
					<td width="2%"><b>:</b> </td>
					<td width="45%" colspan="2"><b>{{ $data_spp->nama_pj }}</b></td>
									
				</tr>

				<tr>
					<td width="40%"><b>Nomor SPP</b></td>
					<td width="2%"><b>:</b></td>
					<td width="15%"><b>{{ $data_spp->nomor_spp }}</b></td>
					<td width="33%"><b>{{ $data_spp->tgl_dok_spp }}</b></td>				
				</tr>

				<tr>
					<td width="40%"><b>Jenis SPP</b></td>
					<td width="2%"><b>:</b></td>
					<td width="15%"><b>{{ $data_spp->sifat_bayar }}</b></td>
					<td width="33%"></td>
				</tr>	

				<tr>
					<td width="40%"><b>Dibayarkan Kepada</b></td>
					<td width="2%"><b>:</b></td>
					<td width="45%" colspan="2"><b>{{ $data_spp->jenis_bayar }}</b></td>
				</tr>

				<tr>
					<td width="40%"><b>Nominal Tagihan</b></td>
					<td width="2%"><b>:</b></td>
					<td width="15%" bgcolor="grey"><b>{{ $data_spp -> nilai_spp }}</b></td>
					<td width="33%"></td>
				</tr>	

				<tr>
					<td width="40%"><b>Untuk Pembayaran</b></td>
					<td width="2%"><b>:</b></td>
					<td width="45%" colspan="2"><b>{{ $data_spp->ket_spp }}</b></td>
				</tr>	



			</table>
<br>
			<table width="100%" border="1" cellpadding="6">		
				
				<tr bgcolor="grey">
					<td width="2%"></td>
					<td width="15%"><center><b>Pihak Terkait</b></center></td>
					<td width="30%"><center><b>Uraian Pekerjaan</b></center></td>
					<td width="10%"><center><b>Tanggal</b></center></td>
					<td width="10%"><center><b>Paraf</b></center></td>
					<td width="33%"><center><b>Keterangan</b></center></td>				
				</tr>

			</table>

			<table width="100%" border="1">
				<tr>
					<td width="2%">1</td>
					<td width="15%">Petugas Loket Penerimaan SPP</td>	
					<td width="30%">
						<table width="100%" border="1">
							<tr>
								<td colspan="2">Pengagendaan Penerimaan Berkas SPP</td>	
							</tr>

							<tr>
								<td>Penerimaan SPP<br><br><br></td>	
								<td>Nomor Agenda : {{ $data_spp->id_spp }}<br><br><br></td>	
							</tr>

							<tr>
								<td>Perbaikan SPP<br><br><br></td>
								<td></td>	
							</tr>
						</table>
					</td>	

					<td width="10%">
						<table width="100%" border="1">
							<tr>
								<td colspan="2"><center>Tanggal</center></td>	
							</tr>

							<tr>
								<td><center>{{ $data_spp->tgl_terima }}</center><br><br></td>	
									
							</tr>

							<tr>
								<td><br><br><br></td>	
							</tr>
						</table>
					</td>	

					<td width="10%">
						<table width="100%" border="1">
							<tr>
								<td colspan="2"><center>Jam / Nama</center></td>	
							</tr>

							<tr>
								<td><br><br><br></td>	
									
							</tr>

							<tr>
								<td><br><br><br></td>	
							</tr>
						</table>					
					</td>	

					<td width="33%">
						<br><br><br>
					</td>	
				</tr>
			</table>

			<table width="100%" border="1">
				<tr>
					<td width="2%">2</td>
					<td width="15%">Pelaksana Penguji SPP</td>	
					<td width="30%">
						<table width="100%"  border="1">
							<tr>
								<td colspan="2">Pengujian SPP oleh Pelaksana Penguji SPP<br><br><br></td>	
							</tr>

							<tr>
								<td rowsspan="3">Salah<br><br><br></td>	
								<td>
									<table border="1" width="100%">
										<tr><td><br><br></td></tr>
										<tr><td> Penerimaan kembali berkas SPP<br><br></td></tr>
									</table>
								</td>	
								
								
							</tr>

							<tr>
								<td>Benar<br><br><br></td>
								<td>Diteruskan kepada Pejabat Penguji SPP</td>	
							</tr>
						</table>
					</td>	

					<td width="10%">
						<table width="100%" border="1">
							<tr>
								<td colspan="2"><center><br><br></center></td>	
							</tr>

							<tr>
								<td><br><br><br></td>	
									
							</tr>

							<tr>
								<td><br><br><br></td>	
							</tr>

							<tr>
								<td><br><br></td>	
							</tr>
						</table>
					</td>	

					<td width="10%">
						<table width="100%" border="1">
							<tr>
								<td colspan="2"><center><br><br></center></td>	
							</tr>

							<tr>
								<td><br><br><br></td>	
									
							</tr>

							<tr>
								<td><br><br><br></td>	
							</tr>

							<tr>
								<td><br><br></td>	
							</tr>
						</table>				
					</td>	

					<td width="33%">
						<br><br><br>
					</td>	
				</tr>
			</table>

			<table width="100%" border="1">
				<tr>
					<td width="2%">3</td>
					<td width="15%">Pejabat Penguji SPP</td>	
					<td width="30%">
						<table width="100%" border="1">
							<tr>
								<td colspan="2">Pengujian SPP oleh Pejabat Penguji SPP<br><br><br></td>	
							</tr>

							<tr>
								<td rowsspan="3">Salah<br><br><br></td>	
								<td>
									<table border="1" width="100%">
										<tr><td> Dikembalikan kepada PPK<br><br></td></tr>
										<tr><td> Penerimaan kembali berkas SPP<br><br></td></tr>
									</table>
								</td>	
								
								
							</tr>

							<tr>
								<td>Benar<br><br><br></td>
								<td>Diteruskan kepada PPSPM</td>	
							</tr>
						</table>
					</td>	

					<td width="10%">
						<table width="100%" border="1">
							<tr>
								<td colspan="2"><center><br><br></center</td>	
							</tr>

							<tr>
								<td><br><br><br></td>	
									
							</tr>

							<tr>
								<td><br><br><br></td>	
							</tr>

							<tr>
								<td><br><br></td>	
							</tr>
						</table>
					</td>	

					<td width="10%">
						<table width="100%" border="1">
							<tr>
								<td colspan="2"><center><br><br></center</td>	
							</tr>

							<tr>
								<td><br><br><br></td>	
									
							</tr>

							<tr>
								<td><br><br><br></td>	
							</tr>

							<tr>
								<td><br><br></td>	
							</tr>
						</table>				
					</td>	

					<td width="33%">
						<br><br><br>
					</td>	
				</tr>
			</table>

			<table width="100%" border="1">
				<tr>
					<td width="2%">4</td>
					<td width="15%">Pejabat Penandatangan SPM (PP-SPM)</td>	
					<td width="30%">
						<table width="100%" border="1">
							<tr>
								<td colspan="2">Pengujian SPP dan Penandatangan SPM oleh PP-SPM<br><br><br></td>

							<tr>
								<td rowsspan="3">Salah<br><br><br></td>	
								<td>
									<table border="1" width="100%">
										<tr><td> Pengembalian berkas SPP dengan Formulir Pengembalian<br></td></tr>
										<tr><td> Penerimaan kembali berkas SPP<br><br></td></tr>
									</table>
								</td>	
								
								
							</tr>

							<tr>
								<td>Benar<br><br><br></td>
								<td>  Penerbitan dan penandatanganan SPM<br></td>	
							</tr>
						</table>
					</td>	

					<td width="10%">
						<table width="100%" border="1">
							<tr>
								<td colspan="2"><center><br><br></center</td>	
							</tr>

							<tr>
								<td><br><br></td>	
									
							</tr>

							<tr>
								<td><br><br><br></td>	
							</tr>

							<tr>
								<td><br><br></td>	
									
							</tr>
						</table>
					</td>	

					<td width="10%">
						<table width="100%" border="1">
							<tr>
								<td colspan="2"><center><br><br></center></td>	
							</tr>

							<tr>
								<td><br><br></td>	
									
							</tr>

							<tr>
								<td><br><br><br></td>	
							</tr>

							<tr>
								<td><br><br></td>	
									
							</tr>
						</table>					
					</td>	

					<td width="33%">
						<table width="100%" border="1">
							<tr>
								<td colspan="2"><center><br><br></center</td>	
							</tr>

							<tr>
								<td>Formulir Pengembalian No: ………………….……….<br><br></td>	
									
							</tr>

							<tr>
								<td><br><br><br></td>	
							</tr>

							<tr>
								<td>SPM No:  ……………………………………<br><br></td>	
									
							</tr>
						</table>
					</td>	
				</tr>
			</table>

			

		</td>
	</tr>

	<tr>
		<td>Catatan : <br><br><br><br><br><br><br></td>
	</tr>
</table>
<style type="text/css">
	table {
		font-size: 12px;
		border-collapse: collapse;
		line-height: 16px
	}
</style>