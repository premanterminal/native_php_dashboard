<?php
session_start();

if(!is_loggedin())
{
	redirect('login');
}
?>
<header>
<!--<a href="?p=home" class="pl-0"><img src="views/assets/img/tigerfacelogo.jpg" /></a>-->
    <ul style="background-color:#fff" id="slide-out" class="side-nav fixed sn-bg-5 custom-scrollbar">
        <li class="logo-sn waves-effect">
            <div class=" text-center" >
                <a href="?p=home" class="pl-0" ><img style="width: 170px;" src="views/assets/img/Telkomsel_2013.png" /></a>
            </div>
        </li>
        <li>
            <ul class="collapsible collapsible-accordion">
                <li><a href="?p=home" class="collapsible-header waves-effect arrow-r"><i class="fa fa-tachometer"></i> Dashboard Map</a></li>
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-table"></i> Revenue Performansi<i class="fa fa-angle-down rotate-icon"></i></a>
				<div class="collapsible-body">
                        <ul>
							<li><a href="?p=under" class="waves-effect">Region Actual</a>
							<!--<li><a href="?p=region_data" class="waves-effect">Region Actual</a>-->
                            </li>
							<!--<li><a href="?p=under" class="waves-effect">Data Actual</a>-->
							<li><a href="?p=rev_total" class="waves-effect">Data Actual</a>
                            </li>
							<!--<li><a href="?p=under" class="waves-effect">Data Last Month</a>-->
							<li><a href="?p=lastmonth" class="waves-effect">Data Last Month</a>
                            </li>
						</ul>
				</div>
				<li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-table"></i> MKIOS VAS<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
							<!--<li><a href="?p=under" class="waves-effect">Mkios Data Chart</a>-->
							<li><a href="?p=mkiosdata_chart" class="waves-effect">Mkios Data Chart</a>
							</li>
							<!--<li><a href="?p=under" class="waves-effect">Mkios Voice Chart</a>-->
							<li><a href="?p=mkiosvoice_chart" class="waves-effect">Mkios Voice Chart</a>
                            </li>
                            <li><a href="?p=mkiosbulk_chart" class="waves-effect">Mkios Bulk Chart</a>
                            </li>
						</ul>
                    </div>
                </li>
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-table"></i> Data Program<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
							<!--<li><a href="?p=mt" class="waves-effect">My Telkomsel YNC</a>
							<!--<li><a href="?p=under" class="waves-effect">My Telkomsel YNC</a>
                            </li>-->
							<!--<li><a href="?p=REVMAIL" class="waves-effect">Revenue Target</a>
                            </li>
							<!--<li><a href="?p=prepaid_quadrant" class="waves-effect">Prepaid Quadrant Sumbagut</a>
                            </li>-->
							<!--<li><a href="?p=blue_ocean" class="waves-effect">Untapped</a>
                            </li>-->
							<!--<li><a href="?p=u60" class="waves-effect">U60</a>
                            </li>-->
							<!--<li><a href="?p=under" class="waves-effect">SIKAT</a>
                            </li>-->
							<!--<li><a href="?p=sikat" class="waves-effect">SIKAT</a>
                            </li>
							<!--<li><a href="?p=under" class="waves-effect">IMMO</a>
                            </li>-->
							<!--<li><a href="?p=IMMO" class="waves-effect">IMMO</a>
                            </li>-->
							
							<!--<li><a href="?p=under" class="waves-effect">LULR</a>
                            </li>-->
						</ul>
                    </div>
                </li>
				<li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-table"></i> Market Opportunity<i class="fa fa-angle-down rotate-icon"></i></a>
				<div class="collapsible-body">
                        <ul>
							<li><a href="?p=data_operation" class="waves-effect">Data Operasi</a>
                            </li>
							<li><a href="?p=under" class="waves-effect">Handset Population</a>
                            </li>
							<li><a href="?p=under" class="waves-effect">Market Audit</a>
                            </li>
							<li><a href="?p=under" class="waves-effect">Market Survey</a>
                            </li>
						</ul>
				</div>
				<li><a href="?p=KAPAN?" class="collapsible-header waves-effect"><i class="fa fa-table"></i> CALENDAR EVENT</a></li>
				<li><a href="?p=LULR" class="collapsible-header waves-effect arrow-r"><i class="fa fa-tachometer"></i> LULR</a></li>
                <li><a href="?p=whitelist" class="collapsible-header waves-effect"><i class="fa fa-bolt"></i> Whitelist</a></li>
				<!--<li><a href="?p=longlat" class="collapsible-header waves-effect"><i class="fa fa-bolt"></i> MAP </a></li>-->
				<li><a href="?p=cekmsisdn" class="collapsible-header waves-effect"><i class="fa fa-user"></i> Cek FLASH</a></li>
				<li><a href="?p=APACARIKKAK?" class="collapsible-header waves-effect"><i class="fa fa-user"></i> Cek VAS</a></li>
				<li><a href="?p=under" class="collapsible-header waves-effect"><i class="fa fa-user"></i> Mailrep Downloader</a></li>
				<!--<li><a href="?p=TAKER" class="collapsible-header waves-effect"><i class="fa fa-user"></i> Mailrep Downloader</a></li>-->

                <?php if(isAdmin()) { ?>
                <li><a href="?p=user" class="collapsible-header waves-effect"><i class="fa fa-user"></i> User</a></li>
				<li><a href="?p=history" class="collapsible-header waves-effect"><i class="fa fa-user"></i> History </a></li>
                <?php } ?>
            </ul>
        </li>
        <div class="sidenav-bg mask-strong"></div>
    </ul>

	
    <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav" style="color: #ffffff; background-color:#2e2e1f" >
        <div class="float-left">
            <a href="#" data-activates="slide-out" class="button-collapse white-text"><i class="fa fa-bars"></i></a>
        </div>
        <div class="breadcrumb-dn mr-auto" >
			<p><b>REGIONAL SUMBAGUT 9.0 TO 8.3 #ONE </b></p>
        </div>

        <ul class="nav navbar-nav nav-flex-icons ml-auto">
            <li class="nav-item dropdown" >
                <a class="nav-link dropdown-toggle waves-effect" style="color:#ffffff" href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i> <span class="clearfix d-none d-sm-inline-block" style="color:#ffffff"><?= $_SESSION['nama_lengkap']; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="?p=profil">Profil</a>
                    <a class="dropdown-item" href="?logout=true">Keluar</a>
                </div>
            </li>
        </ul>
    </nav>
	</div>
</header>

<?php
if($_GET['p']=='home')
{
	include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Home.php');
}
elseif($_GET['p']=='rev_total')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'RevTotal_x.php');
}
elseif($_GET['p']=='rev_totalx')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'RevTotal_x.php');
}
elseif($_GET['p']=='blue_ocean')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'BlueOcean.php');
}
elseif($_GET['p']=='hvc')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Hvc.php');
}
elseif($_GET['p']=='dor')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Dor.php');
}
elseif($_GET['p']=='rame')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Rame.php');
}
elseif($_GET['p']=='cities')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Cities.php');
}
elseif($_GET['p']=='whitelist')
{
	include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Whitelist.php');
}
elseif($_GET['p']=='user')
{
	include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'User.php');
}
elseif($_GET['p']=='profil')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Profil.php');
}
elseif($_GET['p']=='history')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'History.php');
}
elseif($_GET['p']=='eo')
{
	include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'DirectSellingEO.php');
}
elseif($_GET['p']=='prepaidreg')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Prepaid_Reg.php');
}
elseif($_GET['p']=='prepaidpoin')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Prepaid_Outlet.php');
}
elseif($_GET['p']=='mkiosdata')
{
	include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mkiosdata.php');
}
elseif($_GET['p']=='mkiosvoice')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mkiosvoice.php');
}
elseif($_GET['p']=='mkiosbulk')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mkiosbulk.php');
}
elseif($_GET['p']=='memo')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'memo.php');
}
elseif($_GET['p']=='ibc_upgrade')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'IBC_UG.php');
}
elseif($_GET['p']=='ibc_downgrade')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'IBC_DG.php');
}
elseif($_GET['p']=='ibc_lapse')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'IBC_LAPSE.php');
}
elseif($_GET['p']=='rame_btl')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'RAME_Broadband.php');
}
elseif($_GET['p']=='lastmonth')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'lastrmonth.php');
}
elseif($_GET['p']=='mkiosdata_chart')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mkiosdata_chart.php');
}
elseif($_GET['p']=='mkiosvoice_chart')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mkiosvoice_chart.php');
}
elseif($_GET['p']=='mkiosbulk_chart')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mkiosbulk_chart.php');
}
elseif($_GET['p']=='mkiosbulk_chart_coba')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mkiosbulk_chart_x.php');
}
elseif($_GET['p']=='longlat')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'geolocation.html');
}
elseif($_GET['p']=='data_operation')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'data_operation.php');
}
elseif($_GET['p']=='handset_population')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'handset_population.php');
}
elseif($_GET['p']=='market_audit')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'x.php');
}
elseif($_GET['p']=='mt')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mt_dash.php');
}
elseif($_GET['p']=='sikat')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'sikat.php');
}
elseif($_GET['p']=='download_vlr')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vlr_export.php');
}
elseif($_GET['p']=='tes_download')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'download_txt.php');
}
elseif($_GET['p']=='prepaid_quadrant')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'prepaid_quadrant_sumbagut.php');
}
elseif($_GET['p']=='region_actual')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'RevTotal_npa.php');
}
elseif($_GET['p']=='under')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'underconst.php');
}
elseif($_GET['p']=='cekmsisdn')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'cekmsisdn.php');
}
elseif($_GET['p']=='mkiosvoice_mirror')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mkiosvoice_mirror.php');
}
elseif($_GET['p']=='region_data')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'region.php');
}
elseif($_GET['p']=='u60')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'u60.php');
}
elseif($_GET['p']=='cek_vas')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'cek_msisdn.php');
}
elseif($_GET['p']=='LULR')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'frame_LULR.php');
}
elseif($_GET['p']=='APACARIKKAK?')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'ceklah.php');
}
elseif($_GET['p']=='KAPAN?')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'frame_Calendar.php');
}
elseif($_GET['p']=='IMMO')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'immo.php');
}

elseif($_GET['p']=='REVMAIL')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'revenue_target.php');
}

elseif($_GET['p']=='TAKER')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'taker_mailrep.php');
}

elseif($_GET['p']=='TESMAILREP')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'tes_mailrep.php');
}

elseif($_GET['p']=='DATEPICKER')
{
    include_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'datepicker.php');
}
?>