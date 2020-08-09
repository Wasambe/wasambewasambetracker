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
	$sql = "SELECT * FROM loans";
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

$myObjLoans = json_encode($data);
echo $myObjLoans;



// PHP program to delete a file named gfg.txt  
// using unlike() function  
   
$file_pointer = "jsonMyObjLoans.txt";  
   
// Use unlink() function to delete a file  
if (!unlink($file_pointer)) {  
    echo ("$file_pointer cannot be deleted due to an error");  
}  
else {  
    echo ("$file_pointer has been deleted");  
}  
 



$myfile = fopen("jsonMyObjLoans.txt", "w") or die("Unable to open file!");
$txt = $myObjLoans;
fwrite($myfile, $txt);
fclose($myfile);
?>
