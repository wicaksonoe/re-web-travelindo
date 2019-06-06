<?php

//  DELETE THIS IF ON PRODUCTION MODE
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
// +++++++++++++++++++++++++++++++++++++++

// SET BASE URL
$base_url = "http://localhost/re-web-travelindo/public/";

// Memberikan nilai awalan untuk menentukan akan menampilkan halaman apa
if ( isset($_GET['page']) ) {
	$page = $_GET['page'];
} else {
	$page = NULL;
}

// Memilih halaman berdasarkan variabel $page
switch ($page) {

	case 'package-detail':
		require_once('pages/package-detail.php');
		break;

	case 'aboutus':
		require_once('pages/aboutus.php');
		break;

	case 'team':
		require_once('pages/team.php');		
		break;

	case 'login':
		require_once('pages/login.php');
		break;
		
	case 'package':
		require_once('pages/package.php');
		break;
		
	case 'testimoni':
		require_once('pages/testimoni.php');
		break;
		
	case 'dashboard':
		require_once('pages/dashboard.php');
		break;
		
	case NULL:
		require_once('pages/beranda.php');
		break;
		
	default:
		require_once('pages/404.php');
		break;
}