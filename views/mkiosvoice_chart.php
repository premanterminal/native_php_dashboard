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
		select x.Branch, x.Cluster, y.RS, x.d5, x.d10, x.d20, x.d25, x.d50, x.d100, y.TotDenom  
		from tbl_Extended_Pivot_mkios_data x
		right join
		(
		  select Branch, CLuster, count(distinct Anum) as RS, sum(Denom) as TotDenom
		  from rm_mkios_data_201812_lacci
		  where Channel in ('075')
		  group by Branch,Cluster 
		) y
		on x.Cluster = y.Cluster
		group by Cluster
		order by Branch desc
        ");
		$stmt->execute();
		$mkiosvoice = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'
			from tbl_Extended_Pivot_mkiosvoice_d5
        ");
		$stmt->execute();
		$denom5k = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
			select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'
			from tbl_Extended_Pivot_mkiosvoice_d10
        ");
		$stmt->execute();
		$denom10k = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
			select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'
			from tbl_Extended_Pivot_mkiosvoice_d20
        ");
		$stmt->execute();
		$denom20k = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
			select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'
			from tbl_Extended_Pivot_mkiosvoice_d25
        ");
		$stmt->execute();
		$denom25k = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
			select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'
			from tbl_Extended_Pivot_mkiosvoice_d50
        ");
		$stmt->execute();
		$denom50k = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
			select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'
			from tbl_Extended_Pivot_mkiosvoice_d100
        ");
		$stmt->execute();
		$denom100k = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
			select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'
			from tbl_Extended_Pivot_mkiosvoice_total
        ");
		$stmt->execute();
		$denomtotal = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
	$all_branch = getAllBranch();
    $branch = json_decode($all_branch, true);
?>
<main>
		<div id="loading" style="display:none;">
			Loading Please Wait....
			<img src="views/assets/img/load.gif" alt="Loading" />
		</div>
		<section class="pb-4">
        <div class="card">
        	<h3 class="card-header black white-text">MKIOS VOICE <?Php echo $newdate; //foreach ($tgl_vlr as $data) {print $data['tgl']. "\n";} ?> DESEMBER 2018</h3>
            <div class="card-body">
				<div class="row" align="center">
				<div class="col-lg-6 col-md-12">
                		<select id="branch_mkiosvoice_inc" name="branch_mkiosvoice_inc" class="mdb-select" required>
                            <option value="" disabled selected>Pilih Branch</option>
                            <option value="">SUMBAGUT</option>
                            <?php 
                            foreach($branch as $row) { ?>
                            <option value="<?= $row['id_branch']; ?>"><?= $row['nama_branch']; ?></option>
                            <?php } ?>
                        </select>
                	</div>
                	<div class="col-lg-6 col-md-12">
                        <select id="cluster_mkiosvoice_inc" name="cluster_mkiosvoice_inc" class="mdb-select" required disabled>
                            <option value="" disabled selected>Pilih Cluster</option>
                        </select>
                	</div></div>
				<div id="script_mkiosvoice_inc" style="margin: 0 auto"></div>	
				<div class="table-responsive fixed-table-body">
					<table class="collaptable table table-responsive table-sm table-striped mb-0" >
						<thead class="mdb-color darken-4">
							<tr id="tanggal" style="border:1px solid black">
								<th rowspan="2" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3.5px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;text-align:center;vertical-align:center"><b>DENOM </b></th>
							</tr>
						</thead>
						<tbody>
							
							<tr id="mkiosvoice_d5">
								<td style="font-size:13px"><b>5K</b></td>
							<?php
							$i=0;
							$font = "style=\"font-size:11px;\"";
							foreach ($denom5k as $data)
							{
							?>
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
							foreach ($denom10k as $data)
							{
							?>
							<tr id="mkiosvoice_d10">
								<td style="font-size:13px"><b>10K</b></td>
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
							foreach ($denom20k as $data)
							{
							?>
							<tr id="mkiosvoice_d20">
								<td style="font-size:13px"><b>20K</b></td>
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
							foreach ($denom25k as $data)
							{
							?>
							<tr id="mkiosvoice_d25">
								<td style="font-size:13px"><b>25K</b></td>
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
							foreach ($denom50k as $data)
							{
							?>
							<tr id="mkiosvoice_d50">
								<td style="font-size:13px"><b>50K</b></td>
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
							foreach ($denom100k as $data)
							{
							?>
							<tr id="mkiosvoice_d100">
								<td style="font-size:13px"><b>100K</b></td>
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
							foreach ($denomtotal as $data)
							{
							?>
							<tr id="mkiosvoice_total">
								<td style="font-size:13px"><b>Total</b></td>
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
			
			<div class="card-body">
					<font> 
						<b><center>Berikut Growth Mkios Voice update s/d <?php
						echo $newdate;?> DESEMBER 2018</center></b>
					</font>
					<div class="card-body" align="center">
				    <div class="table-responsive fixed-table-body">
						<table class="collaptable table table-sm table-striped table-hover mb-0">
	                    <thead>
	                        <tr style="border:1px solid white">
	                            <th rowspan="2" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#027367;text-align:center;vertical-align:top"><b>BRANCH<br>----<br>CLUSTER</b></th>
								<th colspan="3" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#b30000;text-align:center;vertical-align:top"><b>Denom 5K<b></th>
	                            <th colspan="3" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#b30000;text-align:center;vertical-align:top"><b>Denom 10K<b></th>
	                            <th colspan="3" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#b30000;text-align:center;vertical-align:top"><b>Denom 20K<b></th>
	                            <th colspan="3" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#b30000;text-align:center;vertical-align:top"><b>Denom 25K<b></th>
	                            <th colspan="3" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#b30000;text-align:center;vertical-align:top"><b>Denom 50K<b></th>
	                            <th colspan="3" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#b30000;text-align:center;vertical-align:top"><b>Denom 100K<b></th>
	                            <th colspan="3" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#b30000;text-align:center;vertical-align:top"><b>Total<b></th>
	                            
	                        </tr>
	                        <tr style="border:1px solid black">
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>MoM</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>YoY</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>Ytd</b></td>
	                            
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>MoM</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>YoY</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>Ytd</b></td>

	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>MoM</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>YoY</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>Ytd</b></td>

	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>MoM</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>YoY</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>Ytd</b></td>

	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>MoM</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>YoY</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>Ytd</b></td>

	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>MoM</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>YoY</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>Ytd</b></td>

	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>MoM</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>YoY</b></td>
	                            <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#f2AB27;text-align:center;vertical-align:top"><b>Ytd</b></td>
								
	                        </tr>
	                    </thead>
	                    <tbody>
						<?php
						$i=0;
						foreach ($branch1 as $data)
						{
						?>
                        <tr data-id="1" data-parent="" style="background-color: #f0f5f5">
                            <td style="font-size:11px"><b><?= $data['branch_cluster'] ?></b></td>
							<td style="font-size:11px"><b><?= number_format($data['actual_ptd'],1) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ptd'],1) ?></td>
							<?php
							if($data['gap_ptd'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap_ptd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap_ptd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_ptd'],1) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['actual_ytd'],1) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ytd'],1) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap_ytd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap_ytd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_ytd'],1) ?></td>
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
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],1).'</td>';
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
                            <td style="font-size:11px"><?= $data['branch_cluster'] ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],1) ?></td>
							<?php
							if($data['gap_ptd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ptd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ptd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ytd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],1) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],1) ?></td>
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
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],1).'</td>';
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
                            <td style="font-size:11px"><?= $data['branch_cluster'] ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],1) ?></td>
							<?php
							if($data['gap_ptd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ptd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ptd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ytd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],1) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],1) ?></td>
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
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],1).'</td>';
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
                            <td style="font-size:11px"><?= $data['branch_cluster'] ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],1) ?></td>
							<?php
							if($data['gap_ptd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ptd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ptd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ytd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],1) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],1) ?></td>
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
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],1).'</td>';
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
							<td style="font-size:11px"><b><?= $data['branch_cluster'] ?></b></td>
							<td style="font-size:11px"><b><?= number_format($data['actual_ptd'],1) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ptd'],1) ?></td>
							<?php
							if($data['gap_ptd'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap_ptd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap_ptd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_ptd'],1) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['actual_ytd'],1) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ytd'],1) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap_ytd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap_ytd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_ytd'],1) ?></td>
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
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],1).'</td>';
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
                            <td style="font-size:11px"><?= $data['branch_cluster'] ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],1) ?></td>
							<?php
							if($data['gap_ptd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ptd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ptd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ytd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],1) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],1) ?></td>
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
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],1).'</td>';
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
                            <td style="font-size:11px"><?= $data['branch_cluster'] ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],1) ?></td>
							<?php
							if($data['gap_ptd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ptd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ptd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ytd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],1) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],1) ?></td>
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
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],1).'</td>';
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
                            <td style="font-size:11px"><b><?= $data['branch_cluster'] ?></b></td>
							<td style="font-size:11px"><b><?= number_format($data['actual_ptd'],1) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ptd'],1) ?></td>
							<?php
							if($data['gap_ptd'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap_ptd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap_ptd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_ptd'],1) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['actual_ytd'],1) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ytd'],1) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap_ytd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap_ytd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_ytd'],1) ?></td>
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
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],1).'</td>';
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
                            <td style="font-size:11px"><?= $data['branch_cluster'] ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],1) ?></td>
							<?php
							if($data['gap_ptd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ptd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ptd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ytd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],1) ?></td>
<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],1) ?></td>
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
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],1).'</td>';
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
                            <td style="font-size:11px"><?= $data['branch_cluster'] ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],1) ?></td>
							<?php
							if($data['gap_ptd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ptd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ptd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ytd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],1) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],1) ?></td>
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
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],1).'</td>';
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
                            <td style="font-size:11px"><?= $data['branch_cluster'] ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],1) ?></td>
							<?php
							if($data['gap_ptd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ptd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ptd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ytd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],1) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],1) ?></td>
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
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],1).'</td>';
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
                            <td style="font-size:11px"><b><?= $data['branch_cluster'] ?></b></td>
							<td style="font-size:11px"><b><?= number_format($data['actual_ptd'],1) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ptd'],1) ?></td>
							<?php
							if($data['gap_ptd'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap_ptd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap_ptd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_ptd'],1) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['actual_ytd'],1) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ytd'],1) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap_ytd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap_ytd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_ytd'],1) ?></td>
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
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],1).'</td>';
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
                            <td style="font-size:11px"><?= $data['branch_cluster'] ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],1) ?></td>
							<?php
							if($data['gap_ptd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ptd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ptd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ytd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],1) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],1) ?></td>
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
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],1).'</td>';
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
                            <td style="font-size:11px"><?= $data['branch_cluster'] ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],1) ?></td>
							<?php
							if($data['gap_ptd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ptd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ptd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ytd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],1) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],1) ?></td>
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
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],1).'</td>';
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
                            <td style="font-size:11px"><?= $data['branch_cluster'] ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],1) ?></td>
							<?php
							if($data['gap_ptd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ptd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ptd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ytd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],1) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],1).'</td>';
							}
							?>
							
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],1) ?></td>
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
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],1).'</td>';
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
                            <td style="font-size:11px"><b><?= $data['branch_cluster'] ?></b></td>
							<td style="font-size:11px"><b><?= number_format($data['actual_ptd'],1) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ptd'],1) ?></td>
							<?php
							if($data['gap_ptd'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap_ptd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap_ptd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_ptd'],1) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['actual_ytd'],1) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ytd'],1) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap_ytd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap_ytd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_ytd'],1) ?></td>
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
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],1).'</td>';
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
                            <td style="font-size:11px"><?= $data['branch_cluster'] ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],1) ?></td>
							<?php
							if($data['gap_ptd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ptd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ptd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ytd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],1) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],1) ?></td>
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
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],1).'</td>';
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
                            <td style="font-size:11px"><?= $data['branch_cluster'] ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],1) ?></td>
							<?php
							if($data['gap_ptd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ptd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ptd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ytd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],1) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],1) ?></td>
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
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],1).'</td>';
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
                            <td style="font-size:11px"><?= $data['branch_cluster'] ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ptd'],1) ?></td>
							<?php
							if($data['gap_ptd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ptd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ptd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ptd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['actual_ytd'],1) ?></td>
							<td style="font-size:11px"><?= number_format($data['target_ytd'],1) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['gap_ytd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['gap_ytd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><?= number_format($data['ach_ytd'],1) ?></td>
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
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['mom_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['mom_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['yoy_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['yoy_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red">'.number_format($data['ytd_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],1).'</td>';
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
                            <td style="font-size:13px"><b><?= $data['branch_cluster'] ?></td>
							<td style="font-size:11px"><b><?= number_format($data['actual_ptd'],1) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ptd'],1) ?></td>
							<?php
							if($data['gap_ptd'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap_ptd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap_ptd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_ptd'],1) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['actual_ytd'],1) ?></td>
							<td style="font-size:11px"><b><?= number_format($data['target_ytd'],1) ?></td>
							<?php
							if($data['gap_ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['gap_ytd'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['gap_ytd'],1).'</td>';
							}
							?>
							<td style="font-size:11px"><b><?= number_format($data['ach_ytd'],1) ?></td>
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
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_voice'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_voice'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_sms'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_sms'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_broadband'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['ytd_broadband'],1).'</td>';
							}
							?>
							<?php
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['mom_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['mom_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['yoy_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black"><b>'.number_format($data['yoy_digital'],1).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red"><b>'.number_format($data['ytd_digital'],1).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black">'.number_format($data['ytd_digital'],1).'</td>';
							}
							?>
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
			
			
        </div>
    </section>



	<!--<div id="scriptlm" style="margin: 0 auto"></div>-->
    <!--<section class="pb-4">
        <div class="card">
        	<h3 class="card-header black white-text">MKIOS VOICE DAILY CHART DESEMBER 2018</h3>
            <div class="card-body">
				<div class="row" align="center">
				<div class="col-lg-6 col-md-12">
                		<select id="branch_mkiosvoice" name="branch_mkiosvoice" class="mdb-select" required>
                            <option value="" disabled selected>Pilih Branch</option>
                            <option value="">SUMBAGUT</option>
                            <?php 
                            //foreach($branch as $row) { ?>
                            <option value="<?//= $row['id_branch']; ?>"><?//= $row['nama_branch']; ?></option>
                            <?php// } ?>
                        </select>
                	</div>
                	<div class="col-lg-6 col-md-12">
                        <select id="cluster_mkiosvoice" name="cluster_mkiosvoice" class="mdb-select" required disabled>
                            <option value="" disabled selected>Pilih Cluster</option>
                        </select>
                	</div></div>
				<!--<div id="script_mkiosvoice" style="margin: 0 auto"></div>
				
					
			</div>
			
        </div>
    </section>-->
	
	<section class="pb-4">
        <div class="card">
		        	<!--<h3 class="card-header black white-text">MKIOS VOICE PERFORMANCE 1-<?php //echo"$newdate"?> DESEMBER 2018</h3>-->
		        	<h3 class="card-header black white-text">MKIOS VOICE PERFORMANCE <?php echo $newdate; ?> DESEMBER 2018</h3>
				<div class="card-body">
				
            	<table class="table table-responsive" id="dataTables">
				
				<br><b><center>
				Untuk Detail Performance Mkiosvoice peroutlet silahkan download di link berikut	
				<a href="http://10.33.97.177/tiramisu/autoemail_mcd/mkiosvoice_outlet_export.php">
				Download
				</a></b></center>
					<thead class="mdb-color lighten-4">
						<tr>
							<th>BRANCH</th>
							<th>CLUSTER</th>
							<th>Jlh. RS OUTLET</th>
							<th>5.000</th>
							<th>10.000</th>
							<th>20.000</th>
							<th>25.000</th>
							<th>50.000</th>
							<th>100.000</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						foreach ($mkiosvoice as $data)
						{
						?>
									<tr>
										<td><?= $data['Branch'] ?></td>
										<td><?= $data['Cluster'] ?></td>
										<td><?= number_format(round($data['RS'])) ?></td>
										<td><?= number_format(round($data['d5'])) ?></td>
										<td><?= number_format(round($data['d10'])) ?></td>
										<td><?= number_format(round($data['d20'])) ?></td>
										<td><?= number_format(round($data['d25'])) ?></td>
										<td><?= number_format(round($data['d50'])) ?></td>
										<td><?= number_format(round($data['d100'])) ?></td>
										<td><?= number_format(round($data['TotDenom'])) ?></td>
									</tr>
						<?php
							$i++;
						}
						?>
					</tbody>
				</table>
				
            </div>
			
		</div>
	</section>
</main>
<?php
		break;
}
?>