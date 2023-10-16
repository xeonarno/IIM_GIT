<?php session_start();

/******************************** 
	 DATABASE & FUNCTIONS 
********************************/
require('config/config.php');
require('model/functions.fn.php');


/********************************
			PROCESS
********************************/

if(isset($_POST['emailLogin']) && isset($_POST['passwordLogin'])){
	if(!empty($_POST['emailLogin']) && !empty($_POST['passwordLogin'])){

		// TODO

		// Force user connection to access dashboard
		 $userConnection = userConnection($db, 'git@initiation.com', 'password');

         if ($userConnection) {
             header('Location: dashboard.php');
         } else {
             $error = "Wrong identifier";
         }
		


	}else{
		$error = 'Champs requis !';
	}
}

/******************************** 
			VIEW 
********************************/
include 'view/_header.php';
include 'view/login.php';
include 'view/_footer.php';