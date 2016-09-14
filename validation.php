<?php
require('config/config.php');
require('model/functions.fn.php');
session_start();

if(	isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && 
	!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $username  = htmlspecialchars($_POST["username"]);
	$password= htmlspecialchars($_POST["password"]);
	$email   = htmlspecialchars($_POST["email"]);



	 $request = $db->prepare("SELECT id FROM users WHERE username LIKE :username OR email LIKE :email"); 
     $request->execute(
     	array(
     		"username" => $username,
     		"email" => $email
     	));

   $members = $request->fetchAll(); 

  if (sizeof($members) == 0)
  {
    $request = $db->prepare("INSERT INTO users (username, password, email, created_at) VALUES (:username, :password, :email, NOW())"); 
    $request->execute(
      array(
        "username" => $username,
        "password" => $password,
        "email" => $email
    ));
    header("Location:login.php");
}
	// TODO

}else{ 
	$_SESSION['message'] = 'Erreur : Formulaire incomplet';
	header('Location: register.php');
}