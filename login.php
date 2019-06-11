<?php
session_start();
if(isset($_SESSION["msg"])) {
	echo "<div class='card-panel' style='position: absolute; top: 3%; left: 1%; max-width:30%;'>
        <span class='black-text'>Created Sucessfully!
        </span>
      </div>";
	unset($_SESSION["msg"]);
}
?>
<!DOCTYPE html>
<html>
<head> <!-- Compiled and minified CSS -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Kaushan+Script|Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
            
	<title>LoginPage</title>
	<style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
      background-image: url("");
    }

    main {
      flex: 1 0 auto;
    }

    body {
      background: #f;
    }

    .input-field input[type=date]:focus + label,
    .input-field input[type=text]:focus + label,
    .input-field input[type=email]:focus + label,
    .input-field input[type=password]:focus + label {
      color: #e91e63;
    }

    .input-field input[type=date]:focus,
    .input-field input[type=text]:focus,
    .input-field input[type=email]:focus,
    .input-field input[type=password]:focus {
      border-bottom: 2px solid #e91e63;
      box-shadow: none;
    }
  </style>
</head>
<body>
	<div class="section"></div>
  <main>
    <center>
    	<h3 class="black-text"  style="font-family: 'Great Vibes', cursive;">Writer's Den</h3>

      <h5 class="black-text">Please, login into your account</h5>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" method="post">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='email' name='email' id='email' />
                <label for='email'>Enter your email</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='password' id='password' />
                <label for='password'>Enter your password</label>
              </div><label style='float: right;'>
                <a class='pink-text' href='#!'><b>Forgot Password?</b></a>
              </label>
            </div>
            <br />
            <center>
              <div class='row'>
                <button type='submit' name='submit' class='col s12 btn btn-large waves-effect indigo'>Login</button>
              </div>
            </center>
          </form>
        </div>
      </div> <a href="create.php">Create account</a>

    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

</body>
</html>
<?php
   include("connect.php");
   //session_start();
   if(isset($_POST['submit'])) {
      $email = mysqli_real_escape_string($con,$_POST['email']);
      $password = mysqli_real_escape_string($con,$_POST['password']); 
      $sql = "SELECT id FROM users WHERE email = '$email' and password = '$password'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      $count = mysqli_num_rows($result);
      if($count == 1) {
         $_SESSION['login_user'] = $email;
            echo "<script>location.href='index.php';</script>";

      }else {
         echo "<div class='card-panel' style='position: absolute; top: 3%; left: 1%; max-width:30%;'>
        <span class='black-text'>Login Failed! Please Try Again Later.
        </span>
      </div>";
      }
   }
?>
