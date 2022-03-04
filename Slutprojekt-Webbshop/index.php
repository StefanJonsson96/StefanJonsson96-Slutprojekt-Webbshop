<?php
session_start(); // Starta session och inkludera dokument samt anslut till databas.
include 'functions.php';
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
    <div class="carousel-inner">
      <div class="carousel-item active">
      <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#FFFFFF">
    </rect></svg>
      <div class="container">
      </div>
      </div>
      </div>
  <div class="container marketing">
    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4"> <!--Keps kod -->
        <img src="img/sinus-cap-red.png" width="140" height="140">
        <h2>Sinus Cap</h2>
        <p>Very nice Cap. With some more example text.</p>
        <p><a class="btn btn-secondary" href="#" onclick="openModal();currentSlide(1)" class="hover-shadow">View details »</a> 
        <div id="myModal" class="modal">
          <span class="close cursor" onclick="closeModal()">&times;</span>
          <div class="modal-content">
            <div class="mySlides">
              <div class="numbertext">1 / 4</div>
              <img src="img/sinus-cap-red.png" style="width: 100%">
              <div class="columnz">
            <div>
            <form action="cart.php" method="post">
                  <input type="hidden" name="ProduktID" value="<?php produktid("Cap", "Red")?>"> </input></br>
                  <label>Pris: <?php pris("Cap", "Red")?>kr</label><br>
                  <label>Material: 80% Akryl, 20% Ull</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Färg: Röd</label><br>
                  <label>Kvantitet: <?php kvantitet("Cap", "Red")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
                </form>
            </div>
            </div>
            </div>

            <div class="mySlides" id="myUL">
              <div class="numbertext">2 / 4</div>
              <img src="img/sinus-cap-purple.png" style="width:100%">
              <div class="columnz">
              <div>
              <form action="cart.php" method="post">
                  <input type="hidden" name="ProduktID" value="<?php produktid("Cap", "Purple")?>"> </input></br>
                  <label>Pris: <?php pris("Cap", "Purple")?>kr</label><br>
                  <label>Material: 80% Akryl, 20% Ull</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Färg: Lila</label><br>
                  <label>Kvantitet: <?php kvantitet("Cap", "Purple")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
                </form>
              </div>
              </div>
            </div>

            <div class="mySlides">
              <div class="numbertext">3 / 4</div>
              <img src="img/sinus-cap-green.png" style="width:100%">
              <div class="columnz">
              <div>
              <form action="cart.php" method="post">
              <input type="hidden" name="ProduktID" value="<?php produktid("Cap", "Green")?>"> </input></br>   
                  <label>Pris: <?php pris("Cap", "Green")?>kr</label><br>
                  <label>Material: 80% Akryl, 20% Ull</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Färg: Grön</label><br>
                  <label>Kvantitet: <?php kvantitet("Cap", "Green")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
                </form>
              </div>
              </div>
            </div>
            <div class="mySlides">
              <div class="numbertext">4 / 4</div>
              <img src="img/sinus-cap-blue.png" style="width:100%">
              <div class="columnz">
              <div>
              <form action="cart.php" method="post">
              <input type="hidden" name="ProduktID" value="<?php produktid("Cap", "Blue")?>"> </input></br>  
                  <label>Pris: <?php pris("Cap", "Blue")?>kr</label><br>
                  <label>Material: 80% Akryl, 20% Ull</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Färg: Blå</label><br>
                  <label>Kvantitet: <?php kvantitet("Cap", "Blue")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
                </form>
              </div>
              </div>
            </div>

            <!-- Next/previous controls -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

            <!-- Caption text -->
            <div class="caption-container">
              <p id="caption"></p>
            </div>

            <!-- Thumbnail image controls -->
            <div class="columnz">
              <img class="demo" src="img/sinus-cap-red.png" onclick="currentSlide(1)" alt="Red Cap" style="width:25%">
              

            
              <img class="demo" src="img/sinus-cap-purple.png" onclick="currentSlide(2)" alt="Purple cap" style="width:25%">
            

            
              <img class="demo" src="img/sinus-cap-green.png" onclick="currentSlide(3)" alt="Green cap" style="width:25%">
            

            
              <img class="demo" src="img/sinus-cap-blue.png" onclick="currentSlide(4)" alt="Blue cap" style="width:25%">
            </div>
          </div>
        </div>
        <script>
// Open the Modal
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

// Close the Modal
function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}

</script>
      </p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4"> <!-- Hoodie kod -->
        <img src="img/hoodie-ash.png" width="140" height="140">
        <h2>Sinus Hoodie</h2>
        <p>Very nice Hoodie. With some more example text.</p>
        <p><a class="btn btn-secondary" href="#" onclick="openModal2();currentSlide2(1)" class="hover-shadow">View details »</a> 
        <div id="myModal2" class="modal2">
          <span class="close2 cursor" onclick="closeModal2()">&times;</span>
          <div class="modal2-content">
            <div class="mySlides2">
              <div class="numbertext">1 / 5</div>
              <img src="img/hoodie-ash.png" style="width: 100%">
              <div class="columnz2">
            <div>
            <form action="cart.php" method="post">
            <input type="hidden" name="ProduktID" value="<?php produktid("Hoodie", "Black")?>"> </input></br>
                  <label>Pris: <?php pris("Hoodie", "Black")?>kr</label><br>
                  <label>Material: 80% Akryl, 20% Ull</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Färg: Svart</label><br>
                  <label>Kvantitet: <?php kvantitet("Hoodie", "Black")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
            </form>
            </div>
            </div>
            </div>

            <div class="mySlides2">
              <div class="numbertext">2 / 5</div>
              <img src="img/hoodie-fire.png" style="width:100%">
              <div class="columnz2">
              <div>
              <form action="cart.php" method="post">
              <input type="hidden" name="ProduktID" value="<?php produktid("Hoodie", "Red")?>"> </input></br>
                  <label>Pris: <?php pris("Hoodie", "Red")?>kr</label><br>
                  <label>Material: 80% Akryl, 20% Ull</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Färg: Röd</label><br>
                  <label>Kvantitet: <?php kvantitet("Hoodie", "Red")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
              </form>
              </div>
              </div>
            </div>

            <div class="mySlides2">
              <div class="numbertext">3 / 5</div>
              <img src="img/hoodie-ocean.png" style="width:100%">
              <div class="columnz2">
              <div>
              <form action="cart.php" method="post">
              <input type="hidden" name="ProduktID" value="<?php produktid("Hoodie", "Blue")?>"> </input></br>
                  <label>Pris: <?php pris("Hoodie", "Blue")?>kr</label><br>
                  <label>Material: 80% Akryl, 20% Ull</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Färg: Blå</label><br>
                  <label>Kvantitet: <?php kvantitet("Hoodie", "Blue")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
              </form>
              </div>
              </div>
            </div>
            <div class="mySlides2">
              <div class="numbertext">4 / 5</div>
              <img src="img/hoodie-green.png" style="width:100%">
              <div class="columnz2">
              <div>
              <form action="cart.php" method="post">
              <input type="hidden" name="ProduktID" value="<?php produktid("Hoodie", "Green")?>"> </input></br>
                  <label>Pris: <?php pris("Hoodie", "Green")?>kr</label><br>
                  <label>Material: 80% Akryl, 20% Ull</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Färg: Grön</label><br>
                  <label>Kvantitet: <?php kvantitet("Hoodie", "Green")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
              </form>
              </div>
              </div>
            </div>
            <div class="mySlides2">
              <div class="numbertext">5 / 5</div>
              <img src="img/hoodie-purple.png" style="width:100%">
              <div class="columnz2">
              <div>
              <form action="cart.php" method="post">
              <input type="hidden" name="ProduktID" value="<?php produktid("Hoodie", "Purple")?>"> </input></br>
                  <label>Pris: <?php pris("Hoodie", "Purple")?>kr</label><br>
                  <label>Material: 80% Akryl, 20% Ull</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Färg: Lila</label><br>
                  <label>Kvantitet: <?php kvantitet("Hoodie", "Purple")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
              </form>
              </div>
              </div>
            </div>

            <!-- Next/previous controls -->
            <a class="prev" onclick="plusSlides2(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides2(1)">&#10095;</a>

            <!-- Caption text -->
            <div class="caption-container">
              <p id="caption2"></p>
            </div>

            <!-- Thumbnail image controls -->
            <div class="columnz">
              <img class="demo2" src="img/hoodie-ash.png" onclick="currentSlide2(1)" alt="Black Hoodie" style="width:20%">
              <img class="demo2" src="img/hoodie-fire.png" onclick="currentSlide2(2)" alt="Red Hoodie" style="width:20%">
              <img class="demo2" src="img/hoodie-ocean.png" onclick="currentSlide2(3)" alt="Blue Hoodie" style="width:20%">
              <img class="demo2" src="img/hoodie-green.png" onclick="currentSlide2(4)" alt="Green Hoodie" style="width:20%">
              <img class="demo2" src="img/hoodie-purple.png" onclick="currentSlide2(5)" alt="Purple Hoodie" style="width:20%">
            </div>
          </div>
        </div>
</div>
        <script>
// Open the Modal
function openModal2() {
  document.getElementById("myModal2").style.display = "block";
}

// Close the Modal
function closeModal2() {
  document.getElementById("myModal2").style.display = "none";
}

var slideIndex = 1;
showSlides2(slideIndex);

// Next/previous controls
function plusSlides2(n) {
  showSlides2(slideIndex += n);
}

// Thumbnail image controls
function currentSlide2(n) {
  showSlides2(slideIndex = n);
}

function showSlides2(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides2");
  var dots = document.getElementsByClassName("demo2");
  var captionText = document.getElementById("caption2");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
<div class="col-lg-4"> <!--T-Shirt kod -->
<img src="img/sinus-tshirt-grey.png" width="140" height="140">
        <h2>Sinus T-Shirt</h2>
        <p>Very nice T-Shirt. With some more example text.</p>
        <p><a class="btn btn-secondary" href="#" onclick="openModal3();currentSlide3(1)" class="hover-shadow">View details »</a> 
        <div id="myModal3" class="modal3">
          <span class="close3 cursor" onclick="closeModal3()">&times;</span>
          <div class="modal3-content">
            <div class="mySlides3">
              <div class="numbertext">1 / 5</div>
              <img src="img/sinus-tshirt-grey.png" style="width: 100%">
              <div class="columnz3">
            <div>
            <form action="cart.php" method="post">
            <input type="hidden" name="ProduktID" value="<?php produktid("T-Shirt", "Black")?>"> </input></br>
                  <label>Pris: <?php pris("T-Shirt", "Black")?>kr</label><br>
                  <label>Material: 80% Akryl, 20% Ull</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Färg: Svart</label><br>
                  <label>Kvantitet: <?php kvantitet("T-Shirt", "Black")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
            </form>
            </div>
            </div>
            </div>

            <div class="mySlides3">
              <div class="numbertext">2 / 5</div>
              <img src="img/sinus-tshirt-blue.png" style="width:100%">
              <div class="columnz3">
              <div>
              <form action="cart.php" method="post">
              <input type="hidden" name="ProduktID" value="<?php produktid("T-Shirt", "Blue")?>"> </input></br>
                  <label>Pris: <?php pris("T-Shirt", "Blue")?>kr</label><br>
                  <label>Material: 80% Akryl, 20% Ull</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Färg: Blå</label><br>
                  <label>Kvantitet: <?php kvantitet("T-Shirt", "Blue")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
            </form>
              </div>
              </div>
            </div>

            <div class="mySlides3">
              <div class="numbertext">3 / 5</div>
              <img src="img/sinus-tshirt-pink.png" style="width:100%">
              <div class="columnz3">
              <div>
              <form action="cart.php" method="post">
              <input type="hidden" name="ProduktID" value="<?php produktid("T-Shirt", "Pink")?>"> </input></br>
                  <label>Pris: <?php pris("T-Shirt", "Pink")?>kr</label><br>
                  <label>Material: 80% Akryl, 20% Ull</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Färg: Rosa</label><br>
                  <label>Kvantitet: <?php kvantitet("T-Shirt", "Pink")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
            </form>
              </div>
              </div>
            </div>
            <div class="mySlides3">
              <div class="numbertext">4 / 5</div>
              <img src="img/sinus-tshirt-purple.png" style="width:100%">
              <div class="columnz3">
              <div>
              <form action="cart.php" method="post">
              <input type="hidden" name="ProduktID" value="<?php produktid("T-Shirt", "Purple")?>"> </input></br>
                  <label>Pris: <?php pris("T-Shirt", "Purple")?>kr</label><br>
                  <label>Material: 80% Akryl, 20% Ull</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Färg: Lila</label><br>
                  <label>Kvantitet: <?php kvantitet("T-Shirt", "Purple")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
            </form>
              </div>
              </div>
            </div>
            <div class="mySlides3">
              <div class="numbertext">5 / 5</div>
              <img src="img/sinus-tshirt-yellow.png" style="width:100%">
              <div class="columnz3">
              <div>
              <form action="cart.php" method="post">
              <input type="hidden" name="ProduktID" value="<?php produktid("T-Shirt", "Yellow")?>"> </input></br>
                  <label>Pris: <?php pris("T-Shirt", "Yellow")?>kr</label><br>
                  <label>Material: 80% Akryl, 20% Ull</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Färg: Gul</label><br>
                  <label>Kvantitet: <?php kvantitet("T-Shirt", "Yellow")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
            </form>
              </div>
              </div>
            </div>

            <!-- Next/previous controls -->
            <a class="prev" onclick="plusSlides3(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides3(1)">&#10095;</a>

            <!-- Caption text -->
            <div class="caption-container">
              <p id="caption3"></p>
            </div>

            <!-- Thumbnail image controls -->
            <div class="columnz">
              <img class="demo3" src="img/sinus-tshirt-grey.png" onclick="currentSlide3(1)" alt="Black T-Shirt" style="width:20%">
              <img class="demo3" src="img/sinus-tshirt-blue.png" onclick="currentSlide3(2)" alt="Blue T-Shirt" style="width:20%">
              <img class="demo3" src="img/sinus-tshirt-pink.png" onclick="currentSlide3(3)" alt="Pink T-Shirt" style="width:20%">
              <img class="demo3" src="img/sinus-tshirt-purple.png" onclick="currentSlide3(4)" alt="Purple T-Shirt" style="width:20%">
              <img class="demo3" src="img/sinus-tshirt-yellow.png" onclick="currentSlide3(5)" alt="Yellow T-Shirt" style="width:20%">
            </div>
          </div>
        </div>
</div>
        <script>
// Open the Modal
function openModal3() {
  document.getElementById("myModal3").style.display = "block";
}

// Close the Modal
function closeModal3() {
  document.getElementById("myModal3").style.display = "none";
}

var slideIndex = 1;
showSlides3(slideIndex);

// Next/previous controls
function plusSlides3(n) {
  showSlides3(slideIndex += n);
}

// Thumbnail image controls
function currentSlide3(n) {
  showSlides3(slideIndex = n);
}

function showSlides3(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides3");
  var dots = document.getElementsByClassName("demo3");
  var captionText = document.getElementById("caption3");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
    </div><!-- /.row -->
    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4"> <!--Skateboard kod1 -->
        <img src="img/sinus-skateboard-eagle.png" width="140" height="280">
        <h2>Basic Skateboards</h2>
        <p>Very nice Skateboard. With some more example text.</p>
        <p><a class="btn btn-secondary" href="#" onclick="openModal4();currentSlide4(1)" class="hover-shadow">View details »</a> 
        <div id="myModal4" class="modal4">
          <span class="close4 cursor" onclick="closeModal4()">&times;</span>
          <div class="modal4-content">

            <div class="mySlides4">
              <div class="numbertext">1 / 5</div>
              <img class="test" src="img/sinus-skateboard-eagle.png" alt="Eagle Skateboard" height="800px">
              <div class="columnz4">
            <div>
            <form action="cart.php" method="post">
            <input type="hidden" name="ProduktID" value="<?php produktid("Basic-Skateboard", "Eagle")?>"> </input></br>
                  <label>Pris: <?php pris("Basic-Skateboard", "Eagle")?>kr</label><br>
                  <label>Material: 100% Trä</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Design: Eagle</label><br>
                  <label>Kvantitet: <?php kvantitet("Basic-Skateboard", "Eagle")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
            </form>  
            </div>
            </div>
            </div>

            <div class="mySlides4">
              <div class="numbertext">2 / 5</div>
              <img class="test" src="img/sinus-skateboard-fire.png" alt="Fire Skateboard" height="800px">
              <div class="columnz4">
              <div>
              <form action="cart.php" method="post">
              <input type="hidden" name="ProduktID" value="<?php produktid("Basic-Skateboard", "Fire")?>"> </input></br>
                  <label>Pris: <?php pris("Basic-Skateboard", "Fire")?>kr</label><br>
                  <label>Material: 100% Trä</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Design: Fire</label><br>
                  <label>Kvantitet: <?php kvantitet("Basic-Skateboard", "Fire")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
            </form>  
              </div>
              </div>
            </div>

            <div class="mySlides4">
              <div class="numbertext">3 / 5</div>
              <img class ="test" src="img/sinus-skateboard-gretasfury.png" alt="Greta Thunberg Skateboard" height="800px">
              <div class="columnz4">
              <div>
              <form action="cart.php" method="post">
              <input type="hidden" name="ProduktID" value="<?php produktid("Basic-Skateboard", "Greta")?>"> </input></br>
                  <label>Pris: <?php pris("Basic-Skateboard", "Greta")?>kr</label><br>
                  <label>Material: 100% Trä</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Design: Greta</label><br>
                  <label>Kvantitet: <?php kvantitet("Basic-Skateboard", "Greta")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
            </form> 
              </div>
              </div>
            </div>
            <div class="mySlides4">
              <div class="numbertext">4 / 5</div>
              <img class ="test" src="img/sinus-skateboard-ink.png" alt="Ink Skateboard" height="800px">
              <div class="columnz4">
              <div>
              <form action="cart.php" method="post">
              <input type="hidden" name="ProduktID" value="<?php produktid("Basic-Skateboard", "Ink")?>"> </input></br>
                  <label>Pris: <?php pris("Basic-Skateboard", "Ink")?>kr</label><br>
                  <label>Material: 100% Trä</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Design: Ink</label><br>
                  <label>Kvantitet: <?php kvantitet("Basic-Skateboard", "Ink")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
            </form> 
              </div>
              </div>
            </div>
            <div class="mySlides4">
              <div class="numbertext">5 / 5</div>
              <img class ="test" src="img/sinus-skateboard-logo.png" alt="Basic Skateboard" height="800px">
              <div class="columnz4">
              <div>
              <form action="cart.php" method="post">
              <input type="hidden" name="ProduktID" value="<?php produktid("Basic-Skateboard", "Simple")?>"> </input></br>
                  <label>Pris: <?php pris("Basic-Skateboard", "Simple")?>kr</label><br>
                  <label>Material: 100% Trä</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Design: Simple</label><br>
                  <label>Kvantitet: <?php kvantitet("Basic-Skateboard", "Simple")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
            </form> 
              </div>
              </div>
            </div>

            <!-- Next/previous controls -->
            <a class="prev" onclick="plusSlides4(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides4(1)">&#10095;</a>

            <!-- Caption text -->
            <div class="caption-container">
              <p id="caption4"></p>
            </div>

            <!-- Thumbnail image controls -->
            <div class="columnz4">
              <img class="demo" src="img/sinus-skateboard-eagle.png" onclick="currentSlide4(1)" alt="Eagle Skateoard" width="140px" height="280px">
              <img class="demo" src="img/sinus-skateboard-fire.png" onclick="currentSlide4(2)" alt="Fire Skateboard" width="140px" height="280px">
              <img class="demo" src="img/sinus-skateboard-gretasfury.png" onclick="currentSlide4(3)" alt="Greta Thunberg Skateboard" width="140px" height="280px">
              <img class="demo" src="img/sinus-skateboard-ink.png" onclick="currentSlide4(4)" alt="Ink Skateboard" width="140px" height="280px">
              <img class="demo" src="img/sinus-skateboard-logo.png" onclick="currentSlide4(5)" alt="Basic Skateboard" width="140px" height="280px">
            </div>
          </div>
        </div>
        <script>
// Open the Modal
function openModal4() {
  document.getElementById("myModal4").style.display = "block";
}

// Close the Modal
function closeModal4() {
  document.getElementById("myModal4").style.display = "none";
}

var slideIndex = 1;
showSlides4(slideIndex);

// Next/previous controls
function plusSlides4(n) {
  showSlides4(slideIndex += n);
}

// Thumbnail image controls
function currentSlide4(n) {
  showSlides4(slideIndex = n);
}

function showSlides4(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides4");
  var dots = document.getElementsByClassName("demo4");
  var captionText = document.getElementById("caption4");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
      </p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4"> <!--Skateboard kod2 -->
        <img src="img/sinus-skateboard-northern_lights.png" width="140" height="280">
        <h2>Designed Skateboards</h2>
        <p>Very nice Skateboard. With some more example text.</p>
        <p><a class="btn btn-secondary" href="#" onclick="openModal5();currentSlide5(1)" class="hover-shadow">View details »</a> 
        <div id="myModal5" class="modal5">
          <span class="close5 cursor" onclick="closeModal5()">&times;</span>
          <div class="modal5-content">

            <div class="mySlides5">
              <div class="numbertext">1 / 5</div>
              <img class="test" src="img/sinus-skateboard-northern_lights.png" alt="Northern Lights Skateboard" height="800px">
              <div class="columnz5">
            <div>
            <form action="cart.php" method="post">
            <input type="hidden" name="ProduktID" value="<?php produktid("Design-Skateboard", "Northern Lights")?>"> </input></br>
                  <label>Pris: <?php pris("Design-Skateboard", "Northern Lights")?>kr</label><br>
                  <label>Material: 100% Trä</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Design: Northern Lights</label><br>
                  <label>Kvantitet: <?php kvantitet("Design-Skateboard", "Northern Lights")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
            </form>  
            </div>
            </div>
            </div>

            <div class="mySlides5">
              <div class="numbertext">2 / 5</div>
              <img class="test" src="img/sinus-skateboard-plastic.png" alt="Plastic Skateboard" height="800px">
              <div class="columnz5">
              <div>
              <form action="cart.php" method="post">
              <input type="hidden" name="ProduktID" value="<?php produktid("Design-Skateboard", "Plastic Lights")?>"> </input></br>
                  <label>Pris: <?php pris("Design-Skateboard", "Plastic lights")?>kr</label><br>
                  <label>Material: 100% Trä</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Design: Plastic Lights</label><br>
                  <label>Kvantitet: <?php kvantitet("Design-Skateboard", "Plastic Lights")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
            </form>
              </div>
              </div>
            </div>

            <div class="mySlides5">
              <div class="numbertext">3 / 5</div>
              <img class ="test" src="img/sinus-skateboard-polar.png" alt="Polar Skateboard" height="800px">
              <div class="columnz5">
              <div>
              <form action="index.php?page=cart" method="post">
              <input type="hidden" name="ProduktID" value="<?php produktid("Design-Skateboard", "Polar")?>"> </input></br>
                  <label>Pris: <?php pris("Design-Skateboard", "Polar")?>kr</label><br>
                  <label>Material: 100% Trä</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Design: Polar</label><br>
                  <label>Kvantitet: <?php kvantitet("Design-Skateboard", "Polar")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
            </form>
              </div>
              </div>
            </div>
            <div class="mySlides5">
              <div class="numbertext">4 / 5</div>
              <img class ="test" src="img/sinus-skateboard-purple.png" alt="Purple Skateboard" height="800px">
              <div class="columnz5">
              <div>
              <form action="cart.php" method="post">
              <input type="hidden" name="ProduktID" value="<?php produktid("Design-Skateboard", "Purple")?>"> </input></br>
                  <label>Pris: <?php pris("Design-Skateboard", "Purple")?>kr</label><br>
                  <label>Material: 100% Trä</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Design: Purple</label><br>
                  <label>Kvantitet: <?php kvantitet("Design-Skateboard", "Purple")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
            </form>
              </div>
              </div>
            </div>
            <div class="mySlides5">
              <div class="numbertext">5 / 5</div>
              <img class ="test" src="img/sinus-skateboard-Yellow.png" alt="Yellow Skateboard" height="800px">
              <div class="columnz5">
              <div>
              <form action="cart.php" method="post">
              <input type="hidden" name="ProduktID" value="<?php produktid("Design-Skateboard", "Yellow")?>"> </input></br>
                  <label>Pris: <?php pris("Design-Skateboard", "Yellow")?>kr</label><br>
                  <label>Material: 100% Trä</label><br>
                  <label>Storlek: One size fits all</label><br>
                  <label>Design: Yellow</label><br>
                  <label>Kvantitet: <?php kvantitet("Design-Skateboard", "Yellow")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
            </form>
              </div>
              </div>
            </div>

            <!-- Next/previous controls -->
            <a class="prev" onclick="plusSlides5(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides5(1)">&#10095;</a>

            <!-- Caption text -->
            <div class="caption-container">
              <p id="caption5"></p>
            </div>

            <!-- Thumbnail image controls -->
            <div class="columnz5">
              <img class="demo" src="img/sinus-skateboard-northern_lights.png" onclick="currentSlide5(1)" alt="Eagle Skateoard" width="140px" height="280px">
              <img class="demo" src="img/sinus-skateboard-plastic.png" onclick="currentSlide5(2)" alt="Fire Skateboard" width="140px" height="280px">
              <img class="demo" src="img/sinus-skateboard-polar.png" onclick="currentSlide5(3)" alt="Greta Thunberg Skateboard" width="140px" height="280px">
              <img class="demo" src="img/sinus-skateboard-purple.png" onclick="currentSlide5(4)" alt="Ink Skateboard" width="140px" height="280px">
              <img class="demo" src="img/sinus-skateboard-yellow.png" onclick="currentSlide5(5)" alt="Basic Skateboard" width="140px" height="280px">
            </div>
          </div>
        </div>
        <script>
// Open the Modal
function openModal5() {
  document.getElementById("myModal5").style.display = "block";
}

// Close the Modal
function closeModal5() {
  document.getElementById("myModal5").style.display = "none";
}

var slideIndex = 1;
showSlides4(slideIndex);

// Next/previous controls
function plusSlides5(n) {
  showSlides5(slideIndex += n);
}

// Thumbnail image controls
function currentSlide5(n) {
  showSlides5(slideIndex = n);
}

function showSlides5(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides5");
  var dots = document.getElementsByClassName("demo5");
  var captionText = document.getElementById("caption5");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
      </p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4"> <!--Wheels kod -->
        <img src="img/sinus-wheel-rocket.png" alt="Rocket Wheels" width="240" height="280">
        <h2>Skateboard Wheels</h2>
        <p>Very nice Skateboard Wheels. With some more example text.</p>
        <p><a class="btn btn-secondary" href="#" onclick="openModal6();currentSlide6(1)" class="hover-shadow">View details »</a> 
        <div id="myModal6" class="modal6">
          <span class="close6 cursor" onclick="closeModal6()">&times;</span>
          <div class="modal6-content">

            <div class="mySlides6">
              <div class="numbertext">1 / 3</div>
              <img class="test6" src="img/sinus-wheel-rocket.png" alt="Rocket Wheels">
              <div class="columnz6">
            <div>
            <form action="cart.php" method="post">
            <input type="hidden" name="ProduktID" value="<?php produktid("Skateboard-Däck", "Rocket Wheels")?>"> </input></br>
                  <label>Pris: <?php pris("Skateboard-Däck", "Rocket wheels")?>kr</label><br>
                  <label>Material: Polyuretan</label><br>
                  <label>Diameter: 54mm</label><br>
                  <label>Durometer: 97A</label><br>
                  <label>Design: Rocket wheels</label><br>
                  <label>Kvantitet: <?php kvantitet("Skateboard-Däck", "Rocket wheels")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
            </form>  
            </div>
            </div>
            </div>

            <div class="mySlides6">
              <div class="numbertext">2 / 3</div>
              <img class="test6" src="img/sinus-wheel-spinner.png" alt="Spinner Wheels">
              <div class="columnz6">
            <div>
            <form action="cart.php" method="post">
            <input type="hidden" name="ProduktID" value="<?php produktid("Skateboard-Däck", "Spinner Wheels")?>"> </input></br>
            <label>Pris: <?php pris("Skateboard-Däck", "Spinner wheels")?>kr</label><br>
                  <label>Material: Polyuretan</label><br>
                  <label>Diameter: 54mm</label><br>
                  <label>Durometer: 97A</label><br>
                  <label>Design: Spinner wheels</label><br>
                  <label>Kvantitet: <?php kvantitet("Skateboard-Däck", "Spinner wheels")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
            </form> 
            </div>
            </div>
            </div>

            <div class="mySlides6">
              <div class="numbertext">3 / 3</div>
              <img class="test6" src="img/sinus-wheel-wave.png" alt="Wave Wheels">
              <div class="columnz6">
            <div>
            <form action="cart.php" method="post">
            <input type="hidden" name="ProduktID" value="<?php produktid("Skateboard-Däck", "Wave Wheels")?>"> </input></br>
                  <label>Pris: <?php pris("Skateboard-Däck", "Wave wheels")?>kr</label><br>
                  <label>Material: Polyuretan</label><br>
                  <label>Diameter: 54mm</label><br>
                  <label>Durometer: 97A</label><br>
                  <label>Design: Wave wheels</label><br>
                  <label>Kvantitet: <?php kvantitet("Skateboard-Däck", "Wave wheels")?> </label></br>
                  <input type="number" name="Kvantitet" placeholder="1" value="1"></input></br> 
                  <input type="submit" value="Lägg till i varukorg"></input>
            </form> 
            </div>
            </div>
            </div>
            <!-- Next/previous controls -->
            <a class="prev" onclick="plusSlides6(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides6(1)">&#10095;</a>

            <!-- Caption text -->
            <div class="caption-container">
              <p id="caption6"></p>
            </div>

            <!-- Thumbnail image controls -->
            <div class="columnz5">
              <img class="demo" src="img/sinus-wheel-rocket.png" onclick="currentSlide6(1)" alt="Rocket Wheels" width="33%" height="380px">
              <img class="demo" src="img/sinus-wheel-spinner.png" onclick="currentSlide6(2)" alt="Spinner Wheels" width="33%" height="380px">
              <img class="demo" src="img/sinus-wheel-wave.png" onclick="currentSlide6(3)" alt="Wave Wheels" width="33%" height="380px">
            </div>
          </div>
        </div>
        <script>
// Open the Modal
function openModal6() {
  document.getElementById("myModal6").style.display = "block";
}

// Close the Modal
function closeModal6() {
  document.getElementById("myModal6").style.display = "none";
}

var slideIndex = 1;
showSlides6(slideIndex);

// Next/previous controls
function plusSlides6(n) {
  showSlides6(slideIndex += n);
}

// Thumbnail image controls
function currentSlide6(n) {
  showSlides6(slideIndex = n);
}

function showSlides6(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides6");
  var dots = document.getElementsByClassName("demo6");
  var captionText = document.getElementById("caption6");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
      </p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p><img src="img/sinus-logo-symbol-small.png">© 2022 Stefan, Olle & Mathias.</a></p>
  </footer>
  </main>
	</body>
</html>
