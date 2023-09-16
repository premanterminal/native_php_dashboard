<?php
session_start();

define('BL', true);

require_once('../common/config/DbController.php');
require_once('../common/controllers/CommonController.php');
require_once('../controllers/BranchClusterController.php');
require_once('../controllers/RevenueController.php');

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

    	$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_HAC_cb
        ");
		$stmt->execute();
		$hac_cb = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_HAC_revenue
        ");
		$stmt->execute();
		$hac_revenue = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_HPC_cb
        ");
		$stmt->execute();
		$hpc_cb = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_HPC_revenue
        ");
		$stmt->execute();
		$hpc_revenue = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_HVC_cb
        ");
		$stmt->execute();
		$hvc_cb = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_HVC_revenue
        ");
		$stmt->execute();
		$hvc_revenue = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_LPC_cb
        ");
		$stmt->execute();
		$lpc_cb = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_LPC_revenue
        ");
		$stmt->execute();
		$lpc_revenue = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_LVC_cb
        ");
		$stmt->execute();
		$lvc_cb = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_LVC_revenue
        ");
		$stmt->execute();
		$lvc_revenue = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_MAC_cb
        ");
		$stmt->execute();
		$mac_cb = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_MAC_revenue
        ");
		$stmt->execute();
		$mac_revenue = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_MPC_cb
        ");
		$stmt->execute();
		$mpc_cb = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_MPC_revenue
        ");
		$stmt->execute();
		$mpc_revenue = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_MVC_cb
        ");
		$stmt->execute();
		$mvc_cb = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_MVC_revenue
        ");
		$stmt->execute();
		$mvc_revenue = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
	$all_branch = getAllBranch();
    $branch = json_decode($all_branch, true);
?>
<main>
	<!--<div id="scriptlm" style="margin: 0 auto"></div>-->
    <div class="row">
	<div class="col-lg-6 col-md-12">
	<section class="pb-4">
	
        <div class="card ">
		        <h3 class="card-header black white-text">HAC CUSTOMER BASE</h3>
				<div class="card-body">
				
            	<table class="table table-responsive" id="dataTables">
					<thead class="mdb-color lighten-4">
						<tr>
							<th>BRANCH_CLSUTER</th>
							<th>Data Maret</th>
							<th>Data April</th>
							<th>MoM</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						foreach ($hac_cb as $data)
						{
						?>
									<tr>
										<td><?= $data['branch_cluster'] ?></td>
										<td><?= number_format(round($data['data_maret'])) ?></td>
										<td><?= number_format(round($data['data_april'])) ?></td>
										<td><?= number_format($data['data_maret_vs_april'],3) ?></td>
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
	</div>
	<div class="col-lg-6 col-md-12">
	<section class="pb-4">
     	<div class="card">
		    <h3 class="card-header black white-text">HAC REVENUE BASE</h3>
				<div class="card-body">
				
            	<table class="table table-responsive" id="dataTables">
					<thead class="mdb-color lighten-4">
						<tr>
							<th>BRANCH_CLSUTER</th>
							<th>Data Maret</th>
							<th>Data April</th>
							<th>MoM</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						foreach ($hac_revenue as $data)
						{
						?>
									<tr>
										<td><?= $data['branch_cluster'] ?></td>
										<td><?= number_format(round($data['data_maret'])) ?></td>
										<td><?= number_format(round($data['data_april'])) ?></td>
										<td><?= number_format($data['data_maret_vs_april'],3) ?></td>
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
	</div>
	</div>
<!--<div id="scriptlm" style="margin: 0 auto"></div>-->
    <div class="row">
	<div class="col-lg-6 col-md-12">
	<section class="pb-4">
	
        <div class="card ">
		        <h3 class="card-header black white-text">HPC CUSTOMER BASE</h3>
				<div class="card-body">
				
            	<table class="table table-responsive" id="dataTables">
					<thead class="mdb-color lighten-4">
						<tr>
							<th>BRANCH_CLSUTER</th>
							<th>Data Maret</th>
							<th>Data April</th>
							<th>MoM</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						foreach ($hpc_cb as $data)
						{
						?>
									<tr>
										<td><?= $data['branch_cluster'] ?></td>
										<td><?= number_format(round($data['data_maret'])) ?></td>
										<td><?= number_format(round($data['data_april'])) ?></td>
										<td><?= number_format($data['data_maret_vs_april'],3) ?></td>
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
	</div>
	<div class="col-lg-6 col-md-12">
	<section class="pb-4">
     	<div class="card">
		    <h3 class="card-header black white-text">HPC REVENUE BASE</h3>
				<div class="card-body">
				
            	<table class="table table-responsive" id="dataTables">
					<thead class="mdb-color lighten-4">
						<tr>
							<th>BRANCH_CLSUTER</th>
							<th>Data Maret</th>
							<th>Data April</th>
							<th>MoM</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						foreach ($hpc_revenue as $data)
						{
						?>
									<tr>
										<td><?= $data['branch_cluster'] ?></td>
										<td><?= number_format(round($data['data_maret'])) ?></td>
										<td><?= number_format(round($data['data_april'])) ?></td>
										<td><?= number_format($data['data_maret_vs_april'],3) ?></td>
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
	</div>
	</div>
	
	<!--<div id="scriptlm" style="margin: 0 auto"></div>-->
    <div class="row">
	<div class="col-lg-6 col-md-12">
	<section class="pb-4">
	
        <div class="card ">
		        <h3 class="card-header black white-text">HVC CUSTOMER BASE</h3>
				<div class="card-body">
				
            	<table class="table table-responsive" id="dataTables">
					<thead class="mdb-color lighten-4">
						<tr>
							<th>BRANCH_CLSUTER</th>
							<th>Data Maret</th>
							<th>Data April</th>
							<th>MoM</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						foreach ($hvc_cb as $data)
						{
						?>
									<tr>
										<td><?= $data['branch_cluster'] ?></td>
										<td><?= number_format(round($data['data_maret'])) ?></td>
										<td><?= number_format(round($data['data_april'])) ?></td>
										<td><?= number_format($data['data_maret_vs_april'],3) ?></td>
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
	</div>
	<div class="col-lg-6 col-md-12">
	<section class="pb-4">
     	<div class="card">
		    <h3 class="card-header black white-text">HVC REVENUE BASE</h3>
				<div class="card-body">
				
            	<table class="table table-responsive" id="dataTables">
					<thead class="mdb-color lighten-4">
						<tr>
							<th>BRANCH_CLSUTER</th>
							<th>Data Maret</th>
							<th>Data April</th>
							<th>MoM</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						foreach ($hvc_revenue as $data)
						{
						?>
									<tr>
										<td><?= $data['branch_cluster'] ?></td>
										<td><?= number_format(round($data['data_maret'])) ?></td>
										<td><?= number_format(round($data['data_april'])) ?></td>
										<td><?= number_format($data['data_maret_vs_april'],3) ?></td>
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
	</div>
	</div>
	<!--<div id="scriptlm" style="margin: 0 auto"></div>-->
    <div class="row">
	<div class="col-lg-6 col-md-12">
	<section class="pb-4">
	
        <div class="card ">
		        <h3 class="card-header black white-text">LPC CUSTOMER BASE</h3>
				<div class="card-body">
				
            	<table class="table table-responsive" id="dataTables">
					<thead class="mdb-color lighten-4">
						<tr>
							<th>BRANCH_CLSUTER</th>
							<th>Data Maret</th>
							<th>Data April</th>
							<th>MoM</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						foreach ($lpc_cb as $data)
						{
						?>
									<tr>
										<td><?= $data['branch_cluster'] ?></td>
										<td><?= number_format(round($data['data_maret'])) ?></td>
										<td><?= number_format(round($data['data_april'])) ?></td>
										<td><?= number_format($data['data_maret_vs_april'],3) ?></td>
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
	</div>
	<div class="col-lg-6 col-md-12">
	<section class="pb-4">
     	<div class="card">
		    <h3 class="card-header black white-text">LPC REVENUE BASE</h3>
				<div class="card-body">
				
            	<table class="table table-responsive" id="dataTables">
					<thead class="mdb-color lighten-4">
						<tr>
							<th>BRANCH_CLSUTER</th>
							<th>Data Maret</th>
							<th>Data April</th>
							<th>MoM</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						foreach ($lpc_revenue as $data)
						{
						?>
									<tr>
										<td><?= $data['branch_cluster'] ?></td>
										<td><?= number_format(round($data['data_maret'])) ?></td>
										<td><?= number_format(round($data['data_april'])) ?></td>
										<td><?= number_format($data['data_maret_vs_april'],3) ?></td>
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
	</div>
	</div>
	
	<!--<div id="scriptlm" style="margin: 0 auto"></div>-->
    <div class="row">
	<div class="col-lg-6 col-md-12">
	<section class="pb-4">
	
        <div class="card ">
		        <h3 class="card-header black white-text">LVC CUSTOMER BASE</h3>
				<div class="card-body">
				
            	<table class="table table-responsive" id="dataTables">
					<thead class="mdb-color lighten-4">
						<tr>
							<th>BRANCH_CLSUTER</th>
							<th>Data Maret</th>
							<th>Data April</th>
							<th>MoM</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						foreach ($lvc_cb as $data)
						{
						?>
									<tr>
										<td><?= $data['branch_cluster'] ?></td>
										<td><?= number_format(round($data['data_maret'])) ?></td>
										<td><?= number_format(round($data['data_april'])) ?></td>
										<td><?= number_format($data['data_maret_vs_april'],3) ?></td>
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
	</div>
	<div class="col-lg-6 col-md-12">
	<section class="pb-4">
     	<div class="card">
		    <h3 class="card-header black white-text">LVC REVENUE BASE</h3>
				<div class="card-body">
				
            	<table class="table table-responsive" id="dataTables">
					<thead class="mdb-color lighten-4">
						<tr>
							<th>BRANCH_CLSUTER</th>
							<th>Data Maret</th>
							<th>Data April</th>
							<th>MoM</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						foreach ($lvc_revenue as $data)
						{
						?>
									<tr>
										<td><?= $data['branch_cluster'] ?></td>
										<td><?= number_format(round($data['data_maret'])) ?></td>
										<td><?= number_format(round($data['data_april'])) ?></td>
										<td><?= number_format($data['data_maret_vs_april'],3) ?></td>
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
	</div>
	</div>
	
	<!--<div id="scriptlm" style="margin: 0 auto"></div>-->
    <div class="row">
	<div class="col-lg-6 col-md-12">
	<section class="pb-4">
	
        <div class="card ">
		        <h3 class="card-header black white-text">MAC CUSTOMER BASE</h3>
				<div class="card-body">
				
            	<table class="table table-responsive" id="dataTables">
					<thead class="mdb-color lighten-4">
						<tr>
							<th>BRANCH_CLSUTER</th>
							<th>Data Maret</th>
							<th>Data April</th>
							<th>MoM</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						foreach ($mac_cb as $data)
						{
						?>
									<tr>
										<td><?= $data['branch_cluster'] ?></td>
										<td><?= number_format(round($data['data_maret'])) ?></td>
										<td><?= number_format(round($data['data_april'])) ?></td>
										<td><?= number_format($data['data_maret_vs_april'],3) ?></td>
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
	</div>
	<div class="col-lg-6 col-md-12">
	<section class="pb-4">
     	<div class="card">
		    <h3 class="card-header black white-text">MAC REVENUE BASE</h3>
				<div class="card-body">
				
            	<table class="table table-responsive" id="dataTables">
					<thead class="mdb-color lighten-4">
						<tr>
							<th>BRANCH_CLSUTER</th>
							<th>Data Maret</th>
							<th>Data April</th>
							<th>MoM</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						foreach ($mac_revenue as $data)
						{
						?>
									<tr>
										<td><?= $data['branch_cluster'] ?></td>
										<td><?= number_format(round($data['data_maret'])) ?></td>
										<td><?= number_format(round($data['data_april'])) ?></td>
										<td><?= number_format($data['data_maret_vs_april'],3) ?></td>
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
	</div>
	</div>
	
	<!--<div id="scriptlm" style="margin: 0 auto"></div>-->
    <div class="row">
	<div class="col-lg-6 col-md-12">
	<section class="pb-4">
	
        <div class="card ">
		        <h3 class="card-header black white-text">MPC CUSTOMER BASE</h3>
				<div class="card-body">
				
            	<table class="table table-responsive" id="dataTables">
					<thead class="mdb-color lighten-4">
						<tr>
							<th>BRANCH_CLSUTER</th>
							<th>Data Maret</th>
							<th>Data April</th>
							<th>MoM</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						foreach ($mpc_cb as $data)
						{
						?>
									<tr>
										<td><?= $data['branch_cluster'] ?></td>
										<td><?= number_format(round($data['data_maret'])) ?></td>
										<td><?= number_format(round($data['data_april'])) ?></td>
										<td><?= number_format($data['data_maret_vs_april'],3) ?></td>
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
	</div>
	<div class="col-lg-6 col-md-12">
	<section class="pb-4">
     	<div class="card">
		    <h3 class="card-header black white-text">MPC REVENUE BASE</h3>
				<div class="card-body">
				
            	<table class="table table-responsive" id="dataTables">
					<thead class="mdb-color lighten-4">
						<tr>
							<th>BRANCH_CLSUTER</th>
							<th>Data Maret</th>
							<th>Data April</th>
							<th>MoM</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						foreach ($mpc_revenue as $data)
						{
						?>
									<tr>
										<td><?= $data['branch_cluster'] ?></td>
										<td><?= number_format(round($data['data_maret'])) ?></td>
										<td><?= number_format(round($data['data_april'])) ?></td>
										<td><?= number_format($data['data_maret_vs_april'],3) ?></td>
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
	</div>
	</div>
	
	<!--<div id="scriptlm" style="margin: 0 auto"></div>-->
    <div class="row">
	<div class="col-lg-6 col-md-12">
	<section class="pb-4">
	
        <div class="card ">
		        <h3 class="card-header black white-text">MVC CUSTOMER BASE</h3>
				<div class="card-body">
				
            	<table class="table table-responsive" id="dataTables">
					<thead class="mdb-color lighten-4">
						<tr>
							<th>BRANCH_CLSUTER</th>
							<th>Data Maret</th>
							<th>Data April</th>
							<th>MoM</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						foreach ($mvc_cb as $data)
						{
						?>
									<tr>
										<td><?= $data['branch_cluster'] ?></td>
										<td><?= number_format(round($data['data_maret'])) ?></td>
										<td><?= number_format(round($data['data_april'])) ?></td>
										<td><?= number_format($data['data_maret_vs_april'],3) ?></td>
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
	</div>
	<div class="col-lg-6 col-md-12">
	<section class="pb-4">
     	<div class="card">
		    <h3 class="card-header black white-text">MVC REVENUE BASE</h3>
				<div class="card-body">
				
            	<table class="table table-responsive" id="dataTables">
					<thead class="mdb-color lighten-4">
						<tr>
							<th>BRANCH_CLSUTER</th>
							<th>Data Maret</th>
							<th>Data April</th>
							<th>MoM</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						foreach ($mvc_revenue as $data)
						{
						?>
									<tr>
										<td><?= $data['branch_cluster'] ?></td>
										<td><?= number_format(round($data['data_maret'])) ?></td>
										<td><?= number_format(round($data['data_april'])) ?></td>
										<td><?= number_format($data['data_maret_vs_april'],3) ?></td>
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
	</div>
	</div>
</main>
<?php
		break;
}
?>