<!-- LOGO NAV -->
<nav class="backend p-0 border-bottom border-grey">
    <div class="d-flex align-items-center justify-content-start ml-4 logonav  ">
        <a href="index.php?controller=admin&task=index"><img src="../public/images/logo.svg" class="" alt=""></a>
    </div>
</nav>
<!-- MENU -->
<div class="menu my-5 px-2">
    <a class="nav-link item text-white py-2 color-hover" href="index.php?controller=admin&task=index">
        <img class="item" src="../public/images/Dashboard.svg" style='fill:red' alt="">Dashboard
    </a>
    <a class="nav-link item text-white py-2 color-hover" href="index.php?controller=admin&task=editArticle">
        <img src="../public/images/ecrire-article.svg" alt="">Écrire un article
    </a>
    <a class="nav-link item text-white py-2 color-hover" href="index.php?controller=admin&task=viewArticles">
        <img src="../public/images/gerer-article.svg" fill = "#F00000" alt="">Articles
    </a>
    <a class="nav-link item text-white py-2 color-hover" href="index.php?controller=admin&task=viewDrafts">
        <img src="../public/images/brouillons.svg" alt="">Brouillons
    </a>
    <a class="nav-link item text-white py-2 color-hover" href="index.php?controller=admin&task=viewComments">
        <img src="../public/images/commentaires.svg" alt="">Commentaires
    </a>
    <a class="nav-link item text-white py-2 color-hover" href="index.php?controller=admin&task=viewUsers">
        <img src="../public/images/utilisateur.svg" alt="">Utilisateurs
    </a>
    <a class="nav-link item text-white py-2 color-hover" href="index.php?controller=admin&task=viewTrash">
        <img src="../public/images/corbeille.svg" alt="">Corbeille
    </a>

    <button type="button" class="btn btn-outline-info mt-5 text-secondary p-0 offset-1 sidebar-btn">
        <a class="nav-link text-white menu-user" href="index.php?controller=admin&task=add">Créer un utilisateur</a>
    </button>

   <button type="button" class="btn btn-outline-primary mt-3 p-0 offset-1 sidebar-btn" data-toggle="modal" data-target="#exampleModalCenter">
        <span class="nav-link menu-logout">Se déconnecter</span>
    </button>
    <!-- Modal -->
    <?php include 'logout-modal.php' ?>
</div>