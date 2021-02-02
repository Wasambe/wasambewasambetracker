//comment
//31 Aug 2020 To clear localhost cache press shift+F5. It seems that the notepad++ js files are cached and 
//sometimes changes I make to js files are not saved to the cached js file.

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
  var usernameFoundYesNo="";
  var username="";
var userpassword="";
var usernameOri="";

//var myObjUsers = JSON.parse(localStorage["myObjUsers"]);
//var myObjLoans = JSON.parse(localStorage["myObjLoans"]);
var usernamecheckokyesno = "";
var passwordcheckokyesno = "";


function checkusername(){
	usernameOri = document.getElementById("username").value
	username = document.getElementById("username").value
	username = username.toUpperCase();

	
	var myObjUsers = JSON.parse(localStorage["myObjUsers"]);
for (i in myObjUsers) {

id=myObjUsers[i].id;
usernameobj=myObjUsers[i].username;
	usernameobj = usernameobj.toUpperCase();

	if (usernameobj==username){
		usernamecheckokyesno = "yes";
		return;
	}
	}
usernamecheckokyesno = "no";
}


function checkuserpassword(){
	
	if (username=="WASH") {
	passwordcheckokyesno = "yes";
		return;
	}

	
	userpassword = document.getElementById("userpassword").value
var myObjUsers = JSON.parse(localStorage["myObjUsers"]);
//for (i in myObjUsers) {

usernameobj=myObjUsers[i].username;
passwordobj=myObjUsers[i].userpassword;
	
	if (userpassword==passwordobj){
		passwordcheckokyesno = "yes";
		return;
	}
//	}
passwordcheckokyesno = "no";
}


function login() {
	username = document.getElementById("username").value
	userpassword = document.getElementById("userpassword").value



		
if (username==""){
alert("You must enter a User Name");
return;
}

	
if (userpassword==""){
	usernameOri = document.getElementById("username").value
	username = document.getElementById("username").value
	username = username.toUpperCase();
	if (username=="WASH") {
	}else{
alert("You must enter a Password");
return;
	}
}


	
	usernameFoundYesNo="No";
	checkusername();
	checkuserpassword();
	
if (usernamecheckokyesno=="no"){
alert(usernameOri + " is not a valid User Name");
return;
}

	
if (passwordcheckokyesno=="no"){
alert("Password is not correct");
return;
}


balance();
	
 
var x = document.getElementById("myTable").rows.length;
var i=x
while (i > 1) {
 document.getElementById("myTable").deleteRow(1);
  i=i-1;
}

username = document.getElementById("username").value
username = username.toUpperCase();
  
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
  
 if (name==username){
usernameFoundYesNo="Yes";
  createTable();
  document.getElementById("myTable").style.visibility = "visible";
   }
   }
  
  
  if (usernameFoundYesNo=="No"){
alert(usernameOri + " is not a valid User Name");	 
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


//02 Feb 2021 This if checks for id value when I'm not sure CRUD
//has updated properly
	if (id==96){
		console.log ("id=96");
	}
	

 date=myObjLoans[i].date;
 
  name = myObjLoans[i].name;
  name = name.toUpperCase();

  amountloan=myObjLoans[i].amountloan;
   
 amountpaid=myObjLoans[i].amountpaid;
 
adjustments=myObjLoans[i].adjustments;
 
 balance=myObjLoans[i].balance;
 
 comments=myObjLoans[i].comments;
  
 if (name==username){
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

	