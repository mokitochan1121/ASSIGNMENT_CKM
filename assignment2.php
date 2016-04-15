<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "11211985";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");

$username=$_POST['username'];
$password=$_POST['password'];
$usernameErr = $passwordErr= '';

 
     // check if name only contains letters and whitespace
	 mysql_select_db("assignment", $connection) or die("Could not select database");
	 $sql = "SELECT * FROM membership WHERE LOGIN='$username'";
	$result = mysql_query($sql) or die("Could not issue MySQL query");
	 $row = mysql_fetch_array($result);	 
	 //echo $row['LOGIN'];
	 
	 if($row['LOGIN']!=''){
	$usernameErr = "Welcome Home !";
      
     }else{ 

	  $usernameErr = "No Record !";	  
	 }
   


 
   

if( $usernameErr != '' || $passwordErr != '' ){
	echo $usernameErr;
} else {
     mysql_select_db("assignment", $connection) or die("Could not select database");
$result = mysql_query("INSERT INTO membership VALUES (null,'$username','$password',CURRENT_TIMESTAMP)") or die("Could not issue MySQL query");


echo "Welcome Home !";
}



?>