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

        include('./helpers/editProductHelper.php');
    } // end of edit action
    else if($_GET['action']=="new"){
        include('./helpers/createProductHelper.php');
    }
  } // end of isset action
  ?>