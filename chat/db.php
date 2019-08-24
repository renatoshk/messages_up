<?php
$connection = mysqli_connect('localhost','root','','chat');
if(!$connection){
	die("Failed" . mysqli_error($connection));
} 
?>