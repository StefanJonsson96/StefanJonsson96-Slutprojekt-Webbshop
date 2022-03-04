<?php
function kvantitet($a, $b){
    include 'connection.php';
    $statement = $conn->prepare('SELECT Kvantitet FROM produkt WHERE kategori = ? AND Färg = ?');
    $statement->bind_param("ss", $a, $b);
    $statement->execute();
    
    /* bind result variables */
    mysqli_stmt_bind_result($statement, $test);

    /* fetch values */
    while (mysqli_stmt_fetch($statement)) {
        printf ("%s \n", $test, $test);
    }

    /* close statement */
    mysqli_stmt_close($statement);

    /* close connection */
    mysqli_close($conn);
}
function template_footer() {
  $year = date('Y');
  echo <<<EOT
          </main>
          <footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p><img src="img/sinus-logo-symbol-small.png">© 2022 Stefan, Olle & Mathias.</p>
  </footer>
      </body>
  </html>
  EOT;
  }
function pris($a, $b){
  include 'connection.php';
  
  $statement = $conn->prepare('SELECT Pris FROM produkt WHERE kategori = ? AND Färg = ?');
  $statement->bind_param("ss", $a, $b);
  $statement->execute();
  
  /* bind result variables */
  mysqli_stmt_bind_result($statement, $test);

  /* fetch values */
  while (mysqli_stmt_fetch($statement)) {
      printf ("%s \n", $test, $test);
  }

  /* close statement */
  mysqli_stmt_close($statement);

  /* close connection */
  mysqli_close($conn);
}
function produktid($a, $b){
  include 'connection.php';

  $statement = $conn->prepare('SELECT ProduktID FROM produkt WHERE kategori = ? AND Färg = ?');
  $statement->bind_param("ss", $a, $b);
  $statement->execute();
  
  /* bind result variables */
  mysqli_stmt_bind_result($statement, $test);

  /* fetch values */
  while (mysqli_stmt_fetch($statement)) {
      printf ("%s \n", $test, $test);
  }

  /* close statement */
  mysqli_stmt_close($statement);

  /* close connection */
  mysqli_close($conn);
}
function emptyCart()
{
   unset($_SESSION['cart']); 
   
}         
function placeOrder($a, $b)
{
  include 'connection.php';

  $statement = $conn->prepare(
  "UPDATE produkt
  SET Kvantitet = Kvantitet - ?
  WHERE ProduktID = ?;"
  );
  $statement->bind_param("ii", $a, $b);
  $statement->execute();
  

  /* close statement */
  mysqli_stmt_close($statement);

  /* close connection */
  mysqli_close($conn);
}
function getImg($test) 
{
  include 'connection.php';

  $result = $conn->query("SELECT Bild FROM produkt WHERE ProduktID = $test"); 
  ?>

  <?php if($result->num_rows > 0){ ?> 
          <?php while($row = $result->fetch_assoc()){ ?> 
              <img class="litenbild" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Bild']); ?>" /> 
          <?php } ?> 
  <?php }else{ ?> 
      <p class="status error">Image(s) not found...</p> 
  <?php }
}
function addCustomer(){

  include 'connection.php';

  if(isset($_POST['buy']))
  {
      if (!empty($_POST['Förnamn'])) 
      {
          $Namn = $_POST['Förnamn'];
          $Gatuadress = $_POST['Gatuaddress'];
          $Postnr = $_POST['Postnr'];
          $Stad = $_POST['Stad'];
          $Telefon = $_POST['Telefon'];

          $conn->query("INSERT into kund (Namn, Gatuadress, Postnr, Stad, Telefon) VALUES ('$Namn', '$Gatuadress','$Postnr', '$Stad', '$Telefon')");
              
  } 
}
}
function getCustomer()
{
  include 'connection.php';

  $statement = $conn->prepare("SELECT KundID FROM kund ORDER BY KundID DESC LIMIT 1;");
  $statement->execute();
  
  /* bind result variables */
  mysqli_stmt_bind_result($statement, $test);
  
  
  /* fetch values */
  $arr = array();
  while (mysqli_stmt_fetch($statement)) {
      $arr[] = $test;
  }
  
  /* close statement */
  mysqli_stmt_close($statement);

  /* close connection */
  mysqli_close($conn);

  return $arr[0];
  
}
function addOrder($kund){

  include 'connection.php';
  

    $statement = $conn->prepare("INSERT into orders (KundID, Orderdatum) VALUES ($kund, NOW())");
    $statement->execute();  
    mysqli_stmt_close($statement);
    mysqli_close($conn);
  
}
function getOrder(){
  include 'connection.php';

  $statement = $conn->prepare("SELECT OrdersID FROM orders ORDER BY OrdersID DESC LIMIT 1;");
  $statement->execute();
  
  /* bind result variables */
  mysqli_stmt_bind_result($statement, $test);
  
  
  /* fetch values */
  $arr = array();
  while (mysqli_stmt_fetch($statement)) {
      $arr[] = $test;
  }
  
  /* close statement */
  mysqli_stmt_close($statement);

  /* close connection */
  mysqli_close($conn);

  return $arr[0];
}
function orderDetails($orderid, $produktid, $antal){

  include 'connection.php';

    $conn->query("INSERT into orderdetails (OrdersID, ProduktID, Antal) VALUES ($orderid, $produktid, $antal)");
    $conn->close();      
}

function showProducts()
{
  include 'connection.php';

  $sql = "SELECT ProduktID, Färg, Kvantitet, Bild, Pris, Kategori FROM produkt  ORDER BY ProduktID ASC";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
  echo "<td>" . $row["ProduktID"] . "</td><td>" . $row["Färg"] . "</td><td>"
  . $row["Kvantitet"]. "</td><td>"; echo getImg($row["ProduktID"]) . "</td><td>" . $row["Pris"] 
  . "</td><td>" . $row["Kategori"] . "</td></tr>";
  }
  echo "</table>";
  } 
  else { echo "0 results"; }

  $conn->close();
}

function showOrders()
{

  include 'connection.php';

  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT o.OrdersID, Namn, Gatuadress, Postnr, Stad, Telefon, Orderdatum, od.ProduktID, Färg, Antal, Pris, Bild, Kategori
  FROM kund
  INNER JOIN orders AS o ON o.KundID = kund.KundID
  INNER JOIN orderdetails AS od ON od.OrdersID = o.OrdersID
  INNER JOIN produkt AS p ON p.ProduktID = od.ProduktID
  ORDER BY kund.KundID ASC";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
  echo "</td><td>" . $row["OrdersID"] . "</td><td>" . $row["Namn"] . "</td><td>"
  . $row["Gatuadress"] . "</td><td>" . $row["Postnr"] . "</td><td>" . $row["Stad"] .
  "</td><td>" . $row["Telefon"] . "</td><td>" . $row["Orderdatum"] .
  "</td><td>" . $row["ProduktID"] . "</td><td>" . $row["Färg"] .
  "</td><td>" . $row["Antal"] . "</td><td>" . $row["Pris"] . "</td><td>" . $row["Kategori"] . "</td></tr>";
  }
  echo "</table>";
  } 
  else { echo "0 results"; }

  $conn->close();
}


function getColour($id)
{
  include 'connection.php';

  $statement = $conn->prepare('SELECT Färg FROM produkt WHERE ProduktID = ?');
  $statement->bind_param("i", $id);
  $statement->execute();
  
  /* bind result variables */
  mysqli_stmt_bind_result($statement, $test);

  /* fetch values */
  while (mysqli_stmt_fetch($statement)) {
      printf ("%s \n", $test);
  }

  /* close statement */
  mysqli_stmt_close($statement);

  /* close connection */
  mysqli_close($conn);
}


function updateProducts()
{
  include 'connection.php';

  $status = $statusMsg ='';
  if(isset($_POST['submit2']))
  {
      $status = 'Error';
      if (!empty($_FILES["image"]["name"])) 
      {
          $fileName = basename($_FILES["image"]["name"]);
          $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
          $colour = $_POST['colour'];
          $quantity = $_POST['quantity'];
          $price = $_POST['price'];
          $cat = $_POST['cat'];
          $id = $_POST['produktid'];
          $allowTypes = array('jpg','png','jpeg','gif'); 
          if(in_array($fileType, $allowTypes)){ 
              $image = $_FILES['image']['tmp_name']; 
              $imgContent = addslashes(file_get_contents($image)); 
              $insert = $conn->query("Update produkt set Färg = '$colour', Kvantitet = '$quantity', Pris = '$price', Bild = '$imgContent', Kategori = '$cat' where ProduktID = $id");
              if($insert){
                  $insert = 'success'; 
                  $statusMsg = "Updated successfully. Refresh to see results"; 
              }else{ 
                  $statusMsg = "Update failed, please try again."; 
              }
          }else{ 
              $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
          } 
      }else{ 
          $statusMsg = 'Please select an image file to upload.'; 
      } 
  } 
  echo $statusMsg;
  $conn->close();
}

function fillForm()
{
  include 'connection.php';

  if(isset($_POST['submit']))
  {
    
    $id = $_POST['produktid'];

    $sql = "SELECT ProduktID, Färg, Kvantitet, Bild, Pris, Kategori
    FROM produkt WHERE ProduktID = '$id'";
    $result = $conn->query($sql);
  
  
    if ($result->num_rows > 0) {
  
      while($row = $result->fetch_assoc()) {
        echo "<div class='edform'>
        <h1>Edit Products</h1>
        <form action='' method='post' enctype='multipart/form-data'>
  <div class='input-group mb-3'>
  <span class='input-group-text'>ProductID</span>
  <input type='text' class='form-control' name='produktid' value='"; echo $row['ProduktID'] . "'>
  </div>
  
  <div class='input-group mb-3'>
  <span class='input-group-text'>Färg</span>
  <input type='text' class='form-control' name='colour' value='"; echo $row['Färg'] . "'>
  </div>
  
  <div class='input-group mb-3'>
  <span class='input-group-text'>Kvantitet</span>
  <input type='text' class='form-control' name='quantity' value='"; echo $row['Kvantitet'] . "'>
  </div>
  
  <div class='input-group mb-3'>
  <input type='file' class='form-control' id='inputGroupFile02' name='image'> 
  </div>
  <div>"; echo getImg($row['ProduktID']) . "</div>
  <br>
  
  <div class='input-group mb-3'>
  <span class='input-group-text'>$</span>
  <input type='text' class='form-control' name='price' value='"; echo $row['Pris'] . "'>
  </div>
  
  <div class='input-group mb-3'>
  <label class='input-group-text' for='inputGroupSelect01'>Kategori</label>
  <select class='form-select' id='inputGroupSelect01' name='cat'>
    <option selected>"; echo $row['Kategori'] . "</option>
    <option value='Cap'>Cap</option>
    <option value='Hoodie'>Hoodie</option>
    <option value='T-shirt'>T-shirt</option>
    <option value='Basic-Skateboard'>Basic-Skateboard</option>
    <option value='Design-Skateboard'>Design-Skateboard</option>
    <option value='Skateboard-Däck'>Skateboard-Däck</option>
  </select>
  </div>
  <input type='submit' class='btn btn-warning' value='Update Product' name='submit2'>
  </form>
    </div>";
      }
      } 
      else{ 
        echo "0 results"; 
      }
    
      $conn->close();
  }
  else{
    echo "error";
  }

}


?>