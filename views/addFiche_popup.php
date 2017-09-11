<!-- modal for adding a new "fiche" -->
<div id="addFiche" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajouter une fiche</h4>
      </div>
      <div class="modal-body">
        <form id="form_addFiche">
          <div class="form-group">
            <label>Libellé : </label>
            <input type="text" class="form-control" name="libelle_fiche" id="libelle_fiche"/>
          </div>
          <div class="form-group">
            <label>Description : </label>
            <input type="text" class="form-control" name="description_fiche" id="description_fiche"/>
          </div>
          <div class="form-group">
            <label>Catégorie(s) : </label>
            <select class="form-control selectpicker" multiple name="categorie_fiche" id="categorie_fiche">
              <?php foreach ($categorie as $key => $item) 
              {
                ?>
                <option value="<?= $item['id_categorie'] ?>"><?= $item['libelle_categorie'] ?></option>
                <?php
              }
              ?>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="ajout">Enregistrer</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>