<section id="login">
	<div class="container-fluid py-5 vh-100">
		<div class="row mx-auto">
			<div class="col-12 d-flex justify-content-center">
				<form action="index.php?controller=admin&task=verify" method="POST">
					<h2 class="display-4 text-center py-3">Se connecter</h2>
                    <div class="form-group">
						<label for="username">Nom d'utilisateur</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Nom d'utilisateur" required>
                    </div>
					<div class="form-group">
						<label for="inputPassword6">Mot de passe</label>
						<input type="password" id="password" name="password" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" placeholder="Mot de passe" required>
						<small id="passwordHelpInline" class="text-muted">
						Veuillez entrer un mot de passe composé de 8 à 20 caractères.
						</small>
					</div>
					<div class="col-12 d-flex justify-content-center">
					<button type="submit" class="btn btn-outline-primary">Se connecter</button>
					</div>
					<div class="col-12 py-3">
						<?php if (! empty($message)) { ?>
							<p class="errorMessage"><?php echo $message; ?></p>
						<?php } ?>
						<p class="text-center"><a href="../../index.php">Retourner à l'accueil du site</a></p>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>