<?php
require_once("header.php");
?>

<header>
	<h1 class="page-title mt-5" style="text-align:center; color: white; font-family: 'arial'; font-size: 48px;">BERICHTEN</h1>
</header>

<?php
// Check connection
/*if (connected()) {
    echo "Connected successfully";   
} else { die("Connection failed"); }*/

$servername = "localhost";
$username = "root";
$password = "paulus";
$dbname = "beleef";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";


?>

<div class="table-container">
<table class="table" style="width: auto; margin: auto;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Categorie</th>
      <th scope="col">Editor</th>
      <th scope="col">Datum</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

  <?php

$sql = "SELECT id, title, categorie_id, editor_id, date FROM news";
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    // output data of each row
        echo '<tr>';
        echo '<td>' . $row["id"]. '</td><td>' . $row["title"]. '</td><td>' . $row["categorie_id"]. '</td><td>' . $row["editor_id"]. '</td><td>' . $row["date"]. '</td>';
        echo '<td><a href="nieuws_upd.php?id=' . $row["id"] . '"><i class="fas fa-pencil-alt" style="color:black; font-size:16px"></i></a></td>';
        echo '<td><a href="nieuws_del.php?id=' . $row["id"] . '"><i class="fas fa-trash-alt" style="color:black; font-size:16px"></i></a></td>';
        echo '</tr>';
    }
} else {
    echo "0 results";
}

  ?>

</tbody>
</table>
</div>

<?php
    //echo printFooter();
    mysqli_close($conn);
?>

    <div><a class="btn btn-primary" type="button" href="nieuws_add.php" style="margin: 30px 200px;">Toevoegen bericht</a></div>

<?php
require_once("footer.php");
?>
