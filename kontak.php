<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak</title>
    <script src="https://kit.fontawesome.com/2d3cf528de.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
</head>

<style>
    body {
    background: rgba(0, 0, 0, 0.267) url(social.jpeg) no-repeat;
    background-size: cover;
    background-position: center;
    background-blend-mode: overlay;
    margin: 0;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
menu ul {
    list-style-type: none;
}
menu li {
    width: 8em;
    height: 2em;
    font-size: 25px;
    color: #2b5de6;
    border-left: 0.08em solid;
    position: relative;
    margin-top: 0.8em;
    cursor: pointer;
    border-radius: 30px 30px;
}
menu li::before,
menu li::after {
    content: '';
    position: absolute;
    width: inherit;
    border-left: 0.1em solid;
    margin-left: -2px;
    z-index: -1;
}
menu li::before {
    height: 80%;
    top: 10%;
    left: -0.3em;
    filter: brightness(0.8);
    border-radius: 25px 25px;
}
menu li::after {
    height: 60%;
    top: 20%;
    left: -0.57em;
    filter: brightness(0.6);
    border-radius: 25px 25px;
}
menu li a {
    text-decoration: none;
    height: 92%;
    border: 0.08em solid #2b5de6;
    background-color: #cacaca;
    display: flex;
    color: #2b5de6;
    align-items: center;
    justify-content: center;
    font-family: sans-serif;
    text-transform: capitalize;
    transform: translateX(-0.65em);
    transition: 0.5s;
    border-radius: 30px 30px;
    font-family: 'Ubuntu', sans-serif;
}
menu li:hover a {
    transform: translateX(0.15em);
}
menu .text {
    padding-bottom: 20px;
    padding-right: 20px;
    font-family: ubuntu;
    font-weight: 700;
    font-size: 40px;
    color: #0077ff;
}
</style>

<body>
    <menu>
        <div class="text">Hubungi Kami</div>
      <ul>
        <li><a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
        <li><a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a></li>
        <li><a href="https://api.whatsapp.com/send?phone=+6285824458579"><i class="fab fa-whatsapp"></i></a></li>
      </ul>
    </menu>
</body>

</html>