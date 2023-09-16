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
		select Branch, Cluster, count(distinct Anum) as RS, sum(Denom) as TotDenom
		from rm_mkios_data_201804_lacci
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
?>
<main>
    <section class="pb-4">
        <div class="card">
        	<h3 class="card-header red white-text">MKIOS BULK <?Php echo"$newdate";?> April 2018</h3>
            <div class="card-body">
            	<table class="table table-striped table-responsive" id="dataTables">
					<thead>
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