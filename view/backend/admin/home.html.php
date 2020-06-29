<?php
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"]))
	{
		echo "Vous n'êtes pas connecté en tant qu'administrateur";
		//\Http::redirect('registration/login.php');
		exit(); 
	}
?>

		<div>
			<h1 class="text-secondary">Bienvenue Jean Forteroche<?php //echo $_SESSION['username']; ?>!</h1>
			<p>Vous êtes connecté à votre espace administrateur.</p>
			<a href="index.php?controller=admin&task=add">Ajouter un utilisateur</a> | 
			<!--<a href="#">Mettre à jour l'utilisateur (non disponible)</a>
			<a href="#">Supprimer l'utilisateur (non disponible)</a> | -->
			<a href="index.php?controller=admin&task=logout">Déconnexion</a>
		</div>
