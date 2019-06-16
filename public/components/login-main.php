<?php 
	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
		die('Direct Access Not Allowed.');
		exit();
	}

	require_once(getcwd().'/module/connection.php');

	if ( isset($_POST['submit']) ) {
		$username = mysqli_real_escape_string($connection, $_POST['username']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);

		$query = "SELECT * FROM users WHERE username='$username' AND  password='".md5($password)."' LIMIT 1";

		$result_query = mysqli_query($connection, $query);

		if ( mysqli_num_rows($result_query) == 1 ) {
			$_SESSION['login'] = 1;
			$_SESSION['username'] = $username;
			
			mysqli_close($connection);		
		} else {

			mysqli_close($connection);		
			header('location: '.$base_url.'index.php?page=login');
		}
	}

	if ( isset($_SESSION['login']) && $_SESSION['login'] == 1 ) {
		header('location: '.$base_url.'index.php?page=dashboard&section=pkg-main');
	} 

?>
<div class="login">
	<div class="background"></div>
	<div class="content">
		<a href="<?php echo $base_url ?>">
			<img src="<?php echo $base_url.'assets/images/logo/icon-1.png'; ?>" alt="">
		</a>
		<form action="" method="post">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" id="username" name="username" class="">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" id="password" name="password" class="">
			</div>
			<button type="submit" name="submit" class="btn btn-primary btn-login text-center">
				<h2>Sign In</h2>
			</button>
		</form>
	</div>
</div>