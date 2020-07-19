<!-- Modal kelengkapan dokumen -->
<div class="modal fade" id="kelengkapan_dokumen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel">Form Kelengkapan Dokumen</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th style="width: 110px;">Status Upload</th>
							<th>Nama Dokumen</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="dok in list">
							<td class="text-center">
								<i class="fa fa-check text-success" v-show="dok.is_uploaded"></i>
							</td>
							<td>@{{ dok.jenis_dok }}</td>
							<td style="white-space: nowrap;">
								<button class="btn btn-sm btn-success" @click="uploadDokumen(dok.id)" v-show="isUserBiasa">Upload</button>
								<a :href="'/'+dok.file" target="_blank" class="btn btn-sm btn-info" :disabled="!dok.is_uploaded">
									<i class="fa fa-eye"></i>
								</a>
								<a :href="'/download_dokumen/'+dok.file" target="_blank" class="btn btn-sm btn-info" :disabled="!dok.is_uploaded">
									<i class="fa fa-download"></i>
								</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="Submit" class="btn btn-primary">Cetak</button>
			</div>
		</form>
	</div>
</div>
<div  style="display: none">
	<input type="file" name="file_dokumen" id="file_dokumen">
	<input type="hidden" name="id_jenis_dok" id="id_jenis_dok">
</div>