<!-- COMMENT LIST -->						
<?php foreach ($comments as $comment) : if ($comment[$condition] != 0) { ?>	
    <!-- CONTAINER -->
    <div class="container p-0 border-bottom border-grey border-top-0">
        <!-- CARD -->
        <div class="card flex-row flex-wrap border-0">
            <div class="card-body">
                <h2 class="card-title card-username">@<?= $comment['author'] ?></h2>
                <?php if($condition == 'reported') { ?> <p class="text-primary"><i class="fas fa-flag text-primary"></i> Signalé <?= $comment['reported'] ?> fois. </p><?php } ?>
                <p class="card-text"><?= \Text::truncate($comment['content'], 80, true, true); ?></p>
                <div class="d-flex justify-content-between pr-2">
                    <!-- DATE -->								
                    <p class="card-text text-muted"><?= \Text::display_date($comment['created_at']); ?></p>
                    <!-- BUTTONS -->
                    <div class="d-flex flex-nowrap pr-2">
                        <?php if($condition == 'published') { ?>
                            <a href="index.php?controller=comment&task=preview&id=<?= $comment['id'] ?>"><img src="../public/images/view.svg" alt="Prévisualiser le commentaire" class="px-2"></a>
                        <?php } else if ($condition != 'trash') { ?>
                            <a href="index.php?controller=comment&task=valid&id=<?= $comment['id'] ?>"><img src="../public/images/check.svg" alt="Valider le commentaire" class="px-2"></a>
                        <?php } else { ?>
                            <a href="index.php?controller=comment&task=restore&id=<?= $comment['id'] ?>"><img src="../public/images/restore.svg" alt="Restaurer le commentaire" class="px-2"></a>
                        <?php } ?>
                            <a href="index.php?controller=comment&task=delete&id=<?= $comment['id'] ?>"><img src="../public/images/delete.svg" alt="Supprimer le commentaire" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?`)"></a>
                
                    </div>
                </div>
            </div>
        </div>
    </div>				
<?php } endforeach ?>			
<!-- NO DRAFT SAVED -->
<?php if($comment[$condition] = '0'){ ?>
    <div class="col-12 py-4" >						
        <p class="text-left">Aucun commentaire.</p>
    </div>
<?php } ?>
  
  
    
