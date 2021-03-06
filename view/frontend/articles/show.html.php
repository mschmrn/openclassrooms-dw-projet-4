<section id="chapter-title" class="py-5">
    <!-- TITLE -->
    <div class="container-fluid ">
        <div class="row mx-auto">
            <div class="col-12">
                <h1 class="text-left text-secondary display-3"><?= $article['title'] ?></h1>
            </div>
        </div>
    </div>
    <!-- SEPARATOR -->
    <div class="row mx-auto">
            <div class="col-12">
                <hr class="bg-secondary">
            </div>
    </div>
    <div class="container-fluid ">
        <div class="row mx-auto">    
            <!-- CHAPTER -->
            <div class="col-sm-12 col-md-4 col-lg-6 col-xl-6">
                <h3 class="text-uppercase text-primary">Chapitre <?= $article['chapters'] ?></h3>
            </div>  
            <!-- DATE -->
            <div class="col-sm-6 col-md-3">
                <p class="text-muted text-sm-center text-md-right text-lg-right text-xl-right"><?= \Text::display_date($article['created_at']); ?></p>
            </div>
            <!-- READING TIME -->
            <div class="col-sm-6 col-md-3">
                <p class="text-muted text-sm-center text-md-right text-lg-right text-xl-right">Temps de lecture : <?= \Text::read_time($article['content']) ?> minutes</p>
            </div>
        </div>
    </div>
    <!-- IMAGE -->
    <figure id="article-image" class="d-flex flex-row justify-content-center">
        <img src="<?= $article['img_url'] ?>" alt="Image d'illustration de l'article" />
    </figure>
</section>
<!-- CONTENT -->
<section id="chapter-content">
    <div class="container-fluid">
        <div class="row mx-auto mb-3">
            <div class="col-sm-12 col-md-12 col-lg-10 offset-lg-1 col-xl-9 offset-xl-1">
                <p><b><?= $article['introduction'] ?></b></p>
            </div>
        </div>
        <div class="row mx-auto">
            <div class="col-sm-12 col-md-12 col-lg-10 offset-lg-1 col-xl-9 offset-xl-1">
                <?= $article['content'] ?>
            </div>
        </div>
    </div>
</section>
<!-- COMMENTS -->
<section id="chapter-comments" class="py-5">
    <div class="container-fluid">
        <div class="row mx-auto">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <?php if (count($comments) === 0) : ?>
                    <p>Il n'y a pas encore de commentaires pour cet article.</p>
                <?php else : ?>
                    <h3 class="text-sm-left text-md-left text-uppercase text-primary"><?= count($comments) ?> commentaires</h3>
            </div>
        </div>
            <?php endif ?>
        <div class="row mx-auto">
            <div class="col-sm-12 col-md-12 col-lg-9 offset-lg-2 col-xl-9 offset-xl-2">
                <?php foreach ($comments as $comment) : if($comment['pending'] == '0') {  ?>
                    <div class="author">@<?= $comment['author'] ?></div>
                    <small class="text-primary"><?= \Text::display_date($comment['created_at']); ?></small>
                    <blockquote>
                        <p><?= $comment['content'] ?></p>
                    </blockquote>
                    <div class="d-flex justify-content-between">
                        <?php if(isset($_SESSION["username"])){ ?>
                            <a href="index.php?controller=comment&task=delete&id=<?= $comment['id'] ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?`)">Supprimer</a>
                        <?php } ?>
                            <a href="index.php?controller=comment&task=report&id=<?= $comment['id'] ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir signaler ce commentaire ?`)">Signaler</a> 
                    </div>
            </div>
        </div>
        <div class="row mx-auto">
            <div class="col-sm-12 col-md-12 col-lg-9 offset-lg-2 col-xl-9 offset-xl-2">
                <hr class="bg-secondary">
                <?php } endforeach ?> 
            </div>   
        </div>        
    </div>
    <!-- ADD A COMMENT FORM -->
    <div class="container-fluid">
        <div class="row mx-auto">
            <div class="col-sm-12">
                <h3 class="text-sm-left text-md-left text-uppercase text-primary py-3">Vous souhaitez réagir ?</h3>
            </div>
        </div>
        <div class="row mx-auto">
            <div class="col-sm-12 col-md-12 col-lg-9 offset-lg-2">
                <form action="index.php?controller=comment&task=insert" method="POST">
                    <div class="form-group">
                        <label for="author">Votre pseudo</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text border-0">@</div>
                            </div>
                            <input type="text" class="form-control" name="author" id="author" placeholder="Votre pseudo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Votre adresse mail</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="nom@exemple.com">
                    </div>
                    <div class="form-group">
                        <label for="content">Votre commentaire</label>
                        <textarea class="form-control" name="content" id="content" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="article_id" value="<?= $article_id ?>">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Commenter</button>
                </form>
            </div>
        </div>
    </div>
</section>

