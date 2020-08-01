<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content align-items-center bg-form">
      <div class="modal-header border-0">
        <h5 class="modal-title justify-content-center text-secondary" id="exampleModalLongTitle">Souhaitez-vous vous déconnecter ?</h5>
        <button type="button" class="close ml-3 align-self-center" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><img src="../public/images/close.svg" alt=""></span>
        </button>
      </div>
      <div class="modal-body text-center text-secondary px-3">
        <p>En cliquant sur Déconnecter vous quittez l'espace administration.</p><p>Tout travail non enregistré sera perdu.</p>
      </div>
      <div class="modal-footer border-0">
        <button type="button " class="btn btn-modal btn-outline-primary" data-dismiss="modal">Retour</button>
        
        <a href="index.php?controller=admin&task=logout">
            <button type="button " class="btn btn-modal btn-primary ml-2">Se Déconnecter</button>
        </a>
      </div>
    </div>
  </div>
</div>