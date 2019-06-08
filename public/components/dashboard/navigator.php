<?php 
	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
		die('Direct Access Not Allowed.');
		exit();
	}
?>
<div class="row">
	<div class="col-12">
		<ul class="menu">
			<li
				<?php
					if($page == 'package') echo 'class="active"';
				?>
			>
				<a href="<?php echo $base_url.'index.php?page=dashboard&section=pkg-main';?>">Manage Package</a>
			</li>

			<li
				<?php
					if($page == 'team') echo 'class="active"';
				?>
			>
				<a href="">Manage Team</a>
			</li>

			<li
				<?php
					if($page == 'testimoni') echo 'class="active"';
				?>
			>
				<a href="">Manage Testimoni</a>
			</li>
		</ul>
	</div>
</div>