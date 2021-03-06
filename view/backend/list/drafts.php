<!-- DRAFT LIST -->						
<?php foreach ($drafts as $draft) : ?>	
    <!-- CONTAINER -->
    <div class="container p-0 border-bottom border-grey border-top-0 bg-form">
        <!-- CARD -->
        <div class="card flex-row flex-wrap border-0 py-2">
            <!-- IMAGE -->
            <div class="card-header col-xl-3 border-0 bg-white">
                <img src="<?= $draft['img_url'] ?>" class="w-100" alt="Image d'illustration du brouillon">
            </div>
            <!-- CONTENT -->
            <div class="card-block col-xl-9 p-xl-2 p-4 bg-white">
                <h2 class="card-title card-chapter text-primary">Chapitre <?= $draft['chapters'] ?></h2>
                <h5 class="card-title"><?= $draft['title'] ?></h5>
                <p class="card-text text-muted"><?= \Text::truncate($draft['content'], 40, true, true); ?></p>
                <div class="d-flex flex-row justify-content-between justify-content-center text-muted border-0 bg-white w-100">
                    <!-- DATE -->
                    <div class="d-flex flex-nowrap ">							
                        <?php if(isset($draft['modified_at'])) { ?>
                            <i class="card-text text-muted">Modifié le <?= \Text::display_date($draft['modified_at'], true); ?></i>
                        <?php } else { ?>
                            <p class="card-text text-muted">Créé le <?= \Text::display_date($draft['created_at']); ?></p>
                        <?php } ?>
                    </div>
                    <!-- BUTTONS -->
                    <?php if($draft['trash'] == '0'){ ?>
                        <div class="d-flex flex-nowrap pr-2">
                            <a href="index.php?controller=admin&task=editArticle&id=<?= $draft['id'] ?>"><img src="../public/images/edit.svg" alt="Editer le brouillon"></a>                        
                            <a href="index.php?controller=article&task=preview&id=<?= $draft['id'] ?>"><img src="../public/images/view.svg" alt="Prévisualiser le brouillon" class="px-2"></a>
                            <a href="index.php?controller=article&task=delete&id=<?= $draft['id'] ?>"><img src="../public/images/delete.svg" alt="Mettre le brouillon à la corbeille" onclick="return window.confirm(`Êtes vous sûr de vouloir mettre cet article à la corbeille ?`)"></a>
                        </div> 
                    <?php } else { ?>	
                        <div class="d-flex flex-nowrap pr-2">
                            <a href="index.php?controller=article&task=restore&id=<?= $draft['id'] ?>"><img src="../public/images/restore.svg" alt="Restaurer le brouillon" class="px-2"></a>
                            <a href="index.php?controller=article&task=delete&id=<?= $draft['id'] ?>"><img src="../public/images/delete.svg" alt="Supprimer le brouillon" onclick="return window.confirm(`Êtes vous sûr de vouloir définitivement supprimer cet article ?`)"></a>
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
        <p class="text-left">Aucun brouillon dans la corbeille.</p>
    </div>
<?php } ?>
</div>

