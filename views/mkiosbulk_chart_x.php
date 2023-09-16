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
	<!--<div id="scriptlm" style="margin: 0 auto"></div>-->
    <section class="pb-4">
        <div class="card">
        	<h3 class="card-header red white-text">MKIOS BULK DAILY CHART Maret 2018</h3>
            <div class="card-body">
				<div class="row" align="center">
					<div class="col-lg-6 col-md-12">
                		<select id="branch_mkiosbulk" name="branch_mkiosbulk" class="mdb-select" required>
                            <option value="" disabled selected>Pilih Branch</option>
                            <option value="">SUMBAGUT</option>
                            <?php 
                            foreach($branch as $row) { ?>
                            <option value="<?= $row['id_branch']; ?>"><?= $row['nama_branch']; ?></option>
                            <?php } ?>
                        </select>
                	</div>
                	<div class="col-lg-6 col-md-12">
                        <select id="cluster_mkiosbulk" name="cluster_mkiosbulk" class="mdb-select" required disabled>
                            <option value="" disabled selected>Pilih Cluster</option>
                        </select>
                	</div>
				</div>
				<div id="script_mkiosbulk" style="margin: 0 auto"></div>	
			</div>
			
        </div>
    </section>
	
	<section class="pb-4">
        <div class="card">
		        	<h3 class="card-header red white-text">MKIOS DATA PERFORMANCE 1-31 MARET 2018</h3>
				<div class="card-body">
				
            	<table class="table table-responsive" id="dataTables">
					<thead class="mdb-color lighten-4">
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