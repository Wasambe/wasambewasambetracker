//comment
var photoname = "";

var strglobal = "";
  var str = "";
  var idvar = "";
  var $idvar = "";
  var idJs = "";
var $idJs = "";
var idPhp = "";
var $idPhp = "";
  var photoid = "";
  var response = ""
  var correctIncorrect = "";
  var photoname = "";
  var searchNameFoundYesNo="";
  var username="";
var userpassword="";
var searchNameOri="";

//var myObjUsers = JSON.parse(localStorage["myObjUsers"]);
//var myObjLoans = JSON.parse(localStorage["myObjLoans"]);
var usernamecheckokyesno = "";
var passwordcheckokyesno = "";


function checkusername(){
	searchNameOri = document.getElementById("searchName").value
	searchName = document.getElementById("searchName").value
searchName = searchName.toUpperCase();

	
	var myObjUsers = JSON.parse(localStorage["myObjUsers"]);
for (i in myObjUsers) {

id=myObjUsers[i].id;
username=myObjUsers[i].username;
	username = username.toUpperCase();

	if (username==searchName){
		usernamecheckokyesno = "yes";
		return;
	}
	}
usernamecheckokyesno = "no";
}


function checkuserpassword(){
	userpassword = document.getElementById("userpassword").value
var myObjUsers = JSON.parse(localStorage["myObjUsers"]);
//for (i in myObjUsers) {

username=myObjUsers[i].username;
passwordobj=myObjUsers[i].userpassword;
	
	if (userpassword==passwordobj){
		passwordcheckokyesno = "yes";
		return;
	}
//	}
passwordcheckokyesno = "no";
}


function mySearch() {
	searchName = document.getElementById("searchName").value
	userpassword = document.getElementById("userpassword").value

		
if (searchName==""){
alert("You must enter a User Name");
return;
}

	
if (userpassword==""){
alert("You must enter a Password");
return;
}


	
	searchNameFoundYesNo="No";
	checkusername();
	checkuserpassword();
	balance();
	
if (usernamecheckokyesno=="no"){
alert(searchNameOri + " is not a valid User Name");
return;
}

	
if (passwordcheckokyesno=="no"){
alert("Password is not correct");
return;
}

 
var x = document.getElementById("myTable").rows.length;
var i=x
while (i > 1) {
 document.getElementById("myTable").deleteRow(1);
  i=i-1;
}

searchName = document.getElementById("searchName").value
searchName = searchName.toUpperCase();
  
  var myObjLoans = JSON.parse(localStorage["myObjLoans"]);
for (i in myObjLoans) {
id=myObjLoans[i].id;

    date=myObjLoans[i].date;
 
  name = myObjLoans[i].name;
  name = name.toUpperCase();

  amountloan=myObjLoans[i].amountloan;
 
 amountpaid=myObjLoans[i].amountpaid;
 
adjustments=myObjLoans[i].adjustments;
 
 balance=myObjLoans[i].balance;
 
 comments=myObjLoans[i].comments;
  
 if (name==searchName){
searchNameFoundYesNo="Yes";
  createTable();
  document.getElementById("myTable").style.visibility = "visible";
   }
   }
  
  
  if (searchNameFoundYesNo=="No"){
alert(searchNameOri + " is not a valid User Name");	 
return;
 }

// var x = document.getElementById("myTable").rows.length;
}



 
 function createTable(){
  var x = document.createElement("TBODY");
      var y = document.createElement("TR");
   var z1 = document.createElement("TD");
 var z2 = document.createElement("TD");
  var z3 = document.createElement("TD");
   var z4 = document.createElement("TD");
    var z5 = document.createElement("TD");
	 var z6 = document.createElement("TD");
	// var z7 = document.createElement("TD");
	 var z8 = document.createElement("TD");
  z1.innerHTML = (id);
 z2.innerHTML = (date);
 z3.innerHTML = (name);
 z4.innerHTML = (amountloan);
 z5.innerHTML = (amountpaid);
 z6.innerHTML = (adjustments);
// z7.innerHTML = (balance);
 z8.innerHTML = (comments);
 
  y.appendChild(z1);
    y.appendChild(z2);
	y.appendChild(z3);
	y.appendChild(z4);
	y.appendChild(z5);
	y.appendChild(z6);
	//y.appendChild(z7);
	y.appendChild(z8);
  x.appendChild(y);
  document.getElementById("myTable").appendChild(x);
}
 
  
function balance(){
	var amountloantotal = 0;
	var amountpaidtotal = 0;
	var adjustmentstotal = 0;
	var balancetotal = 0;
	var balancetotal1 = 0;
	var balancetotal2 = 0;
		
	var myObjLoans = JSON.parse(localStorage["myObjLoans"]);
for (i in myObjLoans) {
id=myObjLoans[i].id;
 date=myObjLoans[i].date;
 
  name = myObjLoans[i].name;
  name = name.toUpperCase();

  amountloan=myObjLoans[i].amountloan;
   
 amountpaid=myObjLoans[i].amountpaid;
 
adjustments=myObjLoans[i].adjustments;
 
 balance=myObjLoans[i].balance;
 
 comments=myObjLoans[i].comments;
  
 if (name==searchName){
//do if here
//var sum = (+num1) + (+num2);
testsum = (0) + (-10);
amountloantotal = (amountloantotal) + (+amountloan);
amountpaidtotal = (amountpaidtotal) + (+amountpaid);
adjustmentstotal = (adjustmentstotal) + (+adjustments);
 
 
document.getElementById("balance").value = (""+balancetotal);
   }
 //end of for i 
 

}
//balancetotal1 = (amountloantotal - amountpaidtotal);
// balancetotal2 = (balancetotal1) + (adjustmentstotal);

 balancetotal = (amountloantotal - amountpaidtotal) + (adjustmentstotal);
 
   document.getElementById("balance").value = (""+balancetotal);
   
 
}

	