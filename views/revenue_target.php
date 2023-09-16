<?php
session_start();

define('BL', true);

require_once('../common/config/DbController.php');
require_once('../common/controllers/CommonController.php');

$date =date("Y/m/d");
$newdate = strtotime ( '-2 day' , strtotime ( $date ) ) ;
$newdate = date ( 'd' , $newdate );
$periode = strtotime ( '-2 day' , strtotime ( $date ) ) ;
$periode = date ( 'Ymd' , $periode );

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
		select * from tbl_sum_ach_revenue_bb_201810
		where tgl like '$periode'
		order by branch,cluster;
		");
		$stmt->execute();
		$REVTARGET_BB = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_ach_revenue_digital_201810
		where tgl like '$periode'
		order by branch,cluster;
		");
		$stmt->execute();
		$REVTARGET_DIGITAL = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_ach_revenue_legacy_201810
		where tgl like '$periode'
		order by branch,cluster;
		");
		$stmt->execute();
		$REVTARGET_LEGACY = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_ach_revenue_gross_201810
		where tgl like '$periode'
		order by branch,cluster;
		");
		$stmt->execute();
		$REVTARGET_GROSS = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e)
	{
		//echo $e->getMessage();
	}
?>
<main>
    <section class="pb-4">
        <div class="card">
        	<h3 class="card-header red white-text">REVENUE GROSS      <?Php echo"$newdate";?> OKTOBER 2018 </h3>
            <div class="card-body">
				
				<table class="table table-striped table-responsive" id="dataTables">
				
				
				<thead>
		<tr style="border:1px solid black">
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#990000;text-align:center"><b>Branch</b></th>
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#990000;text-align:center"><b>Cluster</b></th>
			<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#2e2e1f;text-align:center"><b>Target Total</b></th>
			<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#000;background-color:#99ccff;text-align:center"><b>Revenue Total<b></th>
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#000;background-color:#ff9966;text-align:center"><b>Ach Total<b></th>
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#000;background-color:#99ff99;text-align:center"><b>Target PTD<b></th>
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ff3300;text-align:center"><b>Ach PTD<b></th>
			
        </tr>
        
					</thead>
					<tbody>
						<?php
						foreach ($REVTARGET_GROSS as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td><?= $data['branch'] ?></td>
							<td><?= $data['cluster'] ?></td>
							<td style="text-align: right" >Rp. <?= number_format($data['target_total']) ?></td>
							<td style="text-align: right">Rp. <?= number_format($data['revenue_total']) ?></td>
							<td style="text-align: center"><?= number_format($data['ach_total'],2) ?>%</td>
							<td style="text-align: right">Rp. <?= number_format($data['target_ptd']) ?></td>
							<td style="text-align: center"><?= number_format($data['ach_ptd'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tbody>
				</table>
            </div>
        </div>
    </section>
	
	<section class="pb-4">
        <div class="card">
        	<h3 class="card-header red white-text">REVENUE BROADBAND      <?Php echo"$newdate";?> OKTOBER 2018 </h3>
            <div class="card-body">
				
				<table class="table table-striped table-responsive" id="dataTables">
				
				
				<thead>
		<tr style="border:1px solid black">
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#990000;text-align:center"><b>Branch</b></th>
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#990000;text-align:center"><b>Cluster</b></th>
			<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#2e2e1f;text-align:center"><b>Target Total</b></th>
			<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#000;background-color:#99ccff;text-align:center"><b>Revenue Total<b></th>
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#000;background-color:#ff9966;text-align:center"><b>Ach Total<b></th>
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#000;background-color:#99ff99;text-align:center"><b>Target PTD<b></th>
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ff3300;text-align:center"><b>Ach PTD<b></th>
			
        </tr>
        
					</thead>
					<tbody>
						<?php
						foreach ($REVTARGET_BB as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td><?= $data['branch'] ?></td>
							<td><?= $data['cluster'] ?></td>
							<td style="text-align: right" >Rp. <?= number_format($data['target_total']) ?></td>
							<td style="text-align: right">Rp. <?= number_format($data['revenue_total']) ?></td>
							<td style="text-align: center"><?= number_format($data['ach_total'],2) ?>%</td>
							<td style="text-align: right">Rp. <?= number_format($data['target_ptd']) ?></td>
							<td style="text-align: center"><?= number_format($data['ach_ptd'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tbody>
				</table>
            </div>
        </div>
    </section>
	
	    <section class="pb-4">
        <div class="card">
        	<h3 class="card-header red white-text">REVENUE DIGITAL      <?Php echo"$newdate";?> OKTOBER 2018 </h3>
            <div class="card-body">
				
				<table class="table table-striped table-responsive" id="dataTables">
				
				
						<thead>
		<tr style="border:1px solid black">
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#990000;text-align:center"><b>Branch</b></th>
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#990000;text-align:center"><b>Cluster</b></th>
			<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#2e2e1f;text-align:center"><b>Target Total</b></th>
			<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#000;background-color:#99ccff;text-align:center"><b>Revenue Total<b></th>
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#000;background-color:#ff9966;text-align:center"><b>Ach Total<b></th>
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#000;background-color:#99ff99;text-align:center"><b>Target PTD<b></th>
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ff3300;text-align:center"><b>Ach PTD<b></th>
			
        </tr>
        
					</thead>
					<tbody>
						<?php
						foreach ($REVTARGET_DIGITAL as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td><?= $data['branch'] ?></td>
							<td><?= $data['cluster'] ?></td>
							<td style="text-align: right" >Rp. <?= number_format($data['target_total']) ?></td>
							<td style="text-align: right">Rp. <?= number_format($data['revenue_total']) ?></td>
							<td style="text-align: center"><?= number_format($data['ach_total'],2) ?>%</td>
							<td style="text-align: right">Rp. <?= number_format($data['target_ptd']) ?></td>
							<td style="text-align: center"><?= number_format($data['ach_ptd'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tbody>
				</table>
            </div>
        </div>
    </section>
	
	    <section class="pb-4">
        <div class="card">
        	<h3 class="card-header red white-text">REVENUE LEGACY      <?Php echo"$newdate";?> OKTOBER 2018 </h3>
            <div class="card-body">
				
				<table class="table table-striped table-responsive" id="dataTables">
				
				
		<thead>
		<tr style="border:1px solid black">
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#990000;text-align:center"><b>Branch</b></th>
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#990000;text-align:center"><b>Cluster</b></th>
			<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#2e2e1f;text-align:center"><b>Target Total</b></th>
			<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#000;background-color:#99ccff;text-align:center"><b>Revenue Total<b></th>
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#000;background-color:#ff9966;text-align:center"><b>Ach Total<b></th>
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#000;background-color:#99ff99;text-align:center"><b>Target PTD<b></th>
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ff3300;text-align:center"><b>Ach PTD<b></th>
			
        </tr>
        
		</thead>
					<tbody>
						<?php
						foreach ($REVTARGET_LEGACY as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td><?= $data['branch'] ?></td>
							<td><?= $data['cluster'] ?></td>
							<td style="text-align: right" >Rp. <?= number_format($data['target_total']) ?></td>
							<td style="text-align: right">Rp. <?= number_format($data['revenue_total']) ?></td>
							<td style="text-align: center"><?= number_format($data['ach_total'],2) ?>%</td>
							<td style="text-align: right">Rp. <?= number_format($data['target_ptd']) ?></td>
							<td style="text-align: center"><?= number_format($data['ach_ptd'],2) ?>%</td>
							</tr>
							
						<?php
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