<?php
session_start();

define('BL', true);

require_once('../common/config/DbController.php');
require_once('../common/controllers/CommonController.php');
require_once('../controllers/BranchClusterController.php');
require_once('../controllers/RevenueController.php');

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
		select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
		sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
		sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
		sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
		sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
		sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
		sum(rev31) as '31'
		from tbl_Extended_Pivot_dashboard_now
		where cluster like 'Branch%'  && bln like '09'
		");
		$stmt->execute();
		$now = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = dbConnectiondata()->prepare("
		select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
		sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
		sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
		sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
		sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
		sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
		sum(rev31) as '31'
		from tbl_Extended_Pivot_dashboard_lastmonth
		where cluster like 'Branch%'  && bln like '08'
		");
		$stmt->execute();
		$lastmonth = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = dbConnectiondata()->prepare("
		select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
		sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
		sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
		sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
		sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
		sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
		sum(rev31) as '31'
		from tbl_Extended_Pivot_dashboard_lastyear
		where cluster like 'Branch%'  && bln like '09'
		");
		$stmt->execute();
		$lastyear = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		
		//query revenue l1
		$stmt = dbConnectiondata()->prepare("
		select l1, 
		 rev01  as '1',  rev02  as '2',  rev03  as '3',  rev04  as '4',  rev05  as '5',
		 rev06  as '6',  rev07  as '7',  rev08  as '8',  rev09  as '9',  rev10  as '10',
		 rev11  as '11',  rev12  as '12',  rev13  as '13',  rev14  as '14',  rev15  as '15',
		 rev16  as '16',  rev17  as '17',  rev18  as '18',  rev19  as '19',  rev20  as '20',
		 rev21  as '21',  rev22  as '22',  rev23  as '23',  rev24  as '24',  rev25  as '25',
		 rev26  as '26',  rev27  as '27',  rev28  as '28',  rev29  as '29',  rev30  as '30',
		 rev31  as '31'
		from tbl_Extended_Pivot_Pretty_revenue_daily_l1
		group by l1
		order by l1 desc
		");
		$stmt->execute();
		$l1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		//query revenue l1 voice
		$stmt = dbConnectiondata()->prepare("
		select l1, 
		 sum(rev01)/2  as '1',  sum(rev02)/2  as '2',  sum(rev03)/2  as '3',  sum(rev04)/2  as '4',  sum(rev05)/2  as '5',
		 sum(rev06)/2  as '6',  sum(rev07)/2  as '7',  sum(rev08)/2  as '8',  sum(rev09)/2  as '9',  sum(rev10)/2  as '10',
		 sum(rev11)/2  as '11',  sum(rev12)/2  as '12',  sum(rev13)/2  as '13',  sum(rev14)/2  as '14',  sum(rev15)/2  as '15',
		 sum(rev16)/2  as '16',  sum(rev17)/2  as '17',  sum(rev18)/2  as '18',  sum(rev19)/2  as '19',  sum(rev20)/2  as '20',
		 sum(rev21)/2  as '21',  sum(rev22)/2  as '22',  sum(rev23)/2  as '23',  sum(rev24)/2  as '24',  sum(rev25)/2  as '25',
		 sum(rev26)/2  as '26',  sum(rev27)/2  as '27',  sum(rev28)/2  as '28',  sum(rev29)/2  as '29',  sum(rev30)/2  as '30',
		 sum(rev31)/2  as '31'
		from tbl_Extended_Pivot_Pretty_revenue_daily_l1
		where l1 like 'Voice P2P' && level like 'Branch%'
		group by l1
		order by l1 desc
		");
		$stmt->execute();
		$voice = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		//query revenue l1 sms
		$stmt = dbConnectiondata()->prepare("
		select l1, 
		 sum(rev01)/2  as '1',  sum(rev02)/2  as '2',  sum(rev03)/2  as '3',  sum(rev04)/2  as '4',  sum(rev05)/2  as '5',
		 sum(rev06)/2  as '6',  sum(rev07)/2  as '7',  sum(rev08)/2  as '8',  sum(rev09)/2  as '9',  sum(rev10)/2  as '10',
		 sum(rev11)/2  as '11', sum(rev12)/2  as '12',  sum(rev13)/2  as '13',  sum(rev14)/2  as '14',  sum(rev15)/2  as '15',
		 sum(rev16)/2  as '16',  sum(rev17)/2  as '17',  sum(rev18)/2  as '18',  sum(rev19)/2  as '19',  sum(rev20)/2  as '20',
		 sum(rev21)/2  as '21',  sum(rev22)/2  as '22',  sum(rev23)/2  as '23',  sum(rev24)/2  as '24',  sum(rev25)/2  as '25',
		 sum(rev26)/2  as '26',  sum(rev27)/2  as '27',  sum(rev28)/2  as '28',  sum(rev29)/2  as '29',  sum(rev30)/2  as '30',
		 sum(rev31)/2  as '31'
		from tbl_Extended_Pivot_Pretty_revenue_daily_l1
		where l1 like 'SMS P2P' && level like 'Branch%'
		group by l1
		order by l1 desc
		");
		$stmt->execute();
		$sms = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		//query revenue l1 broadband
		$stmt = dbConnectiondata()->prepare("
		select l1, 
		 sum(rev01)/2  as '1',  sum(rev02)/2  as '2',  sum(rev03)/2  as '3',  sum(rev04)/2  as '4',  sum(rev05)/2  as '5',
		 sum(rev06)/2  as '6',  sum(rev07)/2  as '7',  sum(rev08)/2  as '8',  sum(rev09)/2  as '9',  sum(rev10)/2  as '10',
		 sum(rev11)/2  as '11',  sum(rev12)/2  as '12',  sum(rev13)/2  as '13',  sum(rev14)/2  as '14',  sum(rev15)/2  as '15',
		 sum(rev16)/2  as '16',  sum(rev17)/2  as '17',  sum(rev18)/2  as '18',  sum(rev19)/2  as '19',  sum(rev20)/2  as '20',
		 sum(rev21)/2  as '21',  sum(rev22)/2  as '22',  sum(rev23)/2  as '23',  sum(rev24)/2  as '24',  sum(rev25)/2  as '25',
		 sum(rev26)/2  as '26',  sum(rev27)/2  as '27',  sum(rev28)/2  as '28',  sum(rev29)/2  as '29',  sum(rev30)/2  as '30',
		 sum(rev31)/2  as '31'
		from tbl_Extended_Pivot_Pretty_revenue_daily_l1
		where l1 like 'Broadband' && level like 'Branch%'
		group by l1
		order by l1 desc
		");
		$stmt->execute();
		$broadband = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		//query revenue l1 digital services
		$stmt = dbConnectiondata()->prepare("
		select l1, 
		 sum(rev01)/2  as '1',  sum(rev02)/2  as '2',  sum(rev03)/2  as '3',  sum(rev04)/2  as '4',  sum(rev05)/2  as '5',
		 sum(rev06)/2  as '6',  sum(rev07)/2  as '7',  sum(rev08)/2  as '8',  sum(rev09)/2  as '9',  sum(rev10)/2  as '10',
		 sum(rev11)/2  as '11',  sum(rev12)/2  as '12',  sum(rev13)/2  as '13',  sum(rev14)/2  as '14',  sum(rev15)/2  as '15',
		 sum(rev16)/2  as '16',  sum(rev17)/2  as '17',  sum(rev18)/2  as '18',  sum(rev19)/2  as '19',  sum(rev20)/2  as '20',
		 sum(rev21)/2  as '21',  sum(rev22)/2  as '22',  sum(rev23)/2  as '23',  sum(rev24)/2  as '24',  sum(rev25)/2  as '25',
		 sum(rev26)/2  as '26',  sum(rev27)/2  as '27',  sum(rev28)/2  as '28',  sum(rev29)/2  as '29',  sum(rev30)/2  as '30',
		 sum(rev31)/2  as '31'
		from tbl_Extended_Pivot_Pretty_revenue_daily_l1
		where l1 like 'Digital Services' && level like 'Branch%'
		group by l1
		order by l1 desc
		");
		$stmt->execute();
		$digital_services = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		select *
		from tbl_Extended_Pivot_Pretty_revenue_daily_l1
		group by l1
		");
		$stmt->execute();
		$l1_notsum = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}

	$all_branch = getAllBranch();
    $branch = json_decode($all_branch, true);

    function fn_vlr_email()
    {
      $const   = mysql_connect("10.33.14.222","egi","egi12345");
      $db      = mysql_select_db("mcd");
      
      
      $tg10    = "select date_format(date_sub(now(),interval 1 day),'%d-%m-%Y') as tgl";
      $rtg10   = mysql_query($tg10);
      $rwtg10  = mysql_fetch_object($rtg10);
      $tgl     = $rwtg10->tgl;
      
      $tg11    = "select date_format(date_sub(now(),interval 1 day),'%W') as hari";
      $rtg11   = mysql_query($tg11);
      $rwtg11  = mysql_fetch_object($rtg11);
      $day     = $rwtg11->hari;
      
      $tg12    = "select date_format(date_sub(now(),interval 1 day),'%Y-%m-%d') as tgl";
      $rtg12   = mysql_query($tg12);
      $rwtg12  = mysql_fetch_object($rtg12);
      $tgls    = $rwtg12->tgl;
      $font     = "style=\font-size:11px;";
	}
	?>
<head></head>
<body >
<main >
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
	
		<section class="pb-4" >
		<div class="card" >
			<div class="card-body">
				<div class="row" align="center">
            		<div class="col-lg-6 col-md-12">
                		<select id="branch_scripty" name="branch_scripty" class="mdb-select" required>
                            <option value="" disabled selected>Pilih Branch</option>
                            <option value="">SUMBAGUT</option>
                            <?php 
                            foreach($branch as $row) { ?>
                            <option value="<?= $row['id_branch']; ?>"><?= $row['nama_branch']; ?></option>
                            <?php } ?>
                        </select>
                	</div>
                	<div class="col-lg-6 col-md-12">
                        <select id="cluster_scripty" name="cluster_scripty" class="mdb-select" required disabled>
                            <option value="" disabled selected>Pilih Cluster</option>
                        </select>
                	</div>
                	<!--<div class="col-lg-4 col-md-12">
                        <select id="bulan_script" name="bulan_script" class="mdb-select" required disabled>
                            <option value="" disabled selected>Pilih Bulan</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                	</div>-->
            	</div>

				<div id="scripty" style="margin: 0 auto"></div>
				
				<div class="table-responsive fixed-table-body">
					<table class="collaptable table table-sm table-striped table-hover mb-0">
						<thead>
							<tr id="tanggal_scripty" style="border:1px solid black">
								<th rowspan="2" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3.5px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#ff1a1a;text-align:center;vertical-align:center"><b>DATE</b></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							foreach ($lastyear as $data)
							{
							?>
                            <tr id="last_year_y" data-id="1" data-parent=""> 
                                <td>Lastyear (Sept '17)</td>
								<td style="font-size:11px"><?= number_format($data['1'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['2'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['3'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['4'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['5'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['6'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['7'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['8'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['9'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['10'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['11'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['12'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['13'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['14'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['15'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['16'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['17'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['18'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['19'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['20'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['21'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['22'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['23'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['24'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['25'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['26'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['27'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['28'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['29'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['30'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['31'],1) ?></td>
                            </tr>
							<?php
								$i++;
							}
							?>
							<?php
							$i=0;
							foreach ($lastmonth as $data)
							{
							?>
                            <tr id="last_month_y" data-id="1" data-parent=""> 
                                <td>M-2 (Aug '18)</td>
								<td style="font-size:11px"><?= number_format($data['1'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['2'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['3'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['4'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['5'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['6'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['7'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['8'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['9'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['10'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['11'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['12'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['13'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['14'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['15'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['16'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['17'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['18'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['19'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['20'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['21'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['22'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['23'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['24'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['25'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['26'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['27'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['28'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['29'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['30'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['31'],1) ?></td>
                            </tr>
							<?php
								$i++;
							}
							?>
							<?php
							$i=0;
							foreach ($now as $data)
							{
							?>
                            <tr id="now_y" data-id="1" data-parent=""> 
                                <td>M-1 (Sept '18)</td>
								<td style="font-size:11px"><?= number_format($data['1'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['2'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['3'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['4'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['5'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['6'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['7'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['8'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['9'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['10'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['11'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['12'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['13'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['14'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['15'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['16'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['17'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['18'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['19'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['20'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['21'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['22'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['23'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['24'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['25'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['26'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['27'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['28'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['29'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['30'],1) ?></td>
								<td style="font-size:11px"><?= number_format($data['31'],1) ?></td>
                            </tr>
							<?php
								$i++;
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>

</main>
</body>
<?php
        break;
}
?>