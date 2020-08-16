<header>
  <!-- ALTERNATIVE HEADER COLOR -->
  <?php if ($path == "/articles/show"){?>
    <nav class="navbar navbar-expand-md navbar-dark bg-secondary sticky-top border-bottom border-dark">
  <?php } else { ?>
    <nav class="navbar navbar-expand-md navbar-light bg-primary sticky-top border-bottom border-dark">
  <?php } ?>
    <!-- LOGO -->
    <a class="navbar-brand color-invert ml-4" href="index.php">
      <img src="../public/images/logo.svg" width="30" height="30" alt="Logo Jean Forteroche">
    </a>
    <!-- RESPONSIVE NAVBAR TOGGLE -->
    <button class="navbar-toggler border-0 text-white" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- PAGES LINKS -->
    <div class="collapse navbar-collapse justify-content-end mr-4 text-uppercase" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item <?php if ($path == "index"){?> active <?php } ?>">
          <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item <?php if ($path == "articles/index"){?> active <?php } ?>">
          <a class="nav-link" href="index.php?controller=article&task=index">Chapitres</a>
        </li>
         <li class="nav-item <?php if ($path == "form/contact"){?> active <?php } ?>">
          <a class="nav-link" href="index.php?controller=contact&task=contact_author">Contact</a>
        </li>
      </ul>
    </div>
  </nav>
</header>