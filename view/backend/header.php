<div class="col-12 d-flex justify-content-end align-items-center bg-info text-right">
  <?php if (isset($_SESSION["username"])) { ?>
    <em>
      <?= $_SESSION['name'] ?> <?= $_SESSION['surname'] ?> 
    </em>
    <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <!-- BUTTON -->
      <img src="../public/images/more.svg" alt="">
    </button>
    <div class="dropdown-menu bg-form border-0" aria-labelledby="dropdownMenu2">
        <!-- FORM OPTIONS -->
        <form action="index.php?controller=admin&task=index_options" method="POST">
          <button type="submit" name="index" value="back" class="dropdown-item " type="button">Retour au site</button>
          <button type="submit" name="index" value="user" class="dropdown-item" type="button">Créer un utilisateur</button>
          <div class="dropdown-divider"></div>
          <button type="submit" name="index" value="logout" class="dropdown-item " type="button">Se déconnecter</button>
        </form>
    </div> 
  <?php } ?>
</div> 




