<?php require('db.php'); ?>
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

    <!-- Charts  -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.5.1.css">
   
  </head>

  <body>

    <?php include('topnavbar.php'); ?>

    <div class="container-fluid">
      <div class="row">
        <?php include('sidebar.php'); ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="visible-xs"><a href="javascript:alert('Still working on it');">Show sidebar</a></div>
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
          </div>

          <h2 class="sub-header">Section title <a href="./index.php?action=new" class="btn btn-primary pull-right">New Product</a></h2>
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
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php

                  /* Select queries return a resultset */
                  $sql="SELECT * FROM Products";
                  if ($result = $conn->query($sql)) {
                      while($book = $result->fetch_object()){
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
                        echo "<td><a href='./index.php?action=edit&id=". $book->product_id ."' class='btn btn-success'>Edit</a> "
                        ."<a href='./index.php?action=delete&id=". $book->product_id ."' class='btn btn-danger'>X</a></td>";
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

    <!-- Lightbox -->
    <script src="./js/lightbox.js"></script>
  </body>
</html>
