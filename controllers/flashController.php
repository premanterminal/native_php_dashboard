<?php

session_start();

if(!defined('BL')){
	die('Tidak boleh diakses langsung.');
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../common/config/DbController.php');
require_once('../common/controllers/CommonController.php');

function getFlash($bulan, $msisdn)
{
		try
		{
			
			//$stmt = dbConnectiondata()->prepare("select trx_date, msisdn, vas_code, region,
			//		trx, revenue, costband, content_id, lac, ci, cluster_hq 
			//		from mail_flash_sumbagut_201807 where msisdn like '6285260587628';");
			$stmt = dbConnectiondata()->prepare("select trx_date, msisdn, vas_code, region,
					trx, revenue, costband, content_id, lac, ci, cluster_hq 
					from mail_flash_sumbagut_$bulan where msisdn like '$msisdn';");
			$stmt->execute();
			$flash = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			$return = [];
			
			foreach ($flash as $row) {
				$return[] = [
					'trx_date' => $row['trx_date'],
					'msisdn' => $row['msisdn'],
					'vas_code' => $row['vas_code'],
					'region' => $row['region'],
					'trx' => $row['trx'],
					'revenue' => $row['revenue'],
					'costband' => $row['costband'],
					'content_id' => $row['content_id'],
					'lac' => $row['lac'],
					'ci' => $row['ci'],
					'cluster_hq' => $row['cluster_hq'],

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

?>