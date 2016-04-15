<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "11211985";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");

// Establishing Connection with Server
$db = mysql_select_db("assignment", $connection);


$sql = "SELECT LOGIN, COMMENT FROM comment";
$result = mysql_query($sql);
$num_rows = mysql_num_rows($result);

if ($num_rows > 0) {
	
	for($i=0;$i<$num_rows;$i++){
		$row = mysql_fetch_array($result);
     // output data of each row
      $comment[$i]['login'] = $row['LOGIN'];
	  $comment[$i]['comment'] = $row['COMMENT'];
	}
	
	echo json_encode($comment);	
}

?>  