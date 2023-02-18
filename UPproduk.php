<?php 
	session_start();
	include 'dbconnect.php';
			
	if(isset($_POST["addproduct"])) {
		$namaproduk=$_POST['namaproduk'];
		$idkategori=$_POST['idkategori'];
		$deskripsi=$_POST['deskripsi'];
		$namaumkm=$_POST['namaumkm'];
		$rate=$_POST['rate'];
		$hargabefore=$_POST['hargabefore'];
		$hargaafter=$_POST['hargaafter'];
		
		$nama_file = $_FILES['uploadgambar']['name'];
		$ext = pathinfo($nama_file, PATHINFO_EXTENSION);
		$random = crypt($nama_file, time());
		$ukuran_file = $_FILES['uploadgambar']['size'];
		$tipe_file = $_FILES['uploadgambar']['type'];
		$tmp_file = $_FILES['uploadgambar']['tmp_name'];
		$path = $random.'.'.$ext;
		$pathdb = $random.'.'.$ext;


		if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
		  if($ukuran_file <= 5000000){ 
			if(move_uploaded_file($tmp_file, $path)){ 
			
			  $query = "insert into produk (idkategori, namaproduk, gambar, deskripsi, rate, hargabefore, hargaafter, namaumkm)
			  values('$idkategori','$namaproduk','$pathdb','$deskripsi','$rate','$hargabefore','$hargaafter','$namaumkm')";
			  $sql = mysqli_query($conn, $query);
			  
			  if($sql){ 
				
				echo "<br><meta http-equiv='refresh' content='5; URL=UPproduk.php'> You will be redirected to the form in 5 seconds";
					
			  }else{
				// Jika Gagal, Lakukan :
				echo "Sorry, there's a problem while submitting.";
				echo "<br><meta http-equiv='refresh' content='5; URL=UPproduk.php'> You will be redirected to the form in 5 seconds";
			  }
			}else{
			  // Jika gambar gagal diupload, Lakukan :
			  echo "Sorry, there's a problem while uploading the file.";
			  echo "<br><meta http-equiv='refresh' content='5; URL=UPproduk.php'> You will be redirected to the form in 5 seconds";
			}
		  }else{
			// Jika ukuran file lebih dari 1MB, lakukan :
			echo "Sorry, the file size is not allowed to more than 1mb";
			echo "<br><meta http-equiv='refresh' content='5; URL=UPproduk.php'> You will be redirected to the form in 5 seconds";
		  }
		}else{
		  // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
		  echo "Sorry, the image format should be JPG/PNG.";
		  echo "<br><meta http-equiv='refresh' content='5; URL=UPproduk.php'> You will be redirected to the form in 5 seconds";
		}
	
	};

	if (isset($_POST["Tambah"])) {
   
		if ( tambah($_POST)>0){
		   echo "
		   <script>
		   alert('Data BERHASIL ditambahkan');
		   document.location.href='UPproduk.php';
		   </script>
		   ";
		}
	
	   
	} else{
		echo"
		<script>alert('Data GAGAL ditambahkan');
		</script>
		";
	}

    ?>

    <!doctype html>
    <html class="no-js" lang="en">
    
    <head>
        <meta charset="utf-8">
        <link rel="icon" 
          type="image/png" 
          href="favicon.png">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>

        <!-- table produk -->
        <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Daftar Produk</h2>
									
                                    <div class="button-register">
                                    <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2">Tambah Produk</button>
                                    </div>
                                </div>
                                    <div class="data-tables datatable-dark">
										 <table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
											<tr>
												<th>No.</th>
												<th>Gambar</th>
												<th>Nama Produk</th>
												<th>Nama UMKM</th>
												<th>Kategori</th>
												<th>Harga Diskon</th>
												<th>Deskripsi</th>
												<th>Rate</th>
												<th>Harga Awal</th>
												<th>Tanggal</th>
											</tr></thead><tbody>
											<?php 
											$brgs=mysqli_query($conn,"SELECT * from kategori k, produk p where k.idkategori=p.idkategori order by p.idproduk ASC");
											$no=1;
											while($p=mysqli_fetch_array($brgs)){

												?>
												
												<tr>
													<td><?php echo $no++ ?></td>
													<td><img src="<?php echo $p['gambar'] ?>" width="50%"\></td>
													<td><?php echo $p['namaproduk'] ?></td>
													<td><?php echo $p['namakategori'] ?></td>
													<td><?php echo $p['namaumkm'] ?></td>
													<td><?php echo $p['hargaafter'] ?></td>
													<td><?php echo $p['deskripsi'] ?></td>
													<td><?php echo $p['rate'] ?></td>
													<td><?php echo $p['hargabefore'] ?></td>
													<td><?php echo $p['tgldibuat'] ?></td>
													
												</tr>		
												
												<?php 
											}
											
												
											
		
											?>
										</tbody>
										</table>
                                    </div>
								 </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <!-- table produk-->

				


<!-- UP produk -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Produk</h4>
			</div>

			<div class="modal-body">
				<form action="" method="post" enctype="multipart/form-data">
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
							
							<!-- <div class="form-group">
								<td><label>Kategori</label></td>
								<td><input name="namakategori" type="text" class="form-control" required></td>
							</div> -->
							<div class="form-group">
									<label>Nama Kategori</label>
									<select name="idkategori" class="form-control">
									<option selected>Pilih Kategori</option>
									<?php
									$det=mysqli_query($conn,"SELECT * from kategori order by namakategori ASC") or die(mysqli_error());
									while($d=mysqli_fetch_array($det)){
									?>
										<option value="<?php echo $d['idkategori'] ?>"><?php echo $d['namakategori'] ?></option>
										<?php
								}
								?>		
									</select>
									
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
			<td><button type="button" class="btn btn-default" data-dismiss="modal">Batal</button></td>
			<td><input name="addproduct" type="submit" class="btn btn-primary" value="Tambah"></td>
			
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
