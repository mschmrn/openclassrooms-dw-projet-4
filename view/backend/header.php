<div class="bg-info text-right py-xl-3 pr-xl-5 p-4">
  <?php if (isset($_SESSION["username"])) { ?>
      <a class="mx-2"><em><?= $_SESSION['name'] ?> <?= $_SESSION['surname'] ?> </em></a>
      <a class="ml-2 logout" href="index.php?controller=admin&task=logout" onclick="return window.confirm(`Êtes vous sûr d'en vouloir plus ?`)"><img src="../public/images/more.svg" alt=""></a>
  <?php } ?>
</div>