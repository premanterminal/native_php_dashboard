<?php
session_start();
require_once('password.php');

if (!defined('BL')) {
    die('Tidak boleh diakses langsung.');
}

date_default_timezone_set('Asia/Jakarta');

function dbConnection()
{
    $host = "10.33.14.222";
    $db_name = "dashboard";
    $username_db = "egi";
    $password_db = "Mcdsbu#2018";
	
    $conn = null;

    try
	{
        $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username_db, $password_db);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

        return $conn;
    }
	catch(PDOException $exception)
	{
        echo "Connection error: " . $exception->getMessage();
    }
}

function dbConnectiondata()
{
    $host = "10.33.14.222";
    $db_name = "mcd";
    $username_db = "egi";
    $password_db = "Mcdsbu#2018";
    $conn = null;

    try
	{
        $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username_db, $password_db);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

        return $conn;
    }
	catch(PDOException $exception)
	{
        echo "Connection error: " . $exception->getMessage();
    }
}

function dbConnection_228()
{
    $host = "10.35.105.228";
    $db_name = "dbmcd";
    $username_db = "appmcd";
    $password_db = "appmcd@123@";
    $conn = null;

    try
	{
        $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username_db, $password_db);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

        return $conn;
    }
	catch(PDOException $exception)
	{
        echo "Connection error: " . $exception->getMessage();
    }
}

function dbConnection_216()
{
    $host = "10.35.105.216";
    $db_name = "dbsumatera";
    $username_db = "appmsa";
    $password_db = "";
    $conn = null;

    try
    {
        $conn = new PDO("mysql:host=" . $host . ";dbname" . $db_name, $username_db, $password_db);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        return $conn;
    }
    catch(PDOException $exception)
    {
        echo "Connection error: " . $exception->getMessage();
    }
}

function dbConnection_237()
{
    $host = "10.35.105.237";
    $db_name = "dbmcd";
    $username_db = "appmcd";
    $password_db = "appmcd@123#";
    $conn = null;

    try
	{
        $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username_db, $password_db);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

        return $conn;
    }
	catch(PDOException $exception)
	{
        echo "Connection error: " . $exception->getMessage();
    }
}


function dbConnection_npa()
{
    $host = "10.35.105.166";
    $db_name = "performance_smr";
    $username_db = "appnpa";
    $password_db = "Appnpa#123";
    $conn = null;

    try
	{
        $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username_db, $password_db);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

        return $conn;
    }
	catch(PDOException $exception)
	{
        echo "Connection error: " . $exception->getMessage();
    }
}

function dbConnection_tigers()
{
    $host = "10.33.97.216";
    $db_name = "dbtigers";
    $username_db = "apptigers";
    $password_db = "apptigers123";
    $conn = null;

    try
	{
        $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username_db, $password_db);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

        return $conn;
    }
	catch(PDOException $exception)
	{
        echo "Connection error: " . $exception->getMessage();
    }
}


?>