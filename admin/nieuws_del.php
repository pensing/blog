<?php
require_once("header.php");
?>

<header>
	<h1 class="page-title mt-5" style="text-align:center; color: white; font-family: 'arial'; font-size: 48px;">BERICHT VERWIJDEREN</h1>
</header>

<div class="table-container">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    

    $servername = "localhost";
    $username = "root";
    $password = "paulus";
    $dbname = "beleef";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $title = $_POST["title"];
    $tekst = $_POST["tekst"];
    $id = $_POST["id"];
    
    $sql = "DELETE FROM news WHERE id=$id";
   
    if (mysqli_query($conn, $sql)) {
        echo '<span class="melding">Bericht met succes verwijderd.</span><br /><br />';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
    

} else {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "paulus";
    $dbname = "beleef";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = 'SELECT  id, title, tekst FROM news WHERE id=' . $id;
    $result = $conn->query($sql);
   
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
        // get data of row to update
        $title = $row["title"];
        $tekst = $row["tekst"];
        $id = $row["id"];
        }
    } else {
        echo "Row niet gevonden.";
    }

    mysqli_close($conn);

    echo '
    Id:
    <input id="" name="id" class="form-control" type="text" value="'.$id.'" style="width:50px" readonly>
    Titel:
    <input id="" name="title" class="form-control" type="text" value="'.$title.'">
    Tekst:
    <input id="" name="tekst" class="form-control" type="text" value="'.$tekst.'">
    
    <input class="button" type="submit" value="Verwijderen" style="margin-top: 50px;">';
    
}
?>
    
</form>
</div>

<div><a class="btn btn-primary" type="button" href="nieuws.php" style="margin: 30px 200px;">Berichten</a></div>

<?php
require_once("footer.php");
 ?>
