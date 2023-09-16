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
    	$stmt = dbConnectiondata()->prepare("select a.Paket, a.detail, a.harga_paket, a.masa_aktif, sum(b.revenue) as TotalRev30, COUNT(DISTINCT b.msisdn) as CountMSISDN 
				from catalog_30_cities a left join mail_flash_30_cities_sumbagut_201802 b
				on a.content_id = b.content_id
				group by a.Paket
				order by TotalRev30 desc");
		$stmt->execute();
		$cities = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e)
	{
		//echo $e->getMessage();
	}
?>
<main>
    <section class="pb-4">
        <div class="card">
        	<h3 class="card-header red white-text">30 Cities</h3>
            <div class="card-body">
            	<table class="table table-striped table-responsive" id="dataTables">
					<thead>
						<tr>
							<th>PAKET</th>
							<th>DETAIL</th>
							<th>HARGA</th>
							<th>MASA AKTIF</th>
							<th>REVENUE</th>
							<th>TRANSAKSI</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$x = 0;
						$y = 0;
						foreach ($cities as $data)
						{
							if($i % 2 == 0) {
						?>
						<tr>
							<td><?= $data['Paket'] ?></td>
							<td><?= $data['detail'] ?></td>
							<td><?= number_format($data['harga_paket']) ?></td>
							<td><?= $data['masa_aktif'] ?></td>
							<td><?= number_format($data['TotalRev30']) ?></td>
							<td><?= number_format($data['CountMSISDN']) ?></td>
						</tr>
						<?php
							}
							else {
						?>
						<tr>
							<td><?= $data['Paket'] ?></td>
							<td><?= $data['detail'] ?></td>
							<td><?= number_format($data['harga_paket']) ?></td>
							<td><?= $data['masa_aktif'] ?></td>
							<td><?= number_format($data['TotalRev30']) ?></td>
							<td><?= number_format($data['CountMSISDN']) ?></td>
						</tr>
						<?php
							}
							$i++;
							$x+=$rw->TotalRev30;
							$y+=$rw->CountMSISDN;
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