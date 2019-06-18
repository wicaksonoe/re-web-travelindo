<?php 
	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
		die('Direct Access Not Allowed.');
		exit();
	}

	require_once(getcwd()."/module/connection.php");

	$id = mysqli_real_escape_string($connection, $_GET['id']);

	$query = "DELETE FROM teams WHERE id_team=".$id;

	$delete = mysqli_query($connection, $query);

	if ( $delete ) {
		echo "QUERY:: $query<br>";
		header('location: '.$base_url.'/index.php?page=dashboard&section=team-main');
		mysqli_close($connection);
	} else {
		echo "QUERY:: $query<br>";
		echo mysqli_error($connection);
		mysqli_close($connection);
		exit();
	}
?>