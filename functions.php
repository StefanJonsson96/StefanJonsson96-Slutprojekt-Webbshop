<?php
function kvantitet($a, $b){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Sinus";

    $connection = new mysqli($servername, $username, $password, $dbname);
    $statement = $connection->prepare('SELECT Kvantitet FROM produkt WHERE kategori = ? AND Färg = ?');
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
    mysqli_close($connection);
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
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "Sinus";

  $connection = new mysqli($servername, $username, $password, $dbname);
  $statement = $connection->prepare('SELECT Pris FROM produkt WHERE kategori = ? AND Färg = ?');
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
  mysqli_close($connection);
}
function produktid($a, $b){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "Sinus";

  $connection = new mysqli($servername, $username, $password, $dbname);
  $statement = $connection->prepare('SELECT ProduktID FROM produkt WHERE kategori = ? AND Färg = ?');
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
  mysqli_close($connection);
}
function emptyCart()
{
   unset($_SESSION['cart']); 
   
}         
function troubleShoot()
{
  if (isset($_SESSION['cart'])){ // Vardumpar kundvagn om den finns
    var_dump($_SESSION);
  }
  
}  
function placeOrder($a, $b)
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "Sinus";

  $connection = new mysqli($servername, $username, $password, $dbname);
  $statement = $connection->prepare(
  "UPDATE produkt
  SET Kvantitet = Kvantitet - ?
  WHERE ProduktID = ?;"
  );
  $statement->bind_param("ii", $a, $b);
  $statement->execute();
  

  /* close statement */
  mysqli_stmt_close($statement);

  /* close connection */
  mysqli_close($connection);
}
<<<<<<< Updated upstream

?>
=======
function getImg($test) 
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sinus";

  $connection = new mysqli($servername, $username, $password, $dbname);

  $result = $connection->query("SELECT Bild FROM produkt WHERE ProduktID = $test"); 
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

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Sinus";

    $connection = new mysqli($servername, $username, $password, $dbname);

  if(isset($_POST['buy']))
  {
      if (!empty($_POST['Förnamn'])) 
      {
          $Namn = $_POST['Förnamn'];
          $Gatuadress = $_POST['Gatuaddress'];
          $Postnr = $_POST['Postnr'];
          $Stad = $_POST['Stad'];
          $Telefon = $_POST['Telefon'];

          $connection->query("INSERT into kund (Namn, Gatuadress, Postnr, Stad, Telefon) VALUES ('$Namn', '$Gatuadress','$Postnr', '$Stad', '$Telefon')");
              
  } 
}
}
function getCustomer()
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "Sinus";

  $connection = new mysqli($servername, $username, $password, $dbname);
  $statement = $connection->prepare("SELECT KundID FROM kund ORDER BY KundID DESC LIMIT 1;");
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
  mysqli_close($connection);

  return $arr[0];
  
}
function addOrder($kund){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "Sinus";

  $connection = new mysqli($servername, $username, $password, $dbname);
  
  

    $statement = $connection->prepare("INSERT into orders (KundID, Orderdatum) VALUES ($kund, NOW())");
    $statement->execute();  
    mysqli_stmt_close($statement);
    mysqli_close($connection);
  
}
function getOrder(){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "Sinus";

  $connection = new mysqli($servername, $username, $password, $dbname);
  $statement = $connection->prepare("SELECT OrdersID FROM orders ORDER BY OrdersID DESC LIMIT 1;");
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
  mysqli_close($connection);

  return $arr[0];
}
function orderDetails($orderid, $produktid, $antal){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Sinus";

    $connection = new mysqli($servername, $username, $password, $dbname);

    $connection->query("INSERT into orderdetails (OrdersID, ProduktID, Antal) VALUES ($orderid, $produktid, $antal)");
    $connection->close();      
}

function showProducts()
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "Sinus";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT ProduktID, Färg, Kvantitet, Bild, Pris, Kategori FROM produkt  ORDER BY ProduktID ASC";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
  echo "</td><td>" . $row["ProduktID"] . "</td><td>" . $row["Färg"] . "</td><td>"
  . $row["Kvantitet"]. "</td><td>" .  "<img src=\'data:image/jpg;charset=utf8;base64," 
  . base64_encode($row['Bild']) . ">" . "</td><td>" . $row["Pris"] 
  . "</td><td>" . $row["Kategori"] . "</td><td>" . "</td></tr>";
  }
  echo "</table>";
  } 
  else { echo "0 results"; }

  $conn->close();
}

function editProducts()
{
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
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
  
     $id = $_POST['produktid'];
     $färg = $_POST['färg'];
     $kvantitet = $_POST['kvantitet'];
     $bild = $_POST['bild'];
     $pris = $_POST['pris'];
     $kategori = $_POST['kategori'];
  
  
    $statement = $conn->prepare("UPDATE produkt SET Färg=?, Kvantitet=?, Bild=?, Pris=?, Kategori=? WHERE ProduktID=?");
    $statement->bind_param("sibisi", $färg, $kvantitet, $bild, $pris, $kategori, $id);
    $statement->execute();
  
  
    if ($statement->execute() === TRUE) {
          return "Record updated successfully";
    } 
    else {
      return "Error updating: " . $conn->error;
    }

    /* close statement */
    mysqli_stmt_close($statement);
      
    /* close connection */
    mysqli_close($conn);
  
  }
}


function showOrders()
{

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "Sinus";

  $conn = new mysqli($servername, $username, $password, $dbname);

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



?>
>>>>>>> Stashed changes


