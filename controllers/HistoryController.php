<?php
session_start();

if (!defined('BL')) {
    die('Tidak boleh diakses langsung.');
}

require_once('../common/config/DbController.php');
require_once('../common/controllers/CommonController.php');

function getData()
{
	if(isAdmin())
	{
		try
		{
			$stmt = dbConnection()->prepare("SELECT tb_user.nama_lengkap,tb_history.id_user,tb_history.username,tb_history.last_login,tb_history.last_logout FROM tb_user, tb_history WHERE tb_history.id_user=tb_user.id_user order by tb_history.last_login desc");
			$stmt->execute();
			$history = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$return = [];

			foreach ($history as $row) {
				$return[] = [ 
					'id_user' => $row['id_user'],
					'username' => $row['username'],
					'nama_lengkap' => $row['nama_lengkap'],
					'last_login' => $row['last_login'],
					'last_logout' => $row['last_logout']
				];
			}

			$hasil = json_encode($return, true);
			return $hasil;
		}
		catch(PDOException $e)
		{
			//echo $e->getMessage();
		}
	}
}