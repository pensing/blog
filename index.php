<?php
require_once("admin/functions.php");
require_once("admin/database.php");
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!--meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- Extra CSS -->
    <link rel="stylesheet" href="admin/admin.css" />
    <link rel="stylesheet" href="blog.css" />

    <title>Blog</title>
</head>

<body>

	<header>
    <nav class="navbar navbar-dark bg-primary justify-content-between">
        <a class="navbar-brand" href="admin/login.php">Inloggen</a>
        <h1 class="page-title mt-0 mb-0" style="text-align:center; color: white; font-family: 'arial'; font-size: 32px;">Paul's Easy Blog System</h1>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Zoek..." aria-label="Search">
            <button class="btn btn-primary my-2 my-sm-0 active" type="submit">Zoek</button>
        </form>
    </nav>
	</header>

<?php

try {

    // Create connection
    $conn = DB();
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //$sql = "SELECT id, title, categorie_id, editor_id, date FROM news";
    $sql = "SELECT * FROM news WHERE 1 ORDER BY create_date";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    //$stmt = $conn->query($sql);
}
catch(PDOException $e) {
    echo foutMelding($e->getMessage());
}

echo '<ul class="list-unstyled">';

if (true) {
    // output data of each row
    while($row = $stmt->fetch()) {
    // output data of each row
    //print_r($row);

    if (file_exists('admin/uploads/'.$row["image_filename"])) {
        $fname='admin/uploads/'.$row["image_filename"];
    } else {
        $fname="images/default.jpg";
    }


    echo '
    <li class="media medialist">
      <img class="mr-3" src="'.$fname.'" width="350px" alt="Generic placeholder image">
      <div class="media-body">
        <h2 class="mt-0 mb-1 text-primary">'.$row["title"].'</h2>
        <p class="card-text">'.$row["create_date"].'</p>
        '.$row["tekst"].'
        <a href="article.php?id='.$row["id"].'" class="btn btn-primary readbutton" role="button">LEES VERDER</a>
      </div>
    </li>';


    }
} else {
    echo "0 results";
}

echo '</ul>';


?>

<?php
    //echo printFooter();
    //mysqli_close($conn);
    $conn = null;
?>

<footer id="" class="site-footer">
    <div class="site-info text-white text-center">Powered by PEBS - the easy blog system</div>
</footer>

</body>
</html>
