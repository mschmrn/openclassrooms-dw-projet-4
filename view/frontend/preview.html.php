<!-- PREVIEW AD -->
<div class="d-flex inline-flex justify-content-center align-items-center bg-info py-4">
    Cette page présente un aperçu <?php if(!isset($comment)){ ?> de l'article. <?php } else { ?> du commentaire.<?php } ?>&nbsp;<a href="index.php?controller=admin&task=index">Revenir à la page d'administration.</a>
</div>
<!-- BEGIN SECTION -->
<section id="preview-article" class="py-5">
    <!-- TITLE -->
    <div class="container-fluid ">
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
    <div class="row mx-auto">
        <div class="col-8">
            <!-- CHAPTER -->
            <h3 class="text-uppercase text-primary">Chapitre <?= $article['chapters'] ?></h3>
        </div>
        <!-- DATE -->
        <div class="col-2">
            <p class="text-muted"><?= \Date::display($article['created_at']); ?></p>
        </div>
        <!-- READING TIME -->
        <div class="col-2">
            <p class="text-muted">Temps de lecture : <?= \Text::read_time($article['content']) ?> minutes</p>
        </div>
    </div>
</section>
<!-- CONTENT -->
<section id="chapter-content" class="pb-4">
    <div class="container-fluid">
        <div class="row mx-auto">
            <div class="col-9 offset-1">
                <?= $article['content'] ?>
            </div>
        </div>
    </div>
</section>
<?php if(isset($comment)) { ?>
    <!-- COMMENTS -->
<section id="preview-comment" class="py-5">
    <div class="container-fluid">
        <div class="row mx-auto">
                <h3 class="text-center text-uppercase text-primary">Aperçu du commentaire</h3>
        </div>
        <div class="row mx-auto">
            <div class="col-8 offset-2">
                    <div class="author">@<?= $comment['author'] ?></div>
                    <small class="text-primary"><?= \Date::display($comment['created_at']); ?></small>
                    <blockquote>
                        <p><?= $comment['content'] ?></p>
                    </blockquote>
                </div>
        </div>
        <div class="row mx-auto">
            <div class="col-8 offset-2">
                <hr class="bg-secondary">
            </div>   
        </div>        
    </div>
</section>

<?php } ?>






