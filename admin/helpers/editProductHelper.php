
      <script type="text/javascript">
          $(window).load(function(){
              $('#editProduct').modal('show');
          });
      </script>
       <!-- Modal -->
      <div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Edit product</h4>
              <div class="modal-body">
              <form method="POST" action="postProduct.php?action=update" id="postProduct">
               <div class="form-group">
                <label class="control-label" for="id">
                  ID
                </label>
                <input class="form-control" id="id" name="id" type="text" readonly
                <?php if(isset($book->product_id) && $book->product_id!= NULL){
                  echo "value=\"". $book->product_id. "\"";
                  }?> />
               </div>
               <div class="form-group ">
                <label class="control-label requiredField" for="title">
                  Title<span class="asteriskField">*</span>
                </label>
                <input class="form-control" id="title" name="title" type="text" required 
                <?php if(isset($book->title) && $book->title!= NULL){
                  echo "value=\"". $book->title. "\"";
                  }?> />
               </div>
               <div class="form-group ">
                <label class="control-label " for="photolink">
                 Photo link
                </label>
                <input class="form-control" id="photolink" name="photolink" type="text"
                 <?php if(isset($book->photo_url) && $book->photo_url!= NULL){
                  echo "value=\"". $book->photo_url. "\"";
                  }?> />
               </div>
               <div class="form-group ">
                <label class="control-label " for="description">
                 Description
                </label>
                <input class="form-control" id="description" name="description" type="text"
                 <?php if(isset($book->description) && $book->description!= NULL){
                  echo "value=\"". $book->description. "\"";
                  }?> />
               </div>
               <div class="form-group ">
                <label class="control-label requiredField" for="price">
                 Price
                 <span class="asteriskField">
                  *
                 </span>
                </label>
                <input class="form-control" id="price" name="price" type="text" required
                 <?php if(isset($book->price) && $book->price!= NULL){
                  echo "value=\"". $book->price. "\"";
                  }?> />
               </div>
               <div class="form-group ">
                <label class="control-label " for="discountprice">
                 Discount Price
                </label>
                <input class="form-control" id="discountprice" name="discountprice" type="text"
                 <?php if(isset($book->discount_price) && $book->discount_price!= NULL){
                  echo "value=\"". $book->discount_price. "\"";
                  }?> />
               </div>
               <div class="form-group ">
                <label class="control-label requiredField" for="quantity">
                 Quantity
                 <span class="asteriskField">
                  *
                 </span>
                </label>
                <input class="form-control" id="quantity" name="quantity" type="number" required
                 <?php if(isset($book->quantity) && $book->quantity!= NULL){
                  echo "value=\"". $book->quantity. "\"";
                  }?> />
               </div>
               <div class="form-group ">
                <label class="control-label requiredField" for="category">
                 Category id
                 <span class="asteriskField">
                  *
                 </span>
                </label>
                <input class="form-control" id="category" name="category" type="number" required
                 <?php if(isset($book->category_id) && $book->category_id!= NULL){
                  echo "value=\"". $book->category_id. "\"";
                  }?> />
               </div>
               <span>* = required</span>
              </form>

            </div>
            <div class="modal-footer">
              <button type="button"class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="submit" form="postProduct" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>