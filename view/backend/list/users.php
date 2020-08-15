<!-- USERS LIST -->						
<?php foreach ($users as $user) : if ($user['type'] == $condition) { ?>	
    <!-- CONTAINER -->
    <div class="container p-0 border-bottom border-grey border-top-0">
        <!-- CARD -->
        <div class="card flex-row flex-wrap border-0">
            <div class="card-body">
                <h2 class="card-title card-username">@<?= $user['username'] ?></h2>
                <p class="card-text"><?= $user['name']; ?> <?= $user['surname']; ?></p>
                <div class="d-flex justify-content-between pr-2">
                    <!-- DATE -->								
                    <p class="card-text text-muted"><?= $user['email']; ?></p>
                    <!-- BUTTONS -->
                    <div class="d-flex flex-nowrap pr-2">
                            <a href="index.php?controller=user&task=delete&id=<?= $user['id'] ?>"><img src="../public/images/delete.svg" alt="Supprimer l'utilisateur" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?`)"></a>
                    </div>
                </div>
            </div>
        </div> 
    </div>				
<?php } endforeach ?>			
<!-- NO DRAFT SAVED -->
<?php if($count = 0){ ?>
    <div class="col-12 py-4" >						
        <p class="text-left">Aucun utilisateur enregistré.</p>
    </div>
<?php } ?>
  
  
    
