<?php
include_once 'header.php';
?>
<?php
if (!isset($_SESSION['login_user'])){
		$_SESSION["submit"] = "please log in first";
    echo "<script>location.href='index.php';</script>";

}

?>
<div class="row adjust">
	<div class="class s12 m6" style="margin-left: 20px;">
		
		<h3>Hello <?php echo $name_sess; ?>!</h3>
		<h5>Your submissions:</h5>
	</div>

		<?php
$sql = "SELECT * FROM subm where name = '$name_sess'";
		$result = $con->query($sql);
		if ($result->num_rows > 0) {
    		while($row = $result->fetch_assoc()) {
    			echo '<div class="col s12 m6">
      <div class="card blue-grey lighten-5">
        <div class="card-content black-text">
        	        	<span class="new badge grey darken-3" data-badge-caption="">'.$row['tag'].'</span>
          <span class="card-title">'.$row['heading'].'</span>
          <p class="right-align">-'.$row['name'].'</p>
          <p class="right-align">'.$row['datel'].'</p>
        </div>
        <div class="card-action">
          <a class="modal-trigger" href="#'.$row['id'].'">read it!</a>
         
        </div>
      </div>
    </div>
<!--   Modal Structure -->
  <div id="'.$row['id'].'" class="modal">
    <div class="modal-content">
      <h4>'.$row['heading'].'</h4>
      <p>'.$row['article'].'</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
  </div>
';
    		}
    	}

?>	
</div>
 <!-- Modal deelete -->
  <!-- <div id="'.$row['id'].'delete" class="modal" style="width: 400px;">
    <div class="modal-content center-align">
      <h4>Are you sure to delete this article?</h4>
    </div>
    <div class="modal-footer">
      <a href="?" class="modal-close waves-effect waves-green btn-flat">Yes</a>
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">No</a>
    </div>

     <a class="modal-trigger" href="#'.$row['id'].'delete">Delete it!</a>
  </div> -->
</body>
</html>