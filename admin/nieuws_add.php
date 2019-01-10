<?php
require_once("header.php");
?>

<header>
    <h1 class="page-title mt-5" style="text-align:center; color: white; font-family: 'arial'; font-size: 48px;">NIEUW BERICHT</h1>
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
    $image = $_POST["image"];
    
    $sql = "INSERT INTO news (title, categorie_id, editor_id, tekst, image)
    VALUES ('$title', 1, 1, '$tekst', '$image')";
    
    if (mysqli_query($conn, $sql)) {
        echo '<span style="color: green; margin-bottom: 20px;">Nieuw bericht met succes toegevoegd.</span><br /><br />';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
    

} else {
    $title = $categorie_id = $editor_id = $tekst = $image = '';
}
?>

Titel:
<input id="" name="title" class="form-control" type="text" value="<?php $title; ?>">
Categorie:
<input id="" name="categorie_id" class="form-control" type="text" value="<?php $categorie_id; ?>">
Editor:
<input id="" name="editor_id" class="form-control" type="text" value="<?php $editor_id; ?>">
Tekst:
<textarea class="form-control" name="tekst" rows="3" cols="120"><?php echo htmlspecialchars($tekst); ?></textarea>
Plaatje:
<input id="" name="image" class="form-control" type="text" value="<?php $image; ?>">
<input type="file" class="form-control-file" id="exampleFormControlFile1">
<input class="button" type="submit" value="OK" style="margin-top: 50px;">
    
</form>
</div>

<div><a class="btn btn-primary" type="button" href="nieuws.php" style="margin: 30px 200px;">Berichten</a></div>

<?php
require_once("footer.php");
 ?>
