<?php
//12 May 2020
$idOK='';
$CrudOptionOK='';
$CrudOptionErr='';
$idErr='';
$CrudOption='';

$id='';
$date= $name= $amountloan= $amountpaid= $adjustments='';
$balance=  $comments='';

//$CrudOption = ($_POST['CrudOption']);
//echo $CrudOption;
//echo ($_POST['id']);
//echo ($_POST['date']);


//if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["id"])) {
    $idErr = "Node UID  is required";
	//exit('this is exit');
  } else {
	  $idOK = 'ok';
	  $id = ($_POST['id']);
   echo $id;
   //$CrudOption = ($_POST['CrudOption']);
   // echo $CrudOption;
  }
  
   if (empty($_POST["CrudOption"])) {
    $CrudOptionErr = "Crud Option  is required";
	} else {
		$CrudOptionOK = 'ok';
	  $CrudOption = ($_POST['CrudOption']);
   echo $CrudOption;
   //$CrudOption = ($_POST['CrudOption']);
   // echo $CrudOption;
  }
  
  
 
//}

If ($idOK=='ok' && $CrudOptionOK=='ok'){

 echo ('Labdah');
 $id = $_POST["id"];
$date = $_POST["date"];
$name = $_POST["name"];
$amountloan = $_POST["amountloan"];
$amountpaid = $_POST["amountpaid"];
$adjustments = ($_POST['adjustments']);
$balance = ($_POST["balance"]);
$comments=$_POST["comments"];
	
	
	
	
 	//000WebHost Settings
$servername = "localhost";
$username = "id4184148_localhost";
$password = "We135711!";
$dbname = "michaelwilsontracker";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());
}

$connYesNo = ("SqlDB connection successful");
	
echo ($connYesNo);
//echo ($Crud);	

mysqli_select_db($conn,"michaelwilsontracker");


If ($CrudOption == "insert"){
          //sql here
		  $sql = "INSERT INTO loans (id, date, name, amountloan,
		  amountpaid, adjustments, balance, comments)
VALUES ('".$id."', '".$date."', '".$name."',
'".$amountloan."', '".$amountpaid."', '".$adjustments."',
'".$balance."',  '".$comments."')";

$result = mysqli_query($conn,$sql);
echo ("This is end of SQL Insert");
}elseIf ($CrudOption == "delete"){
		 //sql here
	$sql = "DELETE FROM loans WHERE id = '".$id."'";
	$result = mysqli_query($conn,$sql);
echo ("This is end of SQL DELETE");
   mysqli_close($conn);

}elseIf ($CrudOption == "select"){
   echo ("This is start of SQL Select");
	 //sql here

 $sql = "SELECT * FROM loans WHERE id = '".$id."'";
	$result = mysqli_query($conn,$sql);
	
$rowcount = mysqli_num_rows($result);
echo ($rowcount);
if ($rowcount == 0){
	echo ("This id not found");
	$id="";
	}
	
	 while ($row = mysqli_fetch_array($result)){   
	 $id=$row['id'];
	 $date=$row['date'];
	 $name=$row['name'];
	 $amountloan=$row['amountloan'];
	 $amountpaid=$row['amountpaid'];
	 $adjustments=$row['adjustments'];
	 $balance=$row["balance"];
	 $comments=$row["comments"];
	 
	 
	
	 echo ($id. "   ".$date. "   ".$amountpaid);
	 
  }
  
   echo ("This is end of SQL Select");
   mysqli_close($conn);
}elseif ($CrudOption == "update"){
	 //sql here
	 
	 echo ("This is elseif update");
	 echo ($id. "   ".$date. "   ".$name. "   ".$amountloan. "   
	  ".$amountpaid. "   ".$adjustments." ".$balance." ".$PlaceOfBirthCity);
	  
	 $sql="UPDATE loans SET date = '".$date."', 
	 MiddleName = '".$name."',
	 MaidenName = '".$amountloan."', 
	 LastName = '".$amountpaid."', NickName = '".$adjustments."',
	 DateOfBirth = '".$balance."', 
		comments = '".$comments."'
	   WHERE id = '".$id."'";
   
$result = mysqli_query($conn,$sql);
echo ("This is end of SQL Update");
   mysqli_close($conn);
}

}
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="jquery-3.3.1.js"></script>
<script src="myJsFunctions.js"></script>
<style>
table, th, td {
  border: 1px solid black;
}

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>


<script>
var myTable = document.getElementById("myTable");
var myObj = JSON.parse(localStorage["myObj"]);
var rowIndex;
</script>
  
 </head>
<body>


<a href="index.html">Main Menu</a><br>
<a href="adminMenu.php"> Admin Menu</a><br>

Enter Date or Nick Name:<br>

  <input id="searchName" type="text"><br><br>
  <button id="SearchButton" onclick="mySearch()">Search</button><br><br>
  
  <p id="demo"></p>
  
   <script>
//document.getElementById("demo").innerHTML=myObj;
</script>
   <script>
var input = document.getElementById("searchName");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("SearchButton").click();
  }
});

</script> 
  
 <p id="clickForDetails">Click on family member's name for photo and details.</p>
<table id="myTable">
  <tr>
    <th>ID</th>
    <th>Date</th>
    <th>Name</th>
	<th>Amount Loan</th>
    <th>Amount Paid</th>
    <th>Adjustments</th>
	    <th>Balance</th>
      <th>Comments</th>
  
  </tr>
  </table>
  
  <script>
	document.getElementById("myTable").style.visibility = "hidden";
			document.getElementById("clickForDetails").style.visibility = "hidden";
 </script>  

  
  <br>
<div id='imageholder'>
<p></p>
</div>


<h2>CRUD</h2>
<form name="formCrud" action="adminCrud.php "method="POST" >
<select name='CrudOption'>
<option value=''></option>
<option value='delete'>Delete</option>
<option value='insert'>Insert</option>
<option value='select'>Select</option>
<option value='update'>Update</option>
</select>
<input type="submit" name="submit" value="Submit"><br><br>  

 <div>
<label for="node">ID:</label>
<input type='text' id='node' name='id' value="<?php echo $id;?>"><br>
 </div>
 
  <div>
<label for="first">Date:</label>
 <input type="text" id='first' name="date" autocomplete='off' value="<?php echo $date;?>"><br>
 </div>
 
  <div>
<label for="middle">Name:</label>
<input type="text" id='middle' name="name" autocomplete='off' value="<?php echo $name;?>"><br>
 </div>

  <div>
<label for="maiden">Amount Loan:</label>
<input type="text" id='maiden' name="amountloan" autocomplete='off' value="<?php echo $amountloan;?>"><br>
 </div>


<label for="last">Amount Paid:</label>
 <input  id='last'  type="text" name="amountpaid" value="<?php echo $amountpaid;?>"><br>

<label for="nick">Adjustments:</label>
<input  id='nick'  type="text" name="adjustments" value="<?php echo $adjustments;?>"><br>


Balance: <input type="text" name="balance" value="<?php echo $balance;?>"><br>
Comments: <input type="text" name="comments" value="<?php echo $comments;?>"><br>


<span class="error"> <?php echo $idErr;?></span>
<span class="error"> <?php echo $CrudOptionErr;?></span>
</form>

 </body>
</html>


