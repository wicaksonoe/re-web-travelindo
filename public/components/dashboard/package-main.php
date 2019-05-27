<?php 
	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
		die('Direct Access Not Allowed.');
		exit();
	}
?>
<div class="main mt-2 mb-2">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1><strong>Welcome Back, Administrator</strong></h1>
			</div>
		</div>

		<?php
			require_once('navigator.php');
		?>

		<div class="row mt-2">
			<div class="col-12">
				<a href="" class="btn btn-primary">Create New</a>
			</div>

			<div class="col-12 mt-2">
				<div class="row">
					<div class="col-4">
						<div class="image-package">
							<img src="assets/images/package/2.jpg" alt="" srcset="">
						</div>
					</div>
					<div class="col-6 offset-1 package-content">
						<h2><strong>Nama Package</strong></h2>
						<p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum vitae itaque minima
							asperiores optio veniam voluptas blanditiis nisi recusandae rem atque eum, debitis odit, sequi tempora
							labore ea non id?</p>
						div.
						<div class="package-properties">
							<a href="" class="btn btn-primary">Show Details</a>
							<a href="" class="btn btn-primary ml-1">Edit Package</a>
							<a href="" class="btn btn-danger float-right">Delete Package</a>
						</div>
					</div>
				</div>
				<hr class="mt-2">
			</div>

			<div class="col-12 mt-2">
				<div class="row">
					<div class="col-4">
						<div class="image-package">
							<img src="assets/images/package/2.jpg" alt="" srcset="">
						</div>
					</div>
					<div class="col-6 offset-1 package-content">
						<h2><strong>Nama Package</strong></h2>
						<p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum vitae itaque minima
							asperiores optio veniam voluptas blanditiis nisi recusandae rem atque eum, debitis odit, sequi tempora
							labore ea non id?</p>
						div.
						<div class="package-properties">
							<a href="" class="btn btn-primary">Show Details</a>
							<a href="" class="btn btn-primary ml-1">Edit Package</a>
							<a href="" class="btn btn-danger float-right">Delete Package</a>
						</div>
					</div>
				</div>
				<hr class="mt-2">
			</div>

			<div class="col-12 mt-2">
				<div class="row">
					<div class="col-4">
						<div class="image-package">
							<img src="assets/images/package/2.jpg" alt="" srcset="">
						</div>
					</div>
					<div class="col-6 offset-1 package-content">
						<h2><strong>Nama Package</strong></h2>
						<p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum vitae itaque minima
							asperiores optio veniam voluptas blanditiis nisi recusandae rem atque eum, debitis odit, sequi tempora
							labore ea non id?</p>
						div.
						<div class="package-properties">
							<a href="" class="btn btn-primary">Show Details</a>
							<a href="" class="btn btn-primary ml-1">Edit Package</a>
							<a href="" class="btn btn-danger float-right">Delete Package</a>
						</div>
					</div>
				</div>
				<hr class="mt-2">
			</div>

		</div>
	</div>
</div>