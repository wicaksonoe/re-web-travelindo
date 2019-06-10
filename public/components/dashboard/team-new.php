<?php
	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
		die('Direct Access Not Allowed.');
		exit();
	}

	require_once(getcwd()."/module/connection.php");

	if ( isset($_POST['submit']) ) {
		$statusData = TRUE;

		$uploadFolder=getcwd()."/assets/upload/team/";

		$fileName = basename($_FILES['photo_team']['name']);

		if(is_uploaded_file($_FILES['photo_team']['tmp_name'])){
			if(move_uploaded_file($_FILES['photo_team']['tmp_name'], $uploadFolder.$fileName)){

				$photo_team=$fileName;
			}else{
				die("Gagal Upload File.");
			}
		}else{
			die("Gagal Upload File.");
		}
	

		// Insert Package Name & Description
		$name_team        = mysqli_real_escape_string($connection, $_POST['name_team']);
		$link_facebook       = mysqli_real_escape_string($connection, $_POST['link_facebook']);
		$link_instagram       = mysqli_real_escape_string($connection, $_POST['link_instagram']);
		$link_twitter        = mysqli_real_escape_string($connection, $_POST['link_twitter']);
		

		$query = "INSERT INTO 
								teams (name_team,photo_team, link_facebook, link_instagram, link_twitter)
							VALUES
								('$name_team', '$photo_team', '$link_facebook', '$link_instagram', '$link_twitter')";

		$result = mysqli_query($connection, $query);

		// Insert Data Failed.
		if ( !$result ) {
			echo "<br>Input data gagal.<br><br><br>";
			echo "QUERY :: $query <br>";
			echo mysqli_error($connection);
			
		}
			mysqli_close($connection);
			header('location:'.$base_url.'/index.php?page=dashboard&section=team-main');
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
				<div class="col-12">
					<h2> New Data</h2>
				</div>
			</div>

			<div class="row">
				<div class="col-7">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label> Nama </label>
							<input type="" name="name_team">
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
							<div class="col-9">
								<button type="submit" name="submit" class="btn btn-primary"> Simpan</button>
								<a href="<?php echo $base_url."index.php?page=dashboard&section=team-main" ?>" class="btn btn-danger ml-2">Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>