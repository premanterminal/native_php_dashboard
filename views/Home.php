<?php
session_start();

$date =date("Y/m/d");
$newdate = strtotime ( '-2 day' , strtotime ( $date ) ) ;
$newdate = date ( 'd' , $newdate );
$fulldate = strtotime ( '-2 day' , strtotime ( $date ) ) ;
$fulldate = date ( 'Ymd' , $fulldate );

if(!is_loggedin())
{
	redirect('login');
}



switch($_GET['pilih'])
{
    default :
	
	try
	{
		//query tabel mom yoy ytd
		$stmt = dbConnection_228()->prepare("
		select tgl from tbl_sum_revenue_total_201812 order by tgl desc limit 1 ;
		");
		$stmt->execute();
		$tgl_vlr = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = dbConnection_228()->prepare("
		select mom_all, yoy_all, ytd_all from tbl_sum_achv_performance 
		where level_daerah like 'Branch ACEH' && period like '$fulldate'
		");
		$stmt->execute();
		$aceh = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select mom_all, yoy_all, ytd_all from tbl_sum_achv_performance 
		where level_daerah like 'Branch WESTERN MEDAN' && period like '$fulldate'
		");
		$stmt->execute();
		$western_medan = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select mom_all, yoy_all, ytd_all from tbl_sum_achv_performance 
		where level_daerah like 'Branch CENTRAL MEDAN' && period like '$fulldate'
		");
		$stmt->execute();
		$central_medan = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select mom_all, yoy_all, ytd_all from tbl_sum_achv_performance 
		where level_daerah like 'Branch PEMATANG SIANTAR' && period like '$fulldate'
		");
		$stmt->execute();
		$pematang_siantar = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select mom_all, yoy_all, ytd_all from tbl_sum_achv_performance 
		where level_daerah like 'Branch PADANG SIDEMPUAN' && period like '$fulldate'
		");
		$stmt->execute();
		$padang_sidempuan = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select mom_all, yoy_all, ytd_all from tbl_sum_achv_performance 
		where level_daerah like 'SUMBAGUT' && period like '$fulldate'
		");
		$stmt->execute();
		$sumbagut = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}

?>


<head>
<link rel="stylesheet" href="views/assets/map/ammap/ammap.css" type="text/css">
        <script src="views/assets/map/ammap/ammap.js" type="text/javascript"></script>
        <!-- check ammap/maps/js/ folder to see all available countries -->
        <!-- map file should be included after ammap.js -->
		<script src="views/assets/map/ammap/maps/js/indonesiaHigh.js" type="text/javascript"></script>
        <script>

			var map;

			AmCharts.ready(function() {
			    map = new AmCharts.AmMap();


			    map.balloon.color = "#000000";

			    var dataProvider = {
			        mapVar: AmCharts.maps.indonesiaHigh,
			        getAreasFromMap:true
			    };

			    map.dataProvider = dataProvider;

			    map.areasSettings = {
			        autoZoom: true,
			        selectedColor: "#CC0000"
			    };

			    map.smallMap = new AmCharts.SmallMap();

			    map.write("mapdiv");

			});

        </script>
		<script>
			function myMap() {
			var mapProp= {
				center:new google.maps.LatLng(-0.251351,100.749397),
				zoom:5,
			};
			var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
			}

			//document.body.style.zoom="75%";
		</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
		
</head>
<body >
<main>
<table class="table table-striped table-responsive" align="center">
	<tr>
		<td align="center">
			<section class="pb-3 .col-4" align="center">
				<section class="pb-3" align="center">
				<h3 class="card-header green white-text" style="font-size:13px;width: 150px"><b>SUMBAGUT</b></h3>
					<div class="card" style="width: 150px;height: 125px">
						<div class="card-body">
							<div class="card-body" align="center">
								<table class="collapstable table table-sm table-striped table-hover mb-0">
								<thead>
								</thead>
								<tbody>
								<?php
									$i=0;
									foreach ($sumbagut as $data)
									{
								?>
										<tr><b>
											<td style="color: black; font-size: 11px">MoM</td>
											<?php
											if($data['mom_all'] < 0)
											{
												echo '<td style="color: red; font-size: 11px "><b>'.number_format($data['mom_all'],2).'</td>';
											}
											else
											{
												echo '<td style="color: black; font-size: 11px"><b>'.number_format($data['mom_all'],2).'</td>';
											}
											?>
										</b></tr>
										<tr><b> 
											<td style="color: black; font-size: 11px">YoY</td>
											<?php
											if($data['yoy_all'] < 0)
											{
												echo '<td style="color: red; font-size: 11px"><b>'.number_format($data['yoy_all'],2).'</td>';
											}
											else
											{
												echo '<td style="color: black; font-size: 11px"><b>'.number_format($data['yoy_all'],2).'</td>';
											}
											?>
										</b></tr>
										<tr><b> 
											<td style="color: black; font-size: 11px">Ytd</td>
											<?php
											if($data['ytd_all'] < 0)
											{
												echo '<td style="color: red; font-size: 11px"><b>'.number_format($data['ytd_all'],2).'</td>';
											}
											else
											{
												echo '<td style="color: black; font-size: 11px"><b>'.number_format($data['ytd_all'],2).'</td>';
											}
											?>
										</b></tr>
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
				<section class="pb-3" align="center">
				<h3 class="card-header red white-text" style="font-size:13px;width: 150px"><b>ACEH</b></h3>
					<div class="card" style="width: 150px;height: 125px">
						<div class="card-body">
							<div class="card-body" align="center">
								<table class="collaptable table table-sm table-striped table-hover mb-0">
								<thead>
								</thead>
								<tbody>
								<?php
									$i=0;
									foreach ($aceh as $data)
									{
								?>
										<tr><b>
											<td style="font-size: 11px">MoM</td>
											<?php
											if($data['mom_all'] < 0)
											{
												echo '<td style="color: red; font-size: 11px"><b>'.number_format($data['mom_all'],2).'</td>';
											}
											else
											{
												echo '<td style="color: black; font-size: 11px"><b>'.number_format($data['mom_all'],2).'</td>';
											}
											?>
										</b></tr>
										<tr><b> 
											<td style="font-size: 11px">YoY</td>
											<?php
											if($data['yoy_all'] < 0)
											{
												echo '<td style="color: red; font-size: 11px"><b>'.number_format($data['yoy_all'],2).'</td>';
											}
											else
											{
												echo '<td style="color: black; font-size: 11px"><b>'.number_format($data['yoy_all'],2).'</td>';
											}
											?>
										</b></tr>
										<tr><b> 
											<td style="font-size: 11px">Ytd</td>
											<?php
											if($data['ytd_all'] < 0)
											{
												echo '<td style="color: red; font-size: 11px"><b>'.number_format($data['ytd_all'],2).'</td>';
											}
											else
											{
												echo '<td style="color: black; font-size: 11px"><b>'.number_format($data['ytd_all'],2).'</td>';
											}
											?>
										</b></tr>
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
				<section class="pb-3" align="center">
				<h3 class="card-header red white-text" style="font-size:13px;width: 150px"><b>PADANG SIDEMPUAN</b></h3>
					<div class="card" style="width: 150px;height: 125px">
						<div class="card-body">
							<div class="card-body" align="center">
								<table class="collaptable table table-sm table-striped table-hover mb-0">
								<thead>
								</thead>
								<tbody>
								<?php
									$i=0;
									foreach ($padang_sidempuan as $data)
									{
								?>
										<tr><b>
											<td style="font-size: 11px">MoM</td>
											<?php
											if($data['mom_all'] < 0)
											{
												echo '<td style="color: red; font-size: 11px"><b>'.number_format($data['mom_all'],2).'</td>';
											}
											else
											{
												echo '<td style="color: black; font-size: 11px"><b>'.number_format($data['mom_all'],2).'</td>';
											}
											?>
										</b></tr>
										<tr><b> 
											<td style="font-size: 11px">YoY</td>
											<?php
											if($data['yoy_all'] < 0)
											{
												echo '<td style="color: red; font-size: 11px"><b>'.number_format($data['yoy_all'],2).'</td>';
											}
											else
											{
												echo '<td style="color: black; font-size: 11px"><b>'.number_format($data['yoy_all'],2).'</td>';
											}
											?>
										</b></tr>
										<tr><b> 
											<td style="font-size: 11px">Ytd</td>
											<?php
											if($data['ytd_all'] < 0)
											{
												echo '<td style="color: red; font-size: 11px"><b>'.number_format($data['ytd_all'],2).'</td>';
											}
											else
											{
												echo '<td style="color: black; font-size: 11px"><b>'.number_format($data['ytd_all'],2).'</td>';
											}
											?>
										</b></tr>
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
			</section>
		</td>
		<td align="center">
			<section class="pb-6 .col-8" align="center">
				<section>
					<h3 class="card-header red white-text" style="font-size:16px;width: 800px"><b>MCD SUMBAGUT <?Php  foreach ($tgl_vlr as $data) {print $data['tgl']. "\n";} ?> Desember 2018 </b></h3>
						<div class="card" style="width: 800px; height: 495px">
							<div class="card-body">
								<div class="card-body" align="center">
									<!--<div id="mapdiv" style="width: 700px; background-color:#EEEEEE; height: 460px;">-->
									<!--<div id="googleMap" style="width:100%;height:460px;"></div>-->
									<!--<div id="map-container-2" class="z-depth-1" style="height: 300px"></div>-->
									<div>
									<img style="width: 700px; height:460px;" src="views/assets/img/Presentasi-B.jpg" />
									</div>
								</div>
							</div>
						</div>
				</section>
			</section>
		</td>
		<td>
			    
<section class="pb-3 .col-4" align="center">
	<section class="pb-3" align="center">
	<h3 class="card-header red white-text" style="font-size:13px;width: 150px"><b>WESTERN MEDAN</b></h3>
					<div class="card" style="width: 150px;height: 125px">
			<div class="card-body">
				<div class="card-body" align="center">
					<table class="collaptable table table-sm table-striped table-hover mb-0">
					<thead>
					</thead>
					<tbody>
					<?php
						$i=0;
						foreach ($western_medan as $data)
						{
					?>
							<tr><b>
								<td style="font-size: 11px">MoM</td>
								<?php
								if($data['mom_all'] < 0)
								{
									echo '<td style="color: red; font-size: 11px"><b>'.number_format($data['mom_all'],2).'</td>';
								}
								else
								{
									echo '<td style="color: black; font-size: 11px"><b>'.number_format($data['mom_all'],2).'</td>';
								}
								?>
							</b></tr>
							<tr><b> 
								<td style="font-size: 11px">YoY</td>
								<?php
								if($data['yoy_all'] < 0)
								{
									echo '<td style="color: red; font-size: 11px"><b>'.number_format($data['yoy_all'],2).'</td>';
								}
								else
								{
									echo '<td style="color: black; font-size: 11px"><b>'.number_format($data['yoy_all'],2).'</td>';
								}
								?>
							</b></tr>
							<tr><b> 
								<td style="font-size: 11px">Ytd</td>
								<?php
								if($data['ytd_all'] < 0)
								{
									echo '<td style="color: red; font-size: 11px"><b>'.number_format($data['ytd_all'],2).'</td>';
								}
								else
								{
									echo '<td style="color: black; font-size: 11px"><b>'.number_format($data['ytd_all'],2).'</td>';
								}
								?>
							</b></tr>
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

	<section class="pb-3" align="center">
	<h3 class="card-header red white-text" style="font-size:13px;width: 150px"><b>CENTRAL MEDAN</b></h3>
					<div class="card" style="width: 150px;height: 125px">
			<div class="card-body">
				<div class="card-body" align="center">
					<table class="collaptable table table-sm table-striped table-hover mb-0">
					<thead>
					</thead>
					<tbody>
					<?php
						$i=0;
						foreach ($central_medan as $data)
						{
					?>
							<tr><b>
								<td style="font-size: 11px">MoM</td>
								<?php
								if($data['mom_all'] < 0)
								{
									echo '<td style="color: red; font-size: 11px"><b>'.number_format($data['mom_all'],2).'</td>';
								}
								else
								{
									echo '<td style="color: black; font-size: 11px"><b>'.number_format($data['mom_all'],2).'</td>';
								}
								?>
							</b></tr>
							<tr><b> 
								<td style="font-size: 11px">YoY</td>
								<?php
								if($data['yoy_all'] < 0)
								{
									echo '<td style="color: red; font-size: 11px"><b>'.number_format($data['yoy_all'],2).'</td>';
								}
								else
								{
									echo '<td style="color: black; font-size: 11px"><b>'.number_format($data['yoy_all'],2).'</td>';
								}
								?>
							</b></tr>
							<tr><b> 
								<td style="font-size: 11px">Ytd</td>
								<?php
								if($data['ytd_all'] < 0)
								{
									echo '<td style="color: red; font-size: 11px"><b>'.number_format($data['ytd_all'],2).'</td>';
								}
								else
								{
									echo '<td style="color: black; font-size: 11px"><b>'.number_format($data['ytd_all'],2).'</td>';
								}
								?>
							</b></tr>
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
	<section class="pb-3" align="center">
	<h3 class="card-header red white-text" style="font-size:13px;width: 150px"><b>PEMATANG SIANTAR</b></h3>
					<div class="card" style="width: 150px;height: 125px">
			<div class="card-body">
				<div class="card-body" align="center">
					<table class="collaptable table table-sm table-striped table-hover mb-0">
					<thead>
					</thead>
					<tbody>
					<?php
						$i=0;
						foreach ($pematang_siantar as $data)
						{
					?>
							<tr><b>
								<td style="font-size: 11px">MoM</td>
								<?php
								if($data['mom_all'] < 0)
								{
									echo '<td style="color: red; font-size: 11px"><b>'.number_format($data['mom_all'],2).'</td>';
								}
								else
								{
									echo '<td style="color: black; font-size: 11px"><b>'.number_format($data['mom_all'],2).'</td>';
								}
								?>
							</b></tr>
							<tr><b> 
								<td style="font-size: 11px">YoY</td>
								<?php
								if($data['yoy_all'] < 0)
								{
									echo '<td style="color: red; font-size: 11px"><b>'.number_format($data['yoy_all'],2).'</td>';
								}
								else
								{
									echo '<td style="color: black; font-size: 11px"><b>'.number_format($data['yoy_all'],2).'</td>';
								}
								?>
							</b></tr>
							<tr><b> 
								<td style="font-size: 11px">Ytd</td>
								<?php
								if($data['ytd_all'] < 0)
								{
									echo '<td style="color: red; font-size: 11px"><b>'.number_format($data['ytd_all'],2).'</td>';
								}
								else
								{
									echo '<td style="color: black; font-size: 11px"><b>'.number_format($data['ytd_all'],2).'</td>';
								}
								?>
							</b></tr>
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

	</section>
		</td>
	</tr>
</table>


</main>

</body>