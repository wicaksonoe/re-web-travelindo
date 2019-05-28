<?php 
	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
		die('Direct Access Not Allowed.');
		exit();
	}
?>
<footer class="mt-4">
	<div class="container pt-2 pb-2">
		<div class="row">
			<div class="col-3">
				<img class="align-middle" src="<?php echo $base_url.'assets/images/logo/icon-2-white.png'; ?>" alt="" width="70%" />
			</div>
			<div class="col-3">
				<h3 class="text-white mb-1">Travelindo</h3>
				<p class="text-white text-justify">
					Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam
					adipisci quidem praesentium officia reprehenderit corporis
					voluptas ipsam hic fuga, numquam quos maiores impedit, nobis
					deleniti ducimus delectus magni? Laudantium, ipsa.
				</p>
			</div>
			<div class="col-3">
				<div class="mt-1 mb-1" style="width: 100%; height: 150px; background-color: white;"></div>
				<div>
					<p class="text-white">Temukan Kami di Google Maps</p>
				</div>
			</div>
			<div class="col-3">
				<h3 class="text-white mb-2">Kepoin Sosial Media Kami di</h3>
				<div class="text-center">
					<a href="#" style="display: inline-block; width: 50px; height: 50px; margin: 0 15px; background-color: white;"></a>
					<a href="#" style="display: inline-block; width: 50px; height: 50px; margin: 0 15px; background-color: white;"></a>
					<a href="#" style="display: inline-block; width: 50px; height: 50px; margin: 0 15px; background-color: white;"></a>
				</div>
				<br />
				<p class="text-white">&copy; &nbsp;&nbsp; 2019 Travelindo</p>
			</div>
		</div>
	</div>
</footer>