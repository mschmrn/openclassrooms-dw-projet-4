
<div class="container">
<h1 class="display-3 text-center">Bienvenue sur le blog de Jean Forteroche</h1>
</div>
<h2 class="display-4 text-center">Tous les chapitres</h2>


<div class="card-deck m-0">
    <div class="row mx-auto">
                <?php foreach ($articles as $article) : ?>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-3">
                    <div class="card mt-4">
                        <img class="card-img-top" src="../public/images/example.jpeg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $article['title'] ?></h5>
                            <p class="card-text"><?= $article['introduction'] ?></p>
                            <a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>" class="btn btn-primary">Lire la suite</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Mis à jour il y a 3 minutes</small>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
