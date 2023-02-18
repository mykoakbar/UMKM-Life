


<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Produk</h4>
			</div>

			<div class="modal-body">
				<form action="produk.php" method="post" enctype="multipart/form-data">
					<table>
						<div class="form-group">
							<tr>
								<td>Nama Produk</td>
								<td><input name="namaproduk" type="text" class="form-control" required autofocus></td>
						</div>
						</tr>
						<tr>
							<div class="form-group">
								<td><label>Nama UMKM</label></td>
								<td><input name="namaumkm" type="text" class="form-control" required></td>
							</div>
						</tr>
						<tr>
							<div class="form-group">
								<td><label>Kategori</label></td>
								<td><input name="namakategori" type="text" class="form-control" required></td>
							</div>
						</tr>

						<tr>
							<div class="form-group">
								<td><label>Deskripsi</label></td>
								<td><input name="deskripsi" type="text" class="form-control" required></td>
							</div>
						</tr>
						<tr>
							<div class="form-group">
								<td><label>Rating (1-5)</label></td>
								<td><input name="rate" type="number" class="form-control" min="1" max="5" required></td>
							</div>
						</tr>
						<tr>
							<div class="form-group">
								<td><label>Harga Sebelum Diskon</label></td>
								<td><input name="hargabefore" type="number" class="form-control"></td>
							</div>
						</tr>
						<tr>
							<div class="form-group">
								<td><label>Harga Setelah Diskon</label></td>
								<td><input name="hargaafter" type="number" class="form-control"></td>
						</tr>
			</div>
			<tr>
				<div class="form-group">
					<td><label>Gambar</label></td>
					<td><input name="uploadgambar" type="file" class="form-control"></td>
				</div>
			</tr>
			</tr>
		</div>
		<div class="modal-footer">
			<td></td><button type="button" class="btn btn-default" data-dismiss="modal"></button></td>
			<td><input name="addproduct" type="submit" class="btn btn-primary" value="Tambah">
			<input name="batal" type="submit" class="btn btn-primary" value="Batal"></td>
		</div>
		</tr>
		</table>
		</form>
	</div>
</div>
</div>

<script>
	$(document).ready(function() {
		$('#dataTable3').DataTable({
			dom: 'Bfrtip',
			buttons: [
				'print'
			]
		});
	});
</script>