<?php
	require_once('db.php');

	if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
	
		$email = isset($_POST["email"]) ? $_POST["email"] : null;
		$password = isset($_POST["password"]) ? $_POST["password"] : null;

		if(($email==null || $password==null) || (isset($_SESSION['username'])) ){
			header("Location: ./index.php");
		}

		$result = $conn->query("SELECT * FROM customers WHERE isAdmin = 1");

		if ($result !== false) {
		    while ($user = $result->fetch_object()) {
		    	if($user->email==$email && $user->password==$password){
					if(!isset($_SESSION)) {
					    session_start(); 
					}
		    		$_SESSION['username'] = $user->first_name." " . $user->last_name;
		    		if($user->image!=null) $_SESSION['image'] = $user->image;
		    		header("Location: index.php");
		    		break;
		    	}
		    }
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
    <title>Orinoco Login</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">

	body {
		background: #eee !important;	
	}

	.wrapper {	
		margin-top: 80px;
	  margin-bottom: 80px;
	}

	.form-signin {
	  max-width: 380px;
	  padding: 15px 35px 45px;
	  margin: 0 auto;
	  background-color: #fff;
	  border: 1px solid rgba(0,0,0,0.1);  

	  .form-signin-heading,
		.checkbox {
		  margin-bottom: 30px;
		}

		.checkbox {
		  font-weight: normal;
		}

		.form-control {
		  position: relative;
		  font-size: 16px;
		  height: auto;
		  padding: 10px;
			@include box-sizing(border-box);

			&:focus {
			  z-index: 2;
			}
		}

		input[type="text"] {
		  margin-bottom: -1px;
		  border-bottom-left-radius: 0;
		  border-bottom-right-radius: 0;
		}

		input[type="password"] {
		  margin-bottom: 20px;
		  border-top-left-radius: 0;
		  border-top-right-radius: 0;
		}
	}

	</style>
  </head>
  <body>

      <div class="wrapper">

      <form method="POST" action="login.php" id="postProduct" class="form-signin">

	      <h2 class="form-signin-heading">Please login</h2>

	      <div class="form-group">
	      	<input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />
	      </div>

	      <div class="form-group">
	      	<input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
	      </div>

	      <div class="form-group">
	      	<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
	      </div>

	    </form>
	  </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

