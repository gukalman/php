<?php
error_reporting(0);

$db=new mysqli('127.0.0.1','root','','users');
if($db->errno){
	echo $db->connect_error;
	die();
}

?>