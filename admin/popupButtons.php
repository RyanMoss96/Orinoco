    <?php 

    if(isset($_GET['action'])){

      if($_GET['action']=="delete" && isset($_GET['id'])){

        ?>

      <script type="text/javascript">
          $(window).load(function(){
              $('#deleteProduct').modal('show');
          });
      </script>

  <!-- Delete popup -->
      <!-- Modal -->
      <div class="modal fade" id="deleteProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Careful!</h4>
            </div>
            <div class="modal-body">
              <span>Are you sure you want to delete this item?</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <a href="./deleteProduct.php?id=<?php echo $_GET['id']; ?>" class="btn btn-primary">Yes</a>
            </div>
          </div>
        </div>
      </div>

        <?php

      }else if( $_GET['action']=="edit" && isset($_GET['id']) ){
        require_once('getProduct.php');

        $book = getProduct($_GET['id'], $conn);

      ?>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#editProduct">
        Launch demo modal
      </button>
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
      <?php
    } // end of edit action
    else if($_GET['action']=="new"){
      ?>
 <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#editProduct">
        Launch demo modal
      </button>
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
                <label class="control-label " for="subject">
                 Description
                </label>
                <input class="form-control" id="subject" name="subject" type="text"/>
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
   <?php
    }
  } // end of isset action
  ?>