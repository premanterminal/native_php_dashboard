<?php
session_start();

define('BL', true);

require_once('../common/config/DbController.php');
require_once('../common/controllers/CommonController.php');

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
		
    	$stmt = dbConnectiondata()->prepare("
		select a.Branch, a.Cluster, count(distinct a.Outlet) as jlh_outlet, sum(a.baseline)*7/5 as target_rev,
		sum(a.Voice) as voice, sum(a.Bulk) as bulk, sum(a.Total) as total,
		(sum(a.Total)/(sum(a.baseline)*7/5))*100 as ach_rev, b.jlh_oa, 
		(b.jlh_oa/count( distinct a.Outlet))*100 as ach_oa
		from IMMO a
		left join
		(
		  select Cluster,count(distinct Outlet) as jlh_oa from IMMO where total >= baseline 
		  group by Cluster
		) b
		on a.Cluster = b.Cluster
		group by Cluster
		order by Branch,Cluster asc;
		");
		$stmt->execute();
		$IMMO = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e)
	{
		//echo $e->getMessage();
	}
?>
<main>
    <section class="pb-4">
        <div class="card">
        	<h3 class="card-header red white-text">IMMO      <?Php echo"$newdate";?> OKTOBER 2018 </h3>
            <div class="card-body">
				
				<table class="table table-striped table-responsive" id="dataTables">
				
				<center>				
				<p style="font-size:16px;font-family:verdana;text-align:center;font-size:16px"><b><a href="http://10.33.97.177/tiramisu/autoemail_mcd/immo_export.php">Download for Detail IMMO</a></b><form action="http://10.33.97.177/tiramisu/autoemail_mcd/immo_export.php">
            	</center>
				
				<thead>
		<tr style="border:1px solid black">
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#990000;text-align:center"><b>Branch</b></th>
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#990000;text-align:center"><b>Cluster</b></th>
			<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#2e2e1f;text-align:center"><b>Outlet</b></th>
			<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#000;background-color:#99ccff;text-align:center"><b>Target Revenue<b></th>
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#000;background-color:#ff9966;text-align:center"><b>Voice<b></th>
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#000;background-color:#99ff99;text-align:center"><b>Bulk<b></th>
            <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ff3300;text-align:center"><b>Total Revenue<b></th>
			<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#000;background-color:#ff6600;text-align:center"><b>Ach Revenue</b></th>
			<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ff3300;text-align:center"><b>Total OA<b></th>
			<th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#000;background-color:#ff6600;text-align:center"><b>Ach OA</b></th>
			
        </tr>
        
					</thead>
					<tbody>
						<?php
						foreach ($IMMO as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td><?= $data['Branch'] ?></td>
							<td><?= $data['Cluster'] ?></td>
							<td><?= number_format($data['jlh_outlet']) ?></td>
							<td>Rp. <?= number_format($data['target_rev']) ?></td>
							<td>Rp. <?= number_format($data['voice']) ?></td>
							<td>Rp. <?= number_format($data['bulk']) ?></td>
							<td>Rp. <?= number_format($data['total']) ?></td>
							<td><?= number_format($data['ach_rev'],2) ?>%</td>
							<td><?= number_format($data['jlh_oa']) ?></td>
							<td><?= number_format($data['ach_oa'],2) ?>%</td>
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