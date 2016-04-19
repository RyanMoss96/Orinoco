<?php 
require 'db.php';
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
          <span><span style="font-size: 24px;font-weight: bold;" class="sub-header">Orders</span>
            <span>
              <form action="orders.php" method="post">
                <input type="date" name="date" min="2016-01-02">
                <input type="submit">
              </form>
            </span>
          </span>
         <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Customer Name</th>
                  <th>Status</th>
                  <th>Shipped date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php

$sql = "SELECT * FROM orders JOIN order_details on orders.order_id = order_details.order_id GROUP BY orders.order_id";

if(isset($_POST['date'])){
  var_dump($_POST);

}
if ($result = $conn->query($sql)) {
    while ($order = $result->fetch_object()) {
        echo "<tr>";
        echo "<td>" . $order->order_id . "</td>";
        echo "<td>" . getCustomerName($order->customer_id, $conn) . "</td>";
        echo "<td>" . $order->order_status . "</td>";
        echo "<td>"; 
        if($order->shipped_date!=0){ 
          echo date("F j, Y", strtotime($order->shipped_date));
        }else{ 
          echo "Not yet";
        }
        echo "</td>";
        echo "<td><a href='./orderdetails.php?id=" . $order->order_id . "' class='btn btn-success'>Details</a></td>";
        echo "</tr>";
    }
}

function getCustomerName($customer_id, $conn)
{
    $sql = "SELECT * FROM customers WHERE customer_id=" . $customer_id;
    if ($result = $conn->query($sql)) {
        while ($customer = $result->fetch_object()) {
            return $customer->first_name . " " . $customer->last_name;
        }
    } else {
        return null;
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

  </body>
</html>
