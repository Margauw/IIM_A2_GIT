<?php session_start();

// test 
if(isset($_SESSION) && !empty($_SESSION)){
	header('Location: dashboard.php');
}

else{
	header('Location: login.php');
}