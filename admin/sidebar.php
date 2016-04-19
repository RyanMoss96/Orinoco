<?php 
require('mustLogin.php');

$filename = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);

?>
        <div class="col-sm-3 col-md-2 sidebar">

          <!-- Admin image & info -->
          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder" style="margin: 0 auto;width:100%">
              <img src="<?php echo isset($_SESSION['image'])?$_SESSION['image']:"http://localhost/Orinoco/admin/images/users/nouser.jpg"; ?>" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4><?php echo isset($_SESSION['username'])?$_SESSION['username']:""; ?></h4>
              <span class="text-muted">Admin</span>
            </div>
          </div>

          <ul class="nav nav-sidebar">
            <li <?php echo ($filename == "index.php") ? "class=\"active\"" : ""; ?>>
              <a href="./index.php">Overview <span class="sr-only">(current)</span>
              </a>
            </li>
            <li <?php echo ($filename == "products.php") ? "class=\"active\"" : ""; ?>>
              <a href="./products.php">Products</a>
            </li>
            <li <?php echo ($filename == "categories.php") ? "class=\"active\"" : ""; ?>>
              <a href="./categories.php">Categories</a>
            </li>
            <li <?php echo ($filename == "export.php") ? "class=\"active\"" : ""; ?>>
              <a href="./export.php">Export</a>
            </li>
            <li <?php echo ($filename == "orders.php" || $filename == "orderdetails.php") ? "class=\"active\"" : ""; ?>>
              <a href="./orders.php">Orders</a>
            </li>
            <li><a href="./logout.php">Logout</a></li>
          </ul>

        </div>
