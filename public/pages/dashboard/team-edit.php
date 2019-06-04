<?php 
	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
		die('Direct Access Not Allowed.');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Dashboard Team</title>
	<link rel="stylesheet" href="<?php echo $base_url.'/assets/css/style.css';?>">
</head>
<body>

	<?php
		$page = 'team';
		require_once(getcwd().'/components/navbar.php');
		require_once(getcwd().'/components/dashboard/team-edit.php');
		require_once(getcwd().'/components/footer.php');
	?>

</body>
</html>