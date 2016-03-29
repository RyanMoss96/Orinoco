<!-- Button trigger modal -->
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#newProduct">
        Launch demo modal
      </button>
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
              <h4 class="modal-title" id="myModalLabel">Add new product</h4>
            </div>
            <div class="modal-body">
              <form method="post" action="postProduct.php" id="postProduct">
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
                <label class="control-label " for="photolink">
                 Photo link
                </label>
                <input class="form-control" id="photolink" name="photolink" type="text"/>
               </div>
               <div class="form-group ">
                <label class="control-label " for="description">
                 Description
                </label>
                <input class="form-control" id="description" name="description" type="text"/>
               </div>
               <div class="form-group ">
                <label class="control-label requiredField" for="price">
                 Price
                 <span class="asteriskField">
                  *
                 </span>
                </label>
                <input class="form-control" id="price" name="price" type="text" required/>
               </div>
               <div class="form-group ">
                <label class="control-label " for="discountprice">
                 Discount Price
                </label>
                <input class="form-control" id="discountprice" name="discountprice" type="text"/>
               </div>
               <div class="form-group ">
                <label class="control-label requiredField" for="quantity">
                 Quantity
                 <span class="asteriskField">
                  *
                 </span>
                </label>
                <input class="form-control" id="quantity" name="quantity" type="text" required/>
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