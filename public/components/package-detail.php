<?php 
	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
		die('Direct Access Not Allowed.');
		exit();
	}

	require_once(getcwd().'/module/connection.php');

	if ( isset($_GET['id']) ) {
		$id = mysqli_real_escape_string($connection, $_GET['id']);

		$query_data = "SELECT * FROM packages WHERE id_package=$id LIMIT 1";
		$query_data_result = mysqli_query($connection, $query_data);

		if ( mysqli_num_rows($query_data_result) != 1 ) {
			die("404-Items Not Found");
		}

		$data = mysqli_fetch_assoc($query_data_result);
			
		$query_photo = "SELECT * FROM photos WHERE id_package=$id";
		$query_photo_result = mysqli_query($connection, $query_photo);
		while ( $photo_single = mysqli_fetch_assoc($query_photo_result) ) {
			$data['photos'][] = $photo_single['photo_package'];
		}
		
	} else {
		die("404-Items Not Found");
	}

?>
<div class="container pt-4">
    <div class="row">
        <div class="col-4 offset-1">
            <div class="mb-4">
                <div class="slider-image">
					<?php foreach ($data['photos'] as $key => $value) { ?>
						
						<input type="radio" name="slide" id="slide-<?php echo $key?>" hidden checked>
						<img src="assets/upload/package/<?php echo $value?>" alt="<?php echo $value?>">

					<?php }?>

                </div>

                <div class="slider-nav">
					<?php foreach ($data['photos'] as $key => $value) { ?>

						<label for="slide-<?php echo $key?>"></label>

					<?php }?>
                </div>
            </div>
        </div>

        <div class="col-5 offset-1">
            <h1><b><?php echo $data['title_package'] ?></b></h1>
            <br>
			<p><?php echo $data['description_package'] ?></p>
			
        </div>
    </div>
</div>