<!-- LOGO NAV -->
<nav class="backend p-0 border-bottom border-grey">
    <div class="d-flex align-items-center justify-content-start ml-4 ml-md-3 logonav  ">
        <a href="index.php?controller=admin&task=index"><img src="../public/images/logo.svg" class="" alt=""></a>
    </div>
</nav>
<!-- MENU -->
<div class="menu my-5 px-2">
    <a class="nav-link item py-2<?php if ($path != "index") { ?> text-white color-hover<?php } ?>" href="index.php?controller=admin&task=index">
        <img class="<?php if ($path === "index") { ?> filter-test <?php } else { ?> invert-colors <?php } ?>" src="../public/images/apps.svg" alt="Dashboard"><span class="hide">Dashboard</span>
    </a>
    <a class="nav-link item py-2<?php if ($path != "articles/edit") { ?> text-white color-hover<?php } ?>" href="index.php?controller=admin&task=editArticle">
        <img class="<?php if ($path === "articles/edit") { ?> filter-test <?php } else { ?> invert-colors <?php } ?>" src="../public/images/create.svg" alt="Dashboard"><span class="hide">Écrire un article</span>
    </a>
    <a class="nav-link item py-2<?php if ($path != "articles/index") { ?> text-white color-hover<?php } ?>" href="index.php?controller=admin&task=viewArticles">
        <img class="<?php if ($path === "articles/index") { ?> filter-test <?php } else { ?> invert-colors <?php } ?>" src="../public/images/articles.svg" alt="Dashboard"><span class="hide">Articles</span>
    </a>
    <a class="nav-link item py-2<?php if ($path != "articles/drafts") { ?> text-white color-hover<?php } ?>" href="index.php?controller=admin&task=viewDrafts">
        <img class="<?php if ($path === "articles/drafts") { ?> filter-test <?php } else { ?> invert-colors <?php } ?>" src="../public/images/drafts.svg" alt="Dashboard"><span class="hide">Brouillons</span>
    </a>
    <a class="nav-link item py-2<?php if ($path != "comments") { ?> text-white color-hover<?php } ?>" href="index.php?controller=admin&task=viewComments">
        <img class="<?php if ($path === "comments") { ?> filter-test <?php } else { ?> invert-colors <?php } ?>" src="../public/images/comments.svg" alt="Dashboard"><span class="hide">Commentaires</span>
    </a>
    <a class="nav-link item py-2<?php if ($path != "users") { ?> text-white color-hover<?php } ?>" href="index.php?controller=admin&task=viewUsers">
        <img class="<?php if ($path === "users") { ?> filter-test <?php } else { ?> invert-colors <?php } ?>" src="../public/images/users.svg" alt="Dashboard"><span class="hide">Utilisateurs</span>
    </a>
    <a class="nav-link item py-2<?php if ($path != "trash") { ?> text-white color-hover<?php } ?>" href="index.php?controller=admin&task=viewTrash">
        <img class="<?php if ($path === "trash") { ?> filter-test <?php } else { ?> invert-colors <?php } ?>" src="../public/images/trash.svg" alt="Dashboard"><span class="hide">Corbeille</span>
    </a>

    <span class="hide">
        <button type="button" class="btn btn-outline-info mt-5 text-secondary p-0 offset-1 sidebar-btn">
            <a class="nav-link text-white menu-user" href="index.php?controller=admin&task=add">Créer un utilisateur</a>
        </button>
    </span>

    <span class="hide">
        <button type="button" class="btn btn-outline-primary mt-3 p-0 offset-1 sidebar-btn" data-toggle="modal" data-target="#exampleModalCenter">
            <span class="nav-link menu-logout">Se déconnecter</span>
        </button>
    </span>
    <!-- Modal -->
    <?php include 'logout-modal.php' ?>
</div>