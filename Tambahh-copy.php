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
<title></title>

<head>

<body>
<link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<div class="formulir">
		<form class="box" action="" method="post">

			<div class="container">
				<div class="title">Tambah Produk</div>
				<div class="content">
					<form action="#">
						<div class="user-details">
								<table>
									<tr><div class="input-box">
										<td>Nama Produk</td>
										<td colspan="3"><input name="namaproduk" type="text" class="form-control" required autofocus></td>
							</div>
							</tr>
							<tr>
							<div class="input-box">
								<td><label>Nama UMKM</label></td>
								<td colspan="3"><input name="namaumkm" type="text" class="form-control" required></td>
						</div>
						</tr>
						<tr>
						<div class="input-box">
							<td><label>Nama Kategori</label></td>
							<td colspan="3"><select name="idkategori" class="form-control">
									<option selected>Pilih Kategori</option>
									<?php
									$det = mysqli_query($conn, "SELECT * from kategori order by namakategori ASC") or die(mysqli_error());
									while ($d = mysqli_fetch_array($det)) {
									?>
										<option value="<?php echo $d['idkategori'] ?>"><?php echo $d['namakategori'] ?></option>
									<?php
									}
									?>
								</select>
							</td>
				</div>
				</tr>
				<tr>
				<div class="input-box">
					<td><label>Deskripsi</label></td>
					<td><input name="deskripsi" type="text" rows="8" cols="40"></textarea>
						<!-- <td colspan="3"><input name="deskripsi" type="text" class="form-control" rows="8" cols="40" required></td>-->
			</div>
			</tr>
			<tr>
			<div class="input-box">
				<td><label>Rating (1-5)</label></td>
				<td colspan="3"><input name="rate" type="number" class="form-control" min="1" max="5" required></td>
	</div>
	</tr>
	<tr>
	<div class="input-box">
		<td><label>Harga Sebelum Diskon</label></td>
		<td colspan="3"><input name="hargabefore" type="number" class="form-control"></td>
		</div>
	</tr>
	<tr>
	<div class="input-box">
		<td><label>Harga Setelah Diskon</label></td>
		<td colspan="3"><input name="hargaafter" type="number" class="form-control"></td>
	</tr>
	</div>
	<tr>

		<td><label>Gambar</label></td>
		<td colspan="3"><input name="uploadgambar" type="file" class="form-control"></td>
		</div>
	</tr>
	</tr>
	</div>
	<td colspan="3"><button type="button" class="btn btn-default" data-dismiss="modal">Batal</button></td>
	<td colspan="3"><input name="addproduct" type="submit" class="btn btn-primary" value="Tambah"></td>
	
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
</body>
<style>
	* {
		font-family: "Open Sans", sans-serif;
	}

	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: 'Poppins', sans-serif;
	}

	body {
		height: 100vh;
		display: flex;
		justify-content: center;
		align-items: center;
		padding: 10px;
		background: linear-gradient(135deg, #71b7e6, #9b59b6);
	}

	.container {
		max-width: 700px;
		width: 100%;
		background-color: #fff;
		padding: 25px 30px;
		border-radius: 5px;
		box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
	}

	.container .title {
		font-size: 25px;
		font-weight: 500;
		position: relative;
	}

	.container .title::before {
		content: "";
		position: absolute;
		left: 0;
		bottom: 0;
		height: 3px;
		width: 30px;
		border-radius: 5px;
		
	}

	.content form .user-details {
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
		margin: 20px 0 12px 0;
	}

	form .user-details .input-box {
		margin-bottom: 15px;
		width: calc(100% / 2 - 20px);
	}

	form .input-box span.details {
		display: block;
		font-weight: 500;
		margin-bottom: 5px;
	}

	.user-details .input-box input {
		height: 45px;
		width: 100%;
		outline: none;
		font-size: 16px;
		border-radius: 5px;
		padding-left: 15px;
		border: 1px solid #ccc;
		border-bottom-width: 2px;
		transition: all 0.3s ease;
	}

	.user-details .input-box input:focus,
	.user-details .input-box input:valid {
		border-color: #9b59b6;
	}

	form .button {
		height: 45px;
		margin: 35px 0
	}

	form .button input {
		height: 100%;
		width: 100%;
		border-radius: 5px;
		border: none;
		color: #fff;
		font-size: 18px;
		font-weight: 500;
		letter-spacing: 1px;
		cursor: pointer;
		transition: all 0.3s ease;
		background: linear-gradient(135deg, #71b7e6, #9b59b6);
	}

	form .button input:hover {
		/* transform: scale(0.99); */
		background: linear-gradient(-135deg, #71b7e6, #9b59b6);
	}

	@media(max-width: 584px) {
		.container {
			max-width: 100%;
		}

		form .user-details .input-box {
			margin-bottom: 15px;
			width: 100%;
		}

		form .category {
			width: 100%;
		}

		.content form .user-details {
			max-height: 300px;
			overflow-y: scroll;
		}

		.user-details::-webkit-scrollbar {
			width: 5px;
		}
	}

	@media(max-width: 459px) {
		.container .content .category {
			flex-direction: column;
		}
	}

	
</style>