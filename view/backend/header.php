  <nav class="border-bottom sticky-top border-grey">
      <div class="bg-info text-right py-xl-3 pr-xl-5 p-3">
        <?php if (isset($_SESSION["username"])) { ?>
            <a class="mx-2"><em>Jean Forteroche</em></a>
            <a class="mx-2 logout" href="index.php?controller=admin&task=logout" onclick="return window.confirm(`Êtes vous sûr de vouloir vous déconnecter ?`)"><img src="../public/images/connect.svg" alt=""></a>
        <?php } ?>
      </div>
      </nav>




<!--
<div class="row mx-auto">
      <div class="bg-secondary py-xl-4 px-xl-5 p-4 col-2">
        <a href="index.php?controller=admin&task=index"><img src="../public/images/logo.svg" class="logo" alt=""></a>
      </div>
        -->