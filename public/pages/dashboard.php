<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
	die('Direct Access Not Allowed.');
	exit();
}


// Checking session
if ( !isset($_SESSION['login']) && $_SESSION['login'] != 1 ) {
	header('location: '.$base_url.'index.php?page=login');
}
// ======================

// Memberikan nilai awalan untuk menentukan akan menampilkan halaman apa
if ( isset($_GET['section']) ) {
	$section = $_GET['section'];
} else {
	header('location: '.$base_url.'index.php?page=dashboard&section=pkg-main');
}

// ============================================

switch ($section) {

	// Punya Weecaak
	case 'pkg-main':
		require_once(getcwd().'/pages/dashboard/package-main.php');
		break;
		
	case 'pkg-new':
		require_once(getcwd().'/pages/dashboard/package-new.php');
		break;
		
	case 'pkg-detail':
		if ( isset($_GET['id']) ) {
			require_once(getcwd().'/pages/dashboard/package-detail.php');
		} else {
			require_once(getcwd().'/pages/404-dashboard.php');
		}
		break;
		
	case 'pkg-edit':
		if ( isset($_GET['id']) ) {
			require_once(getcwd().'/pages/dashboard/package-edit.php');
		} else {
			require_once(getcwd().'/pages/404-dashboard.php');
		}
		break;
		
	case 'pkg-delete':
		if ( isset($_GET['id']) ) {
			require_once(getcwd().'/pages/dashboard/package-delete.php');
		} else {
			require_once(getcwd().'/pages/404-dashboard.php');
		}
		break;


	// Punya Era & Melly
	case 'team-main':
		require_once(getcwd().'/pages/dashboard/team-main.php');
		break;
		
	case 'team-new':
		require_once(getcwd().'/pages/dashboard/team-new.php');
		break;
		
	case 'team-edit':
		if ( isset($_GET['id']) ) {
			require_once(getcwd().'/pages/dashboard/team-edit.php');
		} else {
			require_once(getcwd().'/pages/404-dashboard.php');
		}
		break;

	case 'team-delete':
		if ( isset($_GET['id']) ) {
			require_once(getcwd().'/pages/dashboard/team-delete.php');
		} else {
			require_once(getcwd().'/pages/404-dashboard.php');
		}
		break;

	

		
	// Punya Neesia & Dewii
	case 'testi-main':
		require_once(getcwd().'/pages/dashboard/testimoni-main.php');
		break;
		
	case 'testi-new':
		require_once(getcwd().'/pages/dashboard/testimoni-new.php');
		break;
		
	case 'testi-edit':
		if ( isset($_GET['id']) ) {
			require_once(getcwd().'/pages/dashboard/testimoni-edit.php');
		} else {
			require_once(getcwd().'/pages/404-dashboard.php');
		}
		break;

	case 'testi-delete':
		if ( isset($_GET['id']) ) {
			require_once(getcwd().'/pages/dashboard/testimoni-delete.php');
		} else {
			require_once(getcwd().'/pages/404-dashboard.php');
		}
		break;

	// Route to NULL and Not Found
	case NULL:
	default:
	require_once(getcwd().'/pages/404-dashboard.php');
		break;
}