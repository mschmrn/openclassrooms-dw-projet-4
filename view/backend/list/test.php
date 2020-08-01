<!-- ARTICLES LIST -->						
<?php foreach ($items as $item) : ?>	
    <!-- CONTAINER -->
    <div class="container p-0">
        <!-- CARD -->
        <div class="card flex-row flex-wrap border-top-0 border-left-0 border-right-0 border-bottom border-grey py-2">
            <!-- IMAGE -->
            <div class="card-header col-xl-3 border-0 bg-white">
                <img src="../public/images/example-admin.jpg" class="w-100" alt="">
            </div>
            <!-- CONTENT -->
            <div class="card-block col-xl-9 p-xl-2 p-4 bg-white">
                <a href="index.php?controller=admin&task=editArticle&id=<?= $item['id'] ?>"><h2 class="card-title card-chapter text-primary">CHAPITRE <?= $article['chapters'] ?></h2></a>
                <h5 class="card-title"><?= $item['title'] ?></h5>
                <p class="card-text text-muted"><?= \Text::truncate($article['content'], 40, true, true); ?></p>
                <div class="d-flex flex-row justify-content-between justify-content-center text-muted border-0 bg-white w-100">
                    <!-- DATE -->
                    <div class="d-flex flex-nowrap ">							
                        <?php if(isset($article['modified_at'])) { ?>
                            <i class="card-text text-muted">Modifié le <?= \Date::display($item['modified_at']); ?></i>
                        <?php } else { ?>
                            <p class="card-text text-muted">Publié le <?= \Date::display($item['created_at']); ?></p>
                        <?php } ?>
                    </div>
                    <!-- BUTTONS -->
                    <?php if($article['trash'] == '0'){ ?>
                        <div class="d-flex flex-nowrap pr-2">
                            <a href="index.php?controller=admin&task=editArticle&id=<?= $item['id'] ?>"><img src="../public/images/edit.svg" alt=""></a>
                            <a class='px-2' href="index.php?controller=article&task=delete&id=<?= $article['id'] ?>"><img src="../public/images/delete.svg" alt="" onclick="return window.confirm(`Êtes vous sûr de vouloir mettre cet article à la corbeille ?`)"></a>
                        </div>
                    <?php } else { ?>	
                        <div class="d-flex flex-nowrap pr-2">
                            <a href="index.php?controller=article&task=restore&id=<?= $item['id'] ?>"><img src="../public/images/restore.svg" alt="" class="px-2"></a>
                            <a href="index.php?controller=article&task=delete&id=<?= $item['id'] ?>"><img src="../public/images/delete.svg" alt="" onclick="return window.confirm(`Êtes vous sûr de vouloir définitivement supprimer cet article ?`)"></a>
                        </div> 
                </div>
                    <?php } ?>
            </div>
        </div>
    </div>				
<?php endforeach ?>		
<!-- NO DRAFT SAVED -->
<?php if($items == null){ ?>
    <div class="col-12 py-4" >						
        <p class="text-left">Aucun article dans la corbeille.</p>
    </div>
<?php } ?>

  
    
