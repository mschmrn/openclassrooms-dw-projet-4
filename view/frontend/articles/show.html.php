<section id="chapter-title" class="py-5">

    <div class="container-fluid ">
        <div class="row mx-auto">
            <div class="col-12">
                <h1 class="text-left text-secondary display-3"><?= $article['title'] ?>.</h1>
            </div>
        </div>
    </div>

    <div class="row mx-auto">
            <div class="col-12">
                <hr class="bg-secondary">
            </div>
    </div>

    <div class="row mx-auto">
        <div class="col-8">
            <h3 class="text-uppercase text-primary">Chapitre <?= $article['chapters'] ?></h3>
        </div>

        <div class="col-2">
        <?php
            $timeStamp = $article['created_at'];
            setlocale(LC_TIME, "fr_FR");
            $timeStamp = strftime("%A %d %B %G", strtotime($timeStamp));
        ?>
        <p class="text-muted"><?= $timeStamp ?></p>
        </div>

        <div class="col-2">
            <p class="text-muted">Temps de lecture : <?= $article['time'] ?> minutes</p>
        </div>
    </div>

</section>

<section id="chapter-content">
    <div class="container-fluid">
        <div class="row mx-auto">
            <div class="col-9 offset-1">
                <?= $article['content'] ?>
            </div>
        </div>
    </div>
</section>

<section id="chapter-comments" class="py-5">
    <div class="container-fluid">
        <div class="row mx-auto">
            <?php if (count($comments) === 0) : ?>
                <p>Il n'y a pas encore de commentaires pour cet article.</p>
            <?php else : ?>
                <h3 class="text-center text-uppercase text-primary"><?= count($comments) ?> commentaires</h3>
        </div>
            <?php endif ?>

        <div class="row mx-auto">
            <div class="col-8 offset-2">
                <?php foreach ($comments as $comment) : ?>
                    <div class="author">@<?= $comment['author'] ?></div>
                    <small class="text-primary"><?= \Date::display($comment['created_at']); ?></small>
                    <blockquote>
                        <p><?= $comment['content'] ?></p>
                    </blockquote>
                    
                    <?php if(isset($_SESSION["username"]))
                    { ?>
                        <a href="index.php?controller=comment&task=delete&id=<?= $comment['id'] ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?`)">Supprimer</a> 
                    <?php } ?>
            </div>
        </div>
        <div class="row mx-auto">
            <div class="col-8 offset-2">
                <hr class="bg-secondary"><?php endforeach ?> 
            </div>   
        </div>
                
    </div>
    
    <div class="container-fluid">
        <div class="row mx-auto">
            <h3 class="text-center text-uppercase text-primary py-3">Vous souhaitez réagir ?</h3>
        </div>

        <div class="row mx-auto">
            <div class="col-8 offset-2">
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

