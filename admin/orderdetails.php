<?php
require 'db.php';
if (!isset($_GET['id'])) {
    header("Location: ./orders.php");
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
          <h2 class="sub-header">Order details</h2>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-block" style="background-color: lightgrey; max-height: 200px; padding-top: 20px;">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="max-height: 180px;">
                <img src="./images/users/nouser.png" class="img-responsive  pull-right" style="max-height:180px">
              </div>
              <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

            <?php
$sql = "SELECT * FROM orders WHERE order_id=" . $_GET['id'];
if ($result = $conn->query($sql)) {
    while ($order = $result->fetch_object()) {
        echo "<h4>Customer name: <strong>" . getCustomerName($order->customer_id, $conn) . "</strong></h4>";
        echo "<h4>Order status: <strong>" . $order->order_status . "</strong></h4>";
        echo "<h4>Shipped date: <strong>";
        if($order->shipped_date==0){
          echo "Not shipped yet";
        }else{
          $order->shipped_date;
        }
        echo "</strong></h4>";
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

</div>

          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:30px;">
             <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Product id</th>
                      <th>Name</th>
                      <th>Quantity</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php

$sql = "SELECT * FROM order_details WHERE order_id=" . $_GET['id'];
$totalprice = 0;
//$sql = "SELECT * FROM orders JOIN order_details on orders.order_id = order_details.order_id WHERE orders.order_id=" . $_GET['id'];
if ($result = $conn->query($sql)) {
    while ($order = $result->fetch_object()) {
        echo "<tr>";
        echo "<td>" . $order->product_id . "</td>";
        echo "<td>" . getProductName($order->product_id, $conn) . "</td>";
        echo "<td>" . $order->quantity . "</td>";
        echo "<td>" . $order->price_bought . "</td>";
        $totalprice += $order->price_bought * $order->quantity;
        echo "</tr>";
    }
}

function getProductName($product_id, $conn)
{
    $sql = "SELECT * FROM products WHERE product_id=" . $product_id;
    if ($result = $conn->query($sql)) {
        while ($product = $result->fetch_object()) {
            return $product->title;
        }
    } else {
        return null;
    }
}

?>

                  </tbody>
                </table>
    <?php echo "<h3 class='pull-right'>Total price:<strong>" . $totalprice . "</strong></h3>"; ?>

              </div>
            </div> <!-- End of col-12 -->
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
