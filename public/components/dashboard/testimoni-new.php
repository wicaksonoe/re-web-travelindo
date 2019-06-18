<?php
	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
		die('Direct Access Not Allowed.');
		exit();
	}

	require_once(getcwd()."/module/connection.php");

	if ( isset($_POST['submit']) ) {

		$uploadFolder=getcwd()."/assets/upload/testimoni/";

		$fileName = basename($_FILES['photo_testimoni']['name']);

		if(is_uploaded_file($_FILES['photo_testimoni']['tmp_name'])){
			if(move_uploaded_file($_FILES['photo_testimoni']['tmp_name'], $uploadFolder.$fileName)){

				$photo_testimoni=$fileName;
			}else{
				die("Gagal Upload File.");
			}
		}else{
			die("Gagal Upload File.");
		}

		// Insert
		$title_testimoni        = mysqli_real_escape_string($connection, $_POST['title_testimoni']);
		$description_testimoni       = mysqli_real_escape_string($connection, $_POST['description_testimoni']);

		$query = "INSERT INTO 
								testimonies (title_testimoni,photo_testimoni,description_testimoni)
							VALUES
								('$title_testimoni','$photo_testimoni', '$description_testimoni')";

		$result = mysqli_query($connection, $query);

		// Insert Data Failed.
		if ( !$result) {
			echo "<br>Input data gagal.<br><br><br>";
			echo "QUERY :: $query <br>";
			echo mysqli_error($connection);
			
		}
			mysqli_close($connection);
			header('location:'.$base_url.'/index.php?page=dashboard&section=testi-main');
	}
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
				<div class="col-6">
					<h2> New Data</h2><br>

					<form action="" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label> Nama </label>
							<input type="" name="title_testimoni">
						</div>

						<div class="form-group">
							<label><br> Testimoni </label><br><br>
							<textarea name="description_testimoni" required></textarea>
						</div>

						<div class="form-group">
						<label><br> Upload Foto </label><br><br>
						<p><input type="file"  name="photo_testimoni" required></p>
						</div>


						<div class="row mt-2">
							<div class="col-6">
							<button type="submit" name="submit" class="btn btn-primary"> Simpan</button>
								<a href="<?php echo $base_url."index.php?page=dashboard&section=testi-main" ?>" class="btn btn-danger ml-2">Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>