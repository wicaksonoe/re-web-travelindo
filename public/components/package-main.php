<?php 
	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
		die('Direct Access Not Allowed.');
		exit();
	}

	require_once(getcwd().'/module/connection.php');

	$query_data = "SELECT * FROM packages";

	$query_data_result = mysqli_query($connection, $query_data);

	$data_rows = [];

	if ( mysqli_num_rows($query_data_result) > 0 ) {
		while ( $result_data_single_row = mysqli_fetch_assoc($query_data_result) ) {
			$id = $result_data_single_row['id_package'];
			
			$query_photo = "SELECT * FROM photos WHERE id_package=$id LIMIT 1";

			$query_photo_result = mysqli_query($connection, $query_photo);

			$photo = mysqli_fetch_assoc($query_photo_result);

			$data_rows[ $id ] = $result_data_single_row;
			$data_rows[ $id ]['photo'] = $photo['photo_package'];
		}
	}
?>
<div class="package">
	<div class="container pt-3 pb-3">
		<div class="row">
			<div class="col-12 text-secondary text-center">
				<h1><strong>Our Packages</strong></h1>
			</div>
		</div>
		<div class="row">
			<?php foreach ($data_rows as $key => $value) { ?>
			
			<div class="col-3 mt-2">
				<div class="card box-shadow">
					<div class="card-image">
						<img src="assets/upload/package/<?php echo $value['photo'] ?>" alt="">
					</div>
					<div class="card-content">
						<h3><?php echo $value['title_package'] ?></h3>
						<p class="mt-1"><?php echo $value['description_package'] ?></p>
						<a href="<?php echo $base_url.'index.php?page=package-detail&id='.$value['id_package'] ?>" class="btn btn-sm btn-primary mr-3 mb-2" style="position: absolute; bottom: 0; right: 0;">More Info</a>
					</div>
				</div>
			</div>

			<?php } ?>
		</div>
	</div>
</div>