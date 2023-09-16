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
		
    	$stmt = dbConnectiondata()->prepare("select y.branch, y.cluster, x.allSUCKSyes, x.p1SUCKSyes, y.allSUCKS, y.p1SUCKS,
		(x.p1SUCKSyes/x.allSUCKSyes)*100 as grAll, (y.p1SUCKS/y.allSUCKS)*100 as grp1,
		((y.p1SUCKS/y.allSUCKS)*100)/((x.p1SUCKSyes/x.allSUCKSyes)*100) as gr
		from 
		(
			select branch, cluster, sum(all_cb) as allSUCKSyes, sum(all_success) as p1SUCKSyes, all_success, p1_success
			from tbl_sum_registration
			where trx_date='2018-03-$newdate'
			group by cluster
			order by branch, cluster asc
		)x inner join
		(
			select branch, cluster, sum(all_cb) as allSUCKS, sum(all_success) as p1SUCKS, all_success, p1_success
			from tbl_sum_registration
			where region like 'SUMBAGUT' and trx_date=(select MAX(trx_date) as maxdate from tbl_sum_registration)
			group by cluster
			order by branch, cluster asc
		) y
		on x.cluster = y.cluster
		group by cluster
		order by branch, cluster asc");
		$stmt->execute();
		$prepaid_reg = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e)
	{
		//echo $e->getMessage();
	}
?>
<main>
    <section class="pb-4">
        <div class="card">
        	<h3 class="card-header red white-text">Prepaid Registration</h3>
            <div class="card-body">
            	<table class="table table-striped table-responsive" id="dataTables">
					<thead>
						<tr>
							<th>BRANCH</th>
							<th>CLUSTER</th>
							<th>CB yesterday</th>
							<th>REG yesterday</th>
							<th>CB today</th>
							<th>REG today</th>
							<th>Registered <br> yesterday</th>
							<th>Registered <br> today</th>
							<th>Growth</th>
							</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						foreach ($prepaid_reg as $data)
						{
						?>
									<tr>
										<td><?= $data['branch'] ?></td>
										<td><?= $data['cluster'] ?></td>
										<td><?= number_format(round($data['allSUCKSyes'])) ?></td>
										<td><?= number_format(round($data['p1SUCKSyes'])) ?></td>
										<td><?= number_format(round($data['allSUCKS'])) ?></td>
										<td><?= number_format(round($data['p1SUCKS'])) ?></td>
										<td><?= number_format($data['grAll'],2) ?></td>
										<td><?= number_format($data['grp1'],2) ?></td>
										<td><?= number_format($data['gr'],2) ?></td>
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