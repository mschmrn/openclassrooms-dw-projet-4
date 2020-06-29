﻿<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"])){
		header("Location: login.php");
		exit(); 
	}
?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="../style.css" />
	</head>
	<body>
		<div class="success">
		<h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
		<p>Vous êtes connecté à votre espace administrateur.</p>
		<a href="add_user.php">Ajouter un utilisateur</a> | 
		<!--<a href="#">Mettre à jour l'utilisateur (non disponible)</a>
		<a href="#">Supprimer l'utilisateur (non disponible)</a> | -->
		<a href="../logout.php">Déconnexion</a>
		</ul>
		</div>
	</body>
</html>