<?php
require_once("header.php");
require_once("functions.php");
?>

<header>
	<h1 class="page-title mt-5" style="text-align:center; color: white; font-family: 'arial'; font-size: 48px;">BERICHTEN</h1>
</header>

<?php

try {

    $inlog = inlog();

    $servername = $inlog["servername"];
    $dbname = $inlog["dbname"];
    $username = $inlog["username"];
    $password = $inlog["password"];
        
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo '<span class="melding">Verbinding is gelukt</span><br /><br />';
    $sql = "SELECT id, title, categorie_id, editor_id, date FROM news";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    //$stmt = $conn->query($sql);
}
catch(PDOException $e) {
    echo '<span class="foutmelding">Fout: ' . $e->getMessage() . '</span><br /><br />';
}

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

while ($row = $stmt->fetch()) {
    echo '<tr>';
    echo '<td>' . $row["id"]. '</td><td>' . $row["title"]. '</td><td>' . $row["categorie_id"]. '</td><td>' . $row["editor_id"]. '</td><td>' . $row["date"]. '</td>';
    echo '<td><a href="nieuws_upd.php?id=' . $row["id"] . '"><i class="fas fa-pencil-alt" style="color:black; font-size:16px"></i></a></td>';
    echo '<td><a href="nieuws_del.php?id=' . $row["id"] . '"><i class="fas fa-trash-alt" style="color:black; font-size:16px"></i></a></td>';
    echo '</tr>';
}

  ?>

</tbody>
</table>
</div>


<?php
    //echo printFooter();
    $conn = null;
?>

    <div><a class="btn btn-primary" type="button" href="nieuws_add.php" style="margin: 30px 200px;">Toevoegen bericht</a></div>

<?php
require_once("footer.php");
?>
