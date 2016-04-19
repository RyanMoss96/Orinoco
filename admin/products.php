<?php 
require_once('db.php');
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

    <!-- Lightbox -->
    <link href="./css/lightbox.css" rel="stylesheet">

  </head>

  <body>

    <?php include('topnavbar.php'); ?>

    <div class="container-fluid">
      <div class="row">
        <?php include('sidebar.php'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Products<a href="./products.php?action=new" class="btn btn-primary pull-right">New Product</a></h1>

          
                <?php

/* Select queries return a resultset */
$sql = "SELECT * FROM products";
if(isset($_GET['action']) && $_GET['action']=="viewCategory" && isset($_GET['category_id'])){
  $sql.=" where category_id = ". $_GET['category_id'];
}
$result = $conn->query($sql);

if ($result !== false) {
  if($result->num_rows>0){
    ?>

<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Photo</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Discount price</th>
                  <th>Quantity</th>
                  <th>Category id</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>

    <?php
    while ($book = $result->fetch_object()) {
        echo "<tr>";
        echo "<td>" . $book->product_id . "</td>";
        echo "<td>" . $book->title . "</td>";
        echo "<td>"
        . "<a href='" . $book->photo_url . "' data-lightbox='image-1'>"
        . "<img height='50px' src='" . $book->photo_url . "' data-lightbox='image-1'/></a></td>";
        echo "<td>" . $book->description . "</td>";
        echo "<td>" . $book->price . "</td>";
        echo "<td>" . $book->discount_price . "</td>";
        echo "<td>" . $book->quantity . "</td>";
        echo "<td>" . $book->category_id . "</td>";
        // echo "<td> "
        // ."<a href='./index.php?action=delete&id=". $book->product_id ."' class='btn btn-danger'>X</a>";
        echo "<td>"
        . "<form action =\"#\" method=\"POST\">
                          <a href='./index.php?action=edit&id=" . $book->product_id . "' class='btn btn-success'>Edit</a>
                          <a href='./index.php?action=delete&id=" . $book->product_id . "' class='btn btn-danger' >X</button>
                          </form>"
            . "</td>";

        echo "</tr>";
    }
    ?>

              </tbody>
            </table>
          </div>

    <?php
  }else{
    echo "There are no products in this category.";
  }
}

?>

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

<?php include_once "./popupButtons.php"; ?>

    <?php
if (isset($_GET['message'])) {
    ?>
      <script src="./js/sweetalert.min.js"></script>
      <link rel="stylesheet" type="text/css" href="./css/sweetalert.css">

      <script type="text/javascript">
        document.querySelector('body').onload = function(){
          swal("Good job!", "You clicked the button!", "success");

          <?php
switch ($_GET['message']) {
        case "productDeleted":
            echo "swal(\"Good job!\", \"The product has been deleted!\", \"success\")";
            break;
        case "productEdited":
            echo "swal(\"Good job!\", \"The product has been edited successfully!\", \"success\")";
            break;
        case "productCreated":
            echo "swal(\"Good job!\", \"The product has been created successfully!\", \"success\")";
            break;
        default:
            echo "Your favorite color is neither red, blue, nor green!";
    }

    ?>
        };

      </script>

      <?php
}?>
    <!-- Lightbox -->
    <script src="./js/lightbox.js"></script>

  </body>
</html>
