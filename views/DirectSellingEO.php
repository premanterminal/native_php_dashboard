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
		
    	$stmt = dbConnectiondata()->prepare("");
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
        	<h3 class="card-header red white-text">Directselling EO</h3>
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
						foreach ($blue_ocean as $data)
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