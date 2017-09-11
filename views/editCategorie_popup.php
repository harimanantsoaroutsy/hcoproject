<!-- modal for updating category -->
<div id="editCategorie" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modifier la catégorie</h4>
      </div>
      <div class="modal-body">
        <form id="form_editCategorie">
          <div class="form-group">
            <label for="edited_categorie_name">Identifiant : </label>
            <input type="text" class="form-control" id="id_categorie_edit" readOnly/>
          </div>
          <div class="form-group">
            <label for="edited_categorie_name">Nom de la catégorie : </label>
            <input type="text" class="form-control" name="libelle_categorie_edit" id="libelle_categorie_edit"/>
          </div>
          <div class="form-group">
            <label for="edited_parent_categorie">Catégorie parent : </label>
            <select class="form-control" id="id_parent">
              <?php foreach ($categorie as $key => $item1)
              {
                ?>
                <option value="<?= $item1['id_categorie'] ?>"><?= $item1['libelle_categorie'] ?></option>
                <?php
              }
              ?>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="updateNode">Enregistrer</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>