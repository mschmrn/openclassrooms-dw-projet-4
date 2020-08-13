<!-- LOGO NAV -->
<nav class="backend p-0 border-bottom border-grey">
    <div class="d-flex align-items-center justify-content-start ml-4 ml-md-3 logonav  ">
        <a href="index.php?controller=admin&task=index"><img src="../public/images/logo.svg" class="" alt=""></a>
    </div>
</nav>
<!-- MENU -->
<div class="menu my-5 px-2">
    <a class="nav-link item text-white py-2 color-hover" href="index.php?controller=admin&task=index">
        <img src="../public/images/Dashboard.svg" alt=""><span class="hide">Dashboard</span>
    </a>
    <a class="nav-link item text-white py-2 color-hover" href="index.php?controller=admin&task=editArticle">
        <img src="../public/images/ecrire-article.svg" alt=""><span class="hide">Écrire un article</span>
    </a>
    <a class="nav-link item text-white py-2 color-hover" href="index.php?controller=admin&task=viewArticles">
        <img src="../public/images/gerer-article.svg" alt=""><span class="hide">Articles</span>
    </a>
    <a class="nav-link item text-white py-2 color-hover" href="index.php?controller=admin&task=viewDrafts">
        <img src="../public/images/brouillons.svg" alt=""><span class="hide">Brouillons</span>
    </a>
    <a class="nav-link item text-white py-2 color-hover" href="index.php?controller=admin&task=viewComments">
        <img src="../public/images/commentaires.svg" alt=""><span class="hide">Commentaires</span>
    </a>
    <a class="nav-link item text-white py-2 color-hover" href="index.php?controller=admin&task=viewUsers">
        <img src="../public/images/utilisateur.svg" alt=""><span class="hide">Utilisateurs</span>
    </a>
    <a class="nav-link item text-white py-2 color-hover" href="index.php?controller=admin&task=viewTrash">
        <img src="../public/images/corbeille.svg" alt=""><span class="hide">Corbeille</span>
    </a>

    <span class="hide"><button type="button" class="btn btn-outline-info mt-5 text-secondary p-0 offset-1 sidebar-btn">
        <a class="nav-link text-white menu-user" href="index.php?controller=admin&task=add">Créer un utilisateur</a>
    </button></span>

    <span class="hide"><button type="button" class="btn btn-outline-primary mt-3 p-0 offset-1 sidebar-btn" data-toggle="modal" data-target="#exampleModalCenter">
        <span class="nav-link menu-logout">Se déconnecter</span>
    </button></span>
    <!-- Modal -->
    <?php include 'logout-modal.php' ?>
</div>