<?php session_start();
require('config/config-sample.php');
require('model/functions.fn.php');

/*===============================
	Register
===============================*/

include 'view/_header.php';
include 'view/register.php';
include 'view/_footer.php';

$username = $_POST['register_username'];
$email = $_POST['register_email'];
$password = $_POST['register_password'];
$errors = '';

if (!isset($username) && !isset($email) && !isset($password)) {
	if (isUsernameAvailable($db, $username) && isEmailAvailable($db, $email)) {
		userRegistration($db, $username, $email, $password);
	} else {
		if (!isUsernameAvailable($db, $username)) {
			$errors = 'Username indisponible';
		} else if (!isEmailAvailable($db, $email)) {
			$errors = 'Email indisponible';
		} else {
			$errors = 'Email et Username sont indisponibles';	
		}
	}
}
