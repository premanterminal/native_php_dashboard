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
		select p.BRANCH, p.CLUSTER, p.Site_id,p.SiteName, q.TotOct, q.AvgOct, p.TotSept, p.AvgSept
		from
		(
		  select a.BRANCH, a.CLUSTER, a.site_id, a.site_name as SiteName, sum(b.total) as TotSept, 
		  count(distinct b.date) jrevSept , sum(b.total)/count(distinct b.date) as AvgSept
		  from site_untapped_sbu a inner join rev_untapped_rpmb_201811 b
		  on a.Site_id = b.Site_ID
		  group by Site_ID
		  order by BRANCH,CLUSTER
		) p
		left join
		(
		  select a.BRANCH, a.CLUSTER, a.Site_ID, sum(b.total) as TotOct, 
		  count(distinct b.date) jrevOct , sum(b.total)/count(distinct b.date) as AvgOct
		  from site_untapped_sbu a inner join rev_untapped_rpmb_201810 b
		  on a.SIte_ID = b.Site_ID
		  where date like '2018-10-_%_%'
		  group by Site_ID
		  order by BRANCH,CLUSTER 
		) q
		on p.Site_ID = q.Site_ID
		group by Site_ID
		order by BRANCH,CLUSTER;
		");
		$stmt->execute();
		$blue_ocean = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		select x.branch, x.jlh_site_may, y.jlh_site_juni, z.jlh_site_juli, xx.jlh_site_aug, xy.jlh_site_sept, xz.jlh_site_sept as jlh_site_oct, 
		(xz.jlh_site_sept) as total_site,
		x.rev_site_may, y.rev_site_juni,z.rev_site_juli, xx.rev_site_aug, xy.rev_site_sept, xz.rev_site_sept as rev_site_oct,
		(x.rev_site_may+y.rev_site_juni+z.rev_site_juli+xx.rev_site_aug+xy.rev_site_sept+xz.rev_site_sept) as total_rev
		from
		(
			select a.branch,count( distinct b.site_id) as jlh_site_may, sum(b.rev_site) as rev_site_may
			from site_untapped_sbu a
			left join
			(
				select Site_ID, sum(Revenue) as rev_site from rev_site_untapped_market_201805
				group by Site_ID
			) b
			on a.site_id = b.Site_ID
			group by branch
		) x
		right join
		(
			select a.branch,count( distinct b.site_id) as jlh_site_juni, sum(b.rev_site) as rev_site_juni
			from site_untapped_sbu a
			left join
			(
				select Site_ID, sum(Revenue) as rev_site from rev_site_untapped_market_201806
				group by Site_ID
			) b
			on a.site_id = b.Site_ID
			group by branch
		)y
		on x.branch = y.branch
		left join
		(
			select a.branch,count( distinct b.site_id) as jlh_site_juli, sum(b.rev_site) as rev_site_juli
			from site_untapped_sbu a
			left join
			(
				select Site_ID, sum(Revenue) as rev_site from rev_site_untapped_market_201807
				group by Site_ID
			) b
			on a.site_id = b.Site_ID
			group by branch
		)z
		on y.branch = z.branch
		left join
		(
			select a.branch,count( distinct b.site_id) as jlh_site_aug, sum(b.rev_site) as rev_site_aug
			from site_untapped_sbu a
			left join
			(
				select Site_ID, sum(total) as rev_site from rev_untapped_rpmb_201808
				group by Site_ID
			) b
			on a.site_id = b.Site_ID
			group by branch
		)xx
		on y.branch = xx.branch
		left join
		(
			select branch,count( distinct site_id) as jlh_site_sept, 
			sum(total) as rev_site_sept
			from rev_untapped_rpmb_201809 
			group by branch

		)xy
		on xx.branch = xy.branch
		left join
		(
			select branch,count( distinct site_id) as jlh_site_sept, 
			sum(total) as rev_site_sept
			from rev_untapped_rpmb_201810 
			group by branch
		)xz
		on xy.branch = xz.branch
		group by branch
		order by branch;
		");
		$stmt->execute();
		$realisasi = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		
	}
	catch(PDOException $e)
	{
		//echo $e->getMessage();
	}
?>
<main>
    <section class="pb-4">
        <div class="card">
        	<h3 class="card-header deep-purple darken-4 white-text">Untapped Market | Resume Per SIte      <?Php echo"$newdate";?> November 2018 </h3>
            <div class="card-body">
            	<table class="table table-sm table-striped table-responsive" id="dataTables">
				<thead>
						<tr>
							<th style="color:#fff;background-color:#4527a0">BRANCH</th>
							<th style="color:#fff;background-color:#4527a0">CLUSTER</th>
							<th style="color:#fff;background-color:#4527a0">Site ID</th>
							<th style="color:#fff;background-color:#4527a0">Site Name</th>
							<th style="color:#fff;background-color:#4527a0">Revenue Last Month</th>
							<th style="color:#fff;background-color:#4527a0">Average Last Month</th>
							<th style="color:#fff;background-color:#4527a0">Revenue This Month</th>
							<th style="color:#fff;background-color:#4527a0">Average This Month</th>
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
										<td><?= $data['Site_id'] ?></td>
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
										<td><?= $data['Site_id'] ?></td>
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
										<td><?= $data['Site_id'] ?></td>
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
										<td><?= $data['Site_id'] ?></td>
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
	<section class="pb-4">
        <div class="card">
        	<h3 class="card-header light-blue darken-4 white-text">Untapped Market | Realisasi  <?Php echo"$newdate";?> November 2018 </h3>
            <div class="card-body">
            	<table class="table table-striped table-responsive-sm" id="dataTable1">
					<thead>
						<tr>
							<th rowspan="2" style="color:#fff;background-color:#01579b;text-align:center">BRANCH</th>
							<th colspan="6" style="color:#fff;background-color:#880e4f;text-align:center">REALISASI OA</th>
							<th colspan="7" style="color:#fff;background-color:#1b5e20;text-align:center">REALISASI REVENUE</th>
						</tr>
						<tr>
							<th style="color:#fff;background-color:#d81b60;text-align:center">OA May</th>
							<th style="color:#fff;background-color:#d81b60;text-align:center">OA Juni</th>
							<th style="color:#fff;background-color:#d81b60;text-align:center">OA Juli</th>
							<th style="color:#fff;background-color:#d81b60;text-align:center">OA November</th>
							<th style="color:#fff;background-color:#d81b60;text-align:center">OA September</th>
							<th style="color:#fff;background-color:#d81b60;text-align:center">OA November</th>
							<th style="color:#fff;background-color:#558b2f;text-align:center">Revenue May</th>
							<th style="color:#fff;background-color:#558b2f;text-align:center">Revenue Juni</th>
							<th style="color:#fff;background-color:#558b2f;text-align:center">Revenue Juli</th>
							<th style="color:#fff;background-color:#558b2f;text-align:center">Revenue Agustus</th>
							<th style="color:#fff;background-color:#558b2f;text-align:center">Revenue September</th>
							<th style="color:#fff;background-color:#558b2f;text-align:center">Revenue November</th>
							<th style="color:#fff;background-color:#558b2f;text-align:center">Revenue Total</th>
						</tr>
						
					</thead>
					<tbody>
						<?php
						foreach ($realisasi as $data)
						{
							
						?>
							<tr>
								<td><?= $data['branch'] ?></td>
								<td style="text-align:center"><?= number_format(round($data['jlh_site_may']))?></td>
								<td style="text-align:center"><?= number_format(round($data['jlh_site_juni']))?></td>
								<td style="text-align:center"><?= number_format(round($data['jlh_site_juli']))?></td>
								<td style="text-align:center"><?= number_format(round($data['jlh_site_aug']))?></td>
								<td style="text-align:center"><?= number_format(round($data['jlh_site_sept']))?></td>
								<td style="text-align:center"><?= number_format(round($data['jlh_site_oct']))?></td>
								<td style="text-align:right"><?= number_format(round($data['rev_site_may'])) ?></td>
								<td style="text-align:right"><?= number_format(round($data['rev_site_juni'])) ?></td>
								<td style="text-align:right"><?= number_format(round($data['rev_site_juli'])) ?></td>
								<td style="text-align:right"><?= number_format(round($data['rev_site_aug'])) ?></td>
								<td style="text-align:right"><?= number_format(round($data['rev_site_sept'])) ?></td>
								<td style="text-align:right"><?= number_format(round($data['rev_site_oct'])) ?></td>
								<td style="text-align:right" ><?= number_format(round($data['total_rev'])) ?></td>
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