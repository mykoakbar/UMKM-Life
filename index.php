<?php
session_start();
include 'dbconnect.php';

?>

<!doctype html>
<html lang="en">
<link rel="stylesheet" href="index.css">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="stylenya.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="font/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>

<body>
<!-- HEADERR -->
<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				
                <p>MULAI KUNJUNGI UMKM PILIHANMU!</p>
			</div>
			<div class="agile-login">
				<ul>
                <?php
					if (!isset($_SESSION['log'])) {
						echo '
					<li><a href="register.php"> Daftar</a></li>
					<li><a href="login.php">Masuk</a></li>
					';
					} else {
						if ($_SESSION['role'] == 'Member') {
							echo '
					<li style="color:white">Halo, ' . $_SESSION["name"] . '
					<li><a href="logout.php">Keluar?</a></li>
					';
						} else {
							echo '
					<li style="color:white">Halo, ' . $_SESSION["name"] . '
					<li><a href="admin">Admin Panel</a></li>
					<li><a href="logout.php">Keluar?</a></li>
					';
						};
					}
					?>
				</ul>
			</div>
			<div class="product_list_header">
				<a href="cart.php"><button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
				</a>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="ucapan" aria-hidden="true"></i>Selamat Datang Di Website</li>
				</ul>
			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="index.php">UMKM LIFE</a></h1>
			</div>
			<div class="w3l_search">
				<form action="search.php" method="post">
					<input type="search" name="Search" placeholder="Cari produk...">
					<button type="submit" class="btn btn-default search" aria-label="Left Align">
						<i class="fa fa-search" aria-hidden="true"> </i>
					</button>
					<div class="clearfix"></div>
				</form>
			</div>

			<div class="clearfix"> </div>
		</div>
	</div>
    <!-- END HEADERRRR -->
   <!-- Navigasi -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="dropdown">
                        
                        <a class="nav-link active dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori Produk
                        </a>
                        <ul class="dropdown-menu multi-column columns-3">
                            <div class="row">
                                <div class="multi-gd-img">
                                    <ul class="multi-column-dropdown">
                                        <h6>Kategori</h6>

                                        <?php
                                        $kat = mysqli_query($conn, "SELECT * from kategori order by idkategori ASC");
                                        while ($p = mysqli_fetch_array($kat)) {

                                        ?>
                                            <li><a href="kategori.php?idkategori=<?php echo $p['idkategori'] ?>"><?php echo $p['namakategori'] ?></a></li>

                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>

                            </div>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="login.php">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="berita.php">Berita</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="kontak.php">Kontak</a>
                    </li>
                    </li>

                </ul>
             
            </div>
        </div>
    </nav>
    <!-- END NAVIGASII -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="umkm1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="ceker.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="gochujang.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
<br></br>
    <h4>Tentang Website Ini</h4>
    <p>Website UMKM ini bertujuan untuk membantu UKM dan IKM yang ada di Kota Madiun dan sekitarnya untuk menyebarluaskan produk yang dimiliki sehingga orang-orang dapat mengetahui produk apa saja yang dimiliki IKM dan UKM tersebut. Selain itu, juga dapat
        mengangkat potensi dari daerah Madiun.
    </p>
    <p>Website ini juga dilengkapi dengan menu berita yang dimana semua orang dapat mengakses menu tersebut Dari menu berita semua orang dapat melihat berbagai informasi yang update seputar UKMKM. Tentunya hal ini sangat bermanfaat bagi pelaku UMKM maupun
        non UMKM yang ingin memulai usahanya.
    </p>
    <br></br>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <footer>
        <div class="foot">
            <h5>KEPOIN KAMI YUK</h5>
        <div class="atas">
            <ul class="socialmedia">
                <li><a href=#><i class="fab fa-instagram"></i></a></li>
                <li><a href=#><i class="fab fa-facebook"></i></a></li>
                <li><a href=#><i class="fab fa-youtube"></i></a></li>
                <li><a href=#><i class="fab fa-whatsapp"></i></a></li>
            </ul>
        </div>
        <div class="foto">
            <img alt="Logo UMKM" src="logo.png"/>
        </div>

            <div class="maps">
                <h5>LOKASI KAMI</h5>
                <div class="gmaps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15821.35024668352!2d111.65693774737552!3d-7.538114755012335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x235f7000c7b4e25a!2sBKD%20Diklat%20Kabupaten%20Madiun!5e0!3m2!1sen!2sid!4v1622531573458!5m2!1sen!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
        <div class="bawah"> © Copyright 2021 Okta Myko Lisa </div>
    </footer>
</body>
<style>
    footer{
    background-color: rgb(29, 29, 29);
    color: #ffff;
    border-radius:10px 10px ;
    font-family: ubuntu;
}
.foot{
    display: flex;
    padding-top:30px;
}
.foot h5{
    text-align: center;
    grid-template-columns: repeat(2, auto);
    display: flex;
    margin-left: 10%;  
    margin-top: 10%; 
}

.maps h5{
    margin-top: -10px;
}

.atas .socialmedia{
    font-size: 30pt;
    color: #ffff; 
    text-decoration: none;
    list-style: none;
    display: flex;
    margin-top: 60%;
    margin-left: -91%;
}

.atas li{
    padding-left: 20px;
}

.atas a{
    color: #ffff;
}

.atas a:hover{
    color:rgb(86, 69, 235);
}

.bawah{
    max-height: 50px;
    text-align: center;
    background-color: rgb(63, 62, 62);
    padding: 10px 0px;
}
.maps h5{
    margin-top: 20px;
    margin-left: 185px;
}
.gmaps iframe{
    margin-left: 30%;
    border-radius: 20px;
    max-width: 300px;
    max-height: 300px;
}
.maps{
    margin-bottom: 40px;
}

.foto img{
    margin-left: -37%;
    margin-top: 65%;
    max-width: 200px;
    max-height: 200px;
}
</style>

</html>