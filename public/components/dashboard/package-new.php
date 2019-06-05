<?php 
	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
		die('Direct Access Not Allowed.');
		exit();
	}

	require_once(getcwd()."/module/connection.php");

	if ( isset($_POST['submit']) ) {
		$statusData = TRUE;
		$statusPhoto = TRUE;

		// Insert Package Name & Description
		$pkg_name        = mysqli_real_escape_string($connection, $_POST['pkg_name']);
		$pkg_description = mysqli_real_escape_string($connection, $_POST['pkg_description']);
		
		$query = "INSERT INTO 
								packages (title_package, description_package)
							VALUES
								('$pkg_name', '$pkg_description')";

		$result = mysqli_query($connection, $query);

		// Insert Data Failed.
		if ( !$result ) {
			echo "<br>Input data gagal.<br><br><br>";
			echo mysqli_error($connection);
			$statusData = FALSE;
		}

		
		// Uploading images
		$lastId = mysqli_query($connection, "SELECT LAST_INSERT_ID()");
		$id = mysqli_fetch_row($lastId)[0];

		function saveImageToDB($connection, $id, $fileName) {
			$query = "INSERT INTO
									photos (id_package, photo_package)
								VALUES
									($id, '$fileName')";

			$run_query = mysqli_query($connection, $query);

			if ( !$run_query ) {
				echo "<br>Upload foto gagal.<br>";
				echo "QUERY :: $query<br>";
				echo mysqli_error($connection);
			}
		}

		$uploadLoc = getcwd().'/assets/upload/package/';
		$allowTypes = array('jpg', 'png', 'jpeg', 'gif');

		if ( !empty( array_filter($_FILES['pkg_photos']['name'] ) ) ) {
			foreach ($_FILES['pkg_photos']['name'] as $key => $value) {
				// Set uploadpath / upload-Location
				$fileName	= basename( $_FILES['pkg_photos']['name'][$key] );
				$targetUpload = $uploadLoc.$fileName;

				// Check if file is Valid
				$fileType = pathinfo($targetUpload, PATHINFO_EXTENSION);
				if (in_array($fileType, $allowTypes)) {
					// Upload & Save File
					if ( move_uploaded_file($_FILES['pkg_photos']['tmp_name'][$key], $targetUpload) ) {
						saveImageToDB($connection, $id, $fileName);
					} else {
						echo "<br>Upload foto gagal.<br>";
						echo mysqli_error($connection);
						echo "<br>";
						$statusPhoto = FALSE;
					}
				} else {
					echo "<br>Error Type File tidak didukung.<br>Gunakan .jpg, .png, .jpeg, .gif";
					$statusPhoto = FALSE;
				}
			}
		}

		mysqli_close($connection);

		if ( $statusData == TRUE && $statusPhoto == TRUE) {
			header("location: ".$base_url."index.php?page=dashboard&section=pkg-main");
		}
	}

	// Sumber :: https://www.codexworld.com/upload-multiple-images-store-in-database-php-mysql/
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
			<div class="col-6">
				<h2><strong>New Data</strong></h2>

				<form action="" method="post" enctype="multipart/form-data">

					<div class="form-group">
						<label for="pkg_name">Package Name</label>
						<input type="text" name="pkg_name" id="pkg_name" required>
					</div>

					<div class="form-group">
						<label for="pkg_description">Description</label>
						<textarea name="pkg_description" id="pkg_description" required></textarea>
					</div>

					<div class="form-group">
						<label for="pkg_photos">Upload Photo</label>
						<input type="file" name="pkg_photos[]" id="pkg_photos" multiple required>
					</div>

					<button type="submit" name="submit" class="btn btn-primary">Save</button>
					<a href="<?php echo $base_url."index.php?page=dashboard&section=pkg-main" ?>" class="btn btn-danger ml-2">Cancel</a>
				</form>
			</div>
		</div>
	</div>
</div>