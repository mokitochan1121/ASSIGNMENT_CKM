<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "11211985";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");

// Establishing Connection with Server
$db = mysql_select_db("assignment", $connection);

//echo "USER:<hr><br> $user  COMMENT:<hr><br> $comment";


if (empty($_GET['user']) || empty($_GET['comment'])) {
echo 'Please fill all fields !';

} else {
	
$user = $_GET["user"];
$comment = $_GET["comment"];

// check if name only contains fingurs
$comment_length = strlen($comment);
if ($comment_length < 10 || $comment_length > 300) {
	echo "Your comment must contain 10-300 characters !";
} else{
   


// add comment to Database
$query = mysql_query("insert into comment values('null','$user','$comment',CURRENT_TIMESTAMP);", $connection); 

echo 'Submitted Successfully !';

}
}





?>