<?php
session_start();

define('BL', true);

require_once('../common/config/DbController.php');
require_once('../common/controllers/CommonController.php');

if(!is_loggedin())
{
	redirect('login');
}

switch($_GET['pilih'])
{
    default :

    try
	{
		
    	$stmt = dbConnection()->prepare("select p.ID, p.BRANCH, p.CLUSTER, p.Site_ID,p.SiteName, p.DateOA, q.TotOct, q.AvgOct, p.TotSept, p.AvgSept
				from
				(
				  select a.ID,a.BRANCH, a.CLUSTER, a.Site_ID, a.SiteName, a.DateOA, sum(b.Revenue) as TotSept, 
				  count(distinct b.DSR) jrevSept , sum(b.Revenue)/count(distinct b.DSR) as AvgSept
				  from data_blocean a inner join revenue_blueocean_201711 b
				  on a.SIte_ID = b.Site_ID
				  group by Site_ID
				  order by ID,BRANCH,CLUSTER
				) p
				left join
				(
				  select a.BRANCH, a.CLUSTER, a.Site_ID, sum(b.Revenue) as TotOct, 
				  count(distinct b.DSR) jrevOct , sum(b.Revenue)/count(distinct b.DSR) as AvgOct
				  from data_blocean a inner join revenue_blueocean b
				  on a.SIte_ID = b.Site_ID
				  where DSR like '201710_%_%'
				  group by Site_ID
				  order by BRANCH,CLUSTER
				) q
				on p.Site_ID = q.Site_ID
				group by Site_ID
				order by ID,BRANCH,CLUSTER");
		$stmt->execute();
		$dor = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e)
	{
		//echo $e->getMessage();
	}
?>
<main>
    <section class="pb-4">
        <div class="card">
        	<h3 class="card-header red white-text">DOR</h3>
            <div class="card-body">
            	<table class="table table-striped table-responsive" id="dataTables">
					<thead>
						<tr>
							<th>BRANCH</th>
							<th>CLUSTER</th>
							<th>Site ID</th>
							<th>Site Name</th>
							<th>Revenue Last Month</th>
							<th>Average Last Month</th>
							<th>Revenue This Month</th>
							<th>Average This Month</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($dor as $data)
						{
							if($data['TotSept'] > 60000000)
							{
								if($data['AvgSept'] < 1000000)
								{
						?>
									<tr>
										<td><?= $data['BRANCH'] ?></td>
										<td><?= $data['CLUSTER'] ?></td>
										<td><?= $data['Site_ID'] ?></td>
										<td><?= $data['SiteName'] ?></td>
										<td><?= number_format(round($data['TotOct'])) ?></td>
										<td><?= number_format(round($data['AvgOct'])) ?></td>
										<td><?= number_format(round($data['TotSept'])) ?></td>
										<td><?= number_format(round($data['AvgSept'])) ?></td>
									</tr>
						<?php
								}
								else {
						?>
									<tr>
										<td><?= $data['BRANCH'] ?></td>
										<td><?= $data['CLUSTER'] ?></td>
										<td><?= $data['Site_ID'] ?></td>
										<td><?= $data['SiteName'] ?></td>
										<td><?= number_format(round($data['TotOct'])) ?></td>
										<td><?= number_format(round($data['AvgOct'])) ?></td>
										<td><?= number_format(round($data['TotSept'])) ?></td>
										<td><?= number_format(round($data['AvgSept'])) ?></td>
									</tr>
						<?php
								}
							}
							else {
								if($data['AvgSept'] < 1000000) {
						?>
									<tr>
										<td><?= $data['BRANCH'] ?></td>
										<td><?= $data['CLUSTER'] ?></td>
										<td><?= $data['Site_ID'] ?></td>
										<td><?= $data['SiteName'] ?></td>
										<td><?= number_format(round($data['TotOct'])) ?></td>
										<td><?= number_format(round($data['AvgOct'])) ?></td>
										<td><?= number_format(round($data['TotSept'])) ?></td>
										<td><?= number_format(round($data['AvgSept'])) ?></td>
									</tr>
						<?php
								}
								else {
						?>
									<tr>
										<td><?= $data['BRANCH'] ?></td>
										<td><?= $data['CLUSTER'] ?></td>
										<td><?= $data['Site_ID'] ?></td>
										<td><?= $data['SiteName'] ?></td>
										<td><?= number_format(round($data['TotOct'])) ?></td>
										<td><?= number_format(round($data['AvgOct'])) ?></td>
										<td><?= number_format(round($data['TotSept'])) ?></td>
										<td><?= number_format(round($data['AvgSept'])) ?></td>
									</tr>
						<?php
								}
							}
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