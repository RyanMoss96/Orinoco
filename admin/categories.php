<?php 

require_once('db.php');

if(isset($_GET['action']) && $_GET['action']=='delete' && isset($_GET['id'])){

    // check if there are products in this category
    $sql= "SELECT count(*) as numberOfProducts FROM `products` WHERE `category_id` = ". $_GET['id'];
    $productCounterQuery = $conn->query($sql);
    $numberOfProductsInCategory;
    while ($row = $productCounterQuery->fetch_object()) {
      $numberOfProductsInCategory=intval($row->numberOfProducts);
    }

    // check if there are child categories in this category
    $sql= "SELECT count(*) as numberOfCategories FROM  `categories` WHERE  `parent` =". $_GET['id'];
    $categoryCounterQuery = $conn->query($sql);
    $numberOfChildCategories;
    while ($row = $categoryCounterQuery->fetch_object()) {
      $numberOfChildCategories=intval($row->numberOfCategories);
    }

    if(isset($numberOfProductsInCategory) && $numberOfProductsInCategory==0 && isset($numberOfChildCategories) && $numberOfChildCategories==0){
      $sql= "DELETE FROM `categories` WHERE `categories`.`category_id` = ". $_GET['id'];
      $categoryDeletionQuery = $conn->query($sql);
    }

}else if(isset($_GET['action']) && $_GET['action']=='edit' && isset($_GET['id'])){
       require_once('functions.php');

        $category = getCategory($_GET['id'], $conn);
        if($category==null){
          die("Category not found");
        }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Orinoco Backend</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <?php include 'topnavbar.php';?>

    <div class="container-fluid">
      <div class="row">
        <?php include 'sidebar.php';?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Categories<a href="./categories.php?action=new" class="btn btn-primary pull-right">New Category</a></h2>

         <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Parent id</th>
                  <th style='text-align:right'>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php

/* Select queries return a resultset */
$sql = "SELECT * FROM categories order by position ASC";
if ($result = $conn->query($sql)) {
    while ($book = $result->fetch_object()) {
        echo "<tr>";
        echo "<td>" . $book->category_id . "</td>";
        echo "<td>" . $book->name . "</td>";
        echo "<td>" . $book->description . "</td>";
        echo "<td>" . $book->parent . "</td>";
        echo "<td style='text-align:right'><a href='./products.php?action=viewCategory&category_id=" . $book->category_id . "' class='btn btn-success'>Open</a> "
        . "<a href='./categories.php?action=edit&id=" . $book->category_id . "' class='btn btn-info '>Edit</a> "
        . "<a href='./categories.php?action=delete&id=" . $book->category_id . "' class='btn btn-danger'>X</a>"
        ."</td>";
        echo "</tr>";
    }
}

?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="https://getbootstrap.com/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

    <?php 

      if(false)include 'helpers/editCategoryHelper.php';
      if (isset($_GET['action']) && $_GET['action']=="new"){
        include 'helpers/createCategoryHelper.php';
      }else if (isset($_GET['action']) && $_GET['action']=="edit" && isset($_GET['id'])){
        include 'helpers/editCategoryHelper.php';

      }
      ?>
      <script src="./js/sweetalert.min.js"></script>
      <link rel="stylesheet" type="text/css" href="./css/sweetalert.css">

      <script type="text/javascript">
        document.querySelector('body').onload = function(){
        <?php  

            if(isset($_GET['action']) && $_GET['action']=='delete' && isset($_GET['id'])){

             if (isset($categoryDeletionQuery) && $categoryDeletionQuery==true) {
               echo "swal(\"Good job!\", \"The category has been deleted!\", \"success\")";

              }else if( isset($numberOfChildCategories) && $numberOfChildCategories > 0 ){
                echo "swal(\"Oops...\", \"Cannot delete category with child categories!\", \"error\");";

              }
            }

            if(isset($_GET['message']) && $_GET['message']=='categoryCreated'){
              echo "swal(\"Good job!\", \"The category has been created!\", \"success\")";
            }else if( $numberOfProductsInCategory > 0 ){
             echo "swal(\"Oops...\", \"Cannot delete category with products assigned to it!\", \"error\");";
            }

      ?>
};

      </script>
    


  </body>
</html>
