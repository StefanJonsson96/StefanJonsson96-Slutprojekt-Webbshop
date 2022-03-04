<?php
session_start(); // Starta session och inkludera dokument samt anslut till databas.
include "functions.php";
include 'connection.php';

    ?>
    <!DOCTYPE html> 
    <html>
    <head>
		<meta charset="utf-8">
		<title>Products</title>
		    <link rel="stylesheet" href="css/capgallery.css">
        <link rel="stylesheet" href="css/hoodiegallery.css">
        <link rel="stylesheet" href="css/tshirtgallery.css">
        <link rel="stylesheet" href="css/skateboardgallery1.css">
        <link rel="stylesheet" href="css/skateboardgallery2.css">
        <link rel="stylesheet" href="css/wheelgallery.css">
        <link rel="stylesheet" href="css/adminhome.css">
        <link rel="stylesheet" href="css/kundvagn.css">
        <link rel="stylesheet" href="css/login.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script type="text/javascript" src="js/dropdown.js"></script>
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
            </ul>
            <?php 
            if (isset($_SESSION['loggedin'])) {
              $html = <<<XYZ
                  <form class="d-flex">
                  <a class="navbar-brand dropbtn" onclick="myFunction()">Admin tools</a>
                  <i class="fa fa-caret-down"></i>
                  <div id="myDropdown" class="dropdown-content">
                  <a href="adminhome.php">Home</a>
                  <a href="adminorders.php">Orders</a>
                  <a href="uploaditem.php">Upload new Product</a>
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
              $html = "";
              echo $html;
            }
            ?>
            <form action="searchProduct.php" class="d-flex" method="post">
              <input class="form-control me-2 searchbar" type="text" placeholder="Search" aria-label="Search" name="search">
              <input class="btn btn-outline-success" type="submit" value="search">
              </form>
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
    <h1>Tack för din order.</h1>
    <h2>Faktura:
        <ul>
            <li>Summa: <?php echo $_SESSION['faktura'] ;?> kr.</li> <!-- Summa från session variabel -->
            <li>OCR: <?php echo rand(20000000000, 99999999999)?></li> <!-- Slumpar fram ett OCR -->
            <li>Bankgiro: 000-0000</li> <!-- Exempel bankgiro -->
            <li>Clearing: 3300</li> <!-- Nordeas clearing # som exempel -->
        </ul>
    </h2>
    <p>I dagsläget har vi bara stöd för faktura, ingen direktbetalning</p>
    <?php 
        $isfirstloop = true;
        for ($i = 0; $i < count($_SESSION['cart']); $i++) {
            $key=key($_SESSION['cart']);
            $val=$_SESSION['cart'][$key];
            if ($val<> ' ') {
               $produktID = $key;
               $kvantitet = $val;

               placeOrder($kvantitet, $produktID); // Lägger till order PER produkt, tex. 5st svarta shirtar, loopa en gång till 4st röda kepsar. osv.
                    if ($isfirstloop) { 
                      addCustomer(); // Lägg till customer bara en gång inte varje gång vi loopar, annars hade vi fått lika många customers som antal olika produkter.
                      addOrder(getCustomer());// Lägg till order bara en gång inte varje gång vi loopar, annars hade vi fått lika många order som antal olika produkter.
                      $isfirstloop = false;
                    }
               orderDetails(getOrder(), $produktID, $kvantitet); // Varje gång vi placerar en order på en sorts produkt, så läggs det till i order details.
               }
             next($_SESSION['cart']);
            }
    emptyCart(); // Tömmer kundvagn efter köp är färdigt.
    ?>
</div>
</div>
<footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p><img src="img/sinus-logo-symbol-small.png">© 2022 Stefan, Olle & Mathias.</a></p>
  </footer>
  </main>
	</body>
</html>
