

<section id="author-introduction " class="bg-primary py-5">

<div class="container-fluid ">
    <div class="d-flex flex-row-reverse">
        <div class="p-2"><img src="../public/images/author.jpg"></div>
    </div>
    <div class="row mx-auto">
        <div class="col-8">
            <h1 class="m-0 text-left text-secondary display-3">Jean Forteroche</h1>
        </div>
        <div class="col-4 align-self-end">
            <h4 class="text-right text-white text-uppercase">Écrivain et conteur</h4>
        </div>
    </div>
    <div class="row mx-auto">
        <div class="col-12">
            <hr class="bg-secondary">
        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="row mx-auto">
        <div class="d-flex flex-column col-3 offset-1">
            <div class="p-2">
                <p class="m-0">Le retour de la nuit.<p>
                <i>Edition des songes (2001)</i>
            </div>
            <div class="p-2">
                <p class="m-0">Étranges escales.<p>
                <i>Les Éditions de l'encre (2005)</i>            
            </div>
            <div class="p-2">
                <p class="m-0">L'inconnue.<p>
                <i>Éditions des sables (2005)</i>            
            </div>
            <div class="p-2">
                <p class="m-0">Les oiseaux de nuit.<p>
                <i>Éditions des sables (2018)</i>            
            </div>
            <div class="p-2">
                <p class="m-0">Un billet pour l'Alaska.<p>
                <i>Lointaines écritures (2020)</i>            
            </div>
        </div>
        <div class="d-flex flex-column col-6 offset-1">
            <div class="p-2">
                <em>Romancier et acteur, lorem ipsum dolor sit amet, consectetur adipiscing elit. Purus libero, eu sagittis tellus augue luctus lorem ipsum dolor sit amet,dolor sit amet, consectetur adipiscing elit. Purus libero, eu sagittis tellus augue luctus lorem ipsum dolor sit amet, Romancier et acteur, lorem ipsum dolor sit amet, consectetur adipiscing elit. Purus libero, eu sagittis tellus augue luctus lorem ipsum dolor sit amet,dolor sit amet, consectetur adipiscing elit. Purus libero, eu sagittis tellus augue luctus lorem ipsum dolor sit ame.</em>
                </div>
        </div>
    </div>
</div>

</section>



<section id="author-contact" class="bg-white py-5">
    <div class="container-fluid">

        <div class="row mx-auto">
            <div class="col-12">
                <h1 class="text-left text-secondary display-4">Me contacter</h1>
            </div>
        </div>
        <div class="row mx-auto">
            <div class="col-12">
                <hr class="bg-secondary">
            </div>
        </div>

        <div class="row mx-auto">
            <div class="col-6 offset-1 py-4">
                <form action="index.php?controller=***&task=***" method="POST">
                    <div class="form-group">
                        <label for="content">Nom</label>
                        <input type="name" class="form-control" name="name" id="name" placeholder="Jean Dumont">
                    </div>
                    <div class="form-group">
                        <label for="email">Mail</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="nom@exemple.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Sujet du message</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>Contact personnel</option>
                            <option>Contact professionnel</option>
                            <option>Demande d'information</option>
                        </select>
                        <i class="fa fa-chevron-down"></i>
                    </div>
                    <div class="form-group">
                        <label for="content">Message</label>
                        <textarea class="form-control" name="content" id="content" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="article_id" value="<?= $article_id ?>">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Envoyer</button>
                </form>
            </div>
            <div class="col-3 offset-1 align-self-center">
                <p>Romancier et acteur, lorem ipsum dolor sit amet, consectetur adipiscing elit. Purus libero, eu sagittis tellus augue luctus lorem ipsum dolor sit amet,dolor sit amet, consectetur adipiscing elit. Purus libero, eu sagittis tellus augue luctus lorem ipsum dolor sit amet, Romancier et acteur, lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>


</div>

</section>