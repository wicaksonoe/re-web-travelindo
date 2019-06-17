<?php

	require_once(getcwd().'/module/connection.php');
	$id = mysqli_real_escape_string($connection,$_GET['id']);
    $query_get = mysqli_query($connection,"SELECT * FROM testimonies where id_testimoni= $id limit 1");

    
    if ($query_get->num_rows ==0 ) {
        die("data tidak ditemukan.");
    }

    $query_delete = "DELETE FROM testimonies WHERE id_testimoni =$id";

    $result_query_delete = mysqli_query ($connection, $query_delete);

    if (!$result_query_delete) {
        echo "DELETE GAGAL!<br>";
        echo "QUERY :: $query_delete<br>";
        echo mysqli_error($connection);
        mysqli_close($connection);
        exit();

    }

    mysqli_close($connection);
    header ('location:'.$base_url.'index.php?page=dashboard&section=testi-main')



?> 

