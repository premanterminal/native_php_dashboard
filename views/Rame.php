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

    	$stmt = dbConnectiondata()->prepare("
			select a.Branch,a.Cluster,a.Jumlah_AO,sum(case when z.revenue>0 then z.revenue else 0 end) as sales,
            sum(case when z.revenue>0 then z.sd else 0 end) sd,
            sum(case when z.revenue>0 then z.hd else 0 end) hd
            from
            (
                select branch,cluster,revenue,
                case when revenue>=25000 and revenue<50000 then revenue*1 else 0 end sd,
                case when revenue>=50000 then revenue*1 else 0 end hd
                from taker_penjualan_201801 where revenue <> 0
            ) 
            z right join target_penjualan_201802 a
            on z.cluster = a.Cluster
            group by a.Branch,a.Cluster
        ");
		$stmt->execute();
		$rame = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>
<main>
    <section class="pb-4">
        <div class="card">
        	<h3 class="card-header red white-text">RAME</h3>
            <div class="card-body">
            	<table class="table table-striped table-responsive" id="dataTables">
					<thead>
						<tr>
							<th>BRANCH</th>
							<th>CLUSTER</th>
							<th>Jumlah AO</th>
							<th>Total Revenue</th>
							<th>Low Deno</th>
							<th>High Deno</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						foreach ($rame as $data)
						{
						?>
									<tr>
										<td><?= $data['Branch'] ?></td>
										<td><?= $data['Cluster'] ?></td>
										<td><?= $data['Jumlah_AO'] ?></td>
										<td><?= number_format(round($data['sales'])) ?></td>
										<td><?= number_format(round($data['sd'])) ?></td>
										<td><?= number_format(round($data['hd'])) ?></td>
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