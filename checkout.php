<?php
session_start(); // Starta session och inkludera dokument samt anslut till databas.
include "functions.php";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Sinus";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    ?>
    <!DOCTYPE html> 
    <html>
    <head>
            <meta charset="utf-8">
            <title>Products</title>
                <link rel="stylesheet" href="capgallery.css">
            <link rel="stylesheet" href="hoodiegallery.css">
            <link rel="stylesheet" href="tshirtgallery.css">
            <link rel="stylesheet" href="skateboardgallery1.css">
            <link rel="stylesheet" href="skateboardgallery2.css">
            <link rel="stylesheet" href="wheelgallery.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script type="text/javascript" src="dropdown.js"></script>
            <link href="adminhome.css" rel="stylesheet" type="text/css">
                 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
          </head>
        <body>
      <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <img src="img/sinus-logo-symbol-small.png">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">Produkter</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
              
              <a class="navbar-brand" href="cart.php">Kundvagn</a>
              </li>
              <li class="nav-item">
                <a class="navbar-brand" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="navbar-brand" href="contact.php">Contact</a>
              </li>
            </ul>
            <?php 
            if (isset($_SESSION['loggedin'])) {
              $html = <<<XYZ
                  <form class="d-flex">
                  <a class="navbar-brand dropbtn" onclick="myFunction()">Admin tools</a>
                  <i class="fa fa-caret-down"></i>
                  <div id="myDropdown" class="dropdown-content">
                      <a href="adminhome.php">Home</a>
                      <a href="adminprofile.php">Login info</a>
                      <a href="logout.php">Logout</a>
                  </div>
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
              XYZ;
              echo $html;
            }
            else{
              $html = <<<XYZ
                  <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
              XYZ;
              echo $html;
            }
            ?>
          </div>
        </div>
            </nav>
            </header>
        <main>
<div class="carousel-inner"> <!-- Den gråa biten längst upp på sidan -->
      <div class="carousel-item active">
      <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#FFFFFF">
    </rect></svg>
      <div class="container">
      </div>
      </div>
      </div>
<div class="container marketing">
<div class="row">
<form action="placeorder.php" method="POST">
    <div>
        <label for="Förnamn">Förnamn:</label>
        <input type="text" name="Förnamn"><br>
        <label for="Gatuaddress">Gatuaddress:</label>
        <input type="text" name="Gatuaddress"><br>
        <label for="Postnr">Postnr:</label>
        <input type="text" name="Postnr"><br>
        <label for="Stad">Stad:</label>
        <input type="text" name="Stad"><br>
        <label for="Telefon">Telefon</label>
        <input type="text" name="Telefon">
    </div>

    <input type="submit" name="submit" value="Köp">
</form>
</div>
</div>
<footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p><img src="img/sinus-logo-symbol-small.png">© 2022 Stefan, Olle & Mathias.</a></p>
  </footer>
  </main>
	</body>
</html>