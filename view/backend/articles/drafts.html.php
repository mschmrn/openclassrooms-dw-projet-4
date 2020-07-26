<section id="list-drafts" class="<?php if(isset($drafts)){ ?>vh-100<?php } ?> bg-info">
    <!-- CONTAINER -->
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
        <div class="row mx-auto mt-2">
            <div class="col-12">
                 <?php include 'view/backend/templates/drafts.php' ?>
            </div>
        </div>
    </div>
</section>
