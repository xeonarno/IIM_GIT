<?php
require('config/config-sample.php');
require('model/functions.fn.php');
session_start();

if(	isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && 
	!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {

	$pseudo = htmlspecialchars($_POST["username"]);
		$password = htmlspecialchars($_POST["password"]);
		$email = htmlspecialchars($_POST["email"]);
		$request = $db->prepare("INSERT INTO users (username, password, email, created_at)
	  VALUES (:pseudo, :password, :email, NOW())");
    $request->execute(
    array(
      "pseudo" => $pseudo,
      "password" => $password,
			"email" => $email,
    )
    );
		header('Location: login.php');
}else{

}else{ 
	$_SESSION['message'] = 'Erreur : Formulaire incomplet';
	header('Location: register.php');
}