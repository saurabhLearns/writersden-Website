<?php
include_once 'header.php';
?>
<h3 class="right-align" style="padding-right: 3%; ">Home</h3>
<div class="row adjust">
<?php
$sql = "SELECT * FROM subm";
		$result = $con->query($sql);
		if ($result->num_rows > 0) {
    		while($row = $result->fetch_assoc()) {
    			echo '

    <div class="col s12 m6">
      <div class="card  blue-grey lighten-5">
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
  <!-- Modal Structure -->
  <div id='.$row['id'].' class="modal">
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
<?php
include_once 'footer.php';

?>