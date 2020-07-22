<section id="list-articles" class="vh-100 bg-info col-10 ">
	<div class="container-fluid py-5">

    <!-- TITLE -->
        <div class="row mx-auto">
            <div class="col-12 d-inline-flex justify-content-between align-items-center">
                <div class="">
                    <h1 class="text-secondary">Tous les brouillons</h1>
                </div>
                <div class="">
                    <a href="index.php?controller=admin&task=edit"><button name="write-article" class="btn btn-primary text-uppercase" value="write" id="write">Écrire un article</button></a>
                </div>
            </div>
        </div>

    <!-- SEPARATOR -->
        <div class="row mx-auto mb-2">
            <div class="col-12">
                <hr class="bg-secondary">
            </div>
        </div>

    <!-- TITLE -->
    <div class="row mx-auto">
        <div class="col-12">
            <h4>Listing des brouillons</h4>
        </div>
    </div>

    <!-- DRAFTS LIST -->
        <div class="row mx-auto mt-2 bg-form">

            <!-- PHP LOOP CONDITION -->
            <?php foreach ($drafts as $draft) : ?>

			<div class="col-12 bg-white py-4">						
				<div class="row mx-auto p-2">
					<img src="../public/images/example-admin.jpg" class="logo col-3" alt="">
						<div class="card col-9 border-0 bg-white ">
							<div class="card-body">
								<h2 class="card-title card-chapter text-primary">CHAPITRE <?= $draft['chapters'] ?></h2>
								<h5 class="card-title"><?= $draft['title'] ?></h5>
                                <?php if(isset($draft['modified_at'])) { ?><p class="card-text text-muted">Dernière modification le <?= \Date::display($draft['modified_at'], true) ?><p><?php } ?>
                            </div>
    <!-- BUTTONS -->
                            <div class="d-flex justify-content-end px-2">
                                <a href="index.php?controller=admin&task=edit&id=<?= $draft['id'] ?>"><img src="../public/images/edit.svg" alt=""></a>
                                <a href="index.php?controller=admin&task=view&id=<?= $draft['id'] ?>"><img src="../public/images/view.svg" alt="" class="px-2"></a>
                                <a href="index.php?controller=article&task=delete&id=<?= $draft['id'] ?>"><img src="../public/images/delete.svg" alt=""></a>
                            </div>
                        </div>  
                </div> 

    <!-- SEPARATOR -->

                <div class="row mx-auto">
                    <div class="col-12 bg-white">
                        <hr class="bg-grey">
                    </div>
                </div>
            </div>

            <!-- PHP LOOP END CONDITION -->
            <?php endforeach ?> 
        </div>
              
    <!-- NO DRAFT SAVED -->
    <?php if($drafts == null){ ?>
		    <div class="col-12 py-4" >						
                <p class="text-left">Aucun brouillon enregistré.</p>
            </div>       
        </div>
    </div>
    <?php } ?>
