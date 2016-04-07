<?php

require 'db.php';

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    if (isset($_GET['filename']) && file_exists($_GET['filename'])) {
        unlink($_GET['filename']);
        header("Location: ./export.php?action=delete&successful=true");
        die();
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
          <h2 class="sub-header">Categories <span class="pull-right"><a href="./export-action.php" class="btn btn-info">Generate</a></span></h2>
         <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>

               <?php

foreach (glob('exports/*.*') as $file) {
    echo "<tr>";
    echo "<td>" . str_replace("exports/", "", $file) . "</td>";
    echo "<td class='col-xs-2'>"
    . "<a href='./export.php?action=delete&filename=" . $file . "' class='btn btn-danger'>X</a> "
    . "<a href='./helpers/download.php?download_file=" . str_replace("exports/", "", $file) . "' class='btn btn-success'>Download</a></td>";
    echo "</tr>";
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

    <script src="./js/sweetalert.min.js"></script>
      <link rel="stylesheet" type="text/css" href="./css/sweetalert.css">

      <script type="text/javascript">
        document.querySelector('body').onload = function(){

          <?php

if (isset($_GET['action']) && $_GET['action'] == "delete" && isset($_GET['successful'])) {
    if ($_GET['successful'] == "true") {
        echo "swal(\"Good job!\", \"The export file has been deleted!\", \"success\");";
    } else if ($_GET['successful'] == "false") {
        echo "swal(\"Oops...\", \"Something went wrong!\", \"error\");";
    }
} else
if (isset($_GET['action']) && $_GET['action'] == "export" && isset($_GET['successful'])) {
    if ($_GET['successful'] == "true") {
        echo "swal(\"Good job!\", \"An export file has been generated!\", \"success\");";
    } else if ($_GET['successful'] == "false") {
        echo "swal(\"Oops...\", \"Something went wrong!\", \"error\");";
    }
}
if (isset($_GET['action']) && $_GET['action'] == "download" && isset($_GET['successful'])) {
    if ($_GET['successful'] == "false") {
        echo "swal(\"Oops...\", \"Something went wrong!\", \"error\");";
    }
}
?>

};
      </script>
  </body>
</html>
