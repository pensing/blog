//https://api.themoviedb.org/3/movie/550?api_key=2bf9f936ec30a8155863bc128fcce7be


<html>

<head>
</head>

<body>

<?php
$homepage = file_get_contents('https://api.themoviedb.org/3/movie/550?api_key=2bf9f936ec30a8155863bc128fcce7be');
$data=json_decode($homepage, true);
print_r($data["original_title"]);
//print_r($data);

//poulecode reguliere competitie ophalen, $pc_regulier
foreach($data as $row){ 
	//echo $row[poulecode] . '-'; 
	//echo $row[teamcode] . '-'; 
	
}
?>

</body>