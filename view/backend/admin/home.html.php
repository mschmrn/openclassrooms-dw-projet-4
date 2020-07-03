<section class="py-5 bg-tertiary">
	<div class="container-fluid vh-100 py-5">
		<div class="row mx-auto">
			<div class="col-12 text-center">
				<h1 class="text-secondary">Bienvenue Jean Forteroche!</h1>
				<p>Vous êtes actuellement connecté comme <i><?php echo $_SESSION['username']; ?></i> à votre espace administrateur.</p>
				<a href="index.php?controller=admin&task=add"><button type="button" class="btn btn-primary">Ajouter un utilisateur</button></a>
				<a href="index.php?controller=admin&task=logout" onclick="return window.confirm(`Êtes vous sûr de vouloir vous déconnecter ?`)"><button type="button" class="btn btn-primary">Déconnexion</button></a>
			</div>
		</div>
	</div>
</section>
