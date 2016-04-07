<?php $filename = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);?>
        <div class="col-sm-3 col-md-2 sidebar">

          <!-- Admin image & info -->
          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder" style="margin: 0 auto;width:100%">
              <img src="./images/users/chrys.jpg" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Chrysanthos</h4>
              <span class="text-muted">Admin</span>
            </div>
          </div>

          <ul class="nav nav-sidebar">
            <li <?php echo ($filename == "index.php") ? "class=\"active\"" : ""; ?>>
              <a href="./index.php">Overview <span class="sr-only">(current)</span>
              </a>
            </li>
            <li <?php echo ($filename == "products.php") ? "class=\"active\"" : ""; ?>>
              <a href="./products.php">Catalogue</a>
            </li>
            <li <?php echo ($filename == "categories.php") ? "class=\"active\"" : ""; ?>>
              <a href="./categories.php">Categories</a>
            </li>
            <li <?php echo ($filename == "export.php") ? "class=\"active\"" : ""; ?>>
              <a href="./export.php">Export</a>
            </li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
        </div>
