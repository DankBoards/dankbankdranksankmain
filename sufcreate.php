<meta charset="utf-8">
<?php
	

session_start();
	
require "dbconfig.php";

$rubrik = $_POST['rubrik'];
$userid = $_SESSION["id"];
$content = $_POST['content'];
$now = date("Y-m-d H:i:s");

echo $now . "<br>" . $rubrik . "<br>" . $userid . "<br>" . $content;

if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if($_POST['rubrik']!="" && $_POST['content']!=""){
	mysqli_query($conn,"SELECT * FROM inlagg");
	mysqli_query($conn,"INSERT INTO inlagg (rubrik,userid,content,date) 
	VALUES ('" . $rubrik . "','" . $userid . "','" . $content . "','" . $now . "')");
	header('index.php?action=home');
} else {
	echo 'Please enter content and rubrik.';
}



mysqli_close($conn);
?>