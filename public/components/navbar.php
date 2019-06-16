<?php 
	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
		die('Direct Access Not Allowed.');
		exit();
	}
?>
<div class="nav">
	<div class="container">
		<nav class="navigasi">
			<a href="<?php echo $base_url.'index.php';?>"><img class="" src="<?php echo $base_url.'assets/images/logo/icon-2-white.png'; ?>" style="margin: 10px 35px; height: 35px" /></a>
			<ul class="nav">
				<li><a href="<?php echo $base_url.'index.php';?>" class="text-white"> Home </a></li>
				<li><a href="<?php echo $base_url.'index.php?page=package';?>" class="text-white"> Packages </a></li>
				<li><a href="<?php echo $base_url.'index.php?page=team';?>" class="text-white"> Our Teams </a></li>
				<li><a href="<?php echo $base_url.'index.php?page=testimoni';?>" class="text-white"> Testimoni </a></li>
				<li><a href="<?php echo $base_url.'index.php?page=gallery';?>" class="text-white"> Gallery </a></li>
				<li><a href="<?php echo $base_url.'index.php?page=aboutus';?>" class="text-white"> About Us </a></li>
				<?php if ( isset($_SESSION['login']) && $_SESSION['login'] == 1 ) {?>
					<li><a href="<?php echo $base_url.'index.php?page=logout';?>" class="text-white"> Logout </a></li>
				<?php } else { ?>
					<li><a href="<?php echo $base_url.'index.php?page=login';?>" class="text-white"> Login </a></li>
				<?php }?>
			</ul>
		</nav>
	</div>
</div>