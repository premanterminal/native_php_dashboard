<?php

session_start();

if (!defined('BL')) {
    die('Tidak boleh diakses langsung.');
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../common/config/DbController.php');
require_once('../common/controllers/CommonController.php');

function getData()
{
	if(isAdmin())
	{
		try
		{
			$stmt = dbConnection()->prepare("SELECT tb_cekflash.id, tb_cekflash.program,  tb_cekflash.msisdn,  tb_cekflash.tgl_upload, tb_user.nama_lengkap FROM tb_cekflash, tb_user WHERE tb_cekflash.username=tb_user.username ORDER BY tb_cekflash.id DESC");
			$stmt->execute();
			$whitelist = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$return = [];

			foreach ($whitelist as $row) {
				$return[] = [
					'id' => $row['id'],
					'program' => $row['program'],
					'msisdn' => $row['msisdn'],
					'tgl_upload' => $row['tgl_upload'],
					'nama_lengkap' => $row['nama_lengkap']
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

function getDataUser($username)
{
	try
	{
		$stmt = dbConnection()->prepare("SELECT tb_cekflash.program,  tb_cekflash.msisdn,  tb_cekflash.tgl_upload, tb_user.nama_lengkap FROM tb_cekflash, tb_user WHERE tb_cekflash.username=:username AND tb_cekflash.username=tb_user.username");
		$stmt->execute(array(':username'=>$username));
		$cekflash = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$return = [];

		foreach ($cekflash as $row) {
			$return[] = [ 
				'program' => $row['program'],
				'msisdn' => $row['msisdn'],
				'tgl_upload' => $row['tgl_upload'],
				'nama_lengkap' => $row['nama_lengkap']
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

function tambahData($program, $msisdn, $bulan, $username, $id_user)
{
	$date = date('Y-m-d H:i:s');

	//$date = date('Y-m-d');
	
	//$nama_file_whitelist = $id_user.'_'.$program.'_'.$msisdn.'_'.$bulan.'.'.$jenis_file;
	//$upload_dir = "../common/data/{$program}/{$cluster}";
	//$file_whitelist = $upload_dir."/".$nama_file_whitelist;
	
	

	if (!is_dir($upload_dir) && !mkdir($upload_dir, 0755, true))
	{
		//die("Error creating folder $upload_dir");
	}

	try
	{
		
		//move_uploaded_file($tmp_file, $file_whitelist);

		$stmt = dbConnection()->prepare("INSERT INTO tb_cekflash(program,msisdn,bulan,username,tgl_upload) VALUES (:program, :msisdn, :bulan, :username, :tgl_upload)");
		$stmt->bindparam(":program", $program);
		$stmt->bindparam(":msisdn", $msisdn);
		$stmt->bindparam(":bulan", $bulan);
		$stmt->bindparam(":username", $username);
		$stmt->bindparam(":tgl_upload", $date);
		$stmt->execute();
		//echo $nama_file_whitelist;
		
		
		/*if ($program == "flash")
		{		
			$new = system("awk -F'|' 'NR==FNR {h[$1] = $0; next} {if(h[$2])print $0}' ../common/data/".$program."/".$cluster."/".$nama_file_whitelist." ../common/data/lookup/mkios".$program."_20180".$bulan.".txt > ../common/data/hasil/".$program."/".$cluster."/hasil_".$nama_file_whitelist."");	
		}
		else
		{
			$apa = system("awk -F'|' 'NR==FNR {h[$1] = $0; next} {if(h[$2])print $0}' ../common/data/".$program."/".$cluster."/".$nama_file_whitelist." ../common/data/lookup/mkios".$program."_20180".$bulan.".txt > ../common/data/hasil/".$program."/".$cluster."/hasil_".$nama_file_whitelist."");
		}*/
		
		return true;
	}
	catch(PDOException $e)
	{
		//echo $e->getMessage();
	}
}



?>