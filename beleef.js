total=0;
subtotalstr="";
lastoperator="+";

function totalfunction(op) {
 st = parseFloat(subtotalstr);
 
 switch (lastoperator) {
  case "/":
   count = total / st;
   break;
  case "*":
   count = total * st;
   break;
  case "-":
   count = total - st;
   break;
  case "+":
   count = total + st;
   break;
  case "=":
   count = total + st;
   break;
 }
 lastoperator = op;
 return count;
}

function toetsuit(t) {
 alert("Toets '"+t+"' is niet actief");
}

function doop(op) {


if (op == "=") {
	if (subtotalstr == "") { alert("Eerst een getal invoeren!"); } 
	else {
    document.getElementById("display").innerHTML = "";
	total = totalfunction(op);
    document.getElementById("total").innerHTML = total;
	total = 0;
	subtotalstr = "";
    document.getElementById("subtotal").innerHTML = subtotalstr;
	lastoperator = op;}
} else {
	if (subtotalstr == "") { alert("Eerst een getal invoeren!"); } 
	else {
    document.getElementById("display").innerHTML += op;
	total = totalfunction(op);
    document.getElementById("total").innerHTML = total;
    document.getElementById("subtotal").innerHTML = subtotalstr;
	subtotalstr = "";
	lastoperator = op;}
}


}

function toets(t) {
switch (t) {
  case "c":
	total = 0;
	subtotalstr = "";
    document.getElementById("display").innerHTML = "";
    document.getElementById("total").innerHTML = "0";
    document.getElementById("subtotal").innerHTML = subtotalstr;
    break;
  case 0:
    document.getElementById("display").innerHTML += "0";
	subtotalstr += "0";
    break;
  case 1:
    document.getElementById("display").innerHTML += "1";
	subtotalstr += "1";
    break;
  case 2:
    document.getElementById("display").innerHTML += "2";
	subtotalstr += "2";
    break;
  case 3:
    document.getElementById("display").innerHTML += "3";
	subtotalstr += "3";
    break;
  case 4:
    document.getElementById("display").innerHTML += "4";
	subtotalstr += "4";
    break;
  case 5:
    document.getElementById("display").innerHTML += "5";
	subtotalstr += "5";
    break;
  case 6:
    document.getElementById("display").innerHTML += "6";
	subtotalstr += "6";
    break;
  case 7:
    document.getElementById("display").innerHTML += "7";
	subtotalstr += "7";
    break;
  case 8:
    document.getElementById("display").innerHTML += "8";
	subtotalstr += "8";
    break;
  case 9:
    document.getElementById("display").innerHTML += "9";
	subtotalstr += "9";
    break;
  case ".":
    document.getElementById("display").innerHTML += ".";
	subtotalstr += ".";
    break;

  case "/":
	doop("/");
    break;
  case "*":
	doop("*");
    break;
  case "-":
	doop("-");
    break;
  case "+":
	doop("+");
    break;
  case "=":
	doop("=");
    break;
}
}