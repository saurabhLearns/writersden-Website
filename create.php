<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Create New Profile</title>
  <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Kaushan+Script|Quicksand" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
	<link type="text/css" rel="stylesheet" href="css/css.css"  media="screen,projection"/>
    <script type="text/javascript" src="js/js.js"></script>
<style type="text/css">
      h1,h2,h3,h4,h5,h6{
font-family: 'Kaushan Script', cursive;
      }
      p,a,li,ul,span,div{
        font-family: 'Quicksand', sans-serif;

      }
    </style>
</head>
<body>
	<!-- NAVBAR-->
	<nav>
    <div class="nav-wrapper white">
      <a href="index.php" class="brand-logo right black-text"  style="font-family: 'Great Vibes', cursive;">Writer's Den &nbsp &nbsp</a>
    </div>
  </nav>
  <!-- NAVBAR-->
  
  
  <!--main material -->
  <div class="container">
	<h2>Create new Account</h2><br>
		<form method="POST">
		<div class="input-field col s3">
			 <i class="material-icons prefix">account_circle</i>
          <input id="name" type="text" class="validate" name="name">
          <label for="name">Name</label>
        </div>
        <div class="input-field col s3">
        	 <i class="material-icons prefix">email</i>
          <input id="email" type="email" class="validate" name="email">
          <label for="email">Email</label>
        </div>
        <div class="input-field col s3">
        	 <i class="material-icons prefix">phone</i>
          <input id="Phone" type="tel" class="validate" name="phone">
          <label for="Phone">Phone</label>
        </div>
        <div class="input-field col s3">
        	<i class="material-icons prefix">lock</i>
        	<input id="password" type="password" class="validate" name="password">
        	<label for="password">Password</label>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="submit">Submit
    	<i class="material-icons right">send</i>
  		</button>
        

	</form>
  </div>

  </body>
</html>

<?php
	if (isset($_POST['submit'])){
		include_once 'connect.php';
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];
		$sql = "INSERT INTO users (name, email, password, phone) VALUES ('$name','$email','$password','$phone');";
			mysqli_query($con, $sql);
			if (mysqli_affected_rows($con)>0) {	
						$_SESSION["msg"] = "set";		
                            echo "<script>location.href='login.php';</script>";

			}
			else
			{
				 echo "<h3> failed</h3>";
			}
			

		
	}

?>