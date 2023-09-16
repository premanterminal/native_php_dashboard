<?php
session_start();

define('BL', true);

require_once('../common/config/DbController.php');
require_once('../common/controllers/CommonController.php');

$date =date("Y/m/d");
$newdate = strtotime ( '-4 day' , strtotime ( $date ) ) ;
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
		select x.branch, x.cluster, sum(y.revenue) as revenuelastmonth, sum(y.trx) trxlastmonth, 
		count(distinct y.msisdn) as uniqlast, x.revenuethismonth, x.trxthismonth, x.uniqthis, 
		((x.revenuethismonth/sum(y.revenue))*100)-100 as revenuegrowth,
		((x.trxthismonth/sum(y.trx))*100)-100 as trxgrowth,
		((x.uniqthis/(count(distinct y.msisdn)))*100)-100 as uniqgrowth 
		from 
		(
			select a.branch, a.cluster, sum(b.revenue) as revenuethismonth, sum(b.trx) as trxthismonth, count(distinct b.msisdn) as uniqthis, b.content_id
			from teritori_sumbagut a right join mail_flash_IBC_UG_201802 b
			on a.cluster = b.cluster_hq
			group by cluster_hq
			order by a.branch 
		) x inner join mail_flash_IBC_UG_201801 y 
		on x.cluster = y.cluster_hq
		where CAST(y.trx_date as DATE) between '2018-01-01' and '2018-01-$newdate'
		group by y.cluster_hq
		order by x.branch, x.cluster
		");
		$stmt->execute();
		$blue_ocean = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e)
	{
		//echo $e->getMessage();
	}
?>
<main>
    <section class="pb-4">
        <div class="card">
        	<h3 class="card-header red white-text">IBC UPGRADE<?Php echo"$newdate";?> Februari 2018 </h3>
            <div class="card-body">
				<table  border="1" style="border-collapse:collapse;border-spacing:0;border-color:#fff" bgcolor="#e6ffff">
			<tr style="border:1px solid black">
				<th rowspan="2" style="font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#CC0000;text-align:center"><b>Branch</b></th>
				<th rowspan="2" style="font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#FF0000;text-align:center"><b>Cluster</b></th>
				<th colspan="3" style="font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#b22222;text-align:center;vertical-align:top"><b>Januari<b></th>
				<th colspan="3" style="font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#b22222;text-align:center;vertical-align:top"><b>Februari<b></th>
				<th colspan="3" style="font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#b22222;text-align:center;vertical-align:top"><b>Growth<b></th>
			</tr>
			<tr style="border:1px solid black">
				<td style="font-family:Arial, sans-serif;font-size:11px;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#e60000;text-align:center;vertical-align:top"><b>Revenue</b></td>
				<td style="font-family:Arial, sans-serif;font-size:11px;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#e60000;text-align:center;vertical-align:top"><b>Transaksi</b></td>
				<td style="font-family:Arial, sans-serif;font-size:11px;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#e60000;text-align:center;vertical-align:top"><b>Uniq</b></td>
				<td style="font-family:Arial, sans-serif;font-size:11px;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#e60000;text-align:center;vertical-align:top"><b>Revenue</b></td>
				<td style="font-family:Arial, sans-serif;font-size:11px;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#e60000;text-align:center;vertical-align:top"><b>Transaksi</b></td>
				<td style="font-family:Arial, sans-serif;font-size:11px;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#e60000;text-align:center;vertical-align:top"><b>Uniq</b></td>
				<td style="font-family:Arial, sans-serif;font-size:11px;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#e60000;text-align:center;vertical-align:top"><b>Revenue</b></td>
				<td style="font-family:Arial, sans-serif;font-size:11px;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#e60000;text-align:center;vertical-align:top"><b>Transaksi</b></td>
				<td style="font-family:Arial, sans-serif;font-size:11px;padding:5px 1.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#e60000;text-align:center;vertical-align:top"><b>Uniq</b></td>
			</tr>
        <tr style="border:1px solid black">
			<tr style="border:1px solid black">
			<?php
				while($rw=mysql_fetch_object($rs3))
				{
					if($i % 2 == 0)
					{
						echo '
								<tr style="border:1px solid black">
								<td style="background-color:#fff;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:left;vertical-align:top">'.$rw->branch.'</td>
								<td style="background-color:#fff;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:left;vertical-align:top">'.$rw->cluster.'</td>
								<td style="background-color:#fff;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->revenuelastmonth).'</td>
								<td style="background-color:#fff;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->trxlastmonth).'</td>
								<td style="background-color:#fff;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->uniqlast).'</td>
								<td style="background-color:#fff;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->revenuethismonth).'</td>
								<td style="background-color:#fff;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->trxthismonth).'</td>
								<td style="background-color:#fff;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->uniqthis).'</td>
								<td style="background-color:#fff;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->revenuegrowth,1).'%</td>
								<td style="background-color:#fff;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->trxgrowth,1).'%</td>
								<td style="background-color:#fff;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->uniqgrowth,1).'%</td>
								</tr>
							';
					}
					else
					{
						echo '
								<tr style="border:1px solid black">
								<td style="background-color:#ffcccc;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:left;vertical-align:top">'.$rw->branch.'</td>
								<td style="background-color:#ffcccc;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:left;vertical-align:top">'.$rw->cluster.'</td>
								<td style="background-color:#ffcccc;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->revenuelastmonth).'</td>
								<td style="background-color:#ffcccc;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->trxlastmonth).'</td>
								<td style="background-color:#ffcccc;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->uniqlast).'</td>
								<td style="background-color:#ffcccc;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->revenuethismonth).'</td>
								<td style="background-color:#ffcccc;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->trxthismonth).'</td>
								<td style="background-color:#ffcccc;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->uniqthis).'</td>
								<td style="background-color:#ffcccc;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->revenuegrowth,1).'%</td>
								<td style="background-color:#ffcccc;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->trxgrowth,1).'%</td>
								<td style="background-color:#ffcccc;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->uniqgrowth,1).'%</td>
								</tr>
							';
						
					}
					$i++;
					$p+=$rw->revenuelastmonth;
					$q+=$rw->revenuethismonth;
					$r+=$rw->trxlastmonth;
					$s+=$rw->trxthismonth;
					$t+=$rw->revenuegrowth;
					$u+=$rw->trxgrowth;
					$xx+=$rw->uniqlast;
					$yy+=$rw->uniqthis;
					$zz+=$rw->uniqgrowth;


				}	
				echo'
					<tr>
					<td colspan="2" style="padding:7px 3.5px;text-align:center;font-family:Verdana, sans-serif;font-size:12px;text-align:left;background-color:#ff0000;color:#fff;border-color:#fff"><b>SUMBAGUT</b></td>
					<td style="padding:7px 3.5px;font-family:Verdana, sans-serif;font-size:11px;text-align:center;background-color:#ff0000;font-size:11px;color:#fff;border-color:#fff"><b>'.number_format($p).'</b></td>
					<td style="padding:7px 3.5px;font-family:Verdana, sans-serif;font-size:11px;text-align:right;background-color:#ff0000;font-size:11px;color:#fff;border-color:#fff"><b>'.number_format($r).'</b></td>
					<td style="padding:7px 3.5px;font-family:Verdana, sans-serif;font-size:11px;text-align:center;background-color:#ff0000;font-size:11px;color:#fff;border-color:#fff"><b>'.number_format($xx).'</b></td>
					<td style="padding:7px 3.5px;font-family:Verdana, sans-serif;font-size:11px;text-align:center;background-color:#ff0000;font-size:11px;color:#fff;border-color:#fff"><b>'.number_format($q).'</b></td>
					<td style="padding:7px 3.5px;font-family:Verdana, sans-serif;font-size:11px;text-align:right;background-color:#ff0000;font-size:11px;color:#fff;border-color:#fff"><b>'.number_format($s).'</b></td>
					<td style="padding:7px 3.5px;font-family:Verdana, sans-serif;font-size:11px;text-align:center;background-color:#ff0000;font-size:11px;color:#fff;border-color:#fff"><b>'.number_format($yy).'</b></td>
					<td style="padding:7px 3.5px;font-family:Verdana, sans-serif;font-size:11px;text-align:center;background-color:#ff0000;font-size:11px;color:#fff;border-color:#fff"><b>'.number_format((($q/$p)*100)-100,1).'%</b></td>
					<td style="padding:7px 3.5px;font-family:Verdana, sans-serif;font-size:11px;text-align:right;background-color:#ff0000;font-size:11px;color:#fff;border-color:#fff"><b>'.number_format((($s/$r)*100)-100,1).'%</b></td>
					<td style="padding:7px 3.5px;font-family:Verdana, sans-serif;font-size:11px;text-align:center;background-color:#ff0000;font-size:11px;color:#fff;border-color:#fff"><b>'.number_format((($yy/$xx)*100)-100,1).'%</b></td>
					</tr>
					';
        
				
			?>
		</table>
            </div>
        </div>
    </section>
</main>
<?php
		break;
}
?>