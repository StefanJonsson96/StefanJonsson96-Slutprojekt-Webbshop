<?php
function getImg() 
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sinus";

  $connection = new mysqli($servername, $username, $password, $dbname);

  $result = $connection->query("SELECT Bild FROM produkt WHERE ProduktID = 112"); 
?>

<?php if($result->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = $result->fetch_assoc()){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Bild']); ?>" /> 
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php }

}
getImg();
?>