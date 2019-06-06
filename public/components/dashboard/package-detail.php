<?php 
	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
		die('Direct Access Not Allowed.');
		exit();
	}

	require_once(getcwd()."/module/connection.php");

	$id = mysqli_real_escape_string($connection, $_GET['id']);
	$query_data = mysqli_query($connection, "SELECT * FROM packages WHERE id_package=".$id." LIMIT 1");
	
	if ( mysqli_num_rows($query_data) == 0 ) {
		mysqli_close($connection);
		die('Data yang anda cari tidak ditemukan.');
	}
	
	while ( $data = mysqli_fetch_assoc($query_data) ) {

		$datas = $data;

		$query_photo = mysqli_query($connection, "SELECT * FROM photos WHERE id_package = ".$_GET['id']);
		while ( $photo = mysqli_fetch_assoc($query_photo) ) {
			$datas['photo'][] = $photo['photo_package'];
		}
		
	}

	mysqli_close($connection);
?>

<div class="form mt-2 mt-2">
		<div class="container">

			<div class="row">
				<div class="col-12">
					<h1><strong>Welcome Back, Administrator</strong></h1>
				</div>
			</div>

			<?php
				require_once('navigator.php');
			?>
			
			<div class="row mt-2">
				<div class="col-4">
					<div class="mb-4">
						<div class="slider-image">

							<?php
								foreach ($datas['photo'] as $key => $value) {
									echo 
									'<input type="radio" name="slide" id="slide-'.$key.'" hidden checked>
									<img src="assets/upload/package/'.$value.'" alt="">';
								}
							?>

						</div>

						<div class="slider-nav">
							<?php
								foreach ($datas['photo'] as $key => $value) {
									echo 
									'<label for="slide-'.$key.'"></label>';
								}
							?>
						</div>

					</div>
				</div>

				<div class="col-5 offset-1">
					<h1> <b><?php echo $datas['title_package'] ?></b></h1>
					<br>
					<p><?php echo $datas['description_package'] ?></p>

					<div class="row" style="float: left;">
						<div class="col-12 mb-2 mt-2">
							<a href="<?php echo $base_url."index.php?page=dashboard&section=pkg-edit&id=".$datas['id_package'] ?>" class="btn btn-primary">Edit Package</a>
							<a href="<?php echo $base_url."index.php?page=dashboard&section=pkg-main" ?>" class="btn btn-info ml-2">Back To Dashboard</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>