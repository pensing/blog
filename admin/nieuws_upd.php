<?php
require_once("header.php");
?>

<header>
	<h1 class="page-title mt-5" style="text-align:center; color: white; font-family: 'arial'; font-size: 48px;">BERICHT WIJZIGEN</h1>
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

    $id = $_POST["id"];
    $title = $_POST["title"];
    $categorie_id = $_POST["categorie_id"];
    $editor_id = $_POST["editor_id"];
    $tekst = $_POST["tekst"];
    $image = $_POST["image"];
    //title, categorie_id, editor_id, tekst, image
    $sql = "UPDATE news SET title= '$title', categorie_id='$categorie_id', editor_id='$editor_id', tekst='$tekst', image='$image' WHERE id=$id";
   
    if (mysqli_query($conn, $sql)) {
        echo '<span class="melding">Bericht met succes geupdate.</span><br /><br />';
    } else {
        echo '<span class="foutmelding">Fout: ' . $sql . "<br>" . mysqli_error($conn) . '</span><br /><br />';
        //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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


    $sql = 'SELECT  id, title, categorie_id, editor_id, tekst, image FROM news WHERE id=' . $id;
    $result = $conn->query($sql);
   
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
        // get data of row to update
        $id = $row["id"];
        $title = $row["title"];
        $categorie_id = $row["categorie_id"];
        $editor_id = $row["editor_id"];
        $tekst = $row["tekst"];
        $image = $row["image"];
        }
    } else {
        echo "Row niet gevonden.";
    }

    mysqli_close($conn);

}
?>

Id:
<input id="" name="id" class="form-control" type="text" value="<?php echo $id; ?>"" style="width:50px" readonly>
Titel:
<input id="" name="title" class="form-control" type="text" value="<?php echo $title; ?>">
Categorie:
<input id="" name="categorie_id" class="form-control" type="text" value="<?php echo $categorie_id; ?>">
Editor:
<input id="" name="editor_id" class="form-control" type="text" value="<?php echo $editor_id; ?>">
Tekst:
<textarea class="form-control" name="tekst" rows="3" cols="120"><?php echo htmlspecialchars($tekst); ?></textarea>
Plaatje:
<input id="" name="image" class="form-control" type="text" value="<?php echo $image; ?>">

<input class="button" type="submit" value="Opslaan" style="margin-top: 50px;">
    
</form>
</div>

<div><a class="btn btn-primary" type="button" href="nieuws.php" style="margin: 30px 200px;">Berichten</a></div>

<?php
require_once("footer.php");
 ?>
