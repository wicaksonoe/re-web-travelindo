<?php
	

	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
		die('Direct Access Not Allowed.');
		exit();
	}

	require_once(getcwd()."/module/connection.php");

	$id = mysqli_real_escape_string($connection, $_GET['id']);

	$query_get = "SELECT * FROM teams WHERE id_team = $id LIMIT 1";

	$result_query_get = mysqli_query($connection, $query_get);

	if($result_query_get->num_rows==0){
		die("Data Tidak Ada");
	}

	$result_single_single_row_get = mysqli_fetch_assoc($result_query_get);



	if(isset($_POST["submit"])) {
		$uploadFolder= getcwd()."/assets/upload/team/";
		$fileName = basename($_FILES["photo_team"]["name"]);

		if(is_uploaded_file( $_FILES["photo_team"]["tmp_name"])){
			if(move_uploaded_file($_FILES["photo_team"]["tmp_name"], $uploadFolder.$fileName)){
				unlink($uploadFolder.$result_single_single_row_get["photo_team"]);

				$photo_team_data = $fileName;
			}else{
				die("Gagal Memindahkan File");
			}

		}else{
			die("Gagal Upload File");
		}

		$name_team_data = mysqli_real_escape_string ($connection, $_POST['name_team']);
		$link_facebook_data = mysqli_real_escape_string ($connection, $_POST['link_facebook']);
		$link_instagram_data = mysqli_real_escape_string ($connection, $_POST['link_instagram']);
		$link_twitter_data = mysqli_real_escape_string ($connection, $_POST['link_twitter']);

		$query_update = "UPDATE teams SET name_team = '$name_team_data', link_facebook = '$link_facebook_data', link_instagram ='$link_instagram_data', link_twitter = '$link_twitter_data', photo_team = '$photo_team_data' WHERE id_team= $id";

		$result_query_update = mysqli_query($connection, $query_update);

		if( !$result_query_update ){
			echo " Update Failed <br>";
			echo "QUERY :: $query_update <br>";
			echo mysqli_error($connection);
			mysqli_close($connection);
			exit();
		}

		mysqli_close($connection);

		header('location: '.$base_url.'/index.php?page=dashboard&section=team-main');
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
					<h2> Existing </h2>
				</div>
			</div>

			<div class="box">
				<div class="pt-3 pb-3">
					<div class="row">

						<div class="col-2">
							<div id="box" class="card-image">
								<img src="assets/upload/team/<?php echo $result_single_single_row_get["photo_team"]; ?>" alt="" srcset="">
							</div>
						</div>

						<div class="col-9 offset-1">
							<div class="text">
								<p>Nama : <?php echo $result_single_single_row_get["name_team"]; ?></p>
								<p> Facebook <?php echo $result_single_single_row_get["link_facebook"]; ?>:</p>
								<p> Instagram : <?php echo $result_single_single_row_get["link_instagram"]; ?></p>
								<p> Twitter : <?php echo $result_single_single_row_get["link_twitter"]; ?></p>
							</div>
						</div>

						<div class="col-12 mt-2">
							<hr>
						</div>

					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<h2> New Data</h2>
				</div>
			</div>

			<div class="col-7">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label> Nama </label>
						<input type="text" name="name_team" required>
					</div>

					<div class="form-group">
						<label> Facebook </label>
						<input type="text" name="link_facebook" required>
					</div>

					<div class="form-group">
						<label> Instagram </label>
						<input type="text" name="link_instagram" required>
					</div>

					<div class="form-group">
						<label> Twitter </label>
						<input type="text" name="link_twitter" required>
					</div>

					<div class="form-group">
						<p> Upload Photo</p> <br />
						<p><input type="file" name="photo_team" required></p>
					</div>

					<div class="row">
						<div class="col-8">
							<button type="submit" name="submit" class="btn btn-primary"> Simpan</button>
							<a href="<?php echo $base_url."index.php?page=dashboard&section=team-main" ?>" class="btn btn-danger ml-2">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>