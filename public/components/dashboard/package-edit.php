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
							<img src="../assets/images/package/2.jpg" alt="" srcset="">
						</div>
					</div>
					<div class="col-6 offset-1 package-content">
						<h2><strong>Nama Package</strong></h2>
						<p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum vitae itaque minima
							asperiores optio veniam voluptas blanditiis nisi recusandae rem atque eum, debitis odit, sequi tempora
							labore ea non id?</p>
						div.
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
						<label for="">Package Name</label>
						<input type="text" name="" id="">
					</div>

					<div class="form-group">
						<label for="">Description</label>
						<textarea name="" id=""></textarea>
					</div>

					<div class="form-group">
						<label for="">Upload Photo</label>
						<input type="file" name="" id="">
					</div>

					<button type="submit" class="btn btn-primary">Save</button>
					<a href="" class="btn btn-danger ml-2 decor-none">Cancel</a>
				</form>
			</div>
		</div>
	</div>
</div>