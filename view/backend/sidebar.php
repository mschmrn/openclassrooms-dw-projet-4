<!-- NAV -->
<div class="logonav p-4 border-bottom border-grey">
        <a href="index.php?controller=admin&task=index"><img src="../public/images/logo.svg" class="" alt=""></a>
</div>
<!-- MENU -->
<div class="menu my-5 px-2">
    <a class="nav-link text-white active py-2" href="index.php?controller=admin&task=index">
        <img src="../public/images/Dashboard.svg" alt="">Dashboard</a>
    <a class="nav-link text-white py-2" href="index.php?controller=admin&task=edit">
        <img src="../public/images/ecrire-article.svg" alt="">Écrire un article</a>
    <a class="nav-link text-white py-2" href="index.php?controller=admin&task=viewArticles">
        <img src="../public/images/gerer-article.svg" alt="">Articles</a>
    <a class="nav-link text-white py-2" href="index.php?controller=admin&task=viewDrafts">
        <img src="../public/images/brouillons.svg" alt="">Brouillons</a>
    <a class="nav-link text-white py-2" href="index.php?controller=admin&task=viewComments">
        <img src="../public/images/commentaires.svg" alt="">Commentaires</a>
    <a class="nav-link text-white py-2" href="#">
        <img src="../public/images/utilisateur.svg" alt="">Utilisateurs</a>
    <a class="nav-link text-white py-2" href="index.php?controller=admin&task=viewTrash">
        <img src="../public/images/corbeille.svg" alt="">Corbeille</a>

    <button type="button" class="btn btn-outline-info mt-5 text-secondary p-0 offset-1 sidebar-btn">
        <a class="nav-link text-white menu-user" href="index.php?controller=admin&task=add">Créer un utilisateur</a>
    </button>

    <button type="button" class="btn btn-outline-primary mt-3 text-secondary p-0 offset-1 sidebar-btn">
        <a class="nav-link text-red menu-logout" href="index.php?controller=admin&task=logout" onclick="return window.confirm(`Êtes vous sûr de vouloir vous déconnecter ?`)">Se déconnecter</a>
    </button>
</div>
