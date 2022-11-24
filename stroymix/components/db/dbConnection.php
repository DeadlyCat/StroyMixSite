<?php 
require_once 'dbconfig.php';
try {
	$connection = mysqli_connect($host,$username,$password,$dbname);
	$successConnection = true;
} catch (PDOException $pe) {
	$successConnection = false;

	die("Не получилось связаться с сервером =( " . $pe->GetMessage());

}
?>