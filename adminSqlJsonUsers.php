<html>
<a href="index.html">Main Menu</a><br>
<a href="adminMenu.php"> Admin Menu</a><br>
</html>

<?php
 	//000WebHost Settings
$servername = "localhost";
$username = "id4184148_localhost";
$password = "We135711!";
$dbname = "michaelwilsontracker";


//connect to database
$conn = @mysqli_connect($servername, $username, $password, $dbname) or die("Couldn't connet to database.");

//echo "Connected successfully";

 $NodeUID = "1";
 //$sql = "SELECT * FROM testtable WHERE NodeUID = '".$NodeUID."'";
	$sql = "SELECT * FROM users";
	$result = mysqli_query($conn,$sql);
	
	$rowcount = mysqli_num_rows($result);

 if(!$result){ echo "Couldn't execute the query"; die();}
else{
 //creates an empty array to hold data
 $data = array();
  while($row = mysqli_fetch_assoc($result)){
    $data[]=$row;
	  }
}

$myObjUsers = json_encode($data);
echo $myObjUsers;

$myfile = fopen("jsonMyObjUsers.txt", "w") or die("Unable to open file!");
$txt = $myObjUsers;
fwrite($myfile, $txt);
fclose($myfile);
?>
