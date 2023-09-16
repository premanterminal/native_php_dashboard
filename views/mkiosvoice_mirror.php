<?php
session_start();

define('BL', true);

require_once('../common/config/DbController.php');
require_once('../common/controllers/CommonController.php');
require_once('../controllers/BranchClusterController.php');
require_once('../controllers/RevenueController.php');

$date =date("Y/m/d");
$newdate = strtotime ( '-1 day' , strtotime ( $date ) ) ;
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

    	$stmt = dbConnectiondata()->prepare("
		select x.Branch, x.Cluster, y.RS, x.d5, x.d10, x.d20, x.d25, x.d50, x.d100, y.TotDenom  
		from tbl_Extended_Pivot_mkios_data x
		right join
		(
		  select Branch, CLuster, count(distinct Anum) as RS, sum(Denom) as TotDenom
		  from rm_mkios_data_201806_lacci
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

		<section class="pb-4">
        <div class="card">
        	<h3 class="card-header black white-text">MKIOS VOICE JUNI 2018</h3>
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
			</div>
			
        </div>
    </section>



	<!--<div id="scriptlm" style="margin: 0 auto"></div>-->
    <section class="pb-4">
        <div class="card">
        	<h3 class="card-header black white-text">MKIOS VOICE DAILY CHART JUNI 2018</h3>
            <div class="card-body">
				<div class="row" align="center">
				<div class="col-lg-6 col-md-12">
                		<select id="branch_mkiosvoice" name="branch_mkiosvoice" class="mdb-select" required>
                            <option value="" disabled selected>Pilih Branch</option>
                            <option value="">SUMBAGUT</option>
                            <?php 
                            foreach($branch as $row) { ?>
                            <option value="<?= $row['id_branch']; ?>"><?= $row['nama_branch']; ?></option>
                            <?php } ?>
                        </select>
                	</div>
                	<div class="col-lg-6 col-md-12">
                        <select id="cluster_mkiosvoice" name="cluster_mkiosvoice" class="mdb-select" required disabled>
                            <option value="" disabled selected>Pilih Cluster</option>
                        </select>
                	</div></div>
				<div id="script_mkiosvoice" style="margin: 0 auto"></div>
				
				<div class="table-responsive fixed-table-body">
					<table class="collaptable table table-responsive table-sm table-striped mb-0" >
						<thead class="mdb-color darken-4">
							<tr id="tanggal" style="border:1px solid black">
								<th rowspan="2" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3.5px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;text-align:center;vertical-align:center"><b>DENOM </b></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$font = "style=\"font-size:11px;\"";
							foreach ($denom5k as $data)
							{
							?>
							<tr id="mkiosvoice_d5">
								<td style="font-size:13px"><b>5K</b></td>
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
			
        </div>
    </section>
	
	<section class="pb-4">
        <div class="card">
		        	<h3 class="card-header black white-text">MKIOS VOICE PERFORMANCE 1-<?php echo"$newdate"?> Juni 2018</h3>
				<div class="card-body">
				
            	<table class="table table-responsive" id="dataTables">
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