<?php

session_start();

define('BL', true);

require_once('../controllers/LoginController.php');

if(!is_loggedin())
{
    redirect('login');
}

if(isset($_GET['branch']) && isset($_GET['last_year']))
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

$datea =date("Y/m/d");
$newdate = strtotime ( '-1 day' , strtotime ( $datea ) ) ;
$newdate = date ( 'd' , $newdate );

function getRevenueBranchLastYear($branch)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
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
		where cluster like 'Branch%' && bln = '$thismonth'
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
        from tbl_Extended_Pivot_dashboard_lastyear where cluster like '$branch' && bln = '$thismonth'
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
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
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
		where cluster like 'Branch%' && bln like '$thismonth'
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
        from tbl_Extended_Pivot_dashboard_now where cluster like '$branch' && bln like '$thismonth'";
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
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
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
		where cluster like 'Branch%' && bln like '$lastmonth'";
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
        from tbl_Extended_Pivot_dashboard_lastmonth where cluster like '$branch' && bln like '$lastmonth'";
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
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
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
		where bln like '$thismonth'
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
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
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
		where bln like '$thismonth'
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
        from tbl_Extended_Pivot_dashboard_now where cluster like '$cluster' && bln like '$thismonth'
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
	$thismonth = strtotime ( '-1 day' , strtotime ( $date ) );
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
		where bln like '$lastmonth'";
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
        from tbl_Extended_Pivot_dashboard_lastmonth where cluster like '$cluster' && bln like '$lastmonth'";
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

?>