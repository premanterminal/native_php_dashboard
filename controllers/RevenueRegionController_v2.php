<?php
session_start();

define('BL', true);

require_once('../controllers/LoginController.php');

if(!is_loggedin())
{
    redirect('login');
}

if(isset($_GET['l1']) && isset($_GET['sumbagut']))
{
    getRevenueL1Sumbagut($_GET['l1']);
}
elseif(isset($_GET['l1']) && isset($_GET['sumbagteng']))
{
    getRevenueL1Sumbagteng($_GET['l1']);
}
elseif(isset($_GET['l1']) && isset($_GET['sumbagsel']))
{
    getRevenueL1Sumbagsel($_GET['l1']);
}
elseif(isset($_GET['l1']) && isset($_GET['area']))
{
    getRevenueL1Area($_GET['l1']);
}

$date_x =date("Y/m/d");
$newdate = strtotime ( '-1 day' , strtotime ( $date_x ) ) ;
$newdate = date ( 'd' , $newdate );

function getRevenueL1Sumbagut($l1)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($L1 == 'Revenue All')
    {
        $query = "'
		select sum(rev01/1000000000) as r1, sum(rev02/1000000000) as r2, sum(rev03/1000000000) as r3, sum(rev04/1000000000) as r4, sum(rev05/1000000000) as r5, sum(rev06/1000000000) as r6,
		sum(rev07/1000000000) as r7, sum(rev08/1000000000) as r8, sum(rev09/1000000000) as r9, sum(rev10/1000000000) as r10, sum(rev11/1000000000) as r11, sum(rev12/1000000000) as r12,
		sum(rev13/1000000000) as r13, sum(rev14/1000000000) as r14, sum(rev15/1000000000) as r15, sum(rev16/1000000000) as r16, sum(rev17/1000000000) as r17, sum(rev18/1000000000) as r18,
		sum(rev19/1000000000) as r19, sum(rev20/1000000000) as r20, sum(rev21/1000000000) as r21, sum(rev22/1000000000) as r22, sum(rev23/1000000000) as r23, sum(rev24/1000000000) as r24,
		sum(rev25/1000000000) as r25, sum(rev26/1000000000) as r26, sum(rev27/1000000000) as r27, sum(rev28/1000000000) as r28, sum(rev29/1000000000) as r29, sum(rev30/1000000000) as r30, 
		sum(rev31/1000000000) as r31
		from tbl_sum_pivot_3_revenue_total_201807
		where level_daerah like 'SUMBAGUT';
		";
    }
    elseif($L1 != 'Revenue All')
    {
        $query = "
		select sum(rev01/1000000000) as r1, sum(rev02/1000000000) as r2, sum(rev03/1000000000) as r3, sum(rev04/1000000000) as r4, sum(rev05/1000000000) as r5, sum(rev06/1000000000) as r6,
		sum(rev07/1000000000) as r7, sum(rev08/1000000000) as r8, sum(rev09/1000000000) as r9, sum(rev10/1000000000) as r10, sum(rev11/1000000000) as r11, sum(rev12/1000000000) as r12,
		sum(rev13/1000000000) as r13, sum(rev14/1000000000) as r14, sum(rev15/1000000000) as r15, sum(rev16/1000000000) as r16, sum(rev17/1000000000) as r17, sum(rev18/1000000000) as r18,
		sum(rev19/1000000000) as r19, sum(rev20/1000000000) as r20, sum(rev21/1000000000) as r21, sum(rev22/1000000000) as r22, sum(rev23/1000000000) as r23, sum(rev24/1000000000) as r24,
		sum(rev25/1000000000) as r25, sum(rev26/1000000000) as r26, sum(rev27/1000000000) as r27, sum(rev28/1000000000) as r28, sum(rev29/1000000000) as r29, sum(rev30/1000000000) as r30, 
		sum(rev31/1000000000) as r31
		from tbl_sum_pivot_3_revenue_l1_201807
		where level_layanan like '$l1' && level_daerah like 'SUMBAGUT';
		";
    }

    try
    {
        $stmt = dbConnection_228()->prepare($query);
        $stmt->execute();
        $revenue_l1 = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_l1);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueL1Sumbagteng($l1)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($L1 == 'Revenue All')
    {
        $query = "'
		select sum(rev01/1000000000) as r1, sum(rev02/1000000000) as r2, sum(rev03/1000000000) as r3, sum(rev04/1000000000) as r4, sum(rev05/1000000000) as r5, sum(rev06/1000000000) as r6,
		sum(rev07/1000000000) as r7, sum(rev08/1000000000) as r8, sum(rev09/1000000000) as r9, sum(rev10/1000000000) as r10, sum(rev11/1000000000) as r11, sum(rev12/1000000000) as r12,
		sum(rev13/1000000000) as r13, sum(rev14/1000000000) as r14, sum(rev15/1000000000) as r15, sum(rev16/1000000000) as r16, sum(rev17/1000000000) as r17, sum(rev18/1000000000) as r18,
		sum(rev19/1000000000) as r19, sum(rev20/1000000000) as r20, sum(rev21/1000000000) as r21, sum(rev22/1000000000) as r22, sum(rev23/1000000000) as r23, sum(rev24/1000000000) as r24,
		sum(rev25/1000000000) as r25, sum(rev26/1000000000) as r26, sum(rev27/1000000000) as r27, sum(rev28/1000000000) as r28, sum(rev29/1000000000) as r29, sum(rev30/1000000000) as r30, 
		sum(rev31/1000000000) as r31
		from tbl_sum_pivot_3_revenue_total_201807
		where level_daerah like 'SUMBAGTENG';
		";
    }
    elseif($L1 != 'Revenue All')
    {
        $query = "
		select sum(rev01/1000000000) as r1, sum(rev02/1000000000) as r2, sum(rev03/1000000000) as r3, sum(rev04/1000000000) as r4, sum(rev05/1000000000) as r5, sum(rev06/1000000000) as r6,
		sum(rev07/1000000000) as r7, sum(rev08/1000000000) as r8, sum(rev09/1000000000) as r9, sum(rev10/1000000000) as r10, sum(rev11/1000000000) as r11, sum(rev12/1000000000) as r12,
		sum(rev13/1000000000) as r13, sum(rev14/1000000000) as r14, sum(rev15/1000000000) as r15, sum(rev16/1000000000) as r16, sum(rev17/1000000000) as r17, sum(rev18/1000000000) as r18,
		sum(rev19/1000000000) as r19, sum(rev20/1000000000) as r20, sum(rev21/1000000000) as r21, sum(rev22/1000000000) as r22, sum(rev23/1000000000) as r23, sum(rev24/1000000000) as r24,
		sum(rev25/1000000000) as r25, sum(rev26/1000000000) as r26, sum(rev27/1000000000) as r27, sum(rev28/1000000000) as r28, sum(rev29/1000000000) as r29, sum(rev30/1000000000) as r30, 
		sum(rev31/1000000000) as r31
		from tbl_sum_pivot_3_revenue_l1_201807
		where level_layanan like '$l1' && level_daerah like 'SUMBAGTENG';
		";
    }

    try
    {
        $stmt = dbConnection_228()->prepare($query);
        $stmt->execute();
        $revenue_l1 = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_l1);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueL1Sumbagsel($l1)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($L1 == 'Revenue All')
    {
        $query = "'
		select sum(rev01/1000000000) as r1, sum(rev02/1000000000) as r2, sum(rev03/1000000000) as r3, sum(rev04/1000000000) as r4, sum(rev05/1000000000) as r5, sum(rev06/1000000000) as r6,
		sum(rev07/1000000000) as r7, sum(rev08/1000000000) as r8, sum(rev09/1000000000) as r9, sum(rev10/1000000000) as r10, sum(rev11/1000000000) as r11, sum(rev12/1000000000) as r12,
		sum(rev13/1000000000) as r13, sum(rev14/1000000000) as r14, sum(rev15/1000000000) as r15, sum(rev16/1000000000) as r16, sum(rev17/1000000000) as r17, sum(rev18/1000000000) as r18,
		sum(rev19/1000000000) as r19, sum(rev20/1000000000) as r20, sum(rev21/1000000000) as r21, sum(rev22/1000000000) as r22, sum(rev23/1000000000) as r23, sum(rev24/1000000000) as r24,
		sum(rev25/1000000000) as r25, sum(rev26/1000000000) as r26, sum(rev27/1000000000) as r27, sum(rev28/1000000000) as r28, sum(rev29/1000000000) as r29, sum(rev30/1000000000) as r30, 
		sum(rev31/1000000000) as r31
		from tbl_sum_pivot_3_revenue_total_201807
		where level_daerah like 'SUMBAGSEL';
		";
    }
    elseif($L1 != 'Revenue All')
    {
        $query = "
		select sum(rev01/1000000000) as r1, sum(rev02/1000000000) as r2, sum(rev03/1000000000) as r3, sum(rev04/1000000000) as r4, sum(rev05/1000000000) as r5, sum(rev06/1000000000) as r6,
		sum(rev07/1000000000) as r7, sum(rev08/1000000000) as r8, sum(rev09/1000000000) as r9, sum(rev10/1000000000) as r10, sum(rev11/1000000000) as r11, sum(rev12/1000000000) as r12,
		sum(rev13/1000000000) as r13, sum(rev14/1000000000) as r14, sum(rev15/1000000000) as r15, sum(rev16/1000000000) as r16, sum(rev17/1000000000) as r17, sum(rev18/1000000000) as r18,
		sum(rev19/1000000000) as r19, sum(rev20/1000000000) as r20, sum(rev21/1000000000) as r21, sum(rev22/1000000000) as r22, sum(rev23/1000000000) as r23, sum(rev24/1000000000) as r24,
		sum(rev25/1000000000) as r25, sum(rev26/1000000000) as r26, sum(rev27/1000000000) as r27, sum(rev28/1000000000) as r28, sum(rev29/1000000000) as r29, sum(rev30/1000000000) as r30, 
		sum(rev31/1000000000) as r31
		from tbl_sum_pivot_3_revenue_l1_201807
		where level_layanan like '$l1' && level_daerah like 'SUMBAGSEL';
		";
    }

    try
    {
        $stmt = dbConnection_228()->prepare($query);
        $stmt->execute();
        $revenue_l1 = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_l1);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getRevenueL1Area($l1)
{
	$date =date("Y/m/d");
	$lastmonth = strtotime ( '-1 month' , strtotime ( $date ) ) ;
	$lastmonth = date ( 'm' , $lastmonth );
	$thismonth = strtotime ( '-2 day' , strtotime ( $date ) );
	$thismonth = date ( 'm' , $thismonth );
	//$month = if(date ( 'm' == 1);)
    $query = "";

    if($L1 == 'Revenue All')
    {
        $query = "'
		select sum(rev01/1000000000) as r1, sum(rev02/1000000000) as r2, sum(rev03/1000000000) as r3, sum(rev04/1000000000) as r4, sum(rev05/1000000000) as r5, sum(rev06/1000000000) as r6,
		sum(rev07/1000000000) as r7, sum(rev08/1000000000) as r8, sum(rev09/1000000000) as r9, sum(rev10/1000000000) as r10, sum(rev11/1000000000) as r11, sum(rev12/1000000000) as r12,
		sum(rev13/1000000000) as r13, sum(rev14/1000000000) as r14, sum(rev15/1000000000) as r15, sum(rev16/1000000000) as r16, sum(rev17/1000000000) as r17, sum(rev18/1000000000) as r18,
		sum(rev19/1000000000) as r19, sum(rev20/1000000000) as r20, sum(rev21/1000000000) as r21, sum(rev22/1000000000) as r22, sum(rev23/1000000000) as r23, sum(rev24/1000000000) as r24,
		sum(rev25/1000000000) as r25, sum(rev26/1000000000) as r26, sum(rev27/1000000000) as r27, sum(rev28/1000000000) as r28, sum(rev29/1000000000) as r29, sum(rev30/1000000000) as r30, 
		sum(rev31/1000000000) as r31
		from tbl_sum_pivot_3_revenue_total_201807
		where level_daerah like 'SUMBAG%%';
		";
    }
    elseif($L1 != 'Revenue All')
    {
        $query = "
		select sum(rev01/1000000000) as r1, sum(rev02/1000000000) as r2, sum(rev03/1000000000) as r3, sum(rev04/1000000000) as r4, sum(rev05/1000000000) as r5, sum(rev06/1000000000) as r6,
		sum(rev07/1000000000) as r7, sum(rev08/1000000000) as r8, sum(rev09/1000000000) as r9, sum(rev10/1000000000) as r10, sum(rev11/1000000000) as r11, sum(rev12/1000000000) as r12,
		sum(rev13/1000000000) as r13, sum(rev14/1000000000) as r14, sum(rev15/1000000000) as r15, sum(rev16/1000000000) as r16, sum(rev17/1000000000) as r17, sum(rev18/1000000000) as r18,
		sum(rev19/1000000000) as r19, sum(rev20/1000000000) as r20, sum(rev21/1000000000) as r21, sum(rev22/1000000000) as r22, sum(rev23/1000000000) as r23, sum(rev24/1000000000) as r24,
		sum(rev25/1000000000) as r25, sum(rev26/1000000000) as r26, sum(rev27/1000000000) as r27, sum(rev28/1000000000) as r28, sum(rev29/1000000000) as r29, sum(rev30/1000000000) as r30, 
		sum(rev31/1000000000) as r31
		from tbl_sum_pivot_3_revenue_l1_201807
		where level_layanan like '$l1' && level_daerah like 'SUMBAG%%';
		";
    }

    try
    {
        $stmt = dbConnection_228()->prepare($query);
        $stmt->execute();
        $revenue_l1 = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($revenue_l1);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

?>