<?php
require('config/config-sample.php');
require('model/functions.fn.php');
session_start();

if(	isset($_POST['register_username']) && isset($_POST['register_email']) && isset($_POST['register_password']) && 
	!empty($_POST['register_username']) && !empty($_POST['register_email']) && !empty($_POST['register_password'])) {

	// TODO
	$_SESSION['message'] = 'Message : Formulaire complet';
	header('Location: register.php');

}else{ 
	$_SESSION['message'] = 'Erreur : Formulaire incomplet';
	header('Location: register.php');
}