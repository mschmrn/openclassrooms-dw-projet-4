<header>

  <!-- Alternative header -->
  <?php if ($path == "/articles/show"){?>
      <nav class="navbar navbar-expand-lg navbar-dark bg-secondary sticky-top border-bottom border-dark">
  <?php } else { ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary sticky-top border-bottom border-dark">
  <?php } ?>

  <a class="navbar-brand ml-4" href="index.php">
    <img src="../public/images/logo.svg" width="30" height="30" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end mr-4 text-uppercase" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item text-dark active">
        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item text-dark active">
        <a class="nav-link" href="index.php?controller=article&task=index">Chapitres</a>
      </li>
      <li class="nav-item text-dark active">
        <a class="nav-link" href="index.php?controller=contact&task=contact">Contact</a>
      </li>
    </ul>
  </div>
</nav>
</header>

