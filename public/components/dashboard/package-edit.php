<?php 
	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
		die('Direct Access Not Allowed.');
		exit();
	}

	require_once(getcwd()."/module/connection.php");

	$id = mysqli_real_escape_string($connection, $_GET['id']);

	$query_data  = mysqli_query($connection, "SELECT * FROM packages WHERE id_package=".$id." LIMIT 1");
	$query_photo = mysqli_query($connection, "SELECT photo_package FROM photos WHERE id_package=".$id." LIMIT 1");

	if ( mysqli_num_rows($query_data) == 0 ) {
		mysqli_close($connection);
		die('Data yang anda cari tidak ditemukan.');
	}

	$data = mysqli_fetch_assoc($query_data);
	$data['photo'] = mysqli_fetch_array($query_photo)[0];

	// Update proses
	if ( isset($_POST['submit']) ) {
		$update_data = TRUE;
		$update_photo = TRUE;

		// Update data
		$title_package       = mysqli_real_escape_string($connection, $_POST['title_package']);
		$description_package = mysqli_real_escape_string($connection, $_POST['description_package']);

		$query_data = "UPDATE packages
							SET title_package='$title_package', description_package='$description_package'
							WHERE id_package=".$id;

		// header("location: ".$base_url."index.php?page=dashboard&section=pkg-main");
		if ( !mysqli_query($connection, $query_data) ) {
			echo "Update Failed.<br>";
			echo "QUERY:: $query_data<br>";
			echo mysqli_error($connection);
			mysqli_close($connection);
			exit();
		}

		// Delete existing photo and Upload new Photo
		$query_photo = mysqli_query($connection, "SELECT * FROM photos WHERE id_package=".$data['id_package']);

		while ( $photo = mysqli_fetch_assoc($query_photo) ) {
			unlink(getcwd()."/assets/upload/package/".$photo['photo_package']);
			mysqli_query($connection, "DELETE FROM photos WHERE id_photo=".$photo['id_photo']);
		}

		if ( !$query_photo ) {
			echo "Update Failed.<br>";
			echo "QUERY:: $query_data<br>";
			echo mysqli_error($connection);
			mysqli_close($connection);
			exit();
		}

		// Upload photo and save to dB
		$uploadLoc = getcwd().'/assets/upload/package/';

		if ( !empty( array_filter( $_FILES['photo_package']['name'] ) ) ) {
			foreach ($_FILES['photo_package']['name'] as $key => $value) {
				$fileName = basename( $_FILES['photo_package']['name'][$key] );
				$targerUpload = $uploadLoc.$fileName;

				if ( move_uploaded_file($_FILES['photo_package']['tmp_name'][$key], $targerUpload) ) {
					$query_update_photo = "	INSERT INTO
																		photos (id_package, photo_package)
																	VALUES
																		($id, '$fileName')";

					if ( !mysqli_query($connection, $query_update_photo) ) {
						echo "<br>Upload foto gagal.<br>";
						echo "QUERY :: $query<br>";
						echo mysqli_error($connection);
						mysqli_close($connection);
						exit();
					}
				} else {
					echo "Upload Failed.<br>";
					mysqli_close($connection);
					exit();
				}
			}
		}

		mysqli_close($connection);

		header("location: ".$base_url."index.php?page=dashboard&section=pkg-main");
	}

	mysqli_close($connection);
?>
<div class="form mb-2 mt-2">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1><strong>Welcome Back, Administrator</strong></h1>
			</div>
		</div>

		<?php
			require_once('navigator.php');
		?>

		<div class="row">
			<div class="col-12 mt-2">
				<h2 class="mb-1"><strong>Existing Data</strong></h2>
				<div class="row">
					<div class="col-4">
						<div class="image-package">
							<img src="assets/upload/package/<?php echo $data['photo'] ?>" alt="<?php echo $data['photo'] ?>" srcset="">
						</div>
					</div>
					<div class="col-6 offset-1 package-content">
						<h2><strong><?php echo $data['title_package'] ?></strong></h2>
						<p class="mt-2"><?php echo $data['description_package'] ?></p>
					</div>
				</div>
				<hr class="mt-2">
			</div>
		</div>

		<div class="row">
			<div class="col-6">
				<h2><strong>Update Data</strong></h2>

				<form action="" method="post" enctype="multipart/form-data">

					<div class="form-group">
						<label for="title_package">Package Name</label>
						<input type="text" name="title_package" id="title_package" required>
					</div>

					<div class="form-group">
						<label for="description_package">Description</label>
						<textarea name="description_package" id="description_package" required></textarea>
					</div>

					<div class="form-group">
						<label for="photo_package">Upload Photo</label>
						<input type="file" name="photo_package[]" id="photo_package" multiple required>
					</div>

					<button type="submit" name="submit" class="btn btn-primary">Save</button>
					<a href="<?php echo $base_url."index.php?page=dashboard&section=pkg-main" ?>" class="btn btn-danger ml-2 decor-none">Cancel</a>
				</form>
			</div>
		</div>
	</div>
</div>