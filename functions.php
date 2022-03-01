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
?>