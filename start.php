<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!--meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<!-- Extra CSS -->
	<link rel="stylesheet" href="calculator.css" />
	
	<script type="text/javascript" src="calculator.js"></script>
	
     <title>Calculator</title>
  </head>
  
  <body>
  
<!-- Kop/header -->
<div class="container-fluid align-middle" style="text-align:center;background-color:transparent;height:100vh;">

  <h2 class="display-2 text-white font-weight-bold pt-4" style="color:#cd1414 !important">Calculator</h2>

  <div style="margin:auto;width:300px;height:450px;">
 
  	   <div id="display" style="margin-top:50px; width:290px; height: 40px; margin-left:5px; background-color:black; color:white; font-size:24px">
	   		<span></span>
	   </div>
 
  	   <div id="total" style="width:290px; height: 40px; margin-left:5px; margin-top:20px; margin-bottom:20px; background-color:#cd1414; color:white; font-size:24px">
	   		0
	   </div>
 
  	   <div id="subtotal" style="display: none; width:290px; height: 40px; margin-left:5px; margin-top:20px; margin-bottom:20px; background-color:blue; color:white; font-size:24px">
	   		0
	   </div>
 
 
  	   <div style="width:100%">
	   		<div class="knop" onclick="toets(7)">7</div><div class="knop" onclick="toets(8)">8</div><div class="knop" onclick="toets(9)">9</div><div class="knop" onclick="toets('/')">/</div>
	   </div>

  	   <div style="width:100%">
	   		<div class="knop" onclick="toets(4)">4</div><div class="knop" onclick="toets(5)">5</div><div class="knop" onclick="toets(6)">6</div><div class="knop" onclick="toets('*')">*</div>
	   </div>

  	   <div style="width:100%">
	   		<div class="knop" onclick="toets(1)">1</div><div class="knop" onclick="toets(2)">2</div><div class="knop" onclick="toets(3)">3</div><div class="knop" onclick="toets('-')">-</div>
	   </div>

  	   <div style="width:100%">
	   		<div class="knop" onclick="toets(0)">0</div><div class="knop" onclick="toets('.')">.</div><div class="knop" onclick="toets('=')">=</div><div class="knop" onclick="toets('+')">+</div>
	   </div>
  
  </div>

  <div style="margin:auto;width:300px;height:auto;">
 
  	   <div id="clear" onclick="toets('c')" style="margin-top:50px; width:290px; height: 40px; margin-left:5px; background-color:yellow; color:black; font-size:24px; font-weight:bold">
	   		<span>C</span>
	   </div>

  </div>
 
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
