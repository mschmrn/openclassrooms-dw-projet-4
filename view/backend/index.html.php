<section id="admin-home" class="bg-info col-10">

	<div class="container-fluid py-5">
		<div class="row mx-auto">
			<div class="col-12">
				<h1 class="text-secondary">Bienvenue Jean !</h1>
				<!--<p>Vous êtes actuellement connecté comme <i><?php //echo $_SESSION['username']; ?></i> à votre espace administrateur.</p>-->
				<p>Votre page d’accueil centralise toutes vos publications, les modifications et le développement de votre site.</p>
			</div>
		</div>					
		
		<div class="row mx-auto mt-2">
			<div class="col-12">
				<h2 class="last-articles my-2">Les derniers articles</h2>
			</div>
		</div>

		
		<div class="row mx-auto mt-2">
			<div class="col-7">
					<div class="row mx-auto bg-form">
						<?php foreach ($articles as $article) : ?>						
							<img src="../public/images/example-admin.jpg" class="logo w-25" alt="">
							<div class="card w-75 border-bottom border-left-0 border-top-0 border-right-0 bg-white ">
								<div class="card-body">
									<h2 class="card-title card-chapter text-primary reset-height">CHAPITRE <?= $article['chapters'] ?></h2>
									<h5 class="card-title reset-height"><?= $article['title'] ?></h5>
									<p class="card-text text-muted">Dernière modification il y a 6 minutes.</p>
								</div>
							</div>
						<?php endforeach ?>

					</div>
				</div>

			<div class="col-5">	
					<div class="row mx-auto">
						<button class="btn btn-primary py-3 col-12 text-uppercase"><img src="../public/images/+.svg" class="px-1" alt=""> Écrire un article</button>
					</div>
					<div class="row mx-auto">
						<h2 class="last-articles my-3">Les derniers commentaires</h2>
					</div>
					<div class="row mx-auto bg-form">
						<?php foreach ($comments as $comment) : ?>						
							<div class="card w-100 border-bottom border-left-0 border-top-0 border-right-0">
								<div class="card-body">
									<h2 class="card-title card-username">@<?= $comment['author'] ?></h2>
									<p class="card-text"><?= \Text::truncate($comment['content'], 20, true, true) ?></p>
									<p class="card-text text-muted"><?= \Date::display($comment['created_at']); ?></p>
								</div>
							</div>
						<?php endforeach ?>
					</div>

				</div>
			</div>

				
			</div>
		</div>
	</div>

</section>


