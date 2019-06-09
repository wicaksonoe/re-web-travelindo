<?php
	
	
	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
		die('Direct Access Not Allowed.');
		exit();
	}

	require_once(getcwd()."/module/connection.php");

	$query_data = mysqli_query($connection, "SELECT * FROM teams");

	$datas = [];
	while ( $data = mysqli_fetch_assoc($query_data) ) {
		$datas[] = $data;
		
	}


	mysqli_close($connection);


?>

<div class="testimoni">
	<div class="container">
		<div class="row mb-2">
			<div class="col-12">
				<h1><b>Welcome Back, Administrator</b></h1>
			</div>
		</div>

		<?php
				require_once('navigator.php');
			?>



		<div class="row mt-4">
			<div class="col-12">
				<a href="<?php echo $base_url."index.php?page=dashboard&section=team-new" ?>"
					class="btn btn-primary">Create New</a>
			</div>
		</div>


		<div class="row">
			<div class="col-12">
				<table class="responsive">
					<tr>
						<th>No.</th>
						<th>Photo</th>
						<th>Details</th>
						<th>Action</th>
					</tr>

					<?php

						foreach ($datas as $key => $value){
							echo
							'<tr>
						<td class="text-center">1</td>
						<td class="text-center"><img src="assets/upload/team/'.$value["photo_team"].'" alt=""></td>
						<td class="pl-1">
							<p class="mb-1">Nama : '.$value["name_team"].' </p>
							<p> Instagram : <a href="http://'.$value["link_instagram"].'"> Instagram</a>  </p>
							<p> Facebook : <a href="http://'.$value["link_facebook"].'"> Facebook</a>  </p>
							<p> Twitter : <a href="http://'.$value["link_twitter"].'"> Twitter</a>  </p>

						</td>
						<td class="text-center">
							<a href="'.$base_url.'index.php?page=dashboard&section=team-edit&id='.$value['id_team'].'"
								class="btn btn-sm btn-primary ml-1">Edit</a>
							<a href="'.$base_url.'index.php?page=dashboard&section=team-delete&id='.$value['id_team'].'"
								class="btn btn-sm btn-danger">Delete</a>
					</tr>';
						}
						
					?>
					

				</table>
			</div>
		</div>
	</div>
</div>