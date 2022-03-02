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

// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['ProduktID'], $_POST['Kvantitet']) && is_numeric($_POST['ProduktID']) && is_numeric($_POST['Kvantitet'])) {
    // Set the post variables so we easily identify them, also make sure they are integer
    $product_id  = (int)$_POST['ProduktID'];
    $quantity  = (int)$_POST['Kvantitet'];
    // Prepare the SQL statement, we basically are checking if the product exists in our databaser
    $stmt = $conn->prepare('SELECT * FROM produkt WHERE ProduktID = ?');
    $stmt->bind_param("i", $_POST['ProduktID']);
    $stmt->execute([$_POST['ProduktID']]);
    // Fetch the product from the database and return the result as an Array
    $product = mysqli_stmt_fetch($stmt);
    // Check if the product exists (array is not empty)
    if ($product && $quantity > 0) {
        // Product exists in database, now we can create/update the session variable for the cart
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                // Product exists in cart so just update the quanity
                $_SESSION['cart'][$product_id] += $quantity;
                
            } else {
                // Product is not in cart so add it
                $_SESSION['cart'][$product_id] = $quantity;
                
            }
        } else {
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
    // Prevent form resubmission...
  
    header('location: index.php?page=cart');
    //exit;
}

// Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // Loop through the post data so we can update the quantities for every product in cart
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            // Always do checks and validation
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                // Update new quantity
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    // Prevent form resubmission...
    header('location: index.php?page=cart');
    //exit;
}
// Send the user to the place order page if they click the Place Order button, also the cart should not be empty
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    header('Location: placeorder.php');
    //exit;
}
// Check the session variable for products in cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products  = array();
$subtotal = 0.00;
// If there are products in cart
if ($products_in_cart) {
    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $conn->prepare('SELECT * FROM produkt WHERE ProduktID IN (' . $array_to_question_marks . ')');
    // We only need the array keys, not the values, the keys are the id's of the products
    $stmt->execute(array_keys($products_in_cart));
    // Fetch the products from the database and return the result as an Array

    $result = $stmt->get_result(); 
    $array = $result->fetch_all(MYSQLI_ASSOC); // Vi hade bara fångat en rad
    // Calculate the subtotal
     foreach ($array as $product) {
        
        $subtotal += (float)$product['Pris'] * (int)$products_in_cart[$product['ProduktID']];
        $_SESSION['faktura'] = $subtotal;
    }
    
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
      <div class="col-lg-4">   
    <h1>Shopping Cart</h1>
<<<<<<< Updated upstream
    <form action="cart.php" method="post" style="border: solid 2px black;">
        <table >
            <thead>
                <tr>
                    <td colspan="2" style="border: solid 2px black;"><b>Produkt</td></b>
                    <td style="border: solid 2px black;"><b>Kategori</td></b>
                    <td style="border: solid 2px black;"><b>Pris</td></b>
=======
    <form action="cart.php" method="post">
        <table style="border: solid 2px black;">
            <thead>
                <tr>
                    <td style="border: solid 2px black;"><b>Bild</td></b>
                    <td colspan="1" style="border: solid 2px black;"><b>Produkt</td></b>
                    <td style="border: solid 2px black;"><b>Kategori</td></b>
                    <td style="border: solid 2px black;"><b>Styck-Pris</td></b>
>>>>>>> Stashed changes
                    <td style="border: solid 2px black;"><b>Antal</td></b>
                    <td style="border: solid 2px black;"><b>Totalt</td></b>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($array)): ?>
                <tr>
                    <td colspan="5">Kundvagnen är tom.</td>
                </tr>
                <?php else: ?>
<<<<<<< Updated upstream
                <?php foreach ($array as $product): ?>
                <tr>
                    <td class="img">
                        <a href="index.php?page=product&id=<?=$product['ProduktID']?>">
                            <?php 
                            /* 
                            <img src="imgs/<?=$product['img']?>" width="50" height="50" alt="<?=$product['Färg']?>">
                            */
                            ?>
                        </a>
                    </td>
                    <td class="price"><?=$product['Färg']?></td>
                        <br>
                    </td>
                    <td class="price"><?=$product['Kategori']?></td>
                    <td class="price"><?=$product['Pris']?> kr</td>
=======
                <?php foreach ($array as $product): ?>   
                <tr>
                <td> <!-- Bild -->
                    <a href="index.php?page=product&id=<?=$product['ProduktID']?>">
        
                        <?php getImg($product['ProduktID'])?>  
                                            
                    </a>
                </td>
                    <td class="price"><?=$product['Färg']?></td> <!-- Färg -->
                        <br>
                    </td>
                    <td class="price"><?=$product['Kategori']?></td> <!-- Kategori -->
                    <td class="price"><?=$product['Pris']?> kr</td> <!-- Pris -->
>>>>>>> Stashed changes
                    <td class="quantity">
                        <input type="number" name="quantity-<?=$product['ProduktID']?>" value="<?=$products_in_cart[$product['ProduktID']]?>" min="1" max="<?=$product['Kvantitet']?>" placeholder="Quantity" required>
                    </td>
                    <td class="price"><?=$product['Pris'] * $products_in_cart[$product['ProduktID']]?> kr</td>
                </tr>
<<<<<<< Updated upstream
=======
                
>>>>>>> Stashed changes
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Totalpris innan frakt.</span>
            <span class="price"><?=$subtotal?> kr.</span>
        </div>
        <div class="buttons">
<<<<<<< Updated upstream
            <input type="submit" value="Köp" name="placeorder">
=======
            <!-- <input type="submit" value="Köp" name="placeorder"> -->
>>>>>>> Stashed changes
            <input type="submit" value="Uppdatera Antal" name="update">
            <input type="submit" value="Töm Kundvagn" name="remove">
        </div>
    </form>
                </div>
<<<<<<< Updated upstream
=======
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                <h1>Test</h1>
                <form action="placeorder.php" method="POST">
                    <table>
                        <tr>
                            <td><label for="Förnamn">Förnamn:</label></td>
                            <td><input type="text" name="Förnamn"><br></td>
                        </tr>
                        <tr>
                            <td><label for="Gatuaddress">Gatuaddress:</label></td>
                            <td><input type="text" name="Gatuaddress"><br></td>
                        </tr>
                        <tr>
                            <td><label for="Postnr">Postnr:</label></td>
                            <td><input type="text" name="Postnr"><br></td>
                        </tr>
                        <tr>
                            <td><label for="Stad">Stad:</label></td>
                            <td><input type="text" name="Stad"><br></td>
                        </tr>
                        <tr>
                            <td><label for="Telefon">Telefon</label></td>
                            <td><input type="text" name="Telefon"></td>
                        </tr>
                    </table>

    <div class="buttons">
    <input type="submit" name="buy" value="Köp">
    </div>
</form>
                </div>
                </div>
>>>>>>> Stashed changes
                </div>
                <?php 

if (isset($_POST["remove"])) { // Töm kundvagn
    
    emptyCart();
    echo "Kundvagnen är tömd.";
}
?>
</div>
<footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p><img src="img/sinus-logo-symbol-small.png">© 2022 Stefan, Olle & Mathias.</a></p>
  </footer>
  </main>
	</body>
</html>

