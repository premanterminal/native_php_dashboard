<?php
session_start();

define('BL', true);

require_once('../common/config/DbController.php');
require_once('../common/controllers/CommonController.php');

date_default_timezone_set('Asia/Jakarta');
$servername="10.33.14.222";
$username="egi";
$password="egi12345";
$dbname="mcd";

mysql_connect($servername,$username,$password);
mysql_select_db($dbname);

$total_daily="
select a.tgl,a.revlastyear, b.revlastmonth, c.revnow
from 
(
   select bln, tgl, sum(revenue) as revlastyear
   from revenue_daily_total_cluster_lastyear
   group by tgl 
) a  
left join

(
   select bln, tgl, sum(revenue) as revlastmonth
   from revenue_daily_total_cluster_lastmonth
   group by tgl 
) b on a.tgl = b.tgl 
left join

(
   select bln, tgl, sum(revenue) as revnow
   from revenue_daily_total_cluster_now
   group by tgl 
) c on b.tgl = c.tgl
";
$rs0=mysql_query($total_daily);

$daily_l1=	"
select a.date, a.revvoice , b.revsms, c.revbroadband, d.revdigital
from 
(
    select date, level, l1, sum(revenue) as revvoice
    from revenue_daily_l1 
    where l1 like 'Voice P2P' && level like 'SUMBAGUT'
    group by date, level
    order by date, month
)a left join 
(
    select date, level, l1, sum(revenue) as revsms
    from revenue_daily_l1 
    where l1 like 'SMS P2P' && level like 'SUMBAGUT'
    group by date, level
    order by date, month
)b on a.date = b.date
left join
(
    select date, level, l1, sum(revenue) as revbroadband
    from revenue_daily_l1 
    where l1 like 'Broadband' && level like 'SUMBAGUT'
    group by date, level
    order by date, month
)c on a.date = c.date
left join
(
    select date, level, l1, sum(revenue) as revdigital
    from revenue_daily_l1 
    where l1 like 'Digital Services' && level like 'SUMBAGUT'
    group by date, level
    order by date, month
)d on a.date = d.date
group by a.date
order by a.date";

$rs1=mysql_query($daily_l1);

mysql_connect($servername,$username,$password);
mysql_select_db($dbname);

if(!is_loggedin())
{
	redirect('login');
}

switch($_GET['pilih'])
{
    default :
?>

<main>
    <?php
    if(isset($success))
    {
    ?>
    <section class="content-header">
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?= $success; ?>
        </div>
    </section>
    <?php
    }
    elseif(isset($error))
    {
    ?>
    <section class="content-header">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?= $error; ?>
        </div>
    </section>
    <?php
    }
    ?>
    <div class="row">
		<div class="col-lg-4 col-md-12">
			<section class="pb-4">
				<div class="card">
					<h3 class="card-header blue-gradient white-text">GROWTH VLR SUMBAGUT</h3>
					<div class="card-body">
						
						<div class="table-responsive fixed-table-body">
							<table class="collaptable table table-sm table-striped" class="table table-hover mb-0">
								<thead>
									<tr style="border:1px solid black">
										<th rowspan="2" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3.5px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#ff1a1a;text-align:center;vertical-align:center"><b>DATE</b></th>
										<th colspan="3" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3.5px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#660066;text-align:center;vertical-align:top"><b>Absolute Revenue<b></th>                                    
									</tr>
									<tr style="border:1px solid black">
										<td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#0099ff;text-align:center;vertical-align:top"><b>Last Year</b></td>
										<td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#0099ff;text-align:center;vertical-align:top"><b>Last Month</b></td>
										<td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#0099ff;text-align:center;vertical-align:top"><b>Now</b></td>
										</tr>
								</thead>
								<tbody>
									<tr>
									<?php
									while($rw=mysql_fetch_object($rs0))
									{
										echo '
											<tr style="border:1px solid black">
												<td style="background-color:#fff;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:center;vertical-align:top">'.$rw->tgl.'</td>
												<td style="background-color:#fff;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->revlastyear,2).' </td>
												<td style="background-color:#fff;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->revlastmonth,2).' </td>
												<td style="background-color:#fff;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->revnow,2).' </td>
											</tr>
										';
									}
									
									?>
									</tr>
									
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="col-lg-8 col-md-12" >
			<section class="pb-4" >
				<div class="card" >
					<h3 class="card-header blue-gradient white-text">Grafik Revenue VLR SUMBAGUT</h3>
					<div class="card-body">
						<div id="script" style="margin: 0 auto"></div>
						<div class="row" align="center">
                    		<div class="col-lg-4 col-md-12">
                        		<select id="branch" name="branch" class="mdb-select" required>
                                    <option value="" disabled selected>Pilih Branch</option>
                                    <?php 
                                    foreach($branch as $row) { ?>
                                    <option value="<?= $row['id_branch']; ?>"><?= $row['nama_branch']; ?></option>
                                    <?php } ?>
                                </select>
                        	</div>
                        	<div class="col-lg-4 col-md-12">
                                <select id="cluster" name="cluster" class="mdb-select" required disabled>
                                    <option value="" disabled selected>Pilih Cluster</option>
                                </select>
                        	</div>
                        	<div class="col-lg-4 col-md-12">
                                <select id="bulan" name="bulan" class="mdb-select" required disabled>
                                    <option value="" disabled selected>Pilih Bulan</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                        	</div>
                    	</div>
						<div class="row" align="center">
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<section class="pb-4" align="center">
				<div class="card-body">
					<div class="card">
					<h3 class="card-header blue-gradient white-text">VLR SUMBAGUT</h3>
					<div class="card-body" align="center">
						<div class="table-responsive fixed-table-body">
							<table class="collaptable table table-sm table-striped" class="table table-hover mb-0">
                            <thead>
                                <tr style="border:1px solid black">
                                    <th rowspan="2" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#ff1a1a;text-align:center;vertical-align:top"><b>BRANCH<br>----<br>CLUSTER</b></th>
                                    <th colspan="3" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#660066;text-align:center;vertical-align:top"><b>Absolute Revenue<b></th>
									<th colspan="3" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#660066;text-align:center;vertical-align:top"><b>Revenue All<b></th>
                                    <th colspan="3" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#660066;text-align:center;vertical-align:top"><b>Voice<b></th>
                                    <th colspan="3" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#660066;text-align:center;vertical-align:top"><b>SMS<b></th>
                                    <th colspan="3" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#660066;text-align:center;vertical-align:top"><b>Broadband<b></th>
                                    <th colspan="3" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#660066;text-align:center;vertical-align:top"><b>Digital Service<b></th>
                                    
                                </tr>
                                <tr style="border:1px solid black">
                                    <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#0099ff;text-align:center;vertical-align:top"><b>Last Year</b></td>
                                    <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#0099ff;text-align:center;vertical-align:top"><b>Last Month</b></td>
                                    <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#0099ff;text-align:center;vertical-align:top"><b>Now</b></td>
									
                                    <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#0099ff;text-align:center;vertical-align:top"><b>MoM</b></td>
                                    <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#0099ff;text-align:center;vertical-align:top"><b>YoY</b></td>
                                    <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#0099ff;text-align:center;vertical-align:top"><b>YTD</b></td>
                                    
                                    <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#0099ff;text-align:center;vertical-align:top"><b>MoM</b></td>
                                    <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#0099ff;text-align:center;vertical-align:top"><b>YoY</b></td>
                                    <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#0099ff;text-align:center;vertical-align:top"><b>YTD</b></td>
                                    
                                    <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#0099ff;text-align:center;vertical-align:top"><b>MoM</b></td>
                                    <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#0099ff;text-align:center;vertical-align:top"><b>YoY</b></td>
                                    <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#0099ff;text-align:center;vertical-align:top"><b>YTD</b></td>

                                    <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#0099ff;text-align:center;vertical-align:top"><b>MoM</b></td>
                                    <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#0099ff;text-align:center;vertical-align:top"><b>YoY</b></td>
                                    <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#0099ff;text-align:center;vertical-align:top"><b>YTD</b></td>

                                    <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#0099ff;text-align:center;vertical-align:top"><b>MoM</b></td>
                                    <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#0099ff;text-align:center;vertical-align:top"><b>YoY</b></td>
                                    <td style="font-family:Arial, sans-serif;font-size:11px;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#0099ff;text-align:center;vertical-align:top"><b>YTD</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1" data-parent="">
                                    <td>ACEH</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr data-id="6" data-parent="1">
                                    <td>Banda Aceh</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                 <tr data-id="7" data-parent="1">
                                    <td>Lhokseumawe</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr data-id="8" data-parent="1">
                                    <td>Meulaboh</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr data-id="2" data-parent="">
                                    <td>Western Medan</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr data-id="9" data-parent="2">
                                    <td>Langsa</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr data-id="10" data-parent="2">
                                    <td>Binjai</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr data-id="3" data-parent="">
                                    <td>Central Medan</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr data-id="11" data-parent="3">
                                    <td>Lubuk Pakam</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr data-id="12" data-parent="3">
                                    <td>Medan Inner</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr data-id="13" data-parent="3">
                                    <td>Medan Outer</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr data-id="4" data-parent="">
                                    <td>Pematang Siantar</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr data-id="15" data-parent="4">
                                    <td>Kisaran</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr data-id="16" data-parent="4">
                                    <td>Kaban Jahe</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr data-id="17" data-parent="4">
                                    <td>Pematang Siantar</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr data-id="5" data-parent="">
                                    <td>Padang Sidempuan</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr data-id="18" data-parent="5">
                                    <td>Padang Sidempuan</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr data-id="19" data-parent="5">
                                    <td>Rantau Prapat</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr data-id="20" data-parent="5">
                                    <td>Sibolga</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr style="border:1px solid black">
                                    <td style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#ff1a1a;text-align:center;vertical-align:top"><b><br>SUMBAGUT</b></td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            </tbody>
                        </table>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-12">
			<section class="pb-4">
				<div class="card">
					<h3 class="card-header blue-gradient white-text">REVENUE VLR L1 SUMBAGUT</h3>
					<div class="card-body">
						<div class="table-responsive fixed-table-body">
							<table class="collaptable table table-sm table-striped" class="table table-hover mb-0">
								<thead>
                                <tr style="border:1px solid black">
                                    <th rowspan="2" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#ff1a1a;text-align:center;vertical-align:top"><b>DATE</b></th>
									<th rowspan="2" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#660066;text-align:center;vertical-align:top"><b>Voice P2P<b></th>
                                    <th rowspan="2" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#660066;text-align:center;vertical-align:top"><b>SMS P2P<b></th>
									<th rowspan="2" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#660066;text-align:center;vertical-align:top"><b>Broadband<b></th>
                                    <th rowspan="2" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#660066;text-align:center;vertical-align:top"><b>Digital Services<b></th>
                                    
                                </tr>
								</thead>
								<tbody>
                                <tr>
									<?php
									while($rw=mysql_fetch_object($rs1))
									{
										echo '
										<tr style="border:1px solid black">
											<td style="background-color:#fff;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:left;vertical-align:top">'.$rw->date.'</td>
											<td style="background-color:#fff;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:left;vertical-align:top">'.number_format($rw->revvoice,2).' </td>
											<td style="background-color:#fff;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->revsms,2).' </td>
											<td style="background-color:#fff;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->revbroadband,2).' </td>
											<td style="background-color:#fff;font-family:Verdana, sans-serif;font-size:11px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;text-align:right;vertical-align:top">'.number_format($rw->revdigital,2).' </td>
										</tr>
										';
									}
								
									?>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
			</section>
		</div>
		<div class="col-lg-8 col-md-12" >
			<section class="pb-4" >
				<div class="card" >
				<h3 class="card-header blue-gradient white-text">Total Revenue SUMBAGUT</h3>
			<div class="card-body">
				<div id="scriptx" style="margin: 0 auto"></div>
				<div class="row" align="center">
					<div class="col-lg-4 col-md-12">
						<select id="branch" name="branch" class="mdb-select" required>
							<option value="" disabled selected>Branch</option>
							<option value="all">All</option>
							<option value="1">Aceh</option>
							<option value="2">Western Medan</option>
							<option value="3">Central Medan</option>
							<option value="4">Pematang Siantar</option>
							<option value="5">Padang Sidempuan</option>
						</select>
					</div>
					<div class="col-lg-4 col-md-12">
						<select id="cluster" name="cluster" class="mdb-select" required>
							<option value="" disabled selected>Cluster</option>
						</select>
					</div>
					<div class="col-lg-4 col-md-12">
						<select id="bulan" name="bulan" class="mdb-select" required disabled>
							<option value="" disabled selected>Bulan</option>
							<option value="1">Januari</option>
							<option value="2">Februari</option>
							<option value="3">Maret</option>
							<option value="4">April</option>
							<option value="5">Mei</option>
							<option value="6">Juni</option>
							<option value="7">Juli</option>
							<option value="8">Agustus</option>
							<option value="9">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select>
					</div>
				</div>
				<div class="row" align="center">
				</div>
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