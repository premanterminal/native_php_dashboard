<?php
session_start();

if(!is_loggedin())
{
	redirect('login');
}

switch($_GET['pilih'])
{
    default :
	
	try
	{
		//query tabel ado region
		$stmt = dbConnection_228()->prepare("
		Select * from tbl_sum_ado_region
		");
		$stmt->execute();
		$ado_region = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}

?>


<head>
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    -webkit-animation: fadeEffect 1s;
    animation: fadeEffect 1s;
}

/* Fade in tabs */
@-webkit-keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}

@keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}
</style>
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
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
		
</head>
<body style="background-color:#dddddd">
<main>
	<section>
		<h3>Data Operation</h3>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Market Potency')">A D O Region</button>
  <button class="tablinks" onclick="openCity(event, 'Mapping Market Potency')">A D O Branch</button>
  <button class="tablinks" onclick="openCity(event, 'Potensi Desa')">A D O Cluster</button>
</div>

<div id="Market Potency" class="tabcontent">
  <h3>A D O Region</h3>
  
  <p>A D O Region Page</p>
  	<section class="pb-4">
        <div class="card">
		        <h3 class="card-header red white-text">ADO REGION MEI 2018</h3>
				<div class="card-body">
				
            	<table class="table table-responsive" >
					<thead class="mdb-color lighten-4">
						<tr>
							<th> PARAMETER </th>
							<th> ACEH </th>
							<th> CENTRAL MEDAN </th>
							<th> PADANG SIDEMPUAN </th>
							<th> PEMATANG SIANTAR </th>
							<th> WESTERN MEDAN </th>
							<th> SUMBAGUT </th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=0;
						foreach ($ado_region as $data)
						{
						?>
									<tr>
										<td><?= $data['PARAMETER'] ?></td>
										<td><?= number_format(round($data['ACEH'])) ?></td>
										<td><?= number_format(round($data['CENTRAL_MEDAN'])) ?></td>
										<td><?= number_format(round($data['PADANG_SIDEMPUAN'])) ?></td>
										<td><?= number_format(round($data['PEMATANG_SIANTAR'])) ?></td>
										<td><?= number_format(round($data['WESTERN_MEDAN'])) ?></td>
										<td><?= number_format(round($data['SUMBAGUT'])) ?></td>
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

<div id="Mapping Market Potency" class="tabcontent">
  <h3>ADO Branch</h3>
  <p>ADO Branch Page</p> 
  			<div class=" text-center" >
				<br>
				<h1><b>Sorry. This Page is under construction.</b></h>
                <a href="#" class="pl-0" ><img style="width: 700px;" src="views/assets/img/undercons.png" /></a>
            </div>

</div>

<div id="Potensi Desa" class="tabcontent">
  <h3>ADO Cluster</h3>
  <p>ADO Cluster Page.</p>
  			<div class=" text-center" >
				<br>
				<h1><b>Sorry. This Page is under construction.</b></h>
                <a href="#" class="pl-0" ><img style="width: 700px;" src="views/assets/img/undercons.png" /></a>
            </div>

</div>

	</section>

</main>

</body>