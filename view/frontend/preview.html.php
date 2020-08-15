<!-- PREVIEW AD -->
<div class="container-fluid pt-3 bg-info">
    <div class="row mx-auto">
        <div class="col-sm-12 text-center">
            <p>Cette page présente un aperçu <?php if(!isset($comment)){ ?> de l'article. <?php } else { ?> du commentaire.<?php } ?></p>
            <p><a href="index.php?controller=admin&task=index">Revenir à la page d'administration.</a></p>
        </div>
    </div>
</div>
<!-- BEGIN SECTION -->
<section id="preview-article" class="py-3">
    <!-- TITLE -->
    <div class="container-fluid">
        <div class="row mx-auto">
            <div class="col-12">
                <h1 class="text-left text-secondary display-3"><?= $article['title'] ?>.</h1>
            </div>
        </div>
    </div>
    <!-- SEPARATOR -->
    <div class="row mx-auto">
        <div class="col-12">
            <hr class="bg-secondary">
        </div>
    </div>
    <div class="container-fluid">
        <div class="row mx-auto">            
            <!-- CHAPTER -->
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h3 class="text-uppercase text-primary">Chapitre <?= $article['chapters'] ?></h3>
            </div>
            <!-- DATE -->
            <div class="col-sm-6 col-md-6 col-lg-6">
                <p class="text-muted"><?= \Text::display_date($article['created_at']); ?></p>
            </div>
            <!-- READING TIME -->
            <div class="col-sm-6 col-md-6 col-lg-6 text-md-right text-lg-right">
                <p class="text-muted">Temps de lecture : <?= \Text::read_time($article['content']) ?> minutes</p>
            </div>
        </div>
    </div>
</section>
<!-- CONTENT -->
<section id="chapter-content">
    <div class="container-fluid py-2">
        <div class="row mx-auto">
            <div class="col-sm-12 col-md-12 col-lg-10 offset-lg-1 col-xl-9 offset-xl-1">
                <?= $article['content'] ?>
            </div>
        </div>
    </div>
</section>
<?php if(isset($comment)) { ?>
    <!-- COMMENTS -->
<section id="preview-comment">
    <div class="container-fluid py-2">
        <div class="row mx-auto">
            <h3 class="col-sm-12 col-md-12 text-uppercase text-primary pb-2">Aperçu du commentaire</h3>
        </div>
        <div class="row mx-auto">
            <div class="col-sm-12 col-md-12 col-lg-9 offset-lg-1 col-xl-9 offset-xl-2">
                <div class="author">@<?= $comment['author'] ?></div>
                <small class="text-primary"><?= \Text::display_date($comment['created_at']); ?></small>
                <blockquote>
                    <p><?= $comment['content'] ?></p>
                </blockquote>
            </div>
        </div>     
    </div>
</section>

<?php } ?>






