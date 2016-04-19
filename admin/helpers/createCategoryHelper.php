
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
              <form method="post" action="helpers/postCategory.php" id="postProduct">
               <div class="form-group ">
                <label class="control-label requiredField" for="title">
                 Title
                 <span class="asteriskField">
                  *
                 </span>
                </label>
                <input class="form-control" id="title" name="title" type="text" required />
               </div>
               <div class="form-group ">
                <label class="control-label " for="description">
                 Description
                </label>
                <textarea class="form-control" id="description" name="description" type="text"></textarea>

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