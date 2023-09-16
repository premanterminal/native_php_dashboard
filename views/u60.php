<?php
session_start();

define('BL', true);

require_once('../common/config/DbController.php');
require_once('../common/controllers/CommonController.php');

$date =date("Y/m/d");
$newdate = strtotime ( '-3 day' , strtotime ( $date ) ) ;
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
		select a.branch, a.cluster, a.jlh_site, b.rev_cluster_lm, a.rev_cluster_now, 
		c.rev_cluster_lm as rev_fullmonth_lm, a.rev_cluster_now-c.rev_cluster_lm as incremental,
		((a.rev_cluster_now/c.rev_cluster_lm)-1)*100 as mom_rev_cluster
		from 
		(
		  select branch, cluster, count(distinct site_id) as jlh_site, sum(total) as rev_cluster_now,
		  sum(total)/count(distinct date) as avg_cluster_now 
		  from rev_site_u60_201811
		  where date between '2018-11-01' and '2018-11-$newdate'
		  group by cluster
		  order by branch,cluster
		) a
		left join
		(
		select branch, cluster, count(distinct site_id) as jlh_site, sum(total) as rev_cluster_lm,
		sum(total)/count(distinct date) as avg_cluster_lm
		from rev_site_u60_201810
		group by cluster
		order by branch,cluster
		) b
		on a.cluster = b.cluster
		left join
		(
		select branch, cluster, count(distinct site_id) as jlh_site, sum(total) as rev_cluster_lm,
		sum(total)/count(distinct date) as avg_cluster_lm
		from rev_site_u60_201810
		where date between '2018-10-01' and '2018-10-$newdate'
		group by cluster
		order by branch,cluster
		) c
		on b.cluster = c.cluster
		group by a.cluster
		order by a.branch,a.cluster;
		");
		$stmt->execute();
		$cluster = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		select a.branch, a.baseline_rev, a.rev_GAP, b.rev_ptd, b.projection_now ,a.Target_Juli, b.jlh_site,
  c.total_site_u60, (c.total_site_u60/b.jlh_site)*100 as ach_site , 
  b.projection_now-a.baseline_rev as inc_u60_branch
  from 
  (
    select branch, baseline_rev, rev_GAP, Target_Juli from tbl_sum_baseline_rev_201807) a
    left join
    (
        select branch, sum(total) as rev_ptd, (sum(total)/$newdate)*31 as projection_now, 
        count(distinct site_id) as jlh_site
        from rev_site_u60_201811
        group by branch
    ) b
    on a.branch = b.branch
    left join 
    (
        select b.branch, count(distinct b.site_id) as total_site_u60 from
        (
            select branch, sum(total) as rev_ptd, site_id, (sum(total)/$newdate)*31 as projection_now
            from rev_site_u60_201811
            group by site_id
        ) b
        where b.projection_now >=60000000
        group by b.branch
    )c
    on a.branch = c.branch
    group by a.branch
    order by a.branch;
		");
		$stmt->execute();
		$branch = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		
	}
	catch(PDOException $e)
	{
		//echo $e->getMessage();
	}
?>
<main>
    <section class="pb-4">
        <div class="card">
        	<h3 class="card-header deep-purple darken-4 white-text">U60 | Resume Per Cluster    <?Php echo"$newdate";?> November 2018 </h3>
            <div class="card-body">
            	<table class="table table-sm table-striped table-responsive" id="dataTables">
				<thead>
						<tr>
							<th style="color:#fff;background-color:#4527a0">BRANCH</th>
							<th style="color:#fff;background-color:#4527a0">CLUSTER</th>
							<th style="color:#fff;background-color:#4527a0">Jumlah Site U60</th>
							<th style="color:#fff;background-color:#4527a0">Revenue LM</th>
							<th style="color:#fff;background-color:#4527a0">Revenue LM Ptd</th>
							<th style="color:#fff;background-color:#4527a0">Revenue Ptd</th>
							<th style="color:#fff;background-color:#4527a0">Inc Revenue</th>
							<th style="color:#fff;background-color:#4527a0">Growth</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($cluster as $data)
						{
							
						?>
							<tr>
								<td style="text-align:left"><?= $data['branch']?></td>
								<td style="text-align:left"><?= $data['cluster']?></td>
								<td style="text-align:center"><?= number_format(round($data['jlh_site']))?></td>
								<td style="text-align:right"><?= number_format(round($data['rev_fullmonth_lm'])) ?></td>
								<td style="text-align:right"><?= number_format(round($data['rev_cluster_lm'])) ?></td>
								<td style="text-align:right"><?= number_format(round($data['rev_cluster_now'])) ?></td>
								<td style="text-align:right"><?= number_format(round($data['incremental'])) ?></td>
								<td style="text-align:center" ><?= number_format($data['mom_rev_cluster'],2) ?>%</td>
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
	<section class="pb-4">
        <div class="card">
        	<h3 class="card-header stylish-color-dark white-text">U60 | Resume Revenue PerBranch  <?Php echo"$newdate";?> November 2018 </h3>
            <div class="card-body">
            	<table class="table table-striped table-responsive-sm" id="dataTable1">
					<thead>
						<tr>
							<th style="color:#fff;background-color:#3E4551;text-align:center">Branch</th>
							<th style="color:#fff;background-color:#3E4551;text-align:center">Baseline Revenue</th>
							<th style="color:#fff;background-color:#3E4551;text-align:center">Revenue GAP</th>
							<th style="color:#fff;background-color:#3E4551;text-align:center">Revenue PTD</th>
							<th style="color:#fff;background-color:#3E4551;text-align:center">Revenue Projection</th>
							<th style="color:#fff;background-color:#3E4551;text-align:center">Target November</th>
							<th style="color:#fff;background-color:#3E4551;text-align:center">Grand Total</th>
							<th style="color:#fff;background-color:#3E4551;text-align:center">>60 Jt</th>
							<th style="color:#fff;background-color:#3E4551;text-align:center">% Ach Site</th>
							<th style="color:#fff;background-color:#3E4551;text-align:center">Inc Revenue</th>
						</tr>
						
					</thead>
					<tbody>
						<?php
						foreach ($branch as $data)
						{
							
						?>
							<tr>
								<td style="text-align:center"><?= $data['branch']?></td>
								<td style="text-align:center"><?= number_format(round($data['baseline_rev']))?></td>
								<td style="text-align:center"><?= number_format(round($data['rev_GAP']))?></td>
								<td style="text-align:center"><?= number_format(round($data['rev_ptd'])) ?></td>
								<td style="text-align:right"><?= number_format(round($data['projection_now'])) ?></td>
								<td style="text-align:right"><?= number_format(round($data['Target_Juli'])) ?></td>
								<td style="text-align:right"><?= number_format(round($data['jlh_site'])) ?></td>
								<td style="text-align:right" ><?= number_format(round($data['total_site_u60'])) ?></td>
								<td style="text-align:right"><?= number_format($data['ach_site'],2) ?>%</td>
								<td style="text-align:right" ><?= number_format(round($data['inc_u60_branch'])) ?></td>

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