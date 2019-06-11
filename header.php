<?php
  session_start();
  include_once'connect.php';
  date_default_timezone_set('Asia/Kolkata');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Articles</title>
  <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Kaushan+Script|Quicksand" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
	 <link type="text/css" rel="stylesheet" href="css/css.css" media="screen,projection"/>
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
      <a href="index.php" style="font-family: 'Great Vibes', cursive;" class="brand-logo right black-text ">Writer's Den &nbsp &nbsp</a>
      <form>
        <a href="#" data-target="slide-out" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
      </form>
    </div>
  </nav>
  <!-- NAVBAR-->  
  <?php 
  if(isset($_SESSION["submit"])){
  	$submitmsg=$_SESSION['submit'];
	echo "<div class='card-panel' style='position: absolute; top: 3%; right: 1%; max-width:30%;'>
        <span class='black-text'>".$submitmsg."
        </span>
      </div>";
	unset($_SESSION["submit"]);
}

?> 
  <!-- sideBAR-->

  <?php
  if (isset($_SESSION['login_user'])) {
    $user_sess=$_SESSION['login_user'];
     $sql = "SELECT name, email FROM users WHERE email = '$user_sess'";
      $result = mysqli_query($con,$sql);
    while($row = $result->fetch_assoc()){
      $name_sess=$row['name'];
      $email_sess=$row['email'];

}
  echo '<ul id="slide-out" class="sidenav sidenav-fixed">
    <li><div class="user-view">
    <div class="background">
        <img src="https://goinswriter.com/wp-content/uploads/MultipleIncomeStreams-660x422.jpeg">
      </div>
      <a href="#user"><img class="circle white" src="https://openclipart.org/download/247324/abstract-user-flat-1.svg"></a>
      <a href="profile.php"><span class="black-text name">'.$name_sess.'</span></a>
      <a href="profile.php"><span class="black-text email">'.$email_sess.'</span></a>
    </div></li>
    <li><a class="modal-trigger" href="#modal3"><i class="material-icons">subject</i>Submit an article</a></li>
    <li><div class="divider"></div></li>
    <li><a class="waves-effect" href="profile.php"><i class="material-icons">account_circle</i>Profile</a></li>
    <li><a class="waves-effect" href="logout.php"><i class="material-icons">close</i>Logout</a></li><br><br><br><br><br><br><br><br><br><br><br><br>
    <li><div class="divider"></div></li>
    <li><a class="waves-effect modal-trigger" href="#aboutdev"><i class="material-icons">code</i>About Developer</a></li>
    </ul>
      <div id="aboutdev" class="modal">
    <div class="modal-content">
      <p style="font-size: 1.3em;">I am <b>Saurabh Jagtap</b>, An awesome fullstack developer without JavaScript, and a nerdy TechNerd with excellent Designing skills with photoshop and Illustrator.<br>Let\'s have a cup of Tea Together! <br><b>Email:</b> saurabh619@outlook.com<br></p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cool!</a>
    </div>
  </div>
      <div id="modal3" class="modal">
    <div class="modal-content">
    <form action="submit.php" method="post">
      <h4 class="center-align">Submit new writeup</h4><br>
      <div class="input-field">
          <input id="heading" type="text" class="validate" name="head">
          <label for="heading">Head of article</label> 
        </div>
         <div class="input-field">
          <input id="Writeup" type="text" class="validate" name="content">
          <label for="Writeup">Writeup content</label></div>
          <div class="input-field">
          <input id="tag" type="text" class="validate" name="tag">
          <label for="tag">tag (Poem, article, fiction etc)</label></div>
           <button class="btn waves-effect waves-light" type="submit" name="submit">Submit the article
      <i class="material-icons right">send</i>
      </button>
      </form>
    </div>
    </div>';
  }
  else{
    echo '<ul id="slide-out" class="sidenav sidenav-fixed">
    <li><div class="user-view">
    <div class="background">
        <img src="https://goinswriter.com/wp-content/uploads/MultipleIncomeStreams-660x422.jpeg">
      </div>
      <a href="login.php"><span class="white-text name">Please login</span></a><br>
       <li><a class="waves-effect" href="login.php"><i class="material-icons">assignment_ind</i>Login</a></li>
    <li><a class="waves-effect" href="create.php"><i class="material-icons">person_add</i>Create New Account</a></li>
    </div></li><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <li><div class="divider"></div></li>
    <li><a class="waves-effect modal-trigger" href="#aboutdev"><i class="material-icons">code</i>About Developer</a></li>
    </ul>
      <div id="aboutdev" class="modal">
    <div class="modal-content">
      <p style="font-size: 1.3em;">I am <b>Saurabh Jagtap</b>, An awesome fullstack developer without JavaScript, and a nerdy TechNerd with excellent Designing skills with photoshop and Illustrator.<br>Let\'s have a cup of Tea Together! <br><b>Email:</b> saurabh619@outlook.com<br></p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cool!</a>
    </div>
  </div>';
  }
?>