<?php
session_start();

require('config/config.php');
require('model/functions.fn.php');

/*===============================
	Delete
===============================*/

if(isset($_GET) && !empty($_GET)){
	$delete = deleteMusic($db, $_GET['id'], $_SESSION['id']);
	if($delete == true){
		header('Location: dashboard.php');
	}
	else{
		echo 'Vous n\'avez pas les droits pour effectuer cette action !';
	}

}
