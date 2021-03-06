<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}

include 'functions.php';
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="adminhome.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	    <script type="text/javascript" src="dropdown.js"></script>
      <script src="https://kit.fontawesome.com/236a6c3af4.js" crossorigin="anonymous"></script>
    </head>
	<body class="loggedin">
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
      </div> -->
    </div>
        </nav>
    </header>



           <!-- PRODUCT FORM --->
           
          <div class="content">
            <h2>Home Page</h2>
            <p>Welcome , <?=$_SESSION['name']?>!</p>
          </div>

          <div>
            <form method="post" action="searchorder.php">
                <h1>SEARCH</h1>
                <input type="text" name="search" required/>
                <input type="submit" value="Search"/>
            </form>
          </div>

          <div class="orders-list">
            <h1>Orders</h1>
            <table class="table table-striped">

        <tbody>
        <thead>
    <tr>
      <th scope="col">OrderID</th>
      <th scope="col">Namn</th>
      <th scope="col">Adress</th>
      <th scope="col">PostNr</th>
      <th scope="col">Stad</th>
      <th scope="col">Telefon</th>
      <th scope="col">Orderdatum</th>
      <th scope="col">ProduktID</th>
      <th scope="col">F??rg</th>
      <th scope="col">Antal</th>
      <th scope="col">Pris</th>
      <th scope="col">Kategori</th>
    </tr>
  </thead>
            <?php showOrders(); ?>
          </tr>
        </tbody>
      </table>
          </div>

	</body>
</html>
