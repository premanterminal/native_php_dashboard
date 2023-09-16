<?php
session_start();

define('BL', true);

require_once('../controllers/LoginController.php');

if(!is_loggedin())
{
    redirect('login');
}
//#############################################################################//
if(isset($_GET['branch']) && isset($_GET['last_year_lm']))
{
    getRevenueBranchLastYearLM($_GET['branch']);
}
elseif(isset($_GET['branch']) && isset($_GET['now_lm']))
{
    getRevenueBranchNowLM($_GET['branch']);
}
elseif(isset($_GET['branch']) && isset($_GET['last_month_lm']))
{
    getRevenueBranchLastMonthLM($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['last_year_lm']))
{
    getRevenueClusterLastYearLM($_GET['cluster']);
}
elseif(isset($_GET['cluster']) && isset($_GET['now_lm']))
{
    getRevenueClusterNowLM($_GET['cluster']);
}
elseif(isset($_GET['cluster']) && isset($_GET['last_month_lm']))
{
    getRevenueClusterLastMonthLM($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['last_year_y']))
{
    getRevenueBranchLastYear_y($_GET['branch']);
}
elseif(isset($_GET['branch']) && isset($_GET['now_y']))
{
    getRevenueBranchNow_y($_GET['branch']);
}
elseif(isset($_GET['branch']) && isset($_GET['last_month_y']))
{
    getRevenueBranchLastMonth_y($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['last_year_y']))
{
    getRevenueClusterLastYear_y($_GET['cluster']);
}
elseif(isset($_GET['cluster']) && isset($_GET['now_y']))
{
    getRevenueClusterNow_y($_GET['cluster']);
}
elseif(isset($_GET['cluster']) && isset($_GET['last_month_y']))
{
    getRevenueClusterLastMonth_y($_GET['cluster']);
}
elseif(isset($_GET['bulan']) && isset($_GET['last_year_lm']))
{
    getRevenueBulanLastYearLM($_GET['bulan']);
}
elseif(isset($_GET['bulan']) && isset($_GET['now_lm']))
{
    getRevenueBulanNowLM($_GET['bulan']);
}
elseif(isset($_GET['bulan']) && isset($_GET['last_month_lm']))
{
    getRevenueBulanLastMonthLM($_GET['bulan']);
}
//#############################################################################//
elseif(isset($_GET['branch']) && isset($_GET['last_year']))
{
    getRevenueBranchLastYear($_GET['branch']);
}
elseif(isset($_GET['branch']) && isset($_GET['now']))
{
    getRevenueBranchNow($_GET['branch']);
}
elseif(isset($_GET['branch']) && isset($_GET['last_month']))
{
    getRevenueBranchLastMonth($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['last_year']))
{
    getRevenueClusterLastYear($_GET['cluster']);
}
elseif(isset($_GET['cluster']) && isset($_GET['now']))
{
    getRevenueClusterNow($_GET['cluster']);
}
elseif(isset($_GET['cluster']) && isset($_GET['last_month']))
{
    getRevenueClusterLastMonth($_GET['cluster']);
}
elseif(isset($_GET['bulan']) && isset($_GET['last_year']))
{
    getRevenueBulanLastYear($_GET['bulan']);
}
elseif(isset($_GET['bulan']) && isset($_GET['now']))
{
    getRevenueBulanNow($_GET['bulan']);
}
elseif(isset($_GET['bulan']) && isset($_GET['last_month']))
{
    getRevenueBulanLastMonth($_GET['bulan']);
}
//#############################################################################//
elseif(isset($_GET['branch']) && isset($_GET['voice']))
{
    getRevenueBranchVoice($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['voice']))
{
    getRevenueClusterVoice($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['sms']))
{
    getRevenueBranchSMS($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['sms']))
{
    getRevenueClusterSMS($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['broadband']))
{
    getRevenueBranchBroadband($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['broadband']))
{
    getRevenueClusterBroadband($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['digital_services']))
{
    getRevenueBranchDigitalServices($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['digital_services']))
{
    getRevenueClusterDigitalServices($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['voice_z']))
{
    getRevenueBranchVoice_z($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['voice_z']))
{
    getRevenueClusterVoice_z($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['sms_z']))
{
    getRevenueBranchSMS_z($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['sms_z']))
{
    getRevenueClusterSMS_z($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['broadband_z']))
{
    getRevenueBranchBroadband_z($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['broadband_z']))
{
    getRevenueClusterBroadband_z($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['digital_services_z']))
{
    getRevenueBranchDigitalServices_z($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['digital_services_z']))
{
    getRevenueClusterDigitalServices_z($_GET['cluster']);
}
//#############################################################################//
elseif(isset($_GET['branch']) && isset($_GET['mkiosdata_d5']))
{
    getRevenueBranchmkiosdata_d5($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosdata_d5']))
{
    getRevenueClustermkiosdata_d5($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosdata_d10']))
{
    getRevenueBranchmkiosdata_d10($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosdata_d10']))
{
    getRevenueClustermkiosdata_d10($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosdata_d25']))
{
    getRevenueBranchmkiosdata_d25($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosdata_d25']))
{
    getRevenueClustermkiosdata_d25($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosdata_d20']))
{
    getRevenueBranchmkiosdata_d20($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosdata_d20']))
{
    getRevenueClustermkiosdata_d20($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosdata_d50']))
{
    getRevenueBranchmkiosdata_d50($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosdata_d50']))
{
    getRevenueClustermkiosdata_d50($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosdata_d100']))
{
    getRevenueBranchmkiosdata_d100($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosdata_d100']))
{
    getRevenueClustermkiosdata_d100($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosdata_total']))
{
    getRevenueBranchmkiosdata_total($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosdata_total']))
{
    getRevenueClustermkiosdata_total($_GET['cluster']);
}
//#############################################################################//
elseif(isset($_GET['branch']) && isset($_GET['mkiosvoice_d5']))
{
    getRevenueBranchmkiosvoice_d5($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosvoice_d5']))
{
    getRevenueClustermkiosvoice_d5($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosvoice_d10']))
{
    getRevenueBranchmkiosvoice_d10($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosvoice_d10']))
{
    getRevenueClustermkiosvoice_d10($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosvoice_d25']))
{
    getRevenueBranchmkiosvoice_d25($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosvoice_d25']))
{
    getRevenueClustermkiosvoice_d25($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosvoice_d20']))
{
    getRevenueBranchmkiosvoice_d20($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosvoice_d20']))
{
    getRevenueClustermkiosvoice_d20($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosvoice_d50']))
{
    getRevenueBranchmkiosvoice_d50($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosvoice_d50']))
{
    getRevenueClustermkiosvoice_d50($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosvoice_d100']))
{
    getRevenueBranchmkiosvoice_d100($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosvoice_d100']))
{
    getRevenueClustermkiosvoice_d100($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosvoice_total']))
{
    getRevenueBranchmkiosvoice_total($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosvoice_total']))
{
    getRevenueClustermkiosvoice_total($_GET['cluster']);
}
//#############################################################################//
elseif(isset($_GET['branch']) && isset($_GET['mkiosbulk']))
{
    getRevenueBranchmkiosbulk($_GET['branch']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosbulk_lastmonth']))
{
    getRevenueBranchmkiosbulk_lastmonth($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosbulk']))
{
    getRevenueClustermkiosbulk($_GET['cluster']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosbulk_lastmonth']))
{
    getRevenueClustermkiosbulk_lastmonth($_GET['cluster']);
}
//#############################################################################//
elseif(isset($_GET['branch']) && isset($_GET['mkiosdata_inc']))
{
    getRevenueBranchmkiosdata_inc($_GET['branch']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosdata_lastmonth_inc']))
{
    getRevenueBranchmkiosdata_lastmonth_inc($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosdata_inc']))
{
    getRevenueClustermkiosdata_inc($_GET['cluster']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosdata_lastmonth_inc']))
{
    getRevenueClustermkiosdata_lastmonth_inc($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosdata_d5_lastmonth_inc']))
{
    getRevenueBranchmkiosdata_d5_lastmonth_inc($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosdata_d5_lastmonth_inc']))
{
    getRevenueClustermkiosdata_d5_lastmonth_inc($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosdata_d10_lastmonth_inc']))
{
    getRevenueBranchmkiosdata_d10_lastmonth_inc($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosdata_d10_lastmonth_inc']))
{
    getRevenueClustermkiosdata_d10_lastmonth_inc($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosdata_d20_lastmonth_inc']))
{
    getRevenueBranchmkiosdata_d20_lastmonth_inc($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosdata_d20_lastmonth_inc']))
{
    getRevenueClustermkiosdata_d20_lastmonth_inc($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosdata_d25_lastmonth_inc']))
{
    getRevenueBranchmkiosdata_d25_lastmonth_inc($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosdata_d25_lastmonth_inc']))
{
    getRevenueClustermkiosdata_d25_lastmonth_inc($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosdata_d50_lastmonth_inc']))
{
    getRevenueBranchmkiosdata_d50_lastmonth_inc($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosdata_d50_lastmonth_inc']))
{
    getRevenueClustermkiosdata_d50_lastmonth_inc($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosdata_d100_lastmonth_inc']))
{
    getRevenueBranchmkiosdata_d100_lastmonth_inc($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosdata_d100_lastmonth_inc']))
{
    getRevenueClustermkiosdata_d100_lastmonth_inc($_GET['cluster']);
}
//#############################################################################//

elseif(isset($_GET['branch']) && isset($_GET['mkiosvoice_inc']))
{
    getRevenueBranchmkiosvoice_inc($_GET['branch']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosvoice_lastmonth_inc']))
{
    getRevenueBranchmkiosvoice_lastmonth_inc($_GET['branch']);
}

elseif(isset($_GET['cluster']) && isset($_GET['mkiosvoice_inc']))
{
    getRevenueClustermkiosvoice_inc($_GET['cluster']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosvoice_lastmonth_inc']))
{
    getRevenueClustermkiosvoice_lastmonth_inc($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosvoice_d5_lastmonth_inc']))
{
    getRevenueBranchmkiosvoice_d5_lastmonth_inc($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosvoice_d5_lastmonth_inc']))
{
    getRevenueClustermkiosvoice_d5_lastmonth_inc($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosvoice_d10_lastmonth_inc']))
{
    getRevenueBranchmkiosvoice_d10_lastmonth_inc($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosvoice_d10_lastmonth_inc']))
{
    getRevenueClustermkiosvoice_d10_lastmonth_inc($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosvoice_d20_lastmonth_inc']))
{
    getRevenueBranchmkiosvoice_d20_lastmonth_inc($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosvoice_d20_lastmonth_inc']))
{
    getRevenueClustermkiosvoice_d20_lastmonth_inc($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosvoice_d25_lastmonth_inc']))
{
    getRevenueBranchmkiosvoice_d25_lastmonth_inc($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosvoice_d25_lastmonth_inc']))
{
    getRevenueClustermkiosvoice_d25_lastmonth_inc($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosvoice_d50_lastmonth_inc']))
{
    getRevenueBranchmkiosvoice_d50_lastmonth_inc($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosvoice_d50_lastmonth_inc']))
{
    getRevenueClustermkiosvoice_d50_lastmonth_inc($_GET['cluster']);
}
elseif(isset($_GET['branch']) && isset($_GET['mkiosvoice_d100_lastmonth_inc']))
{
    getRevenueBranchmkiosvoice_d100_lastmonth_inc($_GET['branch']);
}
elseif(isset($_GET['cluster']) && isset($_GET['mkiosvoice_d100_lastmonth_inc']))
{
    getRevenueClustermkiosvoice_d100_lastmonth_inc($_GET['cluster']);
}
//#############################################################################//
elseif(isset($_GET['region']) && isset($_GET['region_broadband']))
{
    getRevenueRegionBroadband($_GET['region']);
}
elseif(isset($_GET['region']) && isset($_GET['region_voice']))
{
    getRevenueRegionVoice($_GET['region']);
}
elseif(isset($_GET['region']) && isset($_GET['region_digital']))
{
    getRevenueRegionDigital($_GET['region']);
}
elseif(isset($_GET['region']) && isset($_GET['region_sms']))
{
    getRevenueRegionSms($_GET['region']);
}
//##############################################################################//
elseif(isset($_GET['region']) && isset($_GET['region_lastmonth']))
{
    getRevenueRegion_Lastmonth($_GET['region']);
}
elseif(isset($_GET['region']) && isset($_GET['region_lastyear']))
{
    getRevenueRegion_Lastyear($_GET['region']);
}
elseif(isset($_GET['region']) && isset($_GET['region_now']))
{
    getRevenueRegion_Now($_GET['region']);
}
//##############################################################################//
elseif(isset($_GET['l1']) && isset($_GET['l1_sumbagut']))
{
    getRevenueL1_sumbagut($_GET['l1']);
}
elseif(isset($_GET['l1']) && isset($_GET['l1_sumbagteng']))
{
    getRevenueL1_sumbagteng($_GET['l1']);
}
elseif(isset($_GET['l1']) && isset($_GET['l1_sumbagsel']))
{
    getRevenueL1_sumbagsel($_GET['l1']);
}
elseif(isset($_GET['l1']) && isset($_GET['l1_area']))
{
    getRevenueL1_area($_GET['l1']);
}
//--------------------------------------------------------------------------//
elseif(isset($_GET['l1']) && isset($_GET['l1_sumbagut_lastyear']))
{
    getRevenueL1_sumbagut_lastyear($_GET['l1']);
}
elseif(isset($_GET['l1']) && isset($_GET['l1_sumbagteng_lastyear']))
{
    getRevenueL1_sumbagteng_lastyear($_GET['l1']);
}
elseif(isset($_GET['l1']) && isset($_GET['l1_sumbagsel_lastyear']))
{
    getRevenueL1_sumbagsel_lastyear($_GET['l1']);
}
elseif(isset($_GET['l1']) && isset($_GET['l1_area_lastyear']))
{
    getRevenueL1_area_lastyear($_GET['l1']);
}
//----------------------------------------------------------------------------//
elseif(isset($_GET['l1']) && isset($_GET['l1_sumbagut_lastmonth']))
{
    getRevenueL1_sumbagut_lastmonth($_GET['l1']);
}
elseif(isset($_GET['l1']) && isset($_GET['l1_sumbagteng_lastmonth']))
{
    getRevenueL1_sumbagteng_lastmonth($_GET['l1']);
}
elseif(isset($_GET['l1']) && isset($_GET['l1_sumbagsel_lastmonth']))
{
    getRevenueL1_sumbagsel_lastmonth($_GET['l1']);
}
elseif(isset($_GET['l1']) && isset($_GET['l1_area_lastmonth']))
{
    getRevenueL1_area_lastmonth($_GET['l1']);
}
//##############################################################################//

$datea =date("Y/m/d");
$newdate = strtotime ( '-1 day' , strtotime ( $datea ) ) ;
$newdate = date ( 'd' , $newdate );

function getRevenueBranchLastYear($branch)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
		$query = "select sum(rev01)/2 as '1', sum(rev02)/2 as '2', sum(rev03)/2 as '3', 
		sum(rev04)/2 as '4', sum(rev05)/2 as '5',
        sum(rev06)/2 as '6', sum(rev07)/2 as '7', sum(rev08)/2 as '8', 
		sum(rev09)/2 as '9', sum(rev10)/2 as '10',
        sum(rev11)/2 as '11', sum(rev12)/2 as '12', sum(rev13)/2 as '13', 
		sum(rev14)/2 as '14', sum(rev15)/2 as '15',
        sum(rev16)/2 as '16', sum(rev17)/2 as '17', sum(rev18)/2 as '18', 
		sum(rev19)/2 as '19', sum(rev20)/2 as '20',
        sum(rev21)/2 as '21', sum(rev22)/2 as '22', sum(rev23)/2 as '23', 
		sum(rev24)/2 as '24', sum(rev25)/2 as '25',
        sum(rev26)/2 as '26', sum(rev27)/2 as '27', sum(rev28)/2 as '28', 
		sum(rev29)/2 as '29', sum(rev30)/2 as '30', 
        sum(rev31)/2 as '31'
        from tbl_Extended_Pivot_dashboard_lastyear
		where cluster like 'Branch%' && bln = '12'
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "select sum(rev01)/2 as '1', sum(rev02)/2 as '2', sum(rev03)/2 as '3', 
		sum(rev04)/2 as '4', sum(rev05)/2 as '5',
        sum(rev06)/2 as '6', sum(rev07)/2 as '7', sum(rev08)/2 as '8', 
		sum(rev09)/2 as '9', sum(rev10)/2 as '10',
        sum(rev11)/2 as '11', sum(rev12)/2 as '12', sum(rev13)/2 as '13', 
		sum(rev14)/2 as '14', sum(rev15)/2 as '15',
        sum(rev16)/2 as '16', sum(rev17)/2 as '17', sum(rev18)/2 as '18', 
		sum(rev19)/2 as '19', sum(rev20)/2 as '20',
        sum(rev21)/2 as '21', sum(rev22)/2 as '22', sum(rev23)/2 as '23', 
		sum(rev24)/2 as '24', sum(rev25)/2 as '25',
        sum(rev26)/2 as '26', sum(rev27)/2 as '27', sum(rev28)/2 as '28', 
		sum(rev29)/2 as '29', sum(rev30)/2 as '30', 
        sum(rev31)/2 as '31'
        from tbl_Extended_Pivot_dashboard_lastyear where cluster like '$branch' && bln = '12'
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueBranchNow($branch)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "select sum(rev01)/2 as '1', sum(rev02)/2 as '2', sum(rev03)/2 as '3', 
		sum(rev04)/2 as '4', sum(rev05)/2 as '5',
        sum(rev06)/2 as '6', sum(rev07)/2 as '7', sum(rev08)/2 as '8', 
		sum(rev09)/2 as '9', sum(rev10)/2 as '10',
        sum(rev11)/2 as '11', sum(rev12)/2 as '12', sum(rev13)/2 as '13', 
		sum(rev14)/2 as '14', sum(rev15)/2 as '15',
        sum(rev16)/2 as '16', sum(rev17)/2 as '17', sum(rev18)/2 as '18', 
		sum(rev19)/2 as '19', sum(rev20)/2 as '20',
        sum(rev21)/2 as '21', sum(rev22)/2 as '22', sum(rev23)/2 as '23', 
		sum(rev24)/2 as '24', sum(rev25)/2 as '25',
        sum(rev26)/2 as '26', sum(rev27)/2 as '27', sum(rev28)/2 as '28', 
		sum(rev29)/2 as '29', sum(rev30)/2 as '30', 
        sum(rev31)/2 as '31'
        from tbl_Extended_Pivot_dashboard_now
		where cluster like 'Branch%' && bln like '12'
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "select sum(rev01)/2 as '1', sum(rev02)/2 as '2', sum(rev03)/2 as '3', 
		sum(rev04)/2 as '4', sum(rev05)/2 as '5',
        sum(rev06)/2 as '6', sum(rev07)/2 as '7', sum(rev08)/2 as '8', 
		sum(rev09)/2 as '9', sum(rev10)/2 as '10',
        sum(rev11)/2 as '11', sum(rev12)/2 as '12', sum(rev13)/2 as '13', 
		sum(rev14)/2 as '14', sum(rev15)/2 as '15',
        sum(rev16)/2 as '16', sum(rev17)/2 as '17', sum(rev18)/2 as '18', 
		sum(rev19)/2 as '19', sum(rev20)/2 as '20',
        sum(rev21)/2 as '21', sum(rev22)/2 as '22', sum(rev23)/2 as '23', 
		sum(rev24)/2 as '24', sum(rev25)/2 as '25',
        sum(rev26)/2 as '26', sum(rev27)/2 as '27', sum(rev28)/2 as '28', 
		sum(rev29)/2 as '29', sum(rev30)/2 as '30', 
        sum(rev31)/2 as '31'
        from tbl_Extended_Pivot_dashboard_now where cluster like '$branch' && bln like '12'";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueBranchLastMonth($branch)
{
    $date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	$query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "select sum(rev01)/2 as '1', sum(rev02)/2 as '2', sum(rev03)/2 as '3', 
		sum(rev04)/2 as '4', sum(rev05)/2 as '5',
        sum(rev06)/2 as '6', sum(rev07)/2 as '7', sum(rev08)/2 as '8', 
		sum(rev09)/2 as '9', sum(rev10)/2 as '10',
        sum(rev11)/2 as '11', sum(rev12)/2 as '12', sum(rev13)/2 as '13', 
		sum(rev14)/2 as '14', sum(rev15)/2 as '15',
        sum(rev16)/2 as '16', sum(rev17)/2 as '17', sum(rev18)/2 as '18', 
		sum(rev19)/2 as '19', sum(rev20)/2 as '20',
        sum(rev21)/2 as '21', sum(rev22)/2 as '22', sum(rev23)/2 as '23', 
		sum(rev24)/2 as '24', sum(rev25)/2 as '25',
        sum(rev26)/2 as '26', sum(rev27)/2 as '27', sum(rev28)/2 as '28', 
		sum(rev29)/2 as '29', sum(rev30)/2 as '30', 
        sum(rev31)/2 as '31'
        from tbl_Extended_Pivot_dashboard_now
		where cluster like 'Branch%' && bln like '11'";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "select sum(rev01)/2 as '1', sum(rev02)/2 as '2', sum(rev03)/2 as '3', 
		sum(rev04)/2 as '4', sum(rev05)/2 as '5',
        sum(rev06)/2 as '6', sum(rev07)/2 as '7', sum(rev08)/2 as '8', 
		sum(rev09)/2 as '9', sum(rev10)/2 as '10',
        sum(rev11)/2 as '11', sum(rev12)/2 as '12', sum(rev13)/2 as '13', 
		sum(rev14)/2 as '14', sum(rev15)/2 as '15',
        sum(rev16)/2 as '16', sum(rev17)/2 as '17', sum(rev18)/2 as '18', 
		sum(rev19)/2 as '19', sum(rev20)/2 as '20',
        sum(rev21)/2 as '21', sum(rev22)/2 as '22', sum(rev23)/2 as '23', 
		sum(rev24)/2 as '24', sum(rev25)/2 as '25',
        sum(rev26)/2 as '26', sum(rev27)/2 as '27', sum(rev28)/2 as '28', 
		sum(rev29)/2 as '29', sum(rev30)/2 as '30', 
        sum(rev31)/2 as '31'
        from tbl_Extended_Pivot_dashboard_now where cluster like '$branch' && bln like '11'";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueClusterLastYear($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "select sum(rev01)/2 as '1', sum(rev02)/2 as '2', sum(rev03)/2 as '3', 
		sum(rev04)/2 as '4', sum(rev05)/2 as '5',
        sum(rev06)/2 as '6', sum(rev07)/2 as '7', sum(rev08)/2 as '8', 
		sum(rev09)/2 as '9', sum(rev10)/2 as '10',
        sum(rev11)/2 as '11', sum(rev12)/2 as '12', sum(rev13)/2 as '13', 
		sum(rev14)/2 as '14', sum(rev15)/2 as '15',
        sum(rev16)/2 as '16', sum(rev17)/2 as '17', sum(rev18)/2 as '18', 
		sum(rev19)/2 as '19', sum(rev20)/2 as '20',
        sum(rev21)/2 as '21', sum(rev22)/2 as '22', sum(rev23)/2 as '23', 
		sum(rev24)/2 as '24', sum(rev25)/2 as '25',
        sum(rev26)/2 as '26', sum(rev27)/2 as '27', sum(rev28)/2 as '28', 
		sum(rev29)/2 as '29', sum(rev30)/2 as '30', 
        sum(rev31)/2 as '31'
        from tbl_Extended_Pivot_dashboard_lastyear && cluster like 'Branch%'
		where bln like '$thismonth'
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "select sum(rev01)/2 as '1', sum(rev02)/2 as '2', sum(rev03)/2 as '3', 
		sum(rev04)/2 as '4', sum(rev05)/2 as '5',
        sum(rev06)/2 as '6', sum(rev07)/2 as '7', sum(rev08)/2 as '8', 
		sum(rev09)/2 as '9', sum(rev10)/2 as '10',
        sum(rev11)/2 as '11', sum(rev12)/2 as '12', sum(rev13)/2 as '13', 
		sum(rev14)/2 as '14', sum(rev15)/2 as '15',
        sum(rev16)/2 as '16', sum(rev17)/2 as '17', sum(rev18)/2 as '18', 
		sum(rev19)/2 as '19', sum(rev20)/2 as '20',
        sum(rev21)/2 as '21', sum(rev22)/2 as '22', sum(rev23)/2 as '23', 
		sum(rev24)/2 as '24', sum(rev25)/2 as '25',
        sum(rev26)/2 as '26', sum(rev27)/2 as '27', sum(rev28)/2 as '28', 
		sum(rev29)/2 as '29', sum(rev30)/2 as '30', 
        sum(rev31)/2 as '31'
        from tbl_Extended_Pivot_dashboard_lastyear where cluster like '$cluster' && bln like '$thismonth'";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueClusterNow($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "select sum(rev01)/2 as '1', sum(rev02)/2 as '2', sum(rev03)/2 as '3', 
		sum(rev04)/2 as '4', sum(rev05)/2 as '5',
        sum(rev06)/2 as '6', sum(rev07)/2 as '7', sum(rev08)/2 as '8', 
		sum(rev09)/2 as '9', sum(rev10)/2 as '10',
        sum(rev11)/2 as '11', sum(rev12)/2 as '12', sum(rev13)/2 as '13', 
		sum(rev14)/2 as '14', sum(rev15)/2 as '15',
        sum(rev16)/2 as '16', sum(rev17)/2 as '17', sum(rev18)/2 as '18', 
		sum(rev19)/2 as '19', sum(rev20)/2 as '20',
        sum(rev21)/2 as '21', sum(rev22)/2 as '22', sum(rev23)/2 as '23', 
		sum(rev24)/2 as '24', sum(rev25)/2 as '25',
        sum(rev26)/2 as '26', sum(rev27)/2 as '27', sum(rev28)/2 as '28', 
		sum(rev29)/2 as '29', sum(rev30)/2 as '30', 
        sum(rev31)/2 as '31'
        from tbl_Extended_Pivot_dashboard_now && cluster like 'Branch%'
		where bln like '12'
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "select sum(rev01)/2 as '1', sum(rev02)/2 as '2', sum(rev03)/2 as '3', 
		sum(rev04)/2 as '4', sum(rev05)/2 as '5',
        sum(rev06)/2 as '6', sum(rev07)/2 as '7', sum(rev08)/2 as '8', 
		sum(rev09)/2 as '9', sum(rev10)/2 as '10',
        sum(rev11)/2 as '11', sum(rev12)/2 as '12', sum(rev13)/2 as '13', 
		sum(rev14)/2 as '14', sum(rev15)/2 as '15',
        sum(rev16)/2 as '16', sum(rev17)/2 as '17', sum(rev18)/2 as '18', 
		sum(rev19)/2 as '19', sum(rev20)/2 as '20',
        sum(rev21)/2 as '21', sum(rev22)/2 as '22', sum(rev23)/2 as '23', 
		sum(rev24)/2 as '24', sum(rev25)/2 as '25',
        sum(rev26)/2 as '26', sum(rev27)/2 as '27', sum(rev28)/2 as '28', 
		sum(rev29)/2 as '29', sum(rev30)/2 as '30', 
        sum(rev31)/2 as '31'
        from tbl_Extended_Pivot_dashboard_now where cluster like '$cluster' && bln like '12'
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueClusterLastMonth($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "select sum(rev01)/2 as '1', sum(rev02)/2 as '2', sum(rev03)/2 as '3', 
		sum(rev04)/2 as '4', sum(rev05)/2 as '5',
        sum(rev06)/2 as '6', sum(rev07)/2 as '7', sum(rev08)/2 as '8', 
		sum(rev09)/2 as '9', sum(rev10)/2 as '10',
        sum(rev11)/2 as '11', sum(rev12)/2 as '12', sum(rev13)/2 as '13', 
		sum(rev14)/2 as '14', sum(rev15)/2 as '15',
        sum(rev16)/2 as '16', sum(rev17)/2 as '17', sum(rev18)/2 as '18', 
		sum(rev19)/2 as '19', sum(rev20)/2 as '20',
        sum(rev21)/2 as '21', sum(rev22)/2 as '22', sum(rev23)/2 as '23', 
		sum(rev24)/2 as '24', sum(rev25)/2 as '25',
        sum(rev26)/2 as '26', sum(rev27)/2 as '27', sum(rev28)/2 as '28', 
		sum(rev29)/2 as '29', sum(rev30)/2 as '30', 
        sum(rev31)/2 as '31'
        from tbl_Extended_Pivot_dashboard_now && cluster like 'Branch%'
		where bln like '11'";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "select sum(rev01)/2 as '1', sum(rev02)/2 as '2', sum(rev03)/2 as '3', 
		sum(rev04)/2 as '4', sum(rev05)/2 as '5',
        sum(rev06)/2 as '6', sum(rev07)/2 as '7', sum(rev08)/2 as '8', 
		sum(rev09)/2 as '9', sum(rev10)/2 as '10',
        sum(rev11)/2 as '11', sum(rev12)/2 as '12', sum(rev13)/2 as '13', 
		sum(rev14)/2 as '14', sum(rev15)/2 as '15',
        sum(rev16)/2 as '16', sum(rev17)/2 as '17', sum(rev18)/2 as '18', 
		sum(rev19)/2 as '19', sum(rev20)/2 as '20',
        sum(rev21)/2 as '21', sum(rev22)/2 as '22', sum(rev23)/2 as '23', 
		sum(rev24)/2 as '24', sum(rev25)/2 as '25',
        sum(rev26)/2 as '26', sum(rev27)/2 as '27', sum(rev28)/2 as '28', 
		sum(rev29)/2 as '29', sum(rev30)/2 as '30', 
        sum(rev31)/2 as '31'
        from tbl_Extended_Pivot_dashboard_now where cluster like '$cluster' && bln like '11'";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueBranchLastYear_y($branch)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_lastyear
		where cluster like 'Branch%' && bln = '11'
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_lastyear where cluster like '$branch' && bln = '11'
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueBranchNow_y($branch)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_lastmonth
		where cluster like 'Branch%' && bln like '10'
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_lastmonth where cluster like '$branch' && bln like '10'";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueBranchLastMonth_y($branch)
{
    $date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	$query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_now
		where cluster like 'Branch%' && bln like '11'";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_now where cluster like '$branch' && bln like '11'";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueClusterLastYear_y($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_lastyear && cluster like 'Branch%'
		where bln like '11'
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_lastyear where cluster like '$cluster' && bln like '11'";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueClusterNow_y($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_now && cluster like 'Branch%'
		where bln like '10'
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_now where cluster like '$cluster' && bln like '10'
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueClusterLastMonth_y($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_now && cluster like 'Branch%'
		where bln like '11'";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_now where cluster like '$cluster' && bln like '11'";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueClusterVoice($cluster)
{
	$date =date("Y/m/d");
	
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_revenue_daily_l1 
		where month like '12' && level like 'Branch%' && l1 like 'Voice P2P'";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_revenue_daily_l1 
		where level like '$cluster' && month like '12' && l1 like 'Voice P2P'";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueClusterSMS($cluster)
{
	$date =date("Y/m/d");
	
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_revenue_daily_l1 
		where month like '12' && level like 'Branch%' && l1 like 'SMS P2P' ";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_revenue_daily_l1 
		where level like '$cluster' && month like '12' && l1 like 'SMS P2P'";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueClusterBroadband($cluster)
{
	$date =date("Y/m/d");
	
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_revenue_daily_l1 
		where month like '12' && level like 'Branch%' && l1 like 'Broadband' ";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_revenue_daily_l1 
		where level like '$cluster' && month like '12' && l1 like 'Broadband'";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueClusterDigitalServices($cluster)
{
	$date =date("Y/m/d");
	
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_revenue_daily_l1 
		where month like '12' && level like 'Branch%' && l1 like 'Digital Services' ";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_revenue_daily_l1 
		where level like '$cluster' && month like '12' && l1 like 'Digital Services'";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueBranchVoice($branch)
{
	$date =date("Y/m/d");
	
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "select l1, 
		 sum(rev01)/2  as '1',  sum(rev02)/2  as '2',  sum(rev03)/2  as '3',  sum(rev04)/2  as '4',  sum(rev05)/2  as '5',
		 sum(rev06)/2  as '6',  sum(rev07)/2  as '7',  sum(rev08)/2  as '8',  sum(rev09)/2  as '9',  sum(rev10)/2  as '10',
		 sum(rev11)/2  as '11',  sum(rev12)/2  as '12',  sum(rev13)/2  as '13',  sum(rev14)/2  as '14',  sum(rev15)/2  as '15',
		 sum(rev16)/2  as '16',  sum(rev17)/2  as '17',  sum(rev18)/2  as '18',  sum(rev19)/2  as '19',  sum(rev20)/2  as '20',
		 sum(rev21)/2  as '21',  sum(rev22)/2  as '22',  sum(rev23)/2  as '23',  sum(rev24)/2  as '24',  sum(rev25)/2  as '25',
		 sum(rev26)/2  as '26',  sum(rev27)/2  as '27',  sum(rev28)/2  as '28',  sum(rev29)/2  as '29',  sum(rev30)/2  as '30',
		 sum(rev31)/2  as '31'
		from tbl_Extended_Pivot_revenue_daily_l1
		where level like 'Branch%' && l1 like 'Voice P2P'
		group by l1
		order by l1 desc";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "select sum(rev01)/2 as '1', sum(rev02)/2 as '2', sum(rev03)/2 as '3', sum(rev04)/2 as '4', sum(rev05)/2 as '5',
        sum(rev06)/2 as '6', sum(rev07)/2 as '7', sum(rev08)/2 as '8', sum(rev09)/2 as '9', sum(rev10)/2 as '10',
        sum(rev11)/2 as '11', sum(rev12)/2 as '12', sum(rev13)/2 as '13', sum(rev14)/2 as '14', sum(rev15)/2 as '15',
        sum(rev16)/2 as '16', sum(rev17)/2 as '17', sum(rev18)/2 as '18', sum(rev19)/2 as '19', sum(rev20)/2 as '20',
        sum(rev21)/2 as '21', sum(rev22)/2 as '22', sum(rev23)/2 as '23', sum(rev24)/2 as '24', sum(rev25)/2 as '25',
        sum(rev26)/2 as '26', sum(rev27)/2 as '27', sum(rev28)/2 as '28', sum(rev29)/2 as '29', sum(rev30)/2 as '30', 
        sum(rev31)/2 as '31'
        from tbl_Extended_Pivot_dashboard_revenue_daily_l1 
		where level like '$branch' && month like '12' && l1 like 'Voice P2P'";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueBranchSMS($branch)
{
	$date =date("Y/m/d");
	
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "select sum(rev01)/2 as '1', sum(rev02)/2 as '2', sum(rev03)/2 as '3', sum(rev04)/2 as '4', sum(rev05)/2 as '5',
        sum(rev06)/2 as '6', sum(rev07)/2 as '7', sum(rev08)/2 as '8', sum(rev09)/2 as '9', sum(rev10)/2 as '10',
        sum(rev11)/2 as '11', sum(rev12)/2 as '12', sum(rev13)/2 as '13', sum(rev14)/2 as '14', sum(rev15)/2 as '15',
        sum(rev16)/2 as '16', sum(rev17)/2 as '17', sum(rev18)/2 as '18', sum(rev19)/2 as '19', sum(rev20)/2 as '20',
        sum(rev21)/2 as '21', sum(rev22)/2 as '22', sum(rev23)/2 as '23', sum(rev24)/2 as '24', sum(rev25)/2 as '25',
        sum(rev26)/2 as '26', sum(rev27)/2 as '27', sum(rev28)/2 as '28', sum(rev29)/2 as '29', sum(rev30)/2 as '30', 
        sum(rev31)/2 as '31'
        from tbl_Extended_Pivot_dashboard_revenue_daily_l1 
		where month like '12' && level like 'Branch%' && l1 like 'SMS P2P' ";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "select sum(rev01)/2 as '1', sum(rev02)/2 as '2', sum(rev03)/2 as '3', sum(rev04)/2 as '4', sum(rev05)/2 as '5',
        sum(rev06)/2 as '6', sum(rev07)/2 as '7', sum(rev08)/2 as '8', sum(rev09)/2 as '9', sum(rev10)/2 as '10',
        sum(rev11)/2 as '11', sum(rev12)/2 as '12', sum(rev13)/2 as '13', sum(rev14)/2 as '14', sum(rev15)/2 as '15',
        sum(rev16)/2 as '16', sum(rev17)/2 as '17', sum(rev18)/2 as '18', sum(rev19)/2 as '19', sum(rev20)/2 as '20',
        sum(rev21)/2 as '21', sum(rev22)/2 as '22', sum(rev23)/2 as '23', sum(rev24)/2 as '24', sum(rev25)/2 as '25',
        sum(rev26)/2 as '26', sum(rev27)/2 as '27', sum(rev28)/2 as '28', sum(rev29)/2 as '29', sum(rev30)/2 as '30', 
        sum(rev31)/2 as '31'
        from tbl_Extended_Pivot_dashboard_revenue_daily_l1 
		where level like '$branch' && month like '12' && l1 like 'SMS P2P'";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}
function getRevenueBranchBroadband($branch)
{
	$date =date("Y/m/d");
	
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "select l1, 
		 sum(rev01)/2  as '1',  sum(rev02)/2  as '2',  sum(rev03)/2  as '3',  sum(rev04)/2  as '4',  sum(rev05)/2  as '5',
		 sum(rev06)/2  as '6',  sum(rev07)/2  as '7',  sum(rev08)/2  as '8',  sum(rev09)/2  as '9',  sum(rev10)/2  as '10',
		 sum(rev11)/2  as '11',  sum(rev12)/2  as '12',  sum(rev13)/2  as '13',  sum(rev14)/2  as '14',  sum(rev15)/2  as '15',
		 sum(rev16)/2  as '16',  sum(rev17)/2  as '17',  sum(rev18)/2  as '18',  sum(rev19)/2  as '19',  sum(rev20)/2  as '20',
		 sum(rev21)/2  as '21',  sum(rev22)/2  as '22',  sum(rev23)/2  as '23',  sum(rev24)/2  as '24',  sum(rev25)/2  as '25',
		 sum(rev26)/2  as '26',  sum(rev27)/2  as '27',  sum(rev28)/2  as '28',  sum(rev29)/2  as '29',  sum(rev30)/2  as '30',
		 sum(rev31)/2  as '31'
		from tbl_Extended_Pivot_revenue_daily_l1
		where l1 like 'Broadband' && level like 'Branch%' 
		group by l1
		order by l1 desc ";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "select sum(rev01)/2 as '1', sum(rev02)/2 as '2', sum(rev03)/2 as '3', sum(rev04)/2 as '4', sum(rev05)/2 as '5',
        sum(rev06)/2 as '6', sum(rev07)/2 as '7', sum(rev08)/2 as '8', sum(rev09)/2 as '9', sum(rev10)/2 as '10',
        sum(rev11)/2 as '11', sum(rev12)/2 as '12', sum(rev13)/2 as '13', sum(rev14)/2 as '14', sum(rev15)/2 as '15',
        sum(rev16)/2 as '16', sum(rev17)/2 as '17', sum(rev18)/2 as '18', sum(rev19)/2 as '19', sum(rev20)/2 as '20',
        sum(rev21)/2 as '21', sum(rev22)/2 as '22', sum(rev23)/2 as '23', sum(rev24)/2 as '24', sum(rev25)/2 as '25',
        sum(rev26)/2 as '26', sum(rev27)/2 as '27', sum(rev28)/2 as '28', sum(rev29)/2 as '29', sum(rev30)/2 as '30', 
        sum(rev31)/2 as '31'
        from tbl_Extended_Pivot_dashboard_revenue_daily_l1 
		where level like '$branch' && month like '12' && l1 like 'Broadband'";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueBranchDigitalServices($branch)
{
	$date =date("Y/m/d");
	
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "select l1, 
		 sum(rev01)/2  as '1',  sum(rev02)/2  as '2',  sum(rev03)/2  as '3',  sum(rev04)/2  as '4',  sum(rev05)/2  as '5',
		 sum(rev06)/2  as '6',  sum(rev07)/2  as '7',  sum(rev08)/2  as '8',  sum(rev09)/2  as '9',  sum(rev10)/2  as '10',
		 sum(rev11)/2  as '11',  sum(rev12)/2  as '12',  sum(rev13)/2  as '13',  sum(rev14)/2  as '14',  sum(rev15)/2  as '15',
		 sum(rev16)/2  as '16',  sum(rev17)/2  as '17',  sum(rev18)/2  as '18',  sum(rev19)/2  as '19',  sum(rev20)/2  as '20',
		 sum(rev21)/2  as '21',  sum(rev22)/2  as '22',  sum(rev23)/2  as '23',  sum(rev24)/2  as '24',  sum(rev25)/2  as '25',
		 sum(rev26)/2  as '26',  sum(rev27)/2  as '27',  sum(rev28)/2  as '28',  sum(rev29)/2  as '29',  sum(rev30)/2  as '30',
		 sum(rev31)/2  as '31'
		from tbl_Extended_Pivot_revenue_daily_l1
		where l1 like 'Digital Services' && level like 'Branch%' 
		group by l1
		order by l1 desc ";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "select sum(rev01)/2 as '1', sum(rev02)/2 as '2', sum(rev03)/2 as '3', sum(rev04)/2 as '4', sum(rev05)/2 as '5',
        sum(rev06)/2 as '6', sum(rev07)/2 as '7', sum(rev08)/2 as '8', sum(rev09)/2 as '9', sum(rev10)/2 as '10',
        sum(rev11)/2 as '11', sum(rev12)/2 as '12', sum(rev13)/2 as '13', sum(rev14)/2 as '14', sum(rev15)/2 as '15',
        sum(rev16)/2 as '16', sum(rev17)/2 as '17', sum(rev18)/2 as '18', sum(rev19)/2 as '19', sum(rev20)/2 as '20',
        sum(rev21)/2 as '21', sum(rev22)/2 as '22', sum(rev23)/2 as '23', sum(rev24)/2 as '24', sum(rev25)/2 as '25',
        sum(rev26)/2 as '26', sum(rev27)/2 as '27', sum(rev28)/2 as '28', sum(rev29)/2 as '29', sum(rev30)/2 as '30', 
        sum(rev31)/2 as '31'
        from tbl_Extended_Pivot_dashboard_revenue_daily_l1 
		where level like '$branch' && month like '12' && l1 like 'Digital Services'";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}
function getRevenueBranchLastYearLM($branch)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_lastyear
		where cluster like 'Branch%' && bln = '03'
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_lastyear where cluster like '$branch' && bln = '03'
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueBranchNowLM($branch)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_now
		where cluster like 'Branch%' && bln like '03'
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_now where cluster like '$branch' && bln like '03'";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueBranchLastMonthLM($branch)
{
    $date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	$query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_lastmonth
		where cluster like 'Branch%' && bln like '02'";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_lastmonth where cluster like '$branch' && bln like '02'";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueClusterLastYearLM($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_lastyear && cluster like 'Branch%'
		where bln like '03'
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_lastyear where cluster like '$cluster' && bln like '03'";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueClusterNowLM($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_now && cluster like 'Branch%'
		where bln like '03'
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_now where cluster like '$cluster' && bln like '03'
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueClusterLastMonthLM($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_lastmonth && cluster like 'Branch%'
		where bln like '02'";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "select sum(rev01) as '1', sum(rev02) as '2', sum(rev03) as '3', sum(rev04) as '4', sum(rev05) as '5',
        sum(rev06) as '6', sum(rev07) as '7', sum(rev08) as '8', sum(rev09) as '9', sum(rev10) as '10',
        sum(rev11) as '11', sum(rev12) as '12', sum(rev13) as '13', sum(rev14) as '14', sum(rev15) as '15',
        sum(rev16) as '16', sum(rev17) as '17', sum(rev18) as '18', sum(rev19) as '19', sum(rev20) as '20',
        sum(rev21) as '21', sum(rev22) as '22', sum(rev23) as '23', sum(rev24) as '24', sum(rev25) as '25',
        sum(rev26) as '26', sum(rev27) as '27', sum(rev28) as '28', sum(rev29) as '29', sum(rev30) as '30', 
        sum(rev31) as '31'
        from tbl_Extended_Pivot_dashboard_lastmonth where cluster like '$cluster' && bln like '02'";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}


//chrisman code Hahah
/*
function getRevenueBulanLastYear($bulanYear)
{
	$date =date("Y/m/d");
	
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
    $query = "";

    if($bulanYear == 'January')
    {
        $query = "select l1, 
		 sum(rev01)/2  as '1',  sum(rev02)/2  as '2',  sum(rev03)/2  as '3',  sum(rev04)/2  as '4',  sum(rev05)/2  as '5',
		 sum(rev06)/2  as '6',  sum(rev07)/2  as '7',  sum(rev08)/2  as '8',  sum(rev09)/2  as '9',  sum(rev10)/2  as '10',
		 sum(rev11)/2  as '11',  sum(rev12)/2  as '12',  sum(rev13)/2  as '13',  sum(rev14)/2  as '14',  sum(rev15)/2  as '15',
		 sum(rev16)/2  as '16',  sum(rev17)/2  as '17',  sum(rev18)/2  as '18',  sum(rev19)/2  as '19',  sum(rev20)/2  as '20',
		 sum(rev21)/2  as '21',  sum(rev22)/2  as '22',  sum(rev23)/2  as '23',  sum(rev24)/2  as '24',  sum(rev25)/2  as '25',
		 sum(rev26)/2  as '26',  sum(rev27)/2  as '27',  sum(rev28)/2  as '28',  sum(rev29)/2  as '29',  sum(rev30)/2  as '30',
		 sum(rev31)/2  as '31'
		from tbl_Extended_Pivot_revenue_daily_l1
		where l1 like 'Digital Services' && level like 'Branch%'
		group by l1
		order by l1 desc ";
    }
    elseif($bulanYear != 'January')
    {
        $query = "select sum(rev01)/2 as '1', sum(rev02)/2 as '2', sum(rev03)/2 as '3', sum(rev04)/2 as '4', sum(rev05)/2 as '5',
        sum(rev06)/2 as '6', sum(rev07)/2 as '7', sum(rev08)/2 as '8', sum(rev09)/2 as '9', sum(rev10)/2 as '10',
        sum(rev11)/2 as '11', sum(rev12)/2 as '12', sum(rev13)/2 as '13', sum(rev14)/2 as '14', sum(rev15)/2 as '15',
        sum(rev16)/2 as '16', sum(rev17)/2 as '17', sum(rev18)/2 as '18', sum(rev19)/2 as '19', sum(rev20)/2 as '20',
        sum(rev21)/2 as '21', sum(rev22)/2 as '22', sum(rev23)/2 as '23', sum(rev24)/2 as '24', sum(rev25)/2 as '25',
        sum(rev26)/2 as '26', sum(rev27)/2 as '27', sum(rev28)/2 as '28', sum(rev29)/2 as '29', sum(rev30)/2 as '30', 
        sum(rev31)/2 as '31'
        from tbl_Extended_Pivot_dashboard_revenue_daily_l1 
		where level like '$branch' && month like '$thismonth' && l1 like 'Digital Services'";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}


function getRevenueBulanNow($bulanNow)
{
	$date =date("Y/m/d");
	
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
    $query = "";

    if($bulanNow == 'January')
    {
        $query = "select l1, 
		 sum(rev01)/2  as '1',  sum(rev02)/2  as '2',  sum(rev03)/2  as '3',  sum(rev04)/2  as '4',  sum(rev05)/2  as '5',
		 sum(rev06)/2  as '6',  sum(rev07)/2  as '7',  sum(rev08)/2  as '8',  sum(rev09)/2  as '9',  sum(rev10)/2  as '10',
		 sum(rev11)/2  as '11',  sum(rev12)/2  as '12',  sum(rev13)/2  as '13',  sum(rev14)/2  as '14',  sum(rev15)/2  as '15',
		 sum(rev16)/2  as '16',  sum(rev17)/2  as '17',  sum(rev18)/2  as '18',  sum(rev19)/2  as '19',  sum(rev20)/2  as '20',
		 sum(rev21)/2  as '21',  sum(rev22)/2  as '22',  sum(rev23)/2  as '23',  sum(rev24)/2  as '24',  sum(rev25)/2  as '25',
		 sum(rev26)/2  as '26',  sum(rev27)/2  as '27',  sum(rev28)/2  as '28',  sum(rev29)/2  as '29',  sum(rev30)/2  as '30',
		 sum(rev31)/2  as '31'
		from tbl_Extended_Pivot_revenue_daily_l1
		where l1 like 'Digital Services' && level like 'Branch%'
		group by l1
		order by l1 desc ";
    }
    elseif($bulanNow != 'January')
    {
        $query = "select sum(rev01)/2 as '1', sum(rev02)/2 as '2', sum(rev03)/2 as '3', sum(rev04)/2 as '4', sum(rev05)/2 as '5',
        sum(rev06)/2 as '6', sum(rev07)/2 as '7', sum(rev08)/2 as '8', sum(rev09)/2 as '9', sum(rev10)/2 as '10',
        sum(rev11)/2 as '11', sum(rev12)/2 as '12', sum(rev13)/2 as '13', sum(rev14)/2 as '14', sum(rev15)/2 as '15',
        sum(rev16)/2 as '16', sum(rev17)/2 as '17', sum(rev18)/2 as '18', sum(rev19)/2 as '19', sum(rev20)/2 as '20',
        sum(rev21)/2 as '21', sum(rev22)/2 as '22', sum(rev23)/2 as '23', sum(rev24)/2 as '24', sum(rev25)/2 as '25',
        sum(rev26)/2 as '26', sum(rev27)/2 as '27', sum(rev28)/2 as '28', sum(rev29)/2 as '29', sum(rev30)/2 as '30', 
        sum(rev31)/2 as '31'
        from tbl_Extended_Pivot_dashboard_revenue_daily_l1 
		where level like '$branch' && month like '$thismonth' && l1 like 'Digital Services'";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}



function getRevenueBulanLastMonth($bulanLastMont)
{
	$date =date("Y/m/d");
	
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
    $query = "";

    if($bulanNow == 'January')
    {
        $query = "select l1, 
		 sum(rev01)/2  as '1',  sum(rev02)/2  as '2',  sum(rev03)/2  as '3',  sum(rev04)/2  as '4',  sum(rev05)/2  as '5',
		 sum(rev06)/2  as '6',  sum(rev07)/2  as '7',  sum(rev08)/2  as '8',  sum(rev09)/2  as '9',  sum(rev10)/2  as '10',
		 sum(rev11)/2  as '11',  sum(rev12)/2  as '12',  sum(rev13)/2  as '13',  sum(rev14)/2  as '14',  sum(rev15)/2  as '15',
		 sum(rev16)/2  as '16',  sum(rev17)/2  as '17',  sum(rev18)/2  as '18',  sum(rev19)/2  as '19',  sum(rev20)/2  as '20',
		 sum(rev21)/2  as '21',  sum(rev22)/2  as '22',  sum(rev23)/2  as '23',  sum(rev24)/2  as '24',  sum(rev25)/2  as '25',
		 sum(rev26)/2  as '26',  sum(rev27)/2  as '27',  sum(rev28)/2  as '28',  sum(rev29)/2  as '29',  sum(rev30)/2  as '30',
		 sum(rev31)/2  as '31'
		from tbl_Extended_Pivot_revenue_daily_l1
		where l1 like 'Digital Services' && level like 'Branch%'
		group by l1
		order by l1 desc ";
    }
    elseif($bulanNow != 'January')
    {
        $query = "select sum(rev01)/2 as '1', sum(rev02)/2 as '2', sum(rev03)/2 as '3', sum(rev04)/2 as '4', sum(rev05)/2 as '5',
        sum(rev06)/2 as '6', sum(rev07)/2 as '7', sum(rev08)/2 as '8', sum(rev09)/2 as '9', sum(rev10)/2 as '10',
        sum(rev11)/2 as '11', sum(rev12)/2 as '12', sum(rev13)/2 as '13', sum(rev14)/2 as '14', sum(rev15)/2 as '15',
        sum(rev16)/2 as '16', sum(rev17)/2 as '17', sum(rev18)/2 as '18', sum(rev19)/2 as '19', sum(rev20)/2 as '20',
        sum(rev21)/2 as '21', sum(rev22)/2 as '22', sum(rev23)/2 as '23', sum(rev24)/2 as '24', sum(rev25)/2 as '25',
        sum(rev26)/2 as '26', sum(rev27)/2 as '27', sum(rev28)/2 as '28', sum(rev29)/2 as '29', sum(rev30)/2 as '30', 
        sum(rev31)/2 as '31'
        from tbl_Extended_Pivot_dashboard_revenue_daily_l1 
		where level like '$branch' && month like '$thismonth' && l1 like 'Digital Services'";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}*/

//mkios data

function  getRevenueBranchmkiosdata_total($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";
	$where_query = "";
	if($branch != 'SUMBAGUT'){
		$where_query = "where Branch='$branch'";
	}

    
	
	$query = "	
			select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
			from tbl_Extended_Pivot_mkiosdata_total ".$where_query."
		
		";

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosdata_total($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_total
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	
					select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_total where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueBranchmkiosdata_d100($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";
	$where_query = "";
	if($branch != 'SUMBAGUT'){
		$where_query = "where Branch='$branch'";
	}


    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'
					from tbl_Extended_Pivot_mkiosdata_d100 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d100 ".$where_query." 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosdata_d100($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'
					from tbl_Extended_Pivot_mkiosdata_d100
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosdata_d100 where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueBranchmkiosdata_d50($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
	$query = "";
	$where_query = "";
	if($branch != 'SUMBAGUT'){
		$where_query = "where Branch='$branch'";
	}


    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'
					from tbl_Extended_Pivot_mkiosdata_d50 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d50 ".$where_query."
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosdata_d50($cluster)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'
					from tbl_Extended_Pivot_mkiosdata_d50
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosdata_d50 where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueBranchmkiosdata_d25($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
	$query = "";
	$where_query = "";
	if($branch != 'SUMBAGUT'){
		$where_query = "where Branch='$branch'";
	}


    if($branch == 'SUMBAGUT')
    {
        $query = "	
					select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'
					from tbl_Extended_Pivot_mkiosdata_d25 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d25 ".$where_query." 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosdata_d25($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d25
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosdata_d25 where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueBranchmkiosdata_d20($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";
	$where_query = "";
	if($branch != 'SUMBAGUT'){
		$where_query = "where Branch='$branch'";
	}

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d20 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d20 ".$where_query." 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosdata_d20($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d20
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosdata_d20 where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueBranchmkiosdata_d10($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";
	$where_query = "";
	if($branch != 'SUMBAGUT'){
		$where_query = "where Branch='$branch'";
	}

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d10 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d10 ".$where_query."
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosdata_d10($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d10
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosdata_d10 where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueBranchmkiosdata_d5($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";
	$where_query = "";
	if($branch != 'SUMBAGUT'){
		$where_query = "where Branch='$branch'";
	}

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d5 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d5 ".$where_query."
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosdata_d5($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d5
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosdata_d5 where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

//mkios voice
function  getRevenueBranchmkiosvoice_total($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_total 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosvoice_total where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosvoice_total($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_total
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosvoice_total where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueBranchmkiosvoice_d100($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d100 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosvoice_d100 where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}




function  getRevenueClustermkiosvoice_d100($cluster)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d100
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosvoice_d100 where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueBranchmkiosvoice_d50($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d50 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosvoice_d50 where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosvoice_d50($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d50
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosvoice_d50 where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueBranchmkiosvoice_d25($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d25 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosvoice_d25 where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosvoice_d25($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d25
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosvoice_d25 where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueBranchmkiosvoice_d20($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d20 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosvoice_d20 where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosvoice_d20($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d20
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosvoice_d20 where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueBranchmkiosvoice_d10($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d10 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosvoice_d10 where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosvoice_d10($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d10
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosvoice_d10 where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueBranchmkiosvoice_d5($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d5 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosvoice_d5 where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosvoice_d5($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d5
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosvoice_d5 where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

//mkios bulk
function  getRevenueBranchmkiosbulk($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosbulk 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', 
					sum(rev31)/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosbulk where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosbulk($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosbulk 
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosbulk where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

//mkios bulk lastmonth
function  getRevenueBranchmkiosbulk_lastmonth($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosbulk_lastmonth 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'   
					from tbl_Extended_Pivot_mkiosbulk_lastmonth where Branch like '$branch' group by Branch
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosbulk_lastmonth($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosbulk_lastmonth 
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'   
					from tbl_Extended_Pivot_mkiosbulk_lastmonth where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}
//mkiosdata inc
function  getRevenueBranchmkiosdata_inc($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_total 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'   
					from tbl_Extended_Pivot_mkiosdata_total where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosdata_inc($cluster)
{
	$cluster = str_replace("cluster ", "", $cluster);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_total 
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosdata_total where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

//mkios data lastmonth
function  getRevenueBranchmkiosdata_lastmonth_inc($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_total_lastmonth 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'   
					from tbl_Extended_Pivot_mkiosdata_total_lastmonth where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosdata_lastmonth_inc($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_total_lastmonth 
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosdata_total_lastmonth where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

//mkiosvoice inc
function  getRevenueBranchmkiosvoice_inc($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_total 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'   
					from tbl_Extended_Pivot_mkiosvoice_total where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosvoice_inc($cluster)
{
	$cluster = str_replace("cluster ", "", $cluster);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
			sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
			sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
			sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
			sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
			sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_total 
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosvoice_total where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

//mkios data lastmonth
function  getRevenueBranchmkiosvoice_lastmonth_inc($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_total_lastmonth 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'   
					from tbl_Extended_Pivot_mkiosvoice_total_lastmonth where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosvoice_lastmonth_inc($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_total_lastmonth 
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosvoice_total_lastmonth where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}


function  getRevenueBranchmkiosvoice_d5_lastmonth_inc($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d5_lastmonth 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'   
					from tbl_Extended_Pivot_mkiosvoice_d5_lastmonth where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosvoice_d5_lastmonth_inc($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d5_lastmonth 
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosvoice_d5_lastmonth where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

//mkios data lastmonth
function  getRevenueBranchmkiosvoice_d10_lastmonth_inc($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d10_lastmonth 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'   
					from tbl_Extended_Pivot_mkiosvoice_d10_lastmonth where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosvoice_d10_lastmonth_inc($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d10_lastmonth 
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosvoice_d10_lastmonth where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

//mkios data lastmonth
function  getRevenueBranchmkiosvoice_d20_lastmonth_inc($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d20_lastmonth 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'   
					from tbl_Extended_Pivot_mkiosvoice_d20_lastmonth where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosvoice_d20_lastmonth_inc($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d20_lastmonth 
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosvoice_d20_lastmonth where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

//mkios data lastmonth
function  getRevenueBranchmkiosvoice_d25_lastmonth_inc($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d25_lastmonth 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'   
					from tbl_Extended_Pivot_mkiosvoice_d25_lastmonth where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosvoice_d25_lastmonth_inc($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d25_lastmonth 
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosvoice_d25_lastmonth where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

//mkios data lastmonth
function  getRevenueBranchmkiosvoice_d50_lastmonth_inc($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d50_lastmonth 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'   
					from tbl_Extended_Pivot_mkiosvoice_d50_lastmonth where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosvoice_d50_lastmonth_inc($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d50_lastmonth 
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosvoice_d50_lastmonth where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

//mkios data lastmonth
function  getRevenueBranchmkiosvoice_d100_lastmonth_inc($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d100_lastmonth 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'   
					from tbl_Extended_Pivot_mkiosvoice_d100_lastmonth where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosvoice_d100_lastmonth_inc($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosvoice_d100_lastmonth 
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosvoice_d100_lastmonth where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueBranchmkiosdata_d5_lastmonth_inc($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d5_lastmonth 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'   
					from tbl_Extended_Pivot_mkiosdata_d5_lastmonth where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosdata_d5_lastmonth_inc($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d5_lastmonth 
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosdata_d5_lastmonth where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

//mkios data lastmonth
function  getRevenueBranchmkiosdata_d10_lastmonth_inc($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d10_lastmonth 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'   
					from tbl_Extended_Pivot_mkiosdata_d10_lastmonth where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosdata_d10_lastmonth_inc($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d10_lastmonth 
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosdata_d10_lastmonth where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

//mkios data lastmonth
function  getRevenueBranchmkiosdata_d20_lastmonth_inc($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d20_lastmonth 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'   
					from tbl_Extended_Pivot_mkiosdata_d20_lastmonth where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosdata_d20_lastmonth_inc($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d20_lastmonth 
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosdata_d20_lastmonth where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

//mkios data lastmonth
function  getRevenueBranchmkiosdata_d25_lastmonth_inc($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d25_lastmonth 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'   
					from tbl_Extended_Pivot_mkiosdata_d25_lastmonth where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosdata_d25_lastmonth_inc($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d25_lastmonth 
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosdata_d25_lastmonth where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

//mkios data lastmonth
function  getRevenueBranchmkiosdata_d50_lastmonth_inc($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d50_lastmonth 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'   
					from tbl_Extended_Pivot_mkiosdata_d50_lastmonth where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function  getRevenueClustermkiosdata_d50_lastmonth_inc($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d50_lastmonth 
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosdata_d50_lastmonth where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

//mkios data lastmonth
function  getRevenueBranchmkiosdata_d100_lastmonth_inc($branch)
{
	$branch = str_replace("Branch ", "", $branch);
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($branch == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d100_lastmonth 
		";
    }
    elseif($branch != 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31'   
					from tbl_Extended_Pivot_mkiosdata_d100_lastmonth where Branch like '$branch' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_branch = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_branch);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

/*function getRevenueRegionVoice($region)
{

}*/

function  getRevenueClustermkiosdata_d100_lastmonth_inc($cluster)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($cluster == 'SUMBAGUT')
    {
        $query = "	select sum(rev01)/1000000 as '1', sum(rev02)/1000000 as '2', sum(rev03)/1000000 as '3', sum(rev04)/1000000 as '4', sum(rev05)/1000000 as '5', 
					sum(rev06)/1000000 as '6', sum(rev07)/1000000 as '7', sum(rev08)/1000000 as '8', sum(rev09)/1000000 as '9', sum(rev10)/1000000 as '10',
					sum(rev11)/1000000 as '11', sum(rev12)/1000000 as '12', sum(rev13)/1000000 as '13', sum(rev14)/1000000 as '14', sum(rev15)/1000000 as '15', 
					sum(rev16)/1000000 as '16', sum(rev17)/1000000 as '17', sum(rev18)/1000000 as '18', sum(rev19)/1000000 as '19', sum(rev20)/1000000 as '20',
					sum(rev21)/1000000 as '21', sum(rev22)/1000000 as '22', sum(rev23)/1000000 as '23', sum(rev24)/1000000 as '24', sum(rev25)/1000000 as '25', 
					sum(rev26)/1000000 as '26', sum(rev27)/1000000 as '27', sum(rev28)/1000000 as '28', sum(rev29)/1000000 as '29', sum(rev30)/1000000 as '30', sum(rev31)/1000000 as '31' 
					from tbl_Extended_Pivot_mkiosdata_d100_lastmonth 
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "	select rev01/1000000 as '1', rev02/1000000 as '2', rev03/1000000 as '3', rev04/1000000 as '4', rev05/1000000 as '5', 
					rev06/1000000 as '6', rev07/1000000 as '7', rev08/1000000 as '8', rev09/1000000 as '9', rev10/1000000 as '10',
					rev11/1000000 as '11', rev12/1000000 as '12', rev13/1000000 as '13', rev14/1000000 as '14', rev15/1000000 as '15', 
					rev16/1000000 as '16', rev17/1000000 as '17', rev18/1000000 as '18', rev19/1000000 as '19', rev20/1000000 as '20',
					rev21/1000000 as '21', rev22/1000000 as '22', rev23/1000000 as '23', rev24/1000000 as '24', rev25/1000000 as '25', 
					rev26/1000000 as '26', rev27/1000000 as '27', rev28/1000000 as '28', rev29/1000000 as '29', rev30/1000000 as '30', 
					rev31/1000000 as '31'  
					from tbl_Extended_Pivot_mkiosdata_d100_lastmonth where Cluster like '$cluster' 
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueRegion_Now ($region)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($region == 'AREA SUMATERA')
    {
        $query = "	select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201811
					where level_daerah like 'SUMBAG%%'; 
		";
    }
    elseif($region != 'AREA SUMATERA')
    {
        $query = "	
					select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201811
					where level_daerah like '$region';
		";
    }

    try
    {
        $stmt = dbConnection_228()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueRegion_Lastmonth ($region)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($region == 'AREA SUMATERA')
    {
        $query = "	select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201810
					where level_daerah like 'SUMBAG%%'; 
		";
    }
    elseif($region != 'AREA SUMATERA')
    {
        $query = "	
					select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201810
					where level_daerah like '$region';
		";
    }

    try
    {
        $stmt = dbConnection_228()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueRegion_Lastyear ($region)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($region == 'AREA SUMATERA')
    {
        $query = "	select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201711
					where level_daerah like 'SUMBAG%%'; 
		";
    }
    elseif($region != 'AREA SUMATERA')
    {
        $query = "	
					select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201711
					where level_daerah like '$region';
		";
    }

    try
    {
        $stmt = dbConnection_228()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueL1_sumbagut ($l1)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($l1 == 'REVENUE ALL')
    {
        $query = "	select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201811
					where level_daerah like 'SUMBAGUT'; 
		";
    }
    elseif($l1 != 'REVENUE ALL')
    {
        $query = "	
					select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201811
					where level_daerah like 'SUMBAGUT' && level_layanan like '$l1';
		";
    }

    try
    {
        $stmt = dbConnection_228()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueL1_sumbagut_lastmonth ($l1)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($l1 == 'REVENUE ALL')
    {
        $query = "	select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201810
					where level_daerah like 'SUMBAGUT'; 
		";
    }
    elseif($l1 != 'REVENUE ALL')
    {
        $query = "	
					select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201810
					where level_daerah like 'SUMBAGUT' && level_layanan like '$l1';
		";
    }

    try
    {
        $stmt = dbConnection_228()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueL1_sumbagut_lastyear ($l1)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($l1 == 'REVENUE ALL')
    {
        $query = "	select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201711
					where level_daerah like 'SUMBAGUT'; 
		";
    }
    elseif($l1 != 'REVENUE ALL')
    {
        $query = "	
					select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201711
					where level_daerah like 'SUMBAGUT' && level_layanan like '$l1';
		";
    }

    try
    {
        $stmt = dbConnection_228()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueL1_sumbagteng ($l1)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($l1 == 'REVENUE ALL')
    {
        $query = "	select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201811
					where level_daerah like 'SUMBAGTENG'; 
		";
    }
    elseif($l1 != 'REVENUE ALL')
    {
        $query = "	
					select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_l1_201811
					where level_daerah like 'SUMBAGTENG' && level_layanan like '$l1';
		";
    }

    try
    {
        $stmt = dbConnection_228()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueL1_sumbagteng_lastmonth ($l1)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($l1 == 'REVENUE ALL')
    {
        $query = "	select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201810
					where level_daerah like 'SUMBAGTENG'; 
		";
    }
    elseif($l1 != 'REVENUE ALL')
    {
        $query = "	
					select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201810
					where level_daerah like 'SUMBAGTENG' && level_layanan like '$l1';
		";
    }

    try
    {
        $stmt = dbConnection_228()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueL1_sumbagteng_lastyear ($l1)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($l1 == 'REVENUE ALL')
    {
        $query = "	select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201711
					where level_daerah like 'SUMBAGTENG'; 
		";
    }
    elseif($l1 != 'REVENUE ALL')
    {
        $query = "	
					select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201711
					where level_daerah like 'SUMBAGTENG' && level_layanan like '$l1';
		";
    }

    try
    {
        $stmt = dbConnection_228()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueL1_sumbagsel ($l1)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($l1 == 'REVENUE ALL')
    {
        $query = "	select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201811
					where level_daerah like 'SUMBAGSEL'; 
		";
    }
    elseif($l1 != 'REVENUE ALL')
    {
        $query = "	
					select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_l1_201811
					where level_daerah like 'SUMBAGSEL' && level_layanan like '$l1';
		";
    }

    try
    {
        $stmt = dbConnection_228()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueL1_sumbagsel_lastmonth ($l1)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($l1 == 'REVENUE ALL')
    {
        $query = "	select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201810
					where level_daerah like 'SUMBAGSEL'; 
		";
    }
    elseif($l1 != 'REVENUE ALL')
    {
        $query = "	
					select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201810
					where level_daerah like 'SUMBAGSEL' && level_layanan like '$l1';
		";
    }

    try
    {
        $stmt = dbConnection_228()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueL1_sumbagsel_lastyear ($l1)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($l1 == 'REVENUE ALL')
    {
        $query = "	select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201710
					where level_daerah like 'SUMBAGSEL'; 
		";
    }
    elseif($l1 != 'REVENUE ALL')
    {
        $query = "	
					select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201710
					where level_daerah like 'SUMBAGSEL' && level_layanan like '$l1';
		";
    }

    try
    {
        $stmt = dbConnection_228()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueL1_area ($l1)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($l1 == 'REVENUE ALL')
    {
        $query = "	select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201811
					where level_daerah like 'SUMBAG%%'; 
		";
    }
    elseif($l1 != 'REVENUE ALL')
    {
        $query = "	
					select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_l1_201811
					where level_daerah like 'SUMBAG%%' && level_layanan like '$l1';
		";
    }

    try
    {
        $stmt = dbConnection_228()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueL1_area_lastmonth ($l1)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($l1 == 'REVENUE ALL')
    {
        $query = "	select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201810
					where level_daerah like 'SUMBAG%%'; 
		";
    }
    elseif($l1 != 'REVENUE ALL')
    {
        $query = "	
					select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201810
					where level_daerah like 'SUMBAG%%' && level_layanan like '$l1';
		";
    }

    try
    {
        $stmt = dbConnection_228()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueL1_area_lastyear ($l1)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($l1 == 'REVENUE ALL')
    {
        $query = "	select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201711
					where level_daerah like 'SUMBAG%%'; 
		";
    }
    elseif($l1 != 'REVENUE ALL')
    {
        $query = "	
					select sum(rev01)/1000000000 as '1' , sum(rev02)/1000000000 as '2', sum(rev03)/1000000000 as '3',
					sum(rev04)/1000000000 as '4', sum(rev05)/1000000000 as '5', sum(rev06)/1000000000 as '6',
					sum(rev07)/1000000000 as '7', sum(rev08)/1000000000 as '8', sum(rev09)/1000000000 as '9',
					sum(rev10)/1000000000 as '10',sum(rev11)/1000000000 as '11',sum(rev12)/1000000000 as '12',
					sum(rev13)/1000000000 as '13',sum(rev14)/1000000000 as '14',sum(rev15)/1000000000 as '15',
					sum(rev16)/1000000000 as '16',sum(rev17)/1000000000 as '17',sum(rev18)/1000000000 as '18',
					sum(rev19)/1000000000 as '19',sum(rev20)/1000000000 as '20',sum(rev21)/1000000000 as '21',
					sum(rev22)/1000000000 as '22',sum(rev23)/1000000000 as '23',sum(rev24)/1000000000 as '24',
					sum(rev25)/1000000000 as '25',sum(rev26)/1000000000 as '26',sum(rev27)/1000000000 as '27',
					sum(rev28)/1000000000 as '28',sum(rev29)/1000000000 as '29',sum(rev30)/1000000000 as '30',
					sum(rev31)/1000000000 as '31'
					from tbl_sum_pivot_2_revenue_total_201711
					where level_daerah like 'SUMBAG%%' && level_layanan like '$l1';
		";
    }

    try
    {
        $stmt = dbConnection_228()->prepare($query);
        $stmt->execute();
        $revenue_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

?>