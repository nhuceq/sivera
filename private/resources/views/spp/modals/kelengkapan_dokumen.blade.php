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
							<th>Nama Dokumen</th>
							<th style="white-space: nowrap;">Wajib Upload</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="dok in list">
							<td>@{{ dok.jenis_dok }}</td>
							<td>@{{ dok.is_required ? 'Ya' : 'Tidak' }}</td>
							<td>
								<input type="checkbox" :checked="dok.is_uploaded" disabled>
							</td>
							<td style="white-space: nowrap;">
								<button class="btn btn-sm btn-success" v-show="isUserBiasa">Upload</button>
								<button class="btn btn-sm btn-info" :disabled="!dok.is_uploaded">
									<i class="fa fa-eye"></i>
								</button>
								<button class="btn btn-sm btn-info" :disabled="!dok.is_uploaded">
									<i class="fa fa-download"></i>
								</button>
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
