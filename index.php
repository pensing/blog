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
    <!--link rel="stylesheet" href="style.css" /-->
    <!--link rel="stylesheet" href="beleef.css" /-->
    <link rel="stylesheet" href="admin/admin.css" />

    <title>Blog</title>
</head>

<body>

	<header>
		<h1 class="page-title mt-5" style="text-align:center; color: white; font-family: 'arial'; font-size: 48px;">PAUL's Blog</h1>
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

<?php

$sql = "SELECT id, title, tekst, date FROM news";
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    // output data of each row

    echo '
    <div class="card mb-5 mt-5" style="width: 50%; margin: auto;">
    <img class="card-img-top" src="images/bg.jpg" alt="Card image cap">
    <div class="card-body">
    <h5 class="card-title">'.$row["title"].'</h5>
    <p class="card-text">'.$row["tekst"].'</p>
    <p class="card-text">'.$row["date"].'</p>
    </div>
    </div>';


        //echo $row["id"].'<br />';
    }
} else {
    echo "0 results";
}

?>

<?php
    //echo printFooter();
    mysqli_close($conn);
?>

<footer id="" class="site-footer">
    <div class="site-info">
    </div>
</footer>

</body>
</html>
