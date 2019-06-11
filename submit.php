<?php
session_start();
include_once'connect.php';
date_default_timezone_set('Asia/Kolkata');      

  if (isset($_SESSION['login_user'])) {
    $user_sess=$_SESSION['login_user'];
     $sql = "SELECT name, email FROM users WHERE email = '$user_sess'";
      $result = mysqli_query($con,$sql);
    while($row = $result->fetch_assoc()){
      $name_sess=$row['name'];
      $email_sess=$row['email'];
      }
  }

if (isset($_POST['submit'])) {
		$head = $_POST['head'];
		$content = $_POST['content'];
		$tag = $_POST['tag'];
		$date = date('y-m-d');	
		$sql = "INSERT INTO subm (name, email, article, heading, datel, tag) VALUES ('$name_sess','$email_sess','$content','$head','$date','$tag');";
		mysqli_query($con, $sql);
			if (mysqli_affected_rows($con)>0) {	
						$_SESSION["submit"] = "Article Submitted";		
    echo "<script>location.href='profile.php';</script>";


			}
			else			{
				$_SESSION["submit"] = "Submission failed";		
    echo "<script>location.href='profile.php';</script>";
			}
			
}
?>