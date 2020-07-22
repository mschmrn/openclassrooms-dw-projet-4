<section id="list-articles" class="bg-info col-10">

	<div class="container-fluid py-5">

    <!-- TITLE -->
        <div class="row mx-auto">
            <div class="col-12 d-inline-flex justify-content-between align-items-center">
                <div class="">
                    <h1 class="text-secondary">Tous les articles</h1>
                </div>
                <div class="">
                    <a href="index.php?controller=admin&task=addArticle"><button name="write-article" class="btn btn-primary text-uppercase" value="write" id="write">Écrire un article</button></a>
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
            <div class="col-12">
                <h4>Listing des articles</h4>
            </div>
        </div>
        <!-- ARTICLES LIST -->
        <div class="row mx-auto mt-2">
            <div class="col-12">						
                <?php foreach ($articles as $article) : ?>	
                <!-- CONTAINER -->
                <div class="container p-0 border-bottom border-grey border-top-0 bg-form">
                    <!-- CARD -->
                    <div class="card flex-row flex-wrap border-0 py-2">
                        <!-- IMAGE -->
                        <div class="card-header col-xl-3 border-0 bg-white">
                            <img src="../public/images/example-admin.jpg" class="w-100" alt="">
                        </div>
                        <!-- CONTENT -->
                        <div class="card-block col-xl-9 p-xl-2 p-4 bg-white">
                            <h2 class="card-title card-chapter text-primary">CHAPITRE <?= $article['chapters'] ?></h2>
                            <h5 class="card-title"><?= $article['title'] ?></h5>
                            <p class="card-text text-muted"><?= \Text::truncate($article['content'], 40, true, true); ?></p>
                            <div class="d-flex flex-row justify-content-between justify-content-center text-muted border-0 bg-white w-100">
                                <!-- DATE -->
                                <div class="d-flex flex-nowrap ">							
                                    <?php if(isset($article['modified_at'])) { ?>
                                        <p class="card-text text-muted">Modifié le <?= \Date::display($article['modified_at']); ?><p>
                                    <?php } else { ?>
                                        <p class="card-text text-muted">Publié le <?= \Date::display($article['created_at']); ?><p>
                                    <?php } ?>
                                </div>
                                <!-- BUTTONS -->
                                <div class="d-flex flex-nowrap">
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
        </div>
    </div>
</section>
    
