<?php
	
	
	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
		die('Direct Access Not Allowed.');
		exit();
	}

	require_once(getcwd()."/module/connection.php");

	$query_data = mysqli_query($connection, "SELECT * FROM teams");

	$datas = [];
	while ( $data = mysqli_fetch_assoc($query_data) ) {
		$datas[] = $data;
		
	}


	mysqli_close($connection);

?>



<div class="container mt-2">
    <div class="row">
      <div class="col-12">
        <h1> Our Guide</h1>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      
    <?php
    foreach ($datas as $key => $value){
							echo
      '<div class="col-2">
        <div class="our-team">
          <div class="picture">
            <img src="assets/upload/team/'.$value["photo_team"].'">
          </div>
          <div class="team-content">
            <h3 class="name"> '.$value["name_team"].' </h3>
            <h4 class="title">Tour Guide</h4>
          </div>
          <ul class="social">
            <li><a href="http://'.$value["link_facebook"].'" class="fab fa-facebook" aria-hidden="true"></a></li>
            <li><a href="http://'.$value["link_instagram"].'" class="fab fa-instagram" aria-hidden="true"></a></li>
            <li><a href="http://'.$value["link_twitter"].'" class="fab fa-twitter" aria-hidden="true"></a></li>
          </ul>
        </div>
      </div>';
    }
    ?>
    
    </div>
    <div class="row">
      <div class="col-12 text-center">
      <a href="#" class="btn btn-primary"> Contact Now</a>
    </div>
    </div>
  </div>