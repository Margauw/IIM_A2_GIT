<?php
require('config/config.php');
require('model/functions.fn.php');
session_start();

if(	isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && 
	!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $username  = htmlspecialchars($_POST["username"]);
	$password= htmlspecialchars($_POST["password"]);
	$email   = htmlspecialchars($_POST["email"]);



	 $request = $db->prepare("SELECT id FROM members WHERE members LIKE :username OR email LIKE :email"); 
     $request->execute(
     	array(
     		"username" => $username,
     		"email" => $email
     	));

   $members = $request->fetchAll(); 

  if (sizeof($members) == 0)
  {
    $request = $db->prepare("INSERT INTO members (username, password, email, inscription_date, is_admin) VALUES (:username, :password, :email, NOW(), 0)"); 
    $request->execute(
      array(
        "username" => $username,
        "password" => $password,
        "email" => $email
    ));
}
	// TODO

}else{ 
	$_SESSION['message'] = 'Erreur : Formulaire incomplet';
	header('Location: register.php');
}