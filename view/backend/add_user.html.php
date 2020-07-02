<section id="addUser">
	<div class="container-fluid py-5 vh-100">
		<div class="row mx-auto">
			<div class="col-12 d-flex justify-content-center">
				<form action="index.php?controller=admin&task=add" method="POST">
					<h2 class="display-4">Ajouter un utilisateur</h2>
                    <div class="form-group">
						<label for="username">Pseudo</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Nom d'utilisateur" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Mail</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="nom@exemple.com" required>
					</div>
					<div class="form-group">
						<label for="inputPassword6">Mot de passe</label>
						<input type="password" id="password" name="password" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" placeholder="********" required>
						<small id="passwordHelpInline" class="text-muted">
						Veuillez entrer un mot de passe composé de 8 à 20 caractères.
						</small>
					</div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Type d'utilisateur</label>
                        <select class="form-control" name="type" id="type">
                            <option value="admin">Administrateur</option>
                            <option value="user">Utilisateur</option>
                        </select>
                        <i class="fa fa-chevron-down"></i>
					</div>
					<div class="col-12 d-flex justify-content-center">
						<button type="submit" class="btn btn-outline-primary">Ajouter</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>


