<header class="vh-0">
  <nav class="navbar navbar-expand-lg navbar-light bg-tertiary sticky-top p-0 m-0 border-bottom border-lightgrey">
    <div class="col-2 bg-secondary pl-4 py-3">
      <a href="index.php?controller=admin&task=index"><img src="../public/images/logo.svg" alt=""></a>
    </div>
   
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="col-10 collapse navbar-collapse justify-content-end mr-4" id="navbarNav">
      <ul class="navbar-nav">
        <?php if (isset($_SESSION["username"])) { ?>
          <li class="nav-item text-dark active">
            <a class="nav-link">Jean Forteroche</a>
          </li>
          <li class="nav-item text-dark active">
            <a class="nav-link" href="index.php?controller=admin&task=logout" onclick="return window.confirm(`Êtes vous sûr de vouloir vous déconnecter ?`)"><img src="../public/images/connect.svg" alt=""></a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </nav>
</header>

