<?php
require_once("header.php");
require_once("functions.php");
?>

<header>
    <h1 class="page-title mt-5" style="text-align:center; color: white; font-family: 'arial'; font-size: 48px;">NIEUW BERICHT</h1>
</header>

<div class="table-container">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $title = $_POST["title"];
    $categorie_id = $_POST["categorie_id"];
    $editor_id = $_POST["editor_id"];
    $tekst = $_POST["tekst"];
    $image = $_POST["image"];

    try {
        //$conn = connectpdo();
    
        $inlog = inlog();   
    
        //$servername = "localhost";
        //$username = "root";
        //$password = "paulus";
        //$dbname = "blog";
        $servername = $inlog["servername"];
        $dbname = $inlog["dbname"];
        $username = $inlog["username"];
        $password = $inlog["password"];
            
        // Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
    
    $sql = "INSERT INTO news (title, categorie_id, editor_id, tekst, image) VALUES ('$title', 1, 1, '$tekst', '$image')";

    $conn->exec($sql);
    
    echo '<span class="melding">Nieuw bericht met succes toegevoegd.</span><br /><br />';
    
    }

    catch(PDOException $e)
    {
        //echo '<span class="foutmelding">Fout: ' . $sql . "<br>" . mysqli_error($conn) . '</span><br /><br />';
        echo '<span class="foutmelding">Fout: ' . $e->getMessage() . '</span><br /><br />';
    }
    
    $conn = null;

    $title = $categorie_id = $editor_id = $tekst = $image = '';        

} else {
    $title = $categorie_id = $editor_id = $tekst = $image = '';
}
?>

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
<input type="file" class="form-control-file" id="exampleFormControlFile1">
<input class="button" type="submit" value="OK" style="margin-top: 50px;">
    
</form>
</div>

<div><a class="btn btn-primary" type="button" href="nieuws.php" style="margin: 30px 200px;">Berichten</a></div>

<?php
require_once("footer.php");
 ?>
