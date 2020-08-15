<!-- INTRODUCTION -->
<section id="chapters-welcome" class="bg-primary py-sm-0 py-md-3 py-lg-4 py-xl-5">
    <!-- CHAPTERS -->
    <div class="container-fluid ">
        <div class="row mx-auto">
            <div class="col-12">
                <h1 class="text-left text-white display-3">Les chapitres</h1>
            </div>
        </div>
    </div>
    <!-- SEPARATOR -->
    <div class="row mx-auto">
            <div class="col-12">
                <hr class="text-white bg-white">
            </div>
    </div>
    <div class="container-fluid">
        <!-- TEXT -->
        <div class="row mx-auto">
            <div class="col-12 col-sm-5 col-md-12 col-lg-5 col-xl-5 offset-sm-0 offset-lg-1 offset-xl-1 pt-4">
                <em class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Consequat dictum purus cursus nibh pellentesque quam. Quis nibh faucibus in iaculis. Quis etiam et quis varius volutpat enim. Dolor, non tristique elementum sed dolor, risus, habitasse fermentum nulla. Id dolor suspendisse mauris, tincidunt velit viverra in. Convallis facilisi laoreet sit ut amet.</em>
            </div>
            <!-- BOOK COVER -->
            <div class="col-12 col-sm-6 col-md-12 col-lg-6 col-xl-6">
                <img src="../public/images/cover-2.png" class="img-fluid" alt="Couverture du livre">
            </div>
        </div>
    </div>
</section>
<!-- ARTICLES -->
<section id="chapters-deck" class="py-5">
    <div class="card-deck m-0">
        <div class="row mx-auto">
            <?php foreach ($articles as $article) : ?>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-3 d-flex align-items-stretch">
                    <div class="card mt-4 border-0">
                        <h3 class="text-center text-uppercase text-primary">Chapitre <?= $article['chapters'] ?></h3>
                        <a class="text-decoration-none" href="index.php?controller=article&task=show&id=<?= $article['id'] ?>"><h4 class="card-title card-height text-center text-secondary"><?= $article['title'] ?></h4></a>
                        <a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>">
                        <figure>
                            <img class="card-img-top preview" src="<?= $article['img_url'] ?>" alt="Vignette d'illustration de l'article" max-height='220px' width='auto'></a>
                        </figure>
                        <div class="card-body px-0">
                            <p class="card-text p-0"><?= \Text::truncate($article['introduction'], 30, true, true); ?><p>                                
                            <a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>">             
                                <img src="../public/images/arrow.svg" class="slide-right" alt="Lire le chapitre">
                            </a>
                            <p class="date card-text text-muted text-height-3"><?= $test = \Text::display_date($article['created_at']); ?></p>
                        </div>
                        <div class="card-footer bg-white">
                        <small class="text-muted">Temps de lecture : <?= $reading_time = \Text::read_time($article['content']) ?> <?php if ($reading_time <= 1) { ?>minute<?php } else { ?>minutes<?php } ?></small>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>          
        </div>
    </div>
</section>