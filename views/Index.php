<?php
session_start();

define('BL', true);

require_once('../controllers/LoginController.php');

if(!is_loggedin())
{
	redirect('login');
}

if(isset($_GET['logout']) && $_GET['logout']=="true")
{
	doLogout();
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>MCD SUMBAGUT</title>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<meta http-equiv="x-ua-compatible" content="ie=edge">
		<?php include_once "CommonAssets.php"; ?>
	</head>
	<body class="fixed-sn white-skin" >
		<?php include_once "Header.php"; ?>
		<?php include_once "CommonScript.php"; 
		?>

		<?php 
			
			if(is_loggedin()!="")
			{
			    include_once "Script.php";
			}
		?>
	</body>
</html>
