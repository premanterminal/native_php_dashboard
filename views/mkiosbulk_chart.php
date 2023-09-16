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
		select Branch, Cluster, count(distinct Anum) as RS, sum(Denom) as TotDenom
		from rm_mkios_data_201812_lacci
		where Channel = '076'
		group by Cluster
		order by Branch, Cluster
        ");
		$stmt->execute();
		$mkiosbulk = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
		
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}

	$all_branch = getAllBranch();
    $branch = json_decode($all_branch, true);
?>
<main>
	<!--<div id="scriptlm" style="margin: 0 auto"></div>-->
    <section class="pb-4">
        <div class="card">
        	<h3 class="card-header black white-text">MKIOS BULK DAILY CHART <?Php echo $newdate;  //foreach ($tgl_vlr as $data) {print $data['tgl']. "\n";} ?> DESEMBER 2018</h3>
            <div class="card-body">
				<div class="row" align="center">
					<div class="col-lg-6 col-md-12">
                		<select id="branch_mkiosbulk" name="branch_mkiosbulk" class="mdb-select" required>
                            <option value="" disabled selected>Pilih Branch</option>
                            <option value="">SUMBAGUT</option>
                            <?php 
                            foreach($branch as $row) { ?>
                            <option value="<?= $row['id_branch']; ?>"><?= $row['nama_branch']; ?></option>
                            <?php } ?>
                        </select>
                	</div>
                	<div class="col-lg-6 col-md-12">
                        <select id="cluster_mkiosbulk" name="cluster_mkiosbulk" class="mdb-select" required disabled>
                            <option value="" disabled selected>Pilih Cluster</option>
                        </select>
                	</div>
				</div>
				<div id="script_mkiosbulk" style="margin: 0 auto"></div>
				
					
			</div>
			
			<div class="card-body">
					<font> 
						<b><center>Berikut Growth Mkios Bulk update s/d 
						<?php echo $newdate;?> DESEMBER 2018</center></b>
					</font>
					<div class="card-body" align="center">
				    <div class="table-responsive fixed-table-body">
						<table class="collaptable table table-sm table-striped table-hover mb-0">
	                    <thead>
	                        <tr style="border:1px solid white">
	                            <th rowspan="2" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#027367;text-align:center;vertical-align:top"><b>BRANCH<br>----<br>CLUSTER</b></th>
								<th colspan="3" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#b30000;text-align:center;vertical-align:top"><b>Total<b></th>
	                            
	                        </tr>
	                        <tr style="border:1px solid black">
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
	
	<section class="pb-4">
        <div class="card">
		        	<!--<h3 class="card-header black white-text">MKIOS BULK PERFORMANCE 1-<?php //echo"$newdate"?> Juni 2018</h3>-->
					<h3 class="card-header black white-text">MKIOS BULK PERFORMANCE <?php echo $newdate;?> DESEMBER 2018</h3>
				<div class="card-body">
				
            	<table class="table table-responsive" id="dataTables">
					
				<br><b><center>
				Untuk Detail Performance Mkiosbulk peroutlet silahkan download di link berikut	
				<a href="http://10.33.97.177/tiramisu/autoemail_mcd/mkiosbulk_outlet_export.php">
				Download
				</a></b></center>
					<thead class="mdb-color lighten-4">
						<tr>
							<th>BRANCH</th>
							<th>CLUSTER</th>
							<th>Jlh. RS OUTLET</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						foreach ($mkiosbulk as $data)
						{
						?>
									<tr>
										<td><?= $data['Branch'] ?></td>
										<td><?= $data['Cluster'] ?></td>
										<td><?= number_format(round($data['RS'])) ?></td>
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