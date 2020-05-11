<!DOCTYPE html>
<html>
<head>

<script>

</script>

</head>
<body>



<a href="index.html">Main Menu</a><br>
<a href="adminMenu.php"> Admin Menu</a><br><br>

<button onclick="createItems()">Create local storage items</button><br><br>
<button onclick="displayItems()">Display items</button>
<p id="displayItemsHere"></p><br>
<button onclick="deleteItems()">Delete items</button><br>

<!--
<select id="mySelect"/><br>

-->


<script>
function createItems() {
//alert("Under Test");
  localStorage.setItem("mytime", Date.now());
  localStorage.setItem("myname", "Theopolus");
  localStorage.setItem("myage", 36);
  localStorage.setItem("myThing", "Peace and Love");
  //localStorage.setItem("myObjLoans", "jsonMyObjLoans.txt");
  //localStorage.setItem("myObjUsers", "jsonMyObjLoans.txt");
   mySelect.remove();
loadDropDownList();
}

function deleteItems(){

var mySelectValue = document.getElementById("mySelect").value;
 if (mySelectValue==("Delete All Local Storage")){
 localStorage.clear();
 }else{
 localStorage.removeItem(mySelectValue);
 }
 mySelect.remove();
loadDropDownList();
}

function deleteItemsdropdown() {
//alert("Under Test");
var mySelectDelete = document.getElementById("mySelect");
 var msdi = document.getElementById("mySelect").selectedIndex;
  var deleteThisOption=(document.getElementsByTagName("option")[msdi].value);
  //localStorage.clear();
 // localStorage.removeItem("myObj");
 if (deleteThisOption==("Delete All Local Storage")){
 localStorage.clear();
 }else{
 localStorage.removeItem(deleteThisOption);
 //mySelectDeleteLength = document.getElementById("mySelect").length;
 //for (i = 0;  i < mySelectDelete.length; i++) {
  //localStorage.removeItem(0);
}
var elmnt = document.getElementById("mySelect");
elmnt.remove();
loadDropDownList();
}


function displayItems() {
  var l, i;
  document.getElementById("displayItemsHere").innerHTML = "";
  for (i = 0; i < localStorage.length; i++) {
  x = localStorage.key(i);
  //alert(x);
  document.getElementById("displayItemsHere").innerHTML += x + "<br>";
  }
}
</script>



<script>
loadDropDownList();
function loadDropDownList(){
//var mySelect = document.getElementById("mySelect");
var mySelect = document.createElement("select", "mySelect");
mySelect.setAttribute("id", "mySelect");
//alert(mySelect.id);
var lst, i;
lst =  ("Delete All Local Storage");
var  option = document.createElement("option");
 option.text = (lst);
  mySelect.add(option);
   for (i = 0; i < localStorage.length; i++) {
  lst = localStorage.key(i);
  option = document.createElement("option");
  option.text = lst;
  mySelect.add(option);
}
document.body.append(mySelect);
}
  </script>


</body>
</html>
