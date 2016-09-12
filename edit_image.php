<?php
session_start();
require('config/config.php');
require('model/functions.fn.php');

if(isset($_FILES['image']) && !empty($_FILES['image'])){
	$file = $_FILES['image']['name'];
	$file_tmp = $_FILES['image']['tmp_name'];
	$nom = '';
	$resultat = false;

	if (is_file($file_tmp)){
	$extension_upload = strtolower(substr(  strrchr($_FILES['image']['name'], '.')  ,1));

		if (preg_match('/\.(png|jpe?g|gif)$/i', $file)) {
			$nom = md5(uniqid(rand(), true));
			$nom = "view/profil_pic/{$nom}.{$_SESSION['id']}.{$extension_upload}";
			$resultat = move_uploaded_file($_FILES['image']['tmp_name'],$nom);

			$_SESSION['image'] = $nom;
			$register_picture = updateProfilPicture($db, $nom, $_SESSION['id']);
			header('Location: dashboard.php');
		} else {
			echo 'Erreur, le fichier n\'est pas une image !';
		}
	}
}

include 'view/_header.php';
include 'view/edit_image.php';
include 'view/_footer.php';