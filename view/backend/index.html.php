<section id="admin-home" class="bg-info col-10">

	<!-- INTRODUCTION -->
	<div class="container-fluid py-5">
		<div class="row mx-auto">
			<div class="col-12">
				<h1 class="text-secondary">Bienvenue Jean !</h1>
				<!--<p>Vous êtes actuellement connecté comme <i><?php //echo $_SESSION['username']; ?></i> à votre espace administrateur.</p>-->
				<p>Votre page d’accueil centralise toutes vos publications, les modifications et le développement de votre site.</p>
			</div>
		</div>					
		
		<!-- SEPARATOR -->
		<div class="row mx-auto mt-2">
			<div class="col-12">
				<h2 class="last-articles my-2">Les derniers articles</h2>
			</div>
		</div>

		<div class="row mx-auto mt-2">		
		<!-- FIRST COLUMN -->

			<!-- ARTICLES LIST -->

			<div class="col-8">
			<?php foreach ($articles as $article) : ?>	

				<div class="container p-0 border-bottom border-grey border-top-0 bg-form">
					
					<div class="card flex-row flex-wrap border-0 py-2">

						<div class="card-header border-0 bg-white">
							<img src="../public/images/example-admin.jpg" alt="">
						</div>
					
						<div class="card-block col-9 p-2 bg-white">
							<h2 class="card-title card-chapter text-primary">CHAPITRE <?= $article['chapters'] ?></h2>
							<h5 class="card-title"><?= $article['title'] ?></h5>
							
							<div class="d-flex justify-content-between text-muted border-0 bg-white w-100">
								
								<div class="d-flex">							
									<?php if(isset($article['modified_at'])) { ?>
										<p class="card-text text-muted">Dernière modification le <?= \Date::display($article['modified_at']); ?><p>
									<?php } else { ?>
										<p class="card-text text-muted">Publié le <?= \Date::display($article['created_at']); ?><p>
									<?php } ?>
								</div>
							
								<div class="d-flex">							
							
									<a href="index.php?controller=admin&task=edit&id=<?= $article['id'] ?>"><img src="../public/images/edit.svg" alt=""></a>
									<a href="index.php?controller=admin&task=view&id=<?= $article['id'] ?>"><img src="../public/images/view.svg" alt="" class="px-2"></a>
									<a href="index.php?controller=article&task=delete&id=<?= $article['id'] ?>"><img src="../public/images/delete.svg" alt=""></a>
								</div>
								
							</div>

						</div>

					
					</div>
				</div>				
				<?php endforeach ?>			

				</div>


			<!-- ARTICLES LIST -->

		<!-- FIRST COLUMN -->


		<!-- SECOND COLUMN -->

			<!-- WRITE AN ARTICLE -->
			<div class="col-4">	

						<a href="index.php?controller=admin&task=edit"><button class="btn btn-primary py-3 col-12 text-uppercase"><img src="../public/images/+.svg" alt=""> Écrire un article</button></a>
					
			<!-- COMMENTS LIST -->
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

		<!-- SECOND COLUMN -->

		</div>			
	</div>
</section>


