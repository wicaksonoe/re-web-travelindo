<?php

	require_once(getcwd()."/module/connection.php");
	$id = mysqli_real_escape_string($connection,$_GET['id']);
	$query = mysqli_query($connection,"SELECT * FROM testimonies where id_testimoni= $id limit 1");

	$data =  mysqli_fetch_assoc($query);

	echo "<pre>";
	print_r ($data);
	echo "</pre>";
	
	if($query->num_rows == 0)	{
		header('location: '.$base_url.'index.php?page=dashboard&section=testi-main');
	}

if (isset ($_POST['submit'])) {
	$title_testimoni = mysqli_real_escape_string($connection,$_POST['title_testimoni']);
	$description_testimoni = mysqli_real_escape_string($connection,$_POST['description_testimoni']);

	$uploadFolder = getcwd()."/assets/upload/testimoni/";

	$photo_testimoni = basename($_FILES['photo_testimoni']['name']);

	if(is_uploaded_file($_FILES['photo_testimoni']['tmp_name'])){
		
		if(move_uploaded_file($_FILES['photo_testimoni']['tmp_name'],$uploadFolder.$photo_testimoni)){

			unlink($uploadFolder.$data['photo_testimoni']);

		}else{
			die("upload gagal.");
		}

		}else{
			die("upload gagal.");
		}
	

	$update = mysqli_query($connection,"UPDATE testimonies SET title_testimoni = '$title_testimoni',description_testimoni = '$description_testimoni' , photo_testimoni = '$photo_testimoni' WHERE id_testimoni =$id");

	if ($update){
		header('location: '.$base_url.'index.php?page=dashboard&section=testi-main');
	} else {
		echo "update failed.<br>";
		echo "query: $update <br>";
		echo mysqli_error($connection);
		mysqli_close($connection);
		exit();
	}
	
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
					<h2> Existing</h2><br>
					<div class="row">
						<div class="col-4">
							<div class="image-package">
								<img src="assets/upload/testimoni/<?php echo $data['photo_testimoni']; ?>" alt="" srcset="">
							</div>
						</div>
						<div class="col-6 offset-1">
							<p class="mb-1">Nama : <?php echo $data['title_testimoni']; ?></p>
							<p> <?php echo $data['description_testimoni']; ?></p>
						</div>
					</div>

					<hr><br />

					<form action="" method="post" enctype="multipart/form-data" class="col-6">
						<h2> New Data</h2><br>
						<div class="form-group">
							<label> Nama </label>
							<input type="text" name="title_testimoni">
						</div>

						<div class="form-group">
							<label><br> Testimoni </label><br><br>
							<textarea name="description_testimoni" rows="10"></textarea>
						</div>

						<div class="form-group">
							<label><br> Upload Foto </label><br><br>
							<input type="file" name="photo_testimoni" accept="/*">
						</div>

						<div class="row mt-2">
							<div class="col-6">
								<button type="submit" name="submit" class="btn btn-primary"> Simpan</button>
								<a href="<?php echo $base_url.'index.php?page=dashboard&section=testi-main'; ?>" class="btn btn-danger ml-2"> Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>