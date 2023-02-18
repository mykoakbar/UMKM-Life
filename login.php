<?php
session_start();


include 'dbconnect.php';
date_default_timezone_set("Asia/Bangkok");
$timenow = date("j-F-Y-h:i:s A");

	if(isset($_POST['login']))
	{
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$pass = mysqli_real_escape_string($conn,$_POST['pass']);
	$queryuser = mysqli_query($conn,"SELECT * FROM login WHERE email='$email'");
	$cariuser = mysqli_fetch_assoc($queryuser);
		
		if( password_verify($pass, $cariuser['password']) ) {
			$_SESSION['id'] = $cariuser['userid'];
			$_SESSION['role'] = $cariuser['role'];
			$_SESSION['notelp'] = $cariuser['notelp'];
			$_SESSION['name'] = $cariuser['namalengkap'];
			$_SESSION['log'] = "Logged";
			header('location:index1.php');
		} else {
			echo 'Username atau password salah';
			header("location:login.php");
		}		
	}
    ?>
    <!doctype html>
    <html lang="en">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    
    <head>
    
    
    <body>
    
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
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="login.php">UKM & IKM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="berita.php">Berita</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Kontak</a>
                        </li>
                        </li>
    
                    </ul>
    
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <br></br>
                    <div class="button-login">
                    <a class="btn btn-primary" href="login.php" role="button">Login</a>
        
                </div>
            </div>
        </nav>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
        <title></title>
        </head>
        <!-- login -->
	<div class="login">
		<div class="container">
			<h2>LOGIN</h2>

				<form class="logining" method="post">
					<input type="text" class="nokotak" name="email" placeholder="Email" required>
					<input type="password" class="nokotak" name="pass" placeholder="Password" required>

					<input type="submit" class="masuk" name="login" value="Masuk">
				</form>
            <div class="daftar">
			<h5>Belum terdaftar?</h5>
			<p><a href="register.php">Daftar Sekarang</a></p>
            </div>
        </div>
	</div>
}
<style>
    body{
        color: #ffff;
        font-family: ubuntu;
    }
    .login{
        background: -webkit-linear-gradient(bottom, #000000, #585858);
        max-width: 400px;
        margin: 40px auto;
        padding: 74px;
        box-shadow:0 4px 10px 4px rgba(0, 0, 0, 0.5);
        border-radius: 20px;
    }

    .logining .nokotak{
        color: white;
        background: none;
        text-align: center;
        display: grid;
        outline: none;
        border: 3px solid #3498db;
        margin-bottom: 20px;
        border-radius: 20px;
        padding: 14px 10px;
    }
    .logining .nokotak:focus{
        text-align: center;
        width: 250px;
        border-color: #01DF74;
        margin-left: -5px;
    }
    .logining .masuk{
        color: white;
        padding: 8px 15px;
        margin-top: 10px;
        margin-bottom: 20px;
        border-radius: 10px;
        background: none;
        border-color: #01DF74;
    }

    .masuk:hover{
        background-color: #01DF74;
    }

    h2{
        padding-left: 10px;
        padding-bottom: 40px;
        text-align: center;
    }   
    .daftar a{
        text-decoration: none;
        color: #01DF74;
    }
    .daftar a:hover{
        color: white;
    }
    .container{
        text-align: center;
    }
</style>
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
<!-- //login -->