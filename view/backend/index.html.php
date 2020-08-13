<section id="admin-home" class="bg-info">
	<!-- INTRODUCTION -->
	<div class="container-fluid py-5">
		<div class="row mx-auto">
			<div class="col-12 mobile-center">
				<h1 class="text-secondary">Bienvenue <?= $user['name'] ?> !</h1>
				<!--<p>Vous êtes actuellement connecté comme <i><?php //echo $_SESSION['username']; ?></i> à votre espace administrateur.</p>-->
				<p>Votre page d’accueil centralise toutes vos publications, les modifications et le développement de votre site.</p>
			</div>
		</div>
		<!-- ONLY MOBILE -->
		<div id="mobile-content" class="col-12">
			<a href="index.php?controller=admin&task=editArticle">
				<button class="btn btn-primary py-3 col-12 text-uppercase">
					<img src="../public/images/+.svg" alt=""> Écrire un article
				</button>
			</a>
		</div>					
		<!-- SEPARATOR -->
		<div class="row mx-auto mt-2">
			<div class="col-12">
				<h4 class="my-2">Les derniers articles</h4>
			</div>
		</div>
		<!-- FIRST COLUMN -->
		<div class="row mx-auto mt-2">		
			<!-- ARTICLES LIST -->
			<div class="col-xl-8 col-lg-7 col-md-7 col-sm-12">
			<?php foreach ($articles as $article) : ?>	
				<div class="container p-0 border-bottom border-grey border-top-0 bg-form">
					<!-- CARD -->
					<div class="card flex-row flex-wrap border-0 py-2">
						<!-- IMAGE -->
						<div class="card-header col-xl-3 border-0 bg-white">
							<img src="<?= $article['img_url'] ?>" class="w-100" alt="">
						</div>
						<!-- CONTENT -->
						<div class="card-block col-xl-9 p-xl-2 px-lg-4 px-md-4 bg-white">
							<h2 class="card-title card-chapter text-primary">Chapitre <?= $article['chapters'] ?></h2>
							<h5 class="card-title"><?= $article['title'] ?></h5>
							<!-- ARTICLE INFO DATE -->
							<div class="d-flex justify-content-between text-muted border-0 bg-white w-100">
								<div class="d-flex">							
									<?php if(isset($article['modified_at'])) { ?>
										<p class="card-text text-muted">Dernière modification <?= \Text::display_date($article['modified_at']); ?></p>
									<?php } else { ?>
										<p class="card-text text-muted">Publié <?= \Text::display_date($article['created_at']); ?></p>
									<?php } ?>
								</div>
								<!-- ARROW -->
								<div class="d-flex pr-2">							
									<a href="index.php?controller=article&task=preview&id=<?= $article['id'] ?>"><img src="../public/images/arrow.svg" style="height:10px;" alt=""></a>
								</div>
							</div>
						</div>
					</div>
				</div>				
				<?php endforeach ?>
				<!-- MANAGE ARTICLES -->
				<div class="col-12 bg-white mobile-hide">
					<div class="row mx-auto w-100 px-2 py-4">
						<a href="index.php?controller=admin&task=viewArticles"><h4 class="text-primary">Gérer les articles</h4>
					</div>
				</div>
			</div>
		<!-- SECOND COLUMN -->
		<div class="col-xl-4 col-lg-5 col-md-5 col-sm-12">	
			<!-- BUTTON -->
			<a href="index.php?controller=admin&task=editArticle" class="mobile-hide">
				<button class="btn btn-primary py-3 col-12 text-uppercase">
					<img src="../public/images/+.svg" alt=""> Écrire un article
				</button>
			</a>
			<!-- COMMENTS LIST -->
			<div class="row mx-auto">
				<h4 class="mt-3 mb-2">Les derniers commentaires</h4>
			</div>
			<div class="row mx-auto bg-form">
				<?php foreach ($comments as $comment) : ?>	
				<!-- CARD -->					
				<div class="card w-100 border-bottom border-left-0 border-top-0 border-right-0">
					<div class="card-body">
						<h2 class="card-title card-username">@<?= $comment['author'] ?></h2>
						<p class="card-text"><?= \Text::truncate($comment['content'], 20, true, true) ?></p>
						<div class="d-flex justify-content-between pr-2">									
							<p class="card-text text-muted"><?= \Text::display_date($comment['created_at']); ?></p>
							<a href="index.php?controller=comment&task=preview&id=<?= $comment['id'] ?>"><img src="../public/images/arrow.svg" style="height:10px;" alt=""></a>
						</div>
					</div>
				</div>
				<?php endforeach ?>
				<!-- MANAGE COMMENTS -->
				<div class="col-12 bg-white mobile-hide">
					<div class="row mx-auto w-100 px-2 py-4">
						<a href="index.php?controller=admin&task=viewComments"><h4 class="text-primary">Gérer les commentaires</h4>
					</div>
				</div>
			</div>
		</div>
	</div>			
</section>


