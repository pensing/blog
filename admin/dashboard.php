<?php
require_once("header.php");
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
				<header>
					<h1 class="page-title" style="text-align:center; color: white; font-family: 'arial'; font-size: 48px;">Dashboard</h1>
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
echo "Connected successfully";


?>


				<div class="" style="margin: auto;">
<table class="table table-sm table-light" style="width: auto; margin: auto;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Text</th>
    </tr>
  </thead>
  <tbody>

  <?php

$sql = "SELECT id, title, tekst FROM news";
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    // output data of each row
        echo "<tr>";
        echo "<td>" . $row["id"]. "</td><td>" . $row["title"]. "</td><td>" . $row["tekst"]. "</td>";
        echo "</tr>";
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


		</main>
	</div>

<?php
require_once("footer.php");
 ?>
