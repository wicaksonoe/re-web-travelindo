<?php 
	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
		die('Direct Access Not Allowed.');
		exit();
	}

	require_once(getcwd()."/module/connection.php");

	$query_data = mysqli_query($connection, "SELECT * FROM packages");
	
	$datas = [];
	while ( $data = mysqli_fetch_assoc($query_data) ) {
		$id = $data['id_package'];

		$datas[ $id ] = $data;

		$query_photo = mysqli_query($connection, "SELECT * FROM photos WHERE id_package = ".$id." LIMIT 1");
		while ( $photo = mysqli_fetch_assoc($query_photo) ) {
			$datas[ $id ]['photo'] = $photo['photo_package'];
		}
		
	}

	mysqli_close($connection);
?>
<div class="main mt-2 mb-2">
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
			<div class="col-12">
				<a href="<?php echo $base_url."index.php?page=dashboard&section=pkg-new" ?>" class="btn btn-primary">Create New</a>
			</div>

			<?php 
			
				foreach ($datas as $key => $value) {
					echo 
					'<div class="col-12 mt-2">
						<div class="row">
							<div class="col-4">
								<div class="image-package">
									<img src="assets/upload/package/'.$value['photo'].'" alt="" srcset="">
								</div>
							</div>
							<div class="col-6 offset-1 package-content">
								<h2><strong>'.$value['title_package'].'</strong></h2>
								<p class="mt-2">'.$value['description_package'].'</p>
								<div class="package-properties">
									<a href="'.$base_url.'index.php?page=dashboard&section=pkg-detail&id='.$value['id_package'].'" class="btn btn-primary">Show Details</a>
									<a href="'.$base_url.'index.php?page=dashboard&section=pkg-edit&id='.$value['id_package'].'" class="btn btn-primary ml-1">Edit Package</a>
									<a href="'.$base_url.'index.php?page=dashboard&section=pkg-delete&id='.$value['id_package'].'" class="btn btn-danger float-right">Delete Package</a>
								</div>
							</div>
						</div>
						<hr class="mt-2">
					</div>';
				}

			?>

		</div>
	</div>
</div>