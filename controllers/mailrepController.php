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

function getMailRep($branch_taker, $layer_1, $tahun_awal, $bln_awal, $tgl_awal, $tahun_akhir, $bln_akhir, $tgl_akhir)
{
		try
		{
			
			
			$stmt = dbConnection_216()->prepare("
			select * from mailrep_rev_vlr_cluster_prepaid_new 
			where branch like '$branch_taker' && l1 like '$layer_1'
			&& date between '$tahun_awal$bln_awal$tgl_awal.' 
			AND '$tahun_akhir$bln_akhir$tgl_akhir`';
			");
			$stmt->execute();
			$mailrep = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			$return = [];
			
			foreach ($mailrep as $row) {
				$return[] = [
					'date' => $row['date'],
					'region' => $row['region'],
					'branch' => $row['branch'],
					'wok' => $row['wok'],
					'l1' => $row['l1'],
					'l2' => $row['l2'],
					'l3' => $row['l3'],
					'product' => $row['product'],
					'priceplan' => $row['priceplan'],
					'trx' => $row['trx'],
					'duration' => $row['duration'],
					'revenue' => $row['revenue'],

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