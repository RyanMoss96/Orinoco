      <script type="text/javascript">
          $(window).load(function(){
              $('#newProduct').modal('show');
          });
      </script>
      <!-- Modal -->
      <div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Add new category</h4>
            </div>
            <div class="modal-body">
              <form method="post" action="helpers/postCategory.php?action=update" id="postProduct">
               <div class="form-group">
                <label class="control-label" for="id">
                  ID
                </label>
                <input class="form-control" id="id" name="id" type="text" readonly
                <?php if(isset($category->category_id) && $category->category_id!= NULL){
                  echo "value=\"". $category->category_id. "\"";
                  }?> />
               </div>
               <div class="form-group ">
                <label class="control-label requiredField" for="title">
                 Title
                 <span class="asteriskField">
                  *
                 </span>
                </label>
                <input class="form-control" id="title" name="title" type="text" required 
                <?php if(isset($category->name) && $category->name!= NULL){
                  echo "value=\"". $category->name. "\"";
                  }?>/>
               </div>
               <div class="form-group ">
                <label class="control-label " for="description">
                 Description
                </label>
                <textarea class="form-control" id="description" name="description" type="text"><?php if(isset($category->description) && $category->description!= NULL){echo $category->description;}?></textarea>

               </div>
               <span>* = required</span>
              </form>

            </div>
            <div class="modal-footer">
              <button type="button"class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="submit" form="postProduct"  class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>