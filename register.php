<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "11211985";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");

parse_str(file_get_contents('php://input'),$post_vars);

$usernameErr = $passwordErr= '';

 if (empty($post_vars['username'])) {
     $usernameErr =  "Username is required !";
   } else {
     $username = $post_vars["username"];
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
       $usernameErr = "Only letter is allowed"; 
     }
   }


 if (empty($post_vars["password"])) {
     $passwordErr =  "Password is required !";
   } else {
     $password = $post_vars["password"];
     // check if name only contains fingurs
	 $password_length = strlen($password);
      if ($password_length < 8 || $password_length > 15) {
          $passwordErr =  "Your password must contain 8-15 characters !";
     }
   } 
   

$userFlag = $passwordFlag = true;
if( $usernameErr != '') {
	echo $usernameErr;
	echo " ";
	$userFlag = false;	
}
if( $passwordErr !=''){
	echo $passwordErr;	
	$passwordFlag = false;
} 

if($userFlag&&$passwordFlag) {
     mysql_select_db("assignment", $connection);
$result = mysql_query("INSERT INTO membership (LOGIN, PASSWORD) VALUES ('$username','$password')") or die("Could not issue MySQL query");


echo "Create Successfully !";
}



?>