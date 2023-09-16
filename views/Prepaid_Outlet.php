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
		select m.branch, m.cluster, count(m.ID) as totalreg, n.P1P3, n.P2P4, n.P1P3+n.P2P4 as totalber,n.totP1P3, n.poinP2P4, n.totalpoin,
		(n.P1P3/count(m.ID))*100 as per1, (n.P2P4/count(m.ID))*100 as per2
		from tbl_adn3966_prepaid_outlet m
		right join
		(
		  select q.branch, q.cluster, p.P1P3, p.P2P4, p.totP1P3, p.poinP2P4, p.totalpoin
		from 
		(
			select y.branch,y.cluster, x.P1P3, y.P2P4, x.totP1P3, y.P2P4*1 as poinP2P4, 
		x.totP1P3+(y.P2P4*1) as totalpoin
		from 
		( select b.cluster as cluster, a.P1+b.P3 as P1P3, a.totP1 as totP1, b.totP3 as totP3, 
		  a.totP1+b.totP3 as totP1P3 
		  from
		  (
			  select cluster, count(ID) as P1, count(ID)*10 as totP1
			  from tbl_prepaid_outlet_1
			  where kategori_pelanggan like 'P1'
			  group by cluster
		  ) a right join
		  ( 
			  select cluster, count(ID) as P3, count(ID)*2 as totP3
			  from tbl_prepaid_outlet_1
			  where kategori_pelanggan like 'P3'
			  group by cluster)
		  b
		  on a.cluster = b.cluster
		  group by a.cluster
		) x
		right join 
		(
		  select branch, cluster, count(ID) as P2P4
		  from tbl_prepaid_outlet_1
		  where kategori_pelanggan like 'P2/P4'
		  group by cluster
		) y
		on x.cluster = y.cluster
		group by y.cluster
		order by y.branch, y.cluster asc
		)p
		right join tbl_prepaid_outlet_1 q
		on p.cluster = q.cluster
		where q.branch <> 'EART?>  ?'
		group by q.cluster
		order by q.branch, q.cluster

		) n
		on m.cluster = n.cluster
		group by n.cluster
		order by m.branch, m.cluster
		");
		$stmt->execute();
		$prepaid_outlet = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e)
	{
		//echo $e->getMessage();
	}
?>
<main>
    <section class="pb-4">
        <div class="card">
        	<h3 class="card-header red white-text">Prepaid Poin</h3>
            <div class="card-body">
            	<table class="table table-striped table-responsive" id="dataTables">
					<thead>
						<tr>
							<th>BRANCH</th>
							<th>CLUSTER</th>
							<th>Jlh. Msisdn <br> Dilapor</th>
							<th>Jlh. Msisdn <br> Success Registrasi</th>
							<th>Jumlah Poin</th>
							<th>Msisdn Success Registrasi (%)</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						foreach ($prepaid_outlet as $data)
						{
						?>
									<tr>
										<td><?= $data['branch'] ?></td>
										<td><?= $data['cluster'] ?></td>
										<td><?= number_format(round($data['totalreg'])) ?></td>
										<td><?= number_format(round($data['totalber'])) ?></td>
										<td><?= number_format(round($data['totalpoin'])) ?></td>
										<td><?= number_format(($data['totalber']/$data['totalreg'])*100,2) ?></td>
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