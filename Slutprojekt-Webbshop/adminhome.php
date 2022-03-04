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
		     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
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
        </form>
        <form action="searchProduct.php" class="d-flex" method="post">
              <input class="form-control me-2 searchbar" type="text" placeholder="Search" aria-label="Search" name="search">
              <input class="btn btn-outline-success" type="submit" value="search"> 
              </form>
      </div>
    </div>
        </nav>
    </header>



           <!-- PRODUCT FORM --->
           
          <div class="content">
            <h2>Home Page</h2>
            <p>Welcome back, <?=$_SESSION['name']?>!</p>
          </div>

          <section id="container">
          <div class="product-list">
            <h1>Products</h1>
            <table class="table table-striped">

        <tbody>
        <thead>
    <tr>
      <th scope="col">ProductID</th>
      <th scope="col">Färg</th>
      <th scope="col">Kvantitet</th>
      <th scope="col">Bild</th>
      <th scope="col">Pris</th>
      <th scope="col">Kategori</th>
    </tr>
  </thead>
            <?php showProducts(); ?>
          </tr>
        </tbody>
      </table>
          </div>

          <div class="edform">
        <h1>Fill form</h1>
        <form action="" method="post">
  <div class="input-group mb-3">
  <span class="input-group-text">ProductID</span>
  <input type="text" class="form-control" name="produktid">
</div>
  <input type="submit" class="btn btn-primary" value="Fill form" name="submit"> 
</form>
<?php 
if(isset($_POST['submit']))
{
echo fillForm(); 
}
if(isset($_POST['submit2']))
{
  echo updateProducts();
}
?>
    </div>
    </section>

	</body>
</html>
