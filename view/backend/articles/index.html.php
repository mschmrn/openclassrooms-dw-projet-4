<section id="list-articles">
	<div class="container-fluid py-5">
        <!-- TITLE -->
        <div class="row mx-auto">
            <div class="col-12 d-inline-flex justify-responsive mobile-column mobile-center align-items-center">
                <div class="">
                    <h1 class="text-secondary">Tous les articles publiés</h1>
                </div>
                <div class="">
                    <a href="index.php?controller=admin&task=editArticle"><button name="write-article" class="btn btn-primary text-uppercase" value="write" id="write">Écrire un article</button></a>
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
                <h4 class="mobile-center">Listing des articles</h4>
            </div>
        </div>
        <!-- ARTICLES LIST -->
        <div class="row mx-auto mt-2">
        <div class="col-12">
            <?php include 'view/backend/list/articles.php' ?>
        </div>
        </div>
    </div>
</section>
    
