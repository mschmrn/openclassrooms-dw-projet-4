
<section id="chapters-welcome" class="bg-primary py-5">

    <div class="container-fluid ">
        <div class="row mx-auto">
            <div class="col-12">
                <h1 class="text-left text-white display-3">Les chapitres</h1>
            </div>
        </div>
    </div>

    <div class="row mx-auto">
            <div class="col-12">
                <hr class="text-white bg-white">
            </div>
    </div>

    <div class="container-fluid">
        <div class="row mx-auto">
            <div class="col-12 col-sm-5 col-md-5 col-lg-5 col-xl-5 offset-1 pt-4">
                <em class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Consequat dictum purus cursus nibh pellentesque quam. Quis nibh faucibus in iaculis. Quis etiam et quis varius volutpat enim. Dolor, non tristique elementum sed dolor, risus, habitasse fermentum nulla. Id dolor suspendisse mauris, tincidunt velit viverra in. Convallis facilisi laoreet sit ut amet.</em>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <img src="../public/images/cover-2.png" class="img-fluid" alt="...">
            </div>
        </div>
    </div>
</section>

<section id="chapters-deck" class="py-5">
    <div class="card-deck m-0">
        <div class="row mx-auto">
            <?php foreach ($articles as $article) : ?>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-3 d-flex align-items-stretch">
                    <div class="card mt-4 border-0">
                        <h3 class="text-center text-uppercase text-primary">Chapitre <?= $article['chapters'] ?></h3>
                        <a class="text-decoration-none" href="index.php?controller=article&task=show&id=<?= $article['id'] ?>"><h4 class="card-title text-center text-secondary"><?= $article['title'] ?></h4></a>
                        <a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>"><img class="card-img-top" src="../public/images/example.png" alt="Card image cap"></a>
                        <div class="card-body px-0">
                            <p class="card-text p-0"><?= $article['introduction'] ?></p>
                            <a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>">             
                                <img src="../public/images/arrow.svg" alt="...">
                            </a>
                            <?php
                                $timeStamp = $article['created_at'];
                                setlocale(LC_TIME, "fr_FR");
                                $timeStamp = strftime("%A %d %B %G", strtotime($timeStamp));
                            ?>
                            <p class="date card-text text-muted text-height-3"><?= $timeStamp ?></p>
                        </div>
                        <div class="card-footer bg-white">
                            <small class="text-muted">Temps de lecture : <?= $article['time'] ?> minutes</small>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
