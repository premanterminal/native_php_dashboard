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
		//query tabel mom yoy ytd
		$stmt = dbConnectiondata()->prepare("
		select mom_all, yoy_all, ytd_all from summary_performance
		where branch_cluster like 'Branch ACEH'
		");
		$stmt->execute();
		$aceh = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		select mom_all, yoy_all, ytd_all from summary_performance
		where branch_cluster like 'Branch WESTERN MEDAN'
		");
		$stmt->execute();
		$western_medan = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		select mom_all, yoy_all, ytd_all from summary_performance
		where branch_cluster like 'Branch CENTRAL MEDAN'
		");
		$stmt->execute();
		$central_medan = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		select mom_all, yoy_all, ytd_all from summary_performance
		where branch_cluster like 'Branch PEMATANG SIANTAR'
		");
		$stmt->execute();
		$pematang_siantar = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		select mom_all, yoy_all, ytd_all from summary_performance
		where branch_cluster like 'Branch PADANG SIDEMPUAN'
		");
		$stmt->execute();
		$padang_sidempuan = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		select mom_all, yoy_all, ytd_all from summary_performance
		where branch_cluster like 'SUMBAGUT'
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
		<h3>Handset Population</h3>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Resume')">Resume</button>
  <button class="tablinks" onclick="openCity(event, 'Details')">Details</button>
</div>

<div id="Resume" class="tabcontent">
  <h3>Resume</h3>
  <p>Resume Page</p>
</div>

<div id="Details" class="tabcontent">
  <h3>Details</h3>
  <p>Details Page</p> 
</div>

	</section>

</main>

</body>