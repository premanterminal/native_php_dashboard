<?php

session_start();

if(!defined('BL')){
	die('Tidak boleh diakses langsung.');
}

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

require_once('../controllers/LoginController.php');
require_once('../common/config/DbController.php');
require_once('../common/controllers/CommonController.php');

function getVasBnum($bulan, $msisdn, $program)
{
	if($program == 'BULK')
    {
        $query = "	select Anum,Bnum,Denom,Tgl_trx, 
					Channel, SIte, Branch, Cluster, Kabupaten, Kecamatan
					from rm_mkios_data_$bulan where Channel in ('076') 
					&& Bnum like '$msisdn' ;
		";
    }
    elseif($program == 'DATA')
    {
        $query = "	select Anum,Bnum,Denom,Tgl_trx, 
					Channel, SIte, Branch, Cluster, Kabupaten, Kecamatan
					from rm_mkios_data_$bulan where Channel in ('063','062') 
					&& Bnum like '$msisdn' ;
		";
    }
	
	elseif($program == 'LEGACY')
    {
        $query = "	select Anum,Bnum,Denom,Tgl_trx, 
					Channel, SIte, Branch, Cluster, Kabupaten, Kecamatan
					from rm_mkios_data_$bulan where Channel in ('075') 
					&& Bnum like '$msisdn' ;	 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
		$stmt->execute();
		$vas = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$hasil = json_encode($vas);
        header('Content-Type: application/json');
        //echo $hasil;
		
		$return = [];
			
		foreach ($vas as $row) {
			$return[] = [
				'Anum' => $row['Anum'],
				'Bnum' => $row['Bnum'],
				'Denom' => $row['Denom'],
				'Tgl_trx' => $row['Tgl_trx'],
				'Channel' => $row['Channel'],
				'SIte' => $row['SIte'],
				'Branch' => $row['Branch'],
				'Cluster' => $row['Cluster'],
				'Kabupaten' => $row['Kabupaten'],
				'Kecamatan' => $row['Kecamatan'],


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


function getLegacyAnum($bulan, $msisdn)
{
		try
		{
			
			$stmt = dbConnectiondata()->prepare("select Anum,Bnum,Denom,Tgl_trx, 
			Channel, SIte, Branch, Cluster, Kabupaten, Kecamatan
			from rm_mkios_data_$bulan where Channel in ('075') 
			&& Anum like '$msisdn' ;");
			$stmt->execute();
			$legacy_anum = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			$return = [];
			
			foreach ($legacy_anum as $row) {
				$return[] = [
					'Anum' => $row['Anum'],
					'Bnum' => $row['Bnum'],
					'Denom' => $row['Denom'],
					'Tgl_trx' => $row['Tgl_trx'],
					'Channel' => $row['Channel'],
					'SIte' => $row['SIte'],
					'Branch' => $row['Branch'],
					'Cluster' => $row['Cluster'],
					'Kabupaten' => $row['Kabupaten'],
					'Kecamatan' => $row['Kecamatan'],

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

function getLegacyBnum($bulan, $msisdn)
{
		try
		{
			
			$stmt = dbConnectiondata()->prepare("select Anum,Bnum,Denom,Tgl_trx, 
			Channel, SIte, Branch, Cluster, Kabupaten, Kecamatan
			from rm_mkios_data_$bulan where Channel in ('075') 
			&& Bnum like '$msisdn' ;");
			$stmt->execute();
			$legacy_bnum = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			$return = [];
			
			foreach ($legacy_bnum as $row) {
				$return[] = [
					'Anum' => $row['Anum'],
					'Bnum' => $row['Bnum'],
					'Denom' => $row['Denom'],
					'Tgl_trx' => $row['Tgl_trx'],
					'Channel' => $row['Channel'],
					'SIte' => $row['SIte'],
					'Branch' => $row['Branch'],
					'Cluster' => $row['Cluster'],
					'Kabupaten' => $row['Kabupaten'],
					'Kecamatan' => $row['Kecamatan'],


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

function getBulkAnum($bulan, $msisdn)
{
		try
		{
			
			$stmt = dbConnectiondata()->prepare("select Anum,Bnum,Denom,Tgl_trx, 
			Channel, SIte, Branch, Cluster, Kabupaten, Kecamatan
			from rm_mkios_data_$bulan where Channel in ('076') 
			&& Anum like '$msisdn' ;");
			$stmt->execute();
			$bulk_anum = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			$return = [];
			
			foreach ($bulk_anum as $row) {
				$return[] = [
					'Anum' => $row['Anum'],
					'Bnum' => $row['Bnum'],
					'Denom' => $row['Denom'],
					'Tgl_trx' => $row['Tgl_trx'],
					'Channel' => $row['Channel'],
					'SIte' => $row['SIte'],
					'Branch' => $row['Branch'],
					'Cluster' => $row['Cluster'],
					'Kabupaten' => $row['Kabupaten'],
					'Kecamatan' => $row['Kecamatan'],

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

function getBulkBnum($bulan, $msisdn)
{
		try
		{
			
			$stmt = dbConnectiondata()->prepare("select Anum,Bnum,Denom,Tgl_trx, 
			Channel, SIte, Branch, Cluster, Kabupaten, Kecamatan
			from rm_mkios_data_$bulan where Channel in ('076') 
			&& Bnum like '$msisdn' ;");
			$stmt->execute();
			$bulk_bnum = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			$return = [];
			
			foreach ($bulk_bnum as $row) {
				$return[] = [
					'Anum' => $row['Anum'],
					'Bnum' => $row['Bnum'],
					'Denom' => $row['Denom'],
					'Tgl_trx' => $row['Tgl_trx'],
					'Channel' => $row['Channel'],
					'SIte' => $row['SIte'],
					'Branch' => $row['Branch'],
					'Cluster' => $row['Cluster'],
					'Kabupaten' => $row['Kabupaten'],
					'Kecamatan' => $row['Kecamatan'],

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

function getDataAnum($bulan, $msisdn)
{
		try
		{
			
			$stmt = dbConnectiondata()->prepare("select Anum,Bnum,Denom,Tgl_trx, 
			Channel, SIte, Branch, Cluster, Kabupaten, Kecamatan
			from rm_mkios_data_$bulan where Channel in ('063','062') 
			&& Anum like '$msisdn' ;");
			$stmt->execute();
			$data_anum = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			$return = [];
			
			foreach ($data_anum as $row) {
				$return[] = [
					'Anum' => $row['Anum'],
					'Bnum' => $row['Bnum'],
					'Denom' => $row['Denom'],
					'Tgl_trx' => $row['Tgl_trx'],
					'Channel' => $row['Channel'],
					'SIte' => $row['SIte'],
					'Branch' => $row['Branch'],
					'Cluster' => $row['Cluster'],
					'Kabupaten' => $row['Kabupaten'],
					'Kecamatan' => $row['Kecamatan'],

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

function getDataBnum($bulan, $msisdn)
{
		try
		{
			
			$stmt = dbConnectiondata()->prepare("select Anum,Bnum,Denom,Tgl_trx, 
			Channel, SIte, Branch, Cluster, Kabupaten, Kecamatan
			from rm_mkios_data_$bulan where Channel in ('063','062') 
			&& Bnum like '$msisdn' ;");
			$stmt->execute();
			$data_bnum = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			$return = [];
			
			foreach ($data_bnum as $row) {
				$return[] = [
					'Anum' => $row['Anum'],
					'Bnum' => $row['Bnum'],
					'Denom' => $row['Denom'],
					'Tgl_trx' => $row['Tgl_trx'],
					'Channel' => $row['Channel'],
					'SIte' => $row['SIte'],
					'Branch' => $row['Branch'],
					'Cluster' => $row['Cluster'],
					'Kabupaten' => $row['Kabupaten'],
					'Kecamatan' => $row['Kecamatan'],

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