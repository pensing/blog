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
    
    $id = $_POST["id"];
    $title = $_POST["title"];
    $categorie_id = $_POST["categorie_id"];
    $editor_id = $_POST["editor_id"];
    $tekst = $_POST["tekst"];
    $image_filename = $_POST["image_filename"];

    try {
        // Create connection
        $conn = DB();
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
        $statement = $conn->prepare('INSERT INTO news (title, categorie_id, editor_id, tekst, image) VALUES (:title, :categorie_id, :editor_id, :tekst, :image)');
        $statement->execute([
            'title'=>$_POST['title'],
            'categorie_id'=>$_POST['categorie_id'],
            'editor_id'=>$_POST['editor_id'],
            'tekst'=>$_POST['tekst'],
            'image'=>$_POST['image']
        ]);

    echo '<span class="melding">Nieuw bericht met succes toegevoegd.</span><br /><br />';
    
    }

    catch(PDOException $e)
    {
        echo foutMelding($e->getMessage());
    }
    
    $conn = null;

    $title = $categorie_id = $editor_id = $tekst = $image = '';        

} else {
    $title = $categorie_id = $editor_id = $tekst = $image = '';
}
?>

<div style="width: 100%;">
    <div class="form-group" style="float:left; width: 10%; padding-right: 15px;">
    Id:
    <input id="" name="id" class="form-control" type="text" value="<?php echo $id; ?>" style="width:100%;" readonly>
    </div>
    <div class="form-group" style="float:left; width: 45%; padding-right: 15px;">
    Categorie:
    <input id="" name="categorie_id" class="form-control" type="text" value="<?php echo $categorie_id; ?>" style="width: 100%;">
    </div>
    <div class="form-group" style="float:left; width: 45%; padding-right: 15px;">
    Editor:
    <input id="" name="editor_id" class="form-control" type="text" value="<?php echo $editor_id; ?>" style="width: 100%;">
    <select name="editor_id" class="form-control">
    <option value="1">Paul</option>
    <option value="2">Paulus</option>
    <option value="3">Gorilla</option>
    </select>
    </div>
    <div class="form-group" style="float:left; width: 100%;">
    <label style="width: 100%; float: left;">Plaatje:</label>
    <input id="" name="image_filename" class="form-control" type="text" value="<?php echo $image_filename; ?>" style="width: 49%; float: left; margin-right: 2%;" readonly>
    <input id="" name="filename" class="form-control" type="file" style="width: 49%; float: left;">
    </div>
</div>
<div style="width: 100%;">
    <div class="form-group">
    <label>Titel:</label>
    <input id="" name="title" class="form-control" type="text" value="<?php echo $title; ?>">
    </div>
    Tekst:
    <textarea class="form-control" name="tekst" rows="3" cols="120"><?php echo htmlspecialchars($tekst); ?></textarea>

    <input class="btn btn-primary" type="submit" value="Opslaan" style="margin-top: 50px;">
</div>    

</form>
</div>

<?php
require_once("footer.php");
 ?>
