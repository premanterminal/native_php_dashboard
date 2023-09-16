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
			$stmt = dbConnection()->prepare("SELECT tb_whitelist.id, tb_whitelist.program, tb_whitelist.cluster, tb_whitelist.nama_file, tb_whitelist.jenis_file, tb_whitelist.tgl_upload, tb_user.nama_lengkap FROM tb_whitelist, tb_user WHERE tb_whitelist.username=tb_user.username ORDER BY tb_whitelist.id DESC");
			$stmt->execute();
			$whitelist = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$return = [];

			foreach ($whitelist as $row) {
				$return[] = [
					'id' => $row['id'],
					'program' => $row['program'],
					'cluster' => $row['cluster'],
					'nama_file' => $row['nama_file'],
					'jenis_file' => $row['jenis_file'],
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

function getAllCluster()
{
    try
    {
        $stmt = dbConnection()->prepare("SELECT id_cluster,nama_cluster FROM tb_cluster");
        $stmt->execute();
        $cluster = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $return = [];

        foreach ($cluster as $row) {
            $return[] = [ 
                'id_cluster' => $row['id_cluster'],
                'nama_cluster' => $row['nama_cluster']
            ];
        }

        $hasil = json_encode($return, true);
        return $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getDataUser($username)
{
	try
	{
		$stmt = dbConnection()->prepare("SELECT tb_whitelist.program, tb_whitelist.cluster, tb_whitelist.nama_file, tb_whitelist.jenis_file, tb_whitelist.tgl_upload, tb_user.nama_lengkap FROM tb_whitelist, tb_user WHERE tb_whitelist.username=:username AND tb_whitelist.username=tb_user.username");
		$stmt->execute(array(':username'=>$username));
		$whitelist = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$return = [];

		foreach ($whitelist as $row) {
			$return[] = [ 
				'program' => $row['program'],
				'cluster' => $row['cluster'],
				'nama_file' => $row['nama_file'],
				'jenis_file' => $row['jenis_file'],
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

//function tambahData($program, $cluster, $jenis_file, $bulan, $tipe_file, $tmp_file, $username, $id_user, $date)
function tambahData($program, $cluster, $jenis_file, $bulan, $tipe_file, $tmp_file, $username, $id_user)
{
	$date = date('Y-m-d H:i:s');

	//$date = date('Y-m-d');
	
	strtoupper($cluster);
	//$nama_file_whitelist = $id_user.'_'.$program.'_'.$cluster.'_'.$bulan.'_'.$date.'.'.$jenis_file;
	$nama_file_whitelist = $id_user.'_'.$program.'_'.$cluster.'_'.$bulan.'.'.$jenis_file;
	$upload_dir = "../common/data/{$program}/{$cluster}";
	$file_whitelist = $upload_dir."/".$nama_file_whitelist;
	
	

	if (!is_dir($upload_dir) && !mkdir($upload_dir, 0777, true))
	{
		die("Error creating folder $upload_dir");
	}

	try
	{
		
		move_uploaded_file($tmp_file, $file_whitelist);

		
		$stmt = dbConnection()->prepare("INSERT INTO tb_whitelist(program,cluster,nama_file,jenis_file,bulan,username,tgl_upload) VALUES (:program, :cluster, :nama_file, :jenis_file, :bulan, :username, :tgl_upload)");
		$stmt->bindparam(":program", $program);
		$stmt->bindparam(":cluster", $cluster);
		$stmt->bindparam(":nama_file", $nama_file_whitelist);
		$stmt->bindparam(":jenis_file", $jenis_file);
		$stmt->bindparam(":bulan", $bulan);
		$stmt->bindparam(":username", $username);
		$stmt->bindparam(":tgl_upload", $date);
		$stmt->execute();
		echo $nama_file_whitelist;
		
		//$apa = system("awk -F'|' 'NR==FNR {h[$1] = $0; next} {if(h[$2])print $0}' ../common/data/".$program."/".$cluster."/".$nama_file_whitelist." ../common/data/lookup/mkios".$program."_20180".$bulan.".txt > ../common/data/hasil/".$program."/".$cluster."/hasil_".$nama_file_whitelist."");
		
		if ($program == "flash")
		{		
			//$new = system("awk -F'|' 'NR==FNR {h[$1] = $0; next} {if(h[$2])print $0}' ../common/data/".$program."/".$cluster."/".$nama_file_whitelist." ../common/data/lookup/mkios".$program."_20180".$bulan.".txt > ../common/data/hasil/".$program."/".$cluster."/hasil_".$nama_file_whitelist." ",$toni);
			$new = system("awk -F'|' 'NR==FNR {h[$1]=$0;next} {if(h[$2]) print $0}' ../common/data/".$program."/".$cluster."/".$nama_file_whitelist." ../common/data/lookup/mkios".$program."_2018".$bulan.".txt > ../common/data/hasil/".$program."/".$cluster."/hasil_".$nama_file_whitelist."");
			
			//echo $toni;
							
		}
		else
		{
			$apa = system("awk -F'|' 'NR==FNR {h[$1] = $0; next} {if(h[$2])print $0}' ../common/data/".$program."/".$cluster."/".$nama_file_whitelist." ../common/data/lookup/mkios".$program."_2018".$bulan.".txt > ../common/data/hasil/".$program."/".$cluster."/hasil_".$nama_file_whitelist."");
		}
		
		return true;
	}
	catch(PDOException $e)
	{
		//echo $e->getMessage();
	}
}

function hapusData($id, $program, $cluster, $nama_file)
{
	if(isAdmin())
	{
		try
		{
			$dir = "../common/data/{$program}/{$cluster}";
			$file_whitelist = $dir."/".$nama_file;
			
			if (file_exists($file_whitelist))
			{
				unlink($file_whitelist);
				$stmt = dbConnection()->prepare("DELETE FROM tb_whitelist WHERE id=:id");
				$stmt->execute(array(':id' => $id));
				return true;
			}
			else
			{
				return false;
			}
		}
		catch(PDOException $e)
		{
			//echo $e->getMessage();
		}
	}
}

?>