<?php
require('config/config-sample.php');
require('model/functions.fn.php');
session_start();

if(	isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && 
	!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {

    if (!isEmailAvailable($db, $_POST['email'])) {
        $_SESSION['message'] = 'Erreur : Email déjà utilisé';
    }
    elseif (!isUsernameAvailable($db, $_POST['username'])) {
        $_SESSION['message'] = 'Erreur : Username déjà utilisé';
    }
    elseif (isEmailAvailable($db, $_POST['email']) && isUsernameAvailable($db, $_POST['username'])) {
        userRegistration($db, $_POST['username'], $_POST['email'], $_POST['password']);
        header('Location: dashboard.php');
    }

}else{ 
	$_SESSION['message'] = 'Erreur : Formulaire incomplet';
	header('Location: register.php');
}