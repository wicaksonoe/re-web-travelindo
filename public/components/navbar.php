<?php 
	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
		die('Direct Access Not Allowed.');
		exit();
	}
?>
<div class="nav">
	<div class="container">
		<nav class="navigasi">
			<img class="" src="<?php echo $base_url.'assets/images/logo/icon-2-white.png'; ?>" style="margin: 10px 35px; height: 35px" />
			<ul class="nav">
				<li><a href="<?php echo $base_url.'index.php';?>" class="text-white"> Home </a></li>
				<li><a href="<?php echo $base_url.'index.php?page=';?>" class="text-white"> About Us </a></li>
				<li><a href="<?php echo $base_url.'index.php?page=package';?>" class="text-white"> Packages </a></li>
				<li><a href="<?php echo $base_url.'index.php?page=';?>" class="text-white"> Gallery </a></li>
				<li><a href="<?php echo $base_url.'index.php?page=';?>" class="text-white"> Testimoni </a></li>
			</ul>
		</nav>
	</div>
</div>