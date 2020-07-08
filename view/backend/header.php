<header>
  <nav class="border-bottom sticky-top border-dark">
    <div class="row mx-auto">
      <div class="col-2 bg-secondary p-4">
        <a href="index.php?controller=admin&task=index"><img src="../public/images/logo.svg" class="logo" alt=""></a>
      </div>
      <div class="col-10 bg-info text-right p-3">
          <?php if (isset($_SESSION["username"])) { ?>
            <a class="mx-2"><em>Jean Forteroche</em></a>
            <a class="mx-2 logout" href="index.php?controller=admin&task=logout" onclick="return window.confirm(`Êtes vous sûr de vouloir vous déconnecter ?`)"><img src="../public/images/connect.svg" alt=""></a>
          <?php } ?>
      </div>   
    </div>
  </nav>
</header>