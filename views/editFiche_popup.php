<!-- modal for updating "fiche" -->
<div id="editFiche" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="fiche" data-categorie="">Modifier une fiche</h4>
      </div>
      <div class="modal-body">
        <form id="form_editFiche">
          <div class="form-group">
            <label for="fiche_name_edit">Identifiant : </label>
            <input type="text" class="form-control" id="id_fiche_edit" readOnly/>
          </div>
          <div class="form-group">
            <label for="fiche_name_edit">Libellé : </label>
            <input type="text" class="form-control" name="libelle_fiche_edit" id="libelle_fiche_edit"/>
          </div>
          <div class="form-group">
            <label for="fiche_description_edit">Description : </label>
            <input type="text" class="form-control" name="description_fiche_edit" id="description_fiche_edit"/>
          </div>
          <div class="form-group">
            <label for="selectfiche">Catégorie(s) : </label>
            <select class="selectpicker form-control" name="categorie_fiche_edit" id="categorie_fiche_edit" multiple>
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
        <button type="button" class="btn btn-success" id="updateFiche">Enregistrer</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>
