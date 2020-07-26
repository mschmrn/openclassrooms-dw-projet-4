<!-- DRAFTS LIST -->						
    <?php foreach ($drafts as $draft) : ?>	
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
                <h2 class="card-title card-chapter text-primary">CHAPITRE <?= $draft['chapters'] ?></h2>
                <h5 class="card-title"><?= $draft['title'] ?></h5>
                <p class="card-text text-muted"><?= \Text::truncate($draft['content'], 40, true, true); ?></p>
                <div class="d-flex flex-row justify-content-between justify-content-center text-muted border-0 bg-white w-100">
                    <!-- DATE -->
                    <div class="d-flex flex-nowrap ">							
                        <?php if(isset($article['modified_at'])) { ?>
                            <i class="card-text text-muted">Modifié le <?= \Date::display($draft['modified_at']); ?></i>
                        <?php } else { ?>
                            <p class="card-text text-muted">Publié le <?= \Date::display($draft['created_at']); ?></p>
                        <?php } ?>
                    </div>
                    <!-- BUTTONS -->
                    <?php if($draft['trash'] == '0'){ ?>
                    <div class="d-flex flex-nowrap pr-2">
                        <a href="index.php?controller=admin&task=edit&id=<?= $draft['id'] ?>"><img src="../public/images/edit.svg" alt=""></a>
                        <a href="index.php?controller=admin&task=view&id=<?= $draft['id'] ?>"><img src="../public/images/view.svg" alt="" class="px-2"></a>
                        <a href="index.php?controller=article&task=delete&id=<?= $draft['id'] ?>"><img src="../public/images/delete.svg" alt="" onclick="return window.confirm(`Êtes vous sûr de vouloir mettre cet article à la corbeille ?`)"></a>
                    </div>
                    <?php } else { ?>	
                        <div class="d-flex flex-nowrap pr-2">
                        <a href="index.php?controller=article&task=restore&id=<?= $draft['id'] ?>"><img src="../public/images/restore.svg" alt="" class="px-2"></a>
                        <a href="index.php?controller=article&task=delete&id=<?= $draft['id'] ?>"><img src="../public/images/delete.svg" alt="" onclick="return window.confirm(`Êtes vous sûr de vouloir définitivement supprimer cet article ?`)"></a>
                    </div>
                    <?php } ?>	
                </div>
            </div>
        </div>
    </div>				
    <?php endforeach ?>			
    <!-- NO DRAFT SAVED -->
    <?php if($drafts == null){ ?>
    <div class="col-12 py-4" >						
        <p class="text-left">Aucun brouillon enregistré.</p>
    </div>
    <?php } ?>
</div>

