<?php
session_start();

if (!defined('BL')) {
    die('Tidak boleh diakses langsung.');
}

$date =date("Y/m/d");
$newdate = strtotime ( '-2 day' , strtotime ( $date ) ) ;
$newdate = date ( 'd' , $newdate );

function runQuery($sql)
{
	$stmt = dbConnection()->prepare($sql);
	$stmt->execute();
	return $stmt;
}

function redirect($url)
{
	header("location:$url");
}

function anti_injection($data)
{
	$filter = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
	return $filter;
}

function isAdmin()
{
	try
	{
		$stmt = dbConnection()->prepare("SELECT role FROM tb_user WHERE username=:username");
		$stmt->execute(array(':username' => $_SESSION['username']));
		$admin = $stmt->fetch();

		if($admin['role'] == 'admin')
			return true;
		else
			return false;
	}
	catch(PDOException $e)
	{
		//echo $e->getMessage();
	}
}

?>