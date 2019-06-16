<?php 
	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
		die('Direct Access Not Allowed.');
		exit();
	}

	require_once(getcwd().'/module/connection.php');

	$query = "SELECT * FROM testimonies ORDER BY id_testimoni DESC LIMIT 3";
	$result_query = mysqli_query($connection, $query);

	$result_rows = [];
	while ($result_single_row = mysqli_fetch_assoc($result_query)) {
		$result_rows[] = $result_single_row;
	}

	mysqli_close($connection);
?>
<div class="testimoni pt-3 pb-4">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center text-secondary">
				<h1>Some Message From Our Costumers</h1>
			</div>
		</div>
		<div class="row">
		<?php
			foreach ($result_rows as $key => $value){
				echo
				'<div class="col-4 mt-2">
					<div class="testi-content bg-primary box-shadow">
						<div class="row">
							<div class="col-12 pt-2">
								<div class="testi-avatar" style="overflow:hidden; position:relative">
									<img src="assets/upload/testimoni/'.$value["photo_testimoni"].'" style="position:absolute; width:100%; height:100%; object-fit:cover; object-position:center">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 pb-2 pt-1 text-center text-white">
								<div class="testi-text pl-1 pr-1">
									<h3 class="mb-1">'.$value["title_testimoni"].'</h3>
									<p class="mb-1">'.$value["description_testimoni"].'</p>
								</div>
							</div>
						</div>
					</div>
				</div>';
			}
			?>
		</div>
	</div>
</div>