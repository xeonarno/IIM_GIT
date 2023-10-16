<?php session_start();
require('config/config.php');
require('model/functions.fn.php');

/*===============================
	Register
===============================*/

if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username'])){
	if(!empty($_POST['email']) && !empty($_POST['password']) && isset($_POST['username'])){

		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!isEmailAvailable($db, $email)){
			$error = 'Email indisponible';
			return;
		}
		if(!isUsernameAvailable($db, $username)){
			$error = 'Username indisponible';
			return;
		}	
		userRegistration($db, $username, $email, $password);
		header('Location: login.php');

	}
}

include 'view/_header.php';
include 'view/register.php';
include 'view/_footer.php';
