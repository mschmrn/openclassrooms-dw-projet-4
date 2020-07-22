<section id="trash" class="bg-info col-10">

	<div class="container-fluid py-5">

    <!-- TITLE -->
        <div class="row mx-auto">
            <div class="col-12 d-inline-flex justify-content-between align-items-center">
                <div class="">
                    <h1 class="text-secondary">Corbeille</h1>
                </div>
            </div>
        </div>

    <!-- SEPARATOR -->
        <div class="row mx-auto mb-2">
            <div class="col-12">
                <hr class="bg-secondary">
            </div>
        </div>

    <!-- TITLE -->
    <div class="row mx-auto">
        <div class="col-12 d-flex">
            <button class="btn" type="submit" name="articles"><h4>Articles</h4></button>
            <button class="btn mx-3" type="submit" name="drafts"><h4>Brouillons</h4></button>
            <button class="btn" type="submit" name="comments"><h4>Commentaires</h4></button>
        </div>
    </div>

    <!-- ARTICLES LIST -->
        <div class="row mx-auto mt-2">
			<div class="col-12 bg-form bg-white py-4">						
                <?php foreach ($articles as $article) : if($article['draft'] != 1) { ?>	
					<div class="row mx-auto pt-2 pl-2 pr-2">
							<img src="../public/images/example-admin.jpg" class="logo col-3" alt="">
							<div class="card col-9 border-0 bg-white ">
								<div class="card-body">
									<h2 class="card-title card-chapter text-primary">CHAPITRE <?= $article['chapters'] ?></h2>
									<h5 class="card-title"><?= $article['title'] ?></h5>
                                    <?php if(isset($article['modified_at'])) { ?><p class="card-text text-muted">Dernière modification le <p><?php } ?>
                                </div>
                                 <!-- BUTTONS -->
                                 <div class="d-flex justify-content-end px-2">
                                    <a href="index.php?controller=article&task=restore&id=<?= $article['id'] ?>"><img src="../public/images/edit.svg" alt=""></a>
                                </div>
							</div>
                    </div>
   
    <!-- SEPARATOR -->
                    <div class="row mx-auto">
                        <div class="col-12 bg-white">
                            <hr class="bg-grey">
                        </div>
                    </div>
                <?php } endforeach ?>
            </div>
        </div>
    </div>
</section>
    
