<!-- modal for adding a new category -->
<div id="addCategorie" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajouter une catégorie</h4>
      </div>
      <div class="modal-body">
        <form id="form_addCategorie">
          <div class="form-group">
            <label>Catégorie parent : </label>
            <input type="text" class="form-control" id="parent_categorie" readOnly/>
          </div>
          <div class="form-group">
           <label>Nom de la catégorie : </label>
           <input type="text" class="form-control" name="nom_categorie" id="nom_categorie" />
         </div>
       </form>
     </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-success" id="addNode">Enregistrer</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
    </div>
  </div>
</div>
</div>