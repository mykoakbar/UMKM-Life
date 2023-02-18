<?php
session_start();
include 'dbconnect.php';

if (isset($_POST["addproduct"])) {
	$namaproduk = $_POST['namaproduk'];
	$idkategori = $_POST['idkategori'];
	$deskripsi = $_POST['deskripsi'];
	$namaumkm = $_POST['namaumkm'];
	$rate = $_POST['rate'];
	$hargabefore = $_POST['hargabefore'];
	$hargaafter = $_POST['hargaafter'];

	$nama_file = $_FILES['uploadgambar']['name'];
	$ext = pathinfo($nama_file, PATHINFO_EXTENSION);
	$random = crypt($nama_file, time());
	$ukuran_file = $_FILES['uploadgambar']['size'];
	$tipe_file = $_FILES['uploadgambar']['type'];
	$tmp_file = $_FILES['uploadgambar']['tmp_name'];
	$path = $random . '.' . $ext;
	$pathdb = $random . '.' . $ext;


	if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
		if ($ukuran_file <= 5000000) {
			if (move_uploaded_file($tmp_file, $path)) {

				$query = "insert into produk (idkategori, namaproduk, gambar, deskripsi, rate, hargabefore, hargaafter, namaumkm)
			  values('$idkategori','$namaproduk','$pathdb','$deskripsi','$rate','$hargabefore','$hargaafter','$namaumkm')";
				$sql = mysqli_query($conn, $query);

				if ($sql) {

					echo "<br><meta http-equiv='refresh' content='5; URL=UPproduk.php'> You will be redirected to the form in 5 seconds";
				} else {
					// Jika Gagal, Lakukan :
					echo "Sorry, there's a problem while submitting.";
					echo "<br><meta http-equiv='refresh' content='5; URL=UPproduk.php'> You will be redirected to the form in 5 seconds";
				}
			} else {
				// Jika gambar gagal diupload, Lakukan :
				echo "Sorry, there's a problem while uploading the file.";
				echo "<br><meta http-equiv='refresh' content='5; URL=UPproduk.php'> You will be redirected to the form in 5 seconds";
			}
		} else {
			// Jika ukuran file lebih dari 1MB, lakukan :
			echo "Sorry, the file size is not allowed to more than 1mb";
			echo "<br><meta http-equiv='refresh' content='5; URL=UPproduk.php'> You will be redirected to the form in 5 seconds";
		}
	} else {
		// Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
		echo "Sorry, the image format should be JPG/PNG.";
		echo "<br><meta http-equiv='refresh' content='5; URL=UPproduk.php'> You will be redirected to the form in 5 seconds";
	}
};

if (isset($_POST["Tambah"])) {

	if (tambah($_POST) > 0) {
		echo "
		   <script>
		   alert('Data BERHASIL ditambahkan');
		   document.location.href='UPproduk.php';
		   </script>
		   ";
	}
} else {
	echo "
		<script>alert('Data GAGAL ditambahkan');
		</script>
		";
}

?>
<!doctype html>
<html lang="en">
<title>Tambah Produk</title>
<head>

<body>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<div class="formulir">
		<form class="box" action="" method="post">

			<div class="container">
				<h2>Tambah Produk</h2>
				<div class="content">
					<form>
						<div class="user">
							<table>
								<input name="namaproduk" type="text" class="form-control" placeholder="Nama Produk"></input>
						</div>
								<input name="namaumkm" type="text" class="form-control" placeholder="Nama UMKM" required></input>
						</div>
							<select name="idkategori" placeholder="Nama Kategori" class="form-control">
									<option selected>Nama Kategori</option>
									<?php
									$det = mysqli_query($conn, "SELECT * from kategori order by namakategori ASC") or die(mysqli_error());
									while ($d = mysqli_fetch_array($det)) {
									?>
										<option value="<?php echo $d['idkategori'] ?>"><?php echo $d['namakategori'] ?></option>
									<?php
									}
									?>
								</select>
				</div>
				</tr>
				<tr>
					<input name="deskripsi" placeholder="Deskripsi" class="form-control" type="text" rows="8" cols="40"></input>
						<!-- <td colspan="3"><input name="deskripsi" type="text" class="form-control" rows="8" cols="40" required></td>-->
			</div>
				<input name="rate" type="number" placeholder="Rating (1-5)" class="form-control" min="1" max="5" required></input>
	</div>
		<input name="hargabefore" placeholder="Harga Sebelum Diskon" type="number" class="form-control"></input>
		</div>
	</tr>
	<tr>
		<input name="hargaafter" placeholder="Harga Setelah Diskon" type="number" class="form-control"></input>
	</tr>
	</div>
	<input name="uploadgambar" type="file" class="form-upload"></input>
		</div>
	</div>
	<br>
	<a href="index.php"><button type="button" href="index.php" class="btn-default" data-dismiss="modal">Batal</button></a>
	<input name="addproduct" type="submit" class="btn-primary" value="Tambah"></td>
	
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
	<style>
	* {
		box-sizing: border-box;
		font-family: ubuntu;
	}

	body {
		color: white;
		display: flex;
		align-items: center;
		justify-content: center;
		padding: 10px;
		background: linear-gradient(135deg, #71b7e6, #9b59b6);
	}

	.container {
		width: 720px;
		height: 770px;
		background: -webkit-linear-gradient(bottom, #000000, #585858);
		padding: 25px 30px;
		border-radius: 30px;
		box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
		}
	.container h2{
    	text-align: center;
    	margin-bottom: 20px;
	}

	.form-control{
		border-radius: 30px;
		color: white;
		margin-left: 27%;
		text-align: center;
    	margin-bottom: 20px;
		width: 300px;
		background: none;
		border: 3px solid #3498db;
		outline: none;
		padding: 14px 10px;
	}
	.form-upload{
		margin-left: 37%;
		margin-bottom: 30px;
	}
	.btn-default{
		border: 3px solid #01DF74;
		outline: none;
		color: white;
		background: none;
		border-radius: 20px;
		width: 100px;
		margin-left: 30%;
		margin-right: 50px;
		padding: 14px 10px;
	}
	.btn-primary{
		border: 3px solid #01DF74;
		color: white;
		background: none;
		border-radius: 20px;
		width: 100px;
		padding: 14px 10px;
	}
	.btn-primary:hover{
		background-color: #01DF74;
	}
	.btn-default:hover{
		background-color: #01DF74;
	}
	.form-control:focus{
		width: 330px;
		border-color: #01DF74;
		text-align: center;
		margin-left: 25%;
	}


	</style>
</body>