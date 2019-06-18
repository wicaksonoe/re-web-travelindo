<?php
	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
		die('Direct Access Not Allowed.');
		exit();
	}

	require_once(getcwd().'/module/connection.php');

	if ( !isset($_GET['id']) ) {
		die('404-Items Not Found');
	}

	$id = mysqli_real_escape_string($connection, $_GET['id']);

	$query_get = "SELECT * FROM testimonies WHERE id_testimoni=$id LIMIT 1";

	$result_query_get = mysqli_query($connection, $query_get);

	if ( mysqli_num_rows($result_query_get) == 0 ) {
		die("data tidak ditemukan");
	}

	$result_single_row_get = mysqli_fetch_assoc($result_query_get);

	if ( isset($_POST['submit']) ) {
		$title_testimoni = mysqli_real_escape_string($connection, $_POST['title_testimoni']);
		$description_testimoni = mysqli_real_escape_string($connection, $_POST['description_testimoni']);

		$upload_folder = getcwd().'/assets/upload/testimoni/';
		$photo_testimoni = basename( $_FILES['photo_testimoni']['name'] );

		if ( is_uploaded_file($_FILES['photo_testimoni']['tmp_name']) ) {
			if ( move_uploaded_file($_FILES['photo_testimoni']['tmp_name'], $upload_folder.$photo_testimoni) ) {
				unlink($upload_folder.$result_single_row_get['photo_testimoni']);
			} else {
				die('Gagal Memindahkan file');
			}
		}  else {
			die('Gagal Upload file');
		}

		$query_update =	"UPDATE
							testimonies 
						SET
							title_testimoni='$title_testimoni',
							description_testimoni='$description_testimoni',
							photo_testimoni='$photo_testimoni'
						WHERE
							id_testimoni=$id";

		$result_query_update = mysqli_query($connection, $query_update);

		if( !$result_query_update ){
			echo " Update Failed <br>";
			echo "QUERY :: $query_update <br>";
			echo mysqli_error($connection);
			mysqli_close($connection);
			exit();
		}

		mysqli_close($connection);

		header('location: '.$base_url.'/index.php?page=dashboard&section=testi-main');
	}

	mysqli_close($connection);

?>
<div class="form">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1> Welcome Back, Administrator</h1>
				</div>
			</div>

			<?php
				require_once('navigator.php');
			?>

			<div class="row">
				<div class="col-12">
					<h2> Existing</h2><br>
					<div class="row">
						<div class="col-4">
							<div class="image-package">
								<img src="assets/upload/testimoni/<?php echo $result_single_row_get['photo_testimoni'] ?>" alt="" srcset="">
							</div>
						</div>
						<div class="col-6 offset-1">
							<p class="mb-1">Nama : <?php echo $result_single_row_get['title_testimoni'] ?></p>
							<p>Testimoni: <?php echo $result_single_row_get['description_testimoni'] ?></p>
						</div>
					</div>

					<hr><br />

					<form action="" method="post" enctype="multipart/form-data" class="col-6">
						<h2> New Data</h2><br>
						<div class="form-group">
							<label> Nama </label>
							<input type="text" name="title_testimoni" required>
						</div>

						<div class="form-group">
							<label><br> Testimoni </label><br><br>
							<textarea name="description_testimoni" rows="10" required></textarea>
						</div>

						<div class="form-group">
							<label><br> Upload Foto </label><br><br>
							<input type="file" name="photo_testimoni" required>
						</div>

						<div class="row mt-2">
							<div class="col-6">
								<button type="submit" name="submit" class="btn btn-primary"> Simpan</button>
								<a href="<?php echo $base_url.'index.php?page=dashboard&section=testi-main' ?>" class="btn btn-danger ml-2"> Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>