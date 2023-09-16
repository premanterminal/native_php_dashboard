<?php
session_start();

define('BL', true);

require_once('../common/config/DbController.php');
require_once('../common/controllers/CommonController.php');

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
		from tbl_Extended_Pivot_mkios_voice x
		right join
		(
		  select Branch, CLuster, count(distinct Anum) as RS, sum(Denom) as TotDenom
		  from rm_mkios_data_201804_lacci
		  where Channel = '075'
		  group by Branch,Cluster 
		) y
		on x.Cluster = y.Cluster
		group by Cluster
		order by Branch
        ");
		$stmt->execute();
		$mkiosvoice = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>
<main>
    <section class="pb-4">
        <div class="card">
        	<h3 class="card-header red white-text">MKIOS VOICE <?Php echo"$newdate";?> April 2018</h3>
            <div class="card-body">
            	<table class="table table-striped table-responsive" id="dataTables">
					<thead>
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