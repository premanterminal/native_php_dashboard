<?php
session_start();

define('BL', true);

require_once('../common/config/DbController.php');
require_once('../common/controllers/CommonController.php');
require_once('../controllers/BranchClusterController.php');
require_once('../controllers/RevenueController.php');

$date =date("Y/m/d");
$newdate = strtotime ( '-2 day' , strtotime ( $date ) ) ;
$newdate = date ( 'd' , $newdate );
$period = strtotime ( '-2 day' , strtotime ( $date ) ) ;
$period = date ( 'Ymd' , $period );


if(!is_loggedin())
{
	redirect('login');
}

switch($_GET['pilih'])
{
    default :
	
	try
	{
		$stmt = dbConnection_228()->prepare("
		select tgl from tbl_sum_revenue_total_201812 order by tgl desc limit 1 ;
		");
		$stmt->execute();
		$tgl_vlr = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		select tgl from revenue_daily_total_cluster_now where bln like '12' order by tgl desc limit 1 ;
		");
		$stmt->execute();
		$tgl_revenuedaily = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		select sum(rev01)/2 as '1', sum(rev02)/2 as '2', sum(rev03)/2 as '3', 
		sum(rev04)/2 as '4', sum(rev05)/2 as '5',
        sum(rev06)/2 as '6', sum(rev07)/2 as '7', sum(rev08)/2 as '8', 
		sum(rev09)/2 as '9', sum(rev10)/2 as '10',
        sum(rev11)/2 as '11', sum(rev12)/2 as '12', sum(rev13)/2 as '13', 
		sum(rev14)/2 as '14', sum(rev15)/2 as '15',
        sum(rev16)/2 as '16', sum(rev17)/2 as '17', sum(rev18)/2 as '18', 
		sum(rev19)/2 as '19', sum(rev20)/2 as '20',
        sum(rev21)/2 as '21', sum(rev22)/2 as '22', sum(rev23)/2 as '23', 
		sum(rev24)/2 as '24', sum(rev25)/2 as '25',
        sum(rev26)/2 as '26', sum(rev27)/2 as '27', sum(rev28)/2 as '28', 
		sum(rev29)/2 as '29', sum(rev30)/2 as '30', 
        sum(rev31)/2 as '31'
		from tbl_Extended_Pivot_dashboard_now
		where cluster like 'Branch%'  && bln like '12'
		");
		$stmt->execute();
		$now = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = dbConnectiondata()->prepare("
		select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
		sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
		sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
		sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
		sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
		sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
		sum(rev31) as '31'
		from tbl_Extended_Pivot_dashboard_now
		where cluster like 'Branch%'  && bln like '11'
		");
		$stmt->execute();
		$lastmonth = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = dbConnectiondata()->prepare("
		select sum(rev01)/2 as '1', sum(rev02)/2 as '2', sum(rev03)/2 as '3', 
		sum(rev04)/2 as '4', sum(rev05)/2 as '5',
        sum(rev06)/2 as '6', sum(rev07)/2 as '7', sum(rev08)/2 as '8', 
		sum(rev09)/2 as '9', sum(rev10)/2 as '10',
        sum(rev11)/2 as '11', sum(rev12)/2 as '12', sum(rev13)/2 as '13', 
		sum(rev14)/2 as '14', sum(rev15)/2 as '15',
        sum(rev16)/2 as '16', sum(rev17)/2 as '17', sum(rev18)/2 as '18', 
		sum(rev19)/2 as '19', sum(rev20)/2 as '20',
        sum(rev21)/2 as '21', sum(rev22)/2 as '22', sum(rev23)/2 as '23', 
		sum(rev24)/2 as '24', sum(rev25)/2 as '25',
        sum(rev26)/2 as '26', sum(rev27)/2 as '27', sum(rev28)/2 as '28', 
		sum(rev29)/2 as '29', sum(rev30)/2 as '30', 
        sum(rev31)/2 as '31'
		from tbl_Extended_Pivot_dashboard_lastyear
		where cluster like 'Branch%'  && bln like '12'
		");
		$stmt->execute();
		$lastyear = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		//query branch
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_achv_performance
		where level_daerah like 'Branch ACEH' && period like '$period'
		");
		$stmt->execute();
		$branch1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_achv_performance
		where level_daerah like 'Branch CENTRAL MEDAN' && period like '$period'
		");
		$stmt->execute();
		$branch2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_achv_performance
		where level_daerah like 'Branch PADANG SIDEMPUAN' && period like '$period'
		");
		$stmt->execute();
		$branch3 = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_achv_performance
		where level_daerah like 'Branch PEMATANG SIANTAR' && period like '$period'
		");
		$stmt->execute();
		$branch4 = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_achv_performance
		where level_daerah like 'Branch WESTERN MEDAN' && period like '$period'
		");
		$stmt->execute();
		$branch5 = $stmt->fetchAll(PDO::FETCH_ASSOC);

		//query cluster
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_achv_performance
		where level_daerah like 'BANDA ACEH' && period like '$period'
		");
		$stmt->execute();
		$cl_banda = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_achv_performance
		where level_daerah like 'LHOKSEUMAWE' && period like '$period'
		");
		$stmt->execute();
		$cl_lhokseumawe = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_achv_performance
		where level_daerah like 'MEULABOH' && period like '$period'
		");
		$stmt->execute();
		$cl_meulaboh = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_achv_performance
		where level_daerah like 'LANGSA' && period like '$period'
		");
		$stmt->execute();
		$cl_langsa = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_achv_performance
		where level_daerah like 'BINJAI' && period like '$period'
		");
		$stmt->execute();
		$cl_binjai = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_achv_performance
		where level_daerah like 'LUBUK PAKAM' && period like '$period'
		");
		$stmt->execute();
		$cl_pakam = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_achv_performance
		where level_daerah like 'MEDAN INNER' && period like '$period'
		");
		$stmt->execute();
		$cl_inner = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_achv_performance
		where level_daerah like 'MEDAN OUTER' && period like '$period'
		");
		$stmt->execute();
		$cl_outer = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_achv_performance
		where level_daerah like 'KABAN JAHE' && period like '$period'
		");
		$stmt->execute();
		$cl_kabanjahe = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_achv_performance
		where level_daerah like 'KISARAN' && period like '$period'
		");
		$stmt->execute();
		$cl_kisaran = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_achv_performance
		where level_daerah like 'PEMATANG SIANTAR' && period like '$period'
		");
		$stmt->execute();
		$cl_siantar = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_achv_performance
		where level_daerah like 'PADANG SIDEMPUAN' && period like '$period'
		");
		$stmt->execute();
		$cl_sidempuan = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_achv_performance
		where level_daerah like 'RANTAU PRAPAT' && period like '$period'
		");
		$stmt->execute();
		$cl_prapat = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_achv_performance
		where level_daerah like 'SIBOLGA' && period like '$period'
		");
		$stmt->execute();
		$cl_sibolga = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		//query sumbagut
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_achv_performance
		where level_daerah like 'SUMBAGUT' && period like '$period'
		");
		$stmt->execute();
		$sumbagut = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		//query revenue l1
		$stmt = dbConnectiondata()->prepare("
		select l1, 
		 rev01  as '1',  rev02  as '2',  rev03  as '3',  rev04  as '4',  rev05  as '5',
		 rev06  as '6',  rev07  as '7',  rev08  as '8',  rev09  as '9',  rev10  as '10',
		 rev11  as '11',  rev12  as '12',  rev13  as '13',  rev14  as '14',  rev15  as '15',
		 rev16  as '16',  rev17  as '17',  rev18  as '18',  rev19  as '19',  rev20  as '20',
		 rev21  as '21',  rev22  as '22',  rev23  as '23',  rev24  as '24',  rev25  as '25',
		 rev26  as '26',  rev27  as '27',  rev28  as '28',  rev29  as '29',  rev30  as '30',
		 rev31  as '31'
		from tbl_Extended_Pivot_Pretty_revenue_daily_l1
		group by l1
		order by l1 desc
		");
		$stmt->execute();
		$l1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		//query revenue l1 voice
		$stmt = dbConnectiondata()->prepare("
		select l1, 
		 sum(rev01)/2  as '1',  sum(rev02)/2  as '2',  sum(rev03)/2  as '3',  sum(rev04)/2  as '4',  sum(rev05)/2  as '5',
		 sum(rev06)/2  as '6',  sum(rev07)/2  as '7',  sum(rev08)/2  as '8',  sum(rev09)/2  as '9',  sum(rev10)/2  as '10',
		 sum(rev11)/2  as '11',  sum(rev12)/2  as '12',  sum(rev13)/2  as '13',  sum(rev14)/2  as '14',  sum(rev15)/2  as '15',
		 sum(rev16)/2  as '16',  sum(rev17)/2  as '17',  sum(rev18)/2  as '18',  sum(rev19)/2  as '19',  sum(rev20)/2  as '20',
		 sum(rev21)/2  as '21',  sum(rev22)/2  as '22',  sum(rev23)/2  as '23',  sum(rev24)/2  as '24',  sum(rev25)/2  as '25',
		 sum(rev26)/2  as '26',  sum(rev27)/2  as '27',  sum(rev28)/2  as '28',  sum(rev29)/2  as '29',  sum(rev30)/2  as '30',
		 sum(rev31)/2  as '31'
		from tbl_Extended_Pivot_Pretty_revenue_daily_l1
		where l1 like 'Voice P2P' && level like 'Branch%'
		group by l1
		order by l1 desc
		");
		$stmt->execute();
		$voice = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		//query revenue l1 sms
		$stmt = dbConnectiondata()->prepare("
		select l1, 
		 sum(rev01)/2  as '1',  sum(rev02)/2  as '2',  sum(rev03)/2  as '3',  sum(rev04)/2  as '4',  sum(rev05)/2  as '5',
		 sum(rev06)/2  as '6',  sum(rev07)/2  as '7',  sum(rev08)/2  as '8',  sum(rev09)/2  as '9',  sum(rev10)/2  as '10',
		 sum(rev11)/2  as '11', sum(rev12)/2  as '12',  sum(rev13)/2  as '13',  sum(rev14)/2  as '14',  sum(rev15)/2  as '15',
		 sum(rev16)/2  as '16',  sum(rev17)/2  as '17',  sum(rev18)/2  as '18',  sum(rev19)/2  as '19',  sum(rev20)/2  as '20',
		 sum(rev21)/2  as '21',  sum(rev22)/2  as '22',  sum(rev23)/2  as '23',  sum(rev24)/2  as '24',  sum(rev25)/2  as '25',
		 sum(rev26)/2  as '26',  sum(rev27)/2  as '27',  sum(rev28)/2  as '28',  sum(rev29)/2  as '29',  sum(rev30)/2  as '30',
		 sum(rev31)/2  as '31'
		from tbl_Extended_Pivot_Pretty_revenue_daily_l1
		where l1 like 'SMS P2P' && level like 'Branch%'
		group by l1
		order by l1 desc
		");
		$stmt->execute();
		$sms = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		//query revenue l1 broadband
		$stmt = dbConnectiondata()->prepare("
		select l1, 
		 sum(rev01)/2  as '1',  sum(rev02)/2  as '2',  sum(rev03)/2  as '3',  sum(rev04)/2  as '4',  sum(rev05)/2  as '5',
		 sum(rev06)/2  as '6',  sum(rev07)/2  as '7',  sum(rev08)/2  as '8',  sum(rev09)/2  as '9',  sum(rev10)/2  as '10',
		 sum(rev11)/2  as '11',  sum(rev12)/2  as '12',  sum(rev13)/2  as '13',  sum(rev14)/2  as '14',  sum(rev15)/2  as '15',
		 sum(rev16)/2  as '16',  sum(rev17)/2  as '17',  sum(rev18)/2  as '18',  sum(rev19)/2  as '19',  sum(rev20)/2  as '20',
		 sum(rev21)/2  as '21',  sum(rev22)/2  as '22',  sum(rev23)/2  as '23',  sum(rev24)/2  as '24',  sum(rev25)/2  as '25',
		 sum(rev26)/2  as '26',  sum(rev27)/2  as '27',  sum(rev28)/2  as '28',  sum(rev29)/2  as '29',  sum(rev30)/2  as '30',
		 sum(rev31)/2  as '31'
		from tbl_Extended_Pivot_Pretty_revenue_daily_l1
		where l1 like 'Broadband' && level like 'Branch%'
		group by l1
		order by l1 desc
		");
		$stmt->execute();
		$broadband = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		//query revenue l1 digital services
		$stmt = dbConnectiondata()->prepare("
		select l1, 
		 sum(rev01)/2  as '1',  sum(rev02)/2  as '2',  sum(rev03)/2  as '3',  sum(rev04)/2  as '4',  sum(rev05)/2  as '5',
		 sum(rev06)/2  as '6',  sum(rev07)/2  as '7',  sum(rev08)/2  as '8',  sum(rev09)/2  as '9',  sum(rev10)/2  as '10',
		 sum(rev11)/2  as '11',  sum(rev12)/2  as '12',  sum(rev13)/2  as '13',  sum(rev14)/2  as '14',  sum(rev15)/2  as '15',
		 sum(rev16)/2  as '16',  sum(rev17)/2  as '17',  sum(rev18)/2  as '18',  sum(rev19)/2  as '19',  sum(rev20)/2  as '20',
		 sum(rev21)/2  as '21',  sum(rev22)/2  as '22',  sum(rev23)/2  as '23',  sum(rev24)/2  as '24',  sum(rev25)/2  as '25',
		 sum(rev26)/2  as '26',  sum(rev27)/2  as '27',  sum(rev28)/2  as '28',  sum(rev29)/2  as '29',  sum(rev30)/2  as '30',
		 sum(rev31)/2  as '31'
		from tbl_Extended_Pivot_Pretty_revenue_daily_l1
		where l1 like 'Digital Services' && level like 'Branch%'
		group by l1
		order by l1 desc
		");
		$stmt->execute();
		$digital_services = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		select *
		from tbl_Extended_Pivot_Pretty_revenue_daily_l1
		group by l1
		");
		$stmt->execute();
		$l1_notsum = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}

	$all_branch = getAllBranch();
    $branch = json_decode($all_branch, true);

    function fn_vlr_email()
    {
      $const   = mysql_connect("10.33.14.222","egi","egi12345");
      $db      = mysql_select_db("mcd");
      
      
      $tg10    = "select date_format(date_sub(now(),interval 1 day),'%d-%m-%Y') as tgl";
      $rtg10   = mysql_query($tg10);
      $rwtg10  = mysql_fetch_object($rtg10);
      $tgl     = $rwtg10->tgl;
      
      $tg11    = "select date_format(date_sub(now(),interval 1 day),'%W') as hari";
      $rtg11   = mysql_query($tg11);
      $rwtg11  = mysql_fetch_object($rtg11);
      $day     = $rwtg11->hari;
      
      $tg12    = "select date_format(date_sub(now(),interval 1 day),'%Y-%m-%d') as tgl";
      $rtg12   = mysql_query($tg12);
      $rwtg12  = mysql_fetch_object($rtg12);
      $tgls    = $rwtg12->tgl;
      $font     = "style=\font-size:11px;";
	}
	?>
<head></head>
<body >
<main >
    <?php
    if(isset($success))
    {
    ?>
    <section class="content-header">
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?= $success; ?>
        </div>
    </section>
    <?php
    }
    elseif(isset($error))
    {
    ?>
    <section class="content-header">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?= $error; ?>
        </div>
    </section>
    <?php
    }
    ?>
	<section class="pb-4">
		<div class="card">
			<h3 class="card-header black white-text" style="font-size:16px"><b>VLR SUMBAGUT</b></h3>
			<div class="card-body">
					<!--<font> 
						<b><center>Berikut adalah performance update s/d 31 Juni 2018</center></b>
					</font>//echo $newdate;-->
					<font> 
						<b><center>Berikut adalah performance update s/d 
						<?Php  foreach ($tgl_vlr as $data) {print $data['tgl']. "\n";} ?> Desember 2018</center></b>
					</font>
					<div class="card-body" align="center">
				    <div class="table-responsive fixed-table-body">
						<table class="collaptable table table-sm table-striped table-hover mb-0">
	                    <thead>
	                        <tr style="border:1px solid white">
	                            <th rowspan="2" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#027367;text-align:center;vertical-align:top"><b>BRANCH<br>----<br>CLUSTER</b></th>
								<th colspan="4" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#b30000;text-align:center;vertical-align:top"><b>Ach To Target PTD<b></th>
	                            <th colspan="4" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#b30000;text-align:center;vertical-align:top"><b>Ach To Target YTD<b></th>
								<th colspan="3" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#b30000;text-align:center;vertical-align:top"><b>Revenue All<b></th>
	                            <th colspan="3" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#b30000;text-align:center;vertical-align:top"><b>Voice<b></th>
	                            <th colspan="3" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#b30000;text-align:center;vertical-align:top"><b>SMS<b></th>
	                            <th colspan="3" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#b30000;text-align:center;vertical-align:top"><b>Broadband<b></th>
	                            <th colspan="3" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#b30000;text-align:center;vertical-align:top"><b>Digital Service<b></th>
	                            
	                        </tr>
	                        <tr style="border:1px solid black">
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>Actual</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>Target</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>GAP</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>Ach(%)</b></td>
								
								<td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>Actual</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>Target</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>GAP</b></td>
								<td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>Ach(%)</b></td>
								
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>MoM</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>YoY</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>YTD</b></td>
	                            
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>MoM</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>YoY</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>YTD</b></td>
	                            
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>MoM</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>YoY</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>YTD</b></td>

	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>MoM</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>YoY</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>YTD</b></td>

	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>MoM</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>YoY</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>YTD</b></td>
	                        </tr>
	                    </thead>
	                    <tbody>
						<?php
						$i=0;
						foreach ($branch1 as $data)
						{
						?>
                        <tr data-id="1" data-parent="" style="background-color: #f0f5f5">
                            <td style="font-size:11px"><b><?= $data['level_daerah'] ?></b></td>
							<td style="font-size:11px"><b><?= number_format($data['act_all'],2) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ptd'],2) ?></td>
							<?php
							if($data['gap'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_all'],2) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['act_ytd'],2) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ytd'],2) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap_ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap_ytd'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_ytd'],2) ?></td>
							<?php
							if($data['mom_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_all'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_all'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_all'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],2).'</td>';
							}
							?>
                        </tr>
				<?php
					$i++;
				}
				?>
				<?php
				$i=0;
				foreach ($cl_banda as $data)
				{
				?>
                        <tr data-id="6" data-parent="1">
                            <td style="font-size:11px"><?= $data['level_daerah'] ?></td>
							<td style="font-size:11px"><?= number_format($data['act_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],2) ?></td>
							<?php
							if($data['gap'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['act_ytd'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],2) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],2) ?></td>
							<?php
							if($data['mom_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_all'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_all'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_all'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],2).'</td>';
							}
							?>

                        </tr>
				<?php
					$i++;
				}
				?>
				<?php
				$i=0;
				foreach ($cl_lhokseumawe as $data)
				{
				?>
                        <tr data-id="7" data-parent="1" style="background-color: #ffffff">
                            <td style="font-size:11px"><?= $data['level_daerah'] ?></td>
							<td style="font-size:11px"><?= number_format($data['act_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],2) ?></td>
							<?php
							if($data['gap'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['act_ytd'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],2) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],2) ?></td>
							<?php
							if($data['mom_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_all'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_all'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_all'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],2).'</td>';
							}
							?>

                        </tr>
				<?php
					$i++;
				}
				?>                        
				<?php
				$i=0;
				foreach ($cl_meulaboh as $data)
				{
				?>
                        <tr data-id="8" data-parent="1">
                            <td style="font-size:11px"><?= $data['level_daerah'] ?></td>
							<td style="font-size:11px"><?= number_format($data['act_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],2) ?></td>
							<?php
							if($data['gap'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['act_ytd'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],2) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],2) ?></td>
							<?php
							if($data['mom_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_all'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_all'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_all'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],2).'</td>';
							}
							?>

                        </tr>
				<?php
					$i++;
				}
				?>
				<?php
				$i=0;
				foreach ($branch5 as $data)
				{
				?>
                        <tr data-id="2" data-parent="" style="background-color: #f0f5f5">
							<td style="font-size:11px"><b><?= $data['level_daerah'] ?></b></td>
							<td style="font-size:11px"><b><?= number_format($data['act_all'],2) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ptd'],2) ?></td>
							<?php
							if($data['gap'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_all'],2) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['act_ytd'],2) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ytd'],2) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap_ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap_ytd'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_ytd'],2) ?></td>
							<?php
							if($data['mom_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_all'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_all'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_all'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],2).'</td>';
							}
							?>

                        </tr>
				<?php
					$i++;
				}
				?>                            
				<?php
				$i=0;
				foreach ($cl_langsa as $data)
				{
				?>
                        <tr data-id="9" data-parent="2">
                            <td style="font-size:11px"><?= $data['level_daerah'] ?></td>
							<td style="font-size:11px"><?= number_format($data['act_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],2) ?></td>
							<?php
							if($data['gap'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['act_ytd'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],2) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],2) ?></td>
							<?php
							if($data['mom_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_all'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_all'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_all'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],2).'</td>';
							}
							?>

                        </tr>
				<?php
					$i++;
				}
				?>						
				<?php
				$i=0;
				foreach ($cl_binjai as $data)
				{
				?>
                        <tr data-id="10" data-parent="2" style="background-color: #ffffff">
                            <td style="font-size:11px"><?= $data['level_daerah'] ?></td>
							<td style="font-size:11px"><?= number_format($data['act_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],2) ?></td>
							<?php
							if($data['gap'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['act_ytd'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],2) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],2) ?></td>
							<?php
							if($data['mom_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_all'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_all'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_all'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],2).'</td>';
							}
							?>

                        </tr>
				<?php
					$i++;
				}
				?>

				<?php
				$i=0;
				foreach ($branch2 as $data)
				{
				?>
                        <tr data-id="3" data-parent="" style="background-color: #f0f5f5">
                            <td style="font-size:11px"><b><?= $data['level_daerah'] ?></b></td>
							<td style="font-size:11px"><b><?= number_format($data['act_all'],2) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ptd'],2) ?></td>
							<?php
							if($data['gap'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_all'],2) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['act_ytd'],2) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ytd'],2) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap_ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap_ytd'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_ytd'],2) ?></td>
							<?php
							if($data['mom_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_all'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_all'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_all'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],2).'</td>';
							}
							?>

                        </tr>
				<?php
					$i++;
				}
				?>
<?php
				$i=0;
				foreach ($cl_pakam as $data)
				{
				?>
                        <tr data-id="11" data-parent="3" style="background-color: #ffffff">
                            <td style="font-size:11px"><?= $data['level_daerah'] ?></td>
							<td style="font-size:11px"><?= number_format($data['act_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],2) ?></td>
							<?php
							if($data['gap'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['act_ytd'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],2) ?></td>
<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],2) ?></td>
							<?php
							if($data['mom_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_all'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_all'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_all'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],2).'</td>';
							}
							?>

                        </tr>
				<?php
					$i++;
				}
				?>
				<?php
				$i=0;
				foreach ($cl_inner as $data)
				{
				?>
                        <tr data-id="12" data-parent="3">
                            <td style="font-size:11px"><?= $data['level_daerah'] ?></td>
							<td style="font-size:11px"><?= number_format($data['act_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],2) ?></td>
							<?php
							if($data['gap'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['act_ytd'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],2) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],2) ?></td>
							<?php
							if($data['mom_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_all'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_all'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_all'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],2).'</td>';
							}
							?>

                        </tr>
				<?php
					$i++;
				}
				?>
				<?php
				$i=0;
				foreach ($cl_outer as $data)
				{
				?>
                        <tr data-id="13" data-parent="3" style="background-color: #ffffff">
                            <td style="font-size:11px"><?= $data['level_daerah'] ?></td>
							<td style="font-size:11px"><?= number_format($data['act_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],2) ?></td>
							<?php
							if($data['gap'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['act_ytd'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],2) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],2) ?></td>
							<?php
							if($data['mom_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_all'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_all'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_all'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],2).'</td>';
							}
							?>

                        </tr>
				<?php
					$i++;
				}
				?>
						<?php
				$i=0;
				foreach ($branch4 as $data)
				{
				?>
                        <tr data-id="4" data-parent="" style="background-color: #f0f5f5">
                            <td style="font-size:11px"><b><?= $data['level_daerah'] ?></b></td>
							<td style="font-size:11px"><b><?= number_format($data['act_all'],2) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ptd'],2) ?></td>
							<?php
							if($data['gap'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_all'],2) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['act_ytd'],2) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ytd'],2) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap_ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap_ytd'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_ytd'],2) ?></td>
							<?php
							if($data['mom_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_all'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_all'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_all'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],2).'</td>';
							}
							?>

                        </tr>
				<?php
					$i++;
				}
				?>
				<?php
				$i=0;
				foreach ($cl_kisaran as $data)
				{
				?>
                        <tr data-id="16" data-parent="4" style="background-color: #ffffff">
                            <td style="font-size:11px"><?= $data['level_daerah'] ?></td>
							<td style="font-size:11px"><?= number_format($data['act_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],2) ?></td>
							<?php
							if($data['gap'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['act_ytd'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],2) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],2) ?></td>
							<?php
							if($data['mom_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_all'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_all'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_all'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],2).'</td>';
							}
							?>

                        </tr>
				<?php
					$i++;
				}
				?>
				<?php
				$i=0;
				foreach ($cl_kabanjahe as $data)
				{
				?>
                        <tr data-id="16" data-parent="4">
                            <td style="font-size:11px"><?= $data['level_daerah'] ?></td>
							<td style="font-size:11px"><?= number_format($data['act_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],2) ?></td>
							<?php
							if($data['gap'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['act_ytd'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],2) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],2) ?></td>
							<?php
							if($data['mom_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_all'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_all'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_all'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],2).'</td>';
							}
							?>

                        </tr>
				<?php
					$i++;
				}
				?>
				<?php
				$i=0;
				foreach ($cl_siantar as $data)
				{
				?>
                        <tr data-id="17" data-parent="4" style="background-color: #ffffff">
                            <td style="font-size:11px"><?= $data['level_daerah'] ?></td>
							<td style="font-size:11px"><?= number_format($data['act_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],2) ?></td>
							<?php
							if($data['gap'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['act_ytd'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],2) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],2).'</td>';
							}
							?>
							
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],2) ?></td>
							<?php
							if($data['mom_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_all'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_all'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_all'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],2).'</td>';
							}
							?>

                        </tr>
				<?php
					$i++;
				}
				?>
				<?php
				$i=0;
				foreach ($branch3 as $data)
				{
				?>
                        <tr data-id="5" data-parent="" style="background-color: #f0f5f5">
                            <td style="font-size:11px"><b><?= $data['level_daerah'] ?></b></td>
							<td style="font-size:11px"><b><?= number_format($data['act_all'],2) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ptd'],2) ?></td>
							<?php
							if($data['gap'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_all'],2) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['act_ytd'],2) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ytd'],2) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap_ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap_ytd'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_ytd'],2) ?></td>
							<?php
							if($data['mom_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_all'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_all'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_all'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],2).'</td>';
							}
							?>
                        </tr>
				<?php
					$i++;
				}
				?>
<?php
				$i=0;
				foreach ($cl_sidempuan as $data)
				{
				?>
                        <tr data-id="18" data-parent="5" style="background-color: #ffffff">
                            <td style="font-size:11px"><?= $data['level_daerah'] ?></td>
							<td style="font-size:11px"><?= number_format($data['act_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],2) ?></td>
							<?php
							if($data['gap'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['act_ytd'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],2) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],2) ?></td>
							<?php
							if($data['mom_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_all'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_all'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_all'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],2).'</td>';
							}
							?>

                        </tr>
				<?php
					$i++;
				}
				?>                        
				<?php
				$i=0;
				foreach ($cl_prapat as $data)
				{
				?>
                        <tr data-id="19" data-parent="5">
                            <td style="font-size:11px"><?= $data['level_daerah'] ?></td>
							<td style="font-size:11px"><?= number_format($data['act_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],2) ?></td>
							<?php
							if($data['gap'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['act_ytd'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],2) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],2) ?></td>
							<?php
							if($data['mom_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_all'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_all'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_all'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],2).'</td>';
							}
							?>

                        </tr>
				<?php
					$i++;
				}
				?>        

				<?php
				$i=0;
				foreach ($cl_sibolga as $data)
				{
				?>
                        <tr data-id="19" data-parent="5">
                            <td style="font-size:11px"><?= $data['level_daerah'] ?></td>
							<td style="font-size:11px"><?= number_format($data['act_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],2) ?></td>
							<?php
							if($data['gap'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_all'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['act_ytd'],2) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],2) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],2) ?></td>
							<?php
							if($data['mom_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_all'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_all'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_all'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],2).'</td>';
							}
							?>

                        </tr>
				<?php
					$i++;
				}
				?>
				<?php
				$i=0;
				foreach ($sumbagut as $data)
				{
					
				?>
				
                        <tr style="border:1px solid black; background-color:#F2F4BB">
                            <td style="font-size:13px"><b><?= $data['level_daerah'] ?></td>
							<td style="font-size:11px"><b><?= number_format($data['act_all'],2) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ptd'],2) ?></td>
							<?php
							if($data['gap'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_all'],2) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['act_ytd'],2) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ytd'],2) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap_ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap_ytd'],2).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_ytd'],2) ?></td>
							<?php
							if($data['mom_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_all'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_all'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_all'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_bb'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_bb'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_bb'],2).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],2).'</td>';
							}
							?>
                        </tr>
				<?php
					$i++;
				}
				?>
				
                    </tbody>
                </table>
				
				Untuk Detail Performance per Cluster silahkan download di link berikut	
				<a href="http://10.33.97.177/tiramisu/autoemail_mcd/vlr_export.php">
				Download
				</a>
					</div>
				</div>
			</div>
		</div>
		</section>

		<section class="pb-4" >
		<div class="card" >
			<div class="card-body">
				<div class="row" align="center">
            		<div class="col-lg-4 col-md-12">
                		<select id="branch_script" name="branch_script" class="mdb-select" required>
                            <option value="" disabled selected>Pilih Branch</option>
                            <option value="">SUMBAGUT</option>
                            <?php 
                            foreach($branch as $row) { ?>
                            <option value="<?= $row['id_branch']; ?>"><?= $row['nama_branch']; ?></option>
                            <?php } ?>
                        </select>
                	</div>
                	<div class="col-lg-4 col-md-12">
                        <select id="cluster_script" name="cluster_script" class="mdb-select" required disabled>
                            <option value="" disabled selected>Pilih Cluster</option>
                        </select>
                	</div>
					<div class="col-lg-4 col-md-12">
                        <select id="bulan_script" name="bulan_script" class="mdb-select" required disabled>
                            <option value="" disabled selected>Pilih Bulan</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">OKTOBER</option>
                            <option value="10">Oktober</option>
                            <option value="11">Desember</option>
                            <option value="12">Desember</option>
                        </select>
                	</div>
            	</div>

				<div class="row" align="center">
					<div class="col-lg-4 col-md-12">
                        <select id="l1_script" name="l1_script" class="mdb-select" required disabled>
                            <option value="" disabled selected>Pilih L1</option>
                            <option value="l1_all">All</option>
                            <option value="l1_broadband">Broadband</option>
                            <option value="l1_digital">Digital Services</option>
                            <option value="l1_ir">International Roaming</option>
                            <option value="l1_other">Other</option>
                            <option value="l1_sms">SMS</option>
                            <option value="l1_voice">Voice</option>
                        </select>
                	</div>
					
					<div class="col-lg-4 col-md-12">
                        <select id="l2_script" name="l2_script" class="mdb-select" required disabled>
                            <option value="" disabled selected>Pilih L2</option>
                            <option value="l2_all">All</option>
                            <option value="l2_apn">APN/PAYU</option>
                            <option value="l2_bb">Blackberry</option>
                            <option value="l2_tf">Telkomsel Flash</option>
                            <option value="l2_voucher">Voucher</option>
                            <option value="l2_wifi">WIFI</option>
                            <option value="l2_de">Digital Enterprise</option>
							<option value="l2_music">M Music</option>
                            <option value="l2_mmsc">MMS Content</option>
                            <option value="l2_mms_p2p">MMS P2P</option>
                            <option value="l2_other_vas">Other VAS Service</option>
                            <option value="l2_rbt">Ring Back Tone</option>
                            <option value="l2_sms_non_p2p">SMS Non P2P</option>
							<option value="l2_tp">Transfer Pulsa</option>
                            <option value="l2_ussd">USSD</option>
                            <option value="l2_vc">Video Call</option>
                            <option value="l2_voice_non_p2p">Voice Non P2P</option>
                            <option value="l2_broadband">Broadband</option>
                            <option value="l2_sms">SMS</option>
							<option value="l2_voice">Voice</option>
                            <option value="l2_others">Others</option>
                            <option value="l2_sms_package">SMS Package</option>
                            <option value="l2_sms_regular">SMS Regular</option>
                            <option value="l2_external_call_olo">External Call OLO</option>
                            <option value="l2_external_call_pstn">External Call PSTN</option>
                            <option value="l2_internal_mo_call">Internal MO Call</option>
                            <option value="l2_international_call">International Call</option>
                            <option value="l2_voice_package">Voice Package</option>

                        </select>
                	</div>

					<div class="col-lg-4 col-md-12">
                        <select id="l3_script" name="l3_script" class="mdb-select" required disabled>
                            <option value="" disabled selected>Pilih L3</option>
                            <option value="l3_all">All</option>
                            <option value="">APN Internet</option>
                            <option value="">BBM Only</option>
                            <option value="">Business</option>
                            <option value="">Extreme</option>
                            <option value="">Lifestyle</option>
                            <option value="">Socialita</option>
							<option value="">Unlimited</option>
                            <option value="">Microcampaign</option>
                            <option value="">Mobile Browser</option>
                            <option value="">Social Network</option>
                            <option value="">Time based</option>
                            <option value="">Unlimited</option>
							<option value="">Volume based</option>
                            <option value="">Mkiosk</option>
                            <option value="">WIFI</option>
                            <option value="">Digital Enterprise</option>
                            <option value="">Full Track Download</option>
                            <option value="">LangitMusik Unlimited</option>
							<option value="">Music Package</option>
                            <option value="">MMS Content</option>
                            <option value="">MMS to Email</option>
                            <option value="">Mobile Newspaper</option>
                            <option value="">Domestik MMS MO Eksternal</option>
                            <option value="">Domestik MMS MO Internal</option>
                            <option value="">International MMS MO</option>
                            <option value="">OTT Services</option>
                            <option value="">VAS Content</option>
                            <option value="">Content RBT</option>
                            <option value="">Emoticon SMS</option>
                            <option value="">Other SMS Non P2P</option>
                            <option value="">SMS Banking</option>
                            <option value="">SMS Content</option>
                            <option value="">SMS Donasi</option>
							<option value="">SMS Gift</option>
                            <option value="">SMS Group</option>
                            <option value="">SMS Music</option>
                            <option value="">SMS Newspaper</option>
                            <option value="">SMS Pro</option>
                            <option value="">SMS Profiling</option>
							<option value="">SMS RBT</option>
                            <option value="">SMS T-Cash</option>
                            <option value="">AS</option>
                            <option value="">Simpati</option>
                            <option value="">USSD Charging</option>
                            <option value="">3G Mobile TV</option>
							<option value="">Content Video Call</option>
                            <option value="">P2P Video Call</option>
                            <option value="">IVR Banking</option>
                            <option value="">IVR Content MDS</option>
                            <option value="">IVR Internal</option>
                            <option value="">IVR RBT</option>
                            <option value="">Data Roaming Non Package</option>
                            <option value="">Data Roaming Package</option>
                            <option value="">SMS MO Int Roaming</option>
                            <option value="">Camel</option>
                            <option value="">International Roaming Package</option>
                            <option value="">UCB</option>
							<option value="">Voice MT Roaming</option>
                            <option value="">Others</option>
                            <option value="">Microcampaign</option>
                            <option value="">SMS Mania</option>
                            <option value="">SMS Package</option>
                            <option value="">Domestik SMS MO Eksternal</option>
                            <option value="">Domestik SMS MO Internal</option>
                            <option value="">International SMS MO</option>
                            <option value="">Local</option>
							<option value="">Non Local</option>
                            <option value="">Premium</option>
                            <option value="">Local (On-Net)</option>
							<option value="">Non Local</option>
                            <option value="">Byru</option>
                            <option value="">Gaharu & Atlasat</option>
							<option value="">Indosat</option>
                            <option value="">LDDS</option>
                            <option value="">Others</option>
							<option value="">Telkom-007</option>
                            <option value="">Telkom-01017</option>
                            <option value="">VoIP 01052</option>
							<option value="">Jagoan Serbu</option>
                            <option value="">Microcampaign</option>
                            <option value="">Ngomong Sering</option>
							<option value="">Other voice package</option>
                            <option value="">Paket PSTN</option>
                            <option value="">Talk Mania</option>
						</select>
                	</div>

                	
            	</div>
				<div id="script" style="margin: 0 auto"></div>

				<div class="table-responsive fixed-table-body">
					<table class="collaptable table table-sm table-striped table-hover mb-0">
						<thead>
							<tr id="tanggal" style="border:1px solid black" style="background-color:#027367;">
								<th rowspan="2" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3.5px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#027367;text-align:center;vertical-align:center"><b>DATE</b></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							foreach ($lastyear as $data)
							{
							?>
                            <tr id="last_year" data-id="1" data-parent=""> 
                                <td>Lastyear</td>
								<td style="font-size:11px"><?= number_format($data['1'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['2'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['3'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['4'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['5'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['6'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['7'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['8'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['9'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['10'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['11'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['12'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['13'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['14'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['15'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['16'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['17'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['18'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['19'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['20'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['21'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['22'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['23'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['24'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['25'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['26'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['27'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['28'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['29'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['30'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['31'],1) ?></td>
                            </tr>
							<?php
								$i++;
							}
							?>
							<?php
							$i=0;
							foreach ($lastmonth as $data)
							{
							?>
                            <tr id="last_month" data-id="1" data-parent=""> 
                                <td>Lastmonth</td>
								<td style="font-size:11px"><?= number_format($data['1'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['2'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['3'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['4'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['5'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['6'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['7'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['8'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['9'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['10'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['11'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['12'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['13'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['14'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['15'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['16'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['17'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['18'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['19'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['20'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['21'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['22'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['23'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['24'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['25'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['26'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['27'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['28'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['29'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['30'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['31'],1) ?></td>
                            </tr>
							<?php
								$i++;
							}
							?>
							<?php
							$i=0;
							foreach ($now as $data)
							{
							?>
                            <tr id="now" data-id="1" data-parent=""> 
                                <td>Now</td>
								<td style="font-size:11px"><?= number_format($data['1'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['2'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['3'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['4'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['5'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['6'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['7'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['8'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['9'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['10'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['11'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['12'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['13'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['14'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['15'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['16'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['17'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['18'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['19'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['20'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['21'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['22'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['23'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['24'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['25'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['26'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['27'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['28'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['29'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['30'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['31'],1) ?></td>
                            </tr>
							<?php
								$i++;
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>


	<section class="pb-4">
		<div class="card">
			<div class="card-body">
				<div class="row" align="center">
            		<div class="col-lg-6 col-md-12">
                		<select id="branch_scriptx" name="branch_scriptx" class="mdb-select" required>
                            <option value="" disabled selected>Pilih Branch</option>
                            <option value="">SUMBAGUT</option>
                            <?php 
                            foreach($branch as $row) { ?>
                            <option value="<?= $row['id_branch']; ?>"><?= $row['nama_branch']; ?></option>
                            <?php } ?>
                        </select>
                	</div>
                	<div class="col-lg-6 col-md-12">
                        <select id="cluster_scriptx" name="cluster_scriptx" class="mdb-select" required disabled>
                            <option value="" disabled selected>Pilih Cluster</option>
                        </select>
                	</div>
                	<!--<div class="col-lg-4 col-md-12">
                        <select id="bulan_scriptx" name="bulan_scriptx" class="mdb-select" required disabled>
                            <option value="" disabled selected>Pilih Bulan</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">OKTOBER</option>
                            <option value="10">Oktober</option>
                            <option value="11">Desember</option>
                            <option value="12">Desember</option>
                        </select>
                	</div>-->
            	</div>

				<div id="scriptx" style="margin: 0 auto"></div>

				<div class="table-responsive fixed-table-body">
					<table class="collaptable table table-sm table-striped table-hover mb-0">
						<thead>
							<tr id="tanggal_scriptx" style="border:1px solid black">
								<th rowspan="2" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3.5px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#027367;text-align:center;vertical-align:center"><b>DATE</b></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$font = "style=\"font-size:11px;\"";
							foreach ($voice as $data)
							{
							?>
							<tr id="voice">
								<td style="font-size:13px"><?= $data['l1'] ?></td>
								<td style="font-size:11px"><?= number_format($data['1'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['2'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['3'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['4'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['5'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['6'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['7'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['8'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['9'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['10'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['11'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['12'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['13'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['14'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['15'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['16'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['17'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['18'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['19'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['20'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['21'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['22'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['23'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['24'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['25'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['26'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['27'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['28'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['29'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['30'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['31'],1) ?></td>
							</tr>
							<?php
								$i++;
							}
							?>
							<?php
							$i=0;
							$font = "style=\"font-size:11px;\"";
							foreach ($sms as $data)
							{
							?>
							<tr id="sms">
								<td style="font-size:13px"><?= $data['l1'] ?></td>
								<td style="font-size:11px"><?= number_format($data['1'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['2'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['3'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['4'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['5'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['6'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['7'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['8'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['9'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['10'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['11'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['12'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['13'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['14'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['15'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['16'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['17'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['18'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['19'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['20'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['21'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['22'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['23'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['24'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['25'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['26'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['27'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['28'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['29'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['30'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['31'],1) ?></td>
							</tr>
							<?php
								$i++;
							}
							?>
							<?php
							$i=0;
							$font = "style=\"font-size:11px;\"";
							foreach ($broadband as $data)
							{
							?>
							<tr id="broadband">
								<td style="font-size:13px"><?= $data['l1'] ?></td>
								<td style="font-size:11px"><?= number_format($data['1'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['2'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['3'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['4'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['5'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['6'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['7'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['8'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['9'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['10'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['11'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['12'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['13'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['14'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['15'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['16'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['17'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['18'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['19'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['20'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['21'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['22'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['23'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['24'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['25'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['26'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['27'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['28'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['29'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['30'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['31'],1) ?></td>
							</tr>
							<?php
								$i++;
							}
							?>
							<?php
							$i=0;
							$font = "style=\"font-size:11px;\"";
							foreach ($digital_services as $data)
							{
							?>
							<tr id="digital_services">
								<td style="font-size:13px"><?= $data['l1'] ?></td>
								<td style="font-size:11px"><?= number_format($data['1'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['2'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['3'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['4'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['5'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['6'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['7'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['8'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['9'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['10'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['11'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['12'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['13'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['14'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['15'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['16'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['17'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['18'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['19'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['20'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['21'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['22'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['23'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['24'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['25'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['26'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['27'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['28'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['29'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['30'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['31'],1) ?></td>
							</tr>
							<?php
								$i++;
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
</main>
</body>
<?php
        break;
}
?>