<?php 
	include_once('mysql-login.php');

	if(!isset($title)){
		$title = 'default';
	}
?>

<!DOCTYPE HTML>
<html>
	<body class="is-preload">
		<head>
			<title> <?php echo $title ?> </title>
			<meta charset="utf-8" />
			
			<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
			<meta name="description" content="" />
			<meta name="keywords" content="" />
			
			<link rel="stylesheet" href="/latienda/assets/css/main.css"/>
			<link rel="stylesheet" href="/latienda/assets/css/bootstrap.min.css"/>
			
			
		</head>
		<!-- Nav -->
			<?php include_once('nav.php'); ?>