<style>
html,body{height:100%; width:100%;} 
    .loading{background:transparent url('load.gif') no-repeat center center;}
</style>

<?php
session_start();

define('BL', true);

require_once('../common/config/DbController.php');
require_once('../common/controllers/CommonController.php');


$date =date("Y/m/d");
$newdate = strtotime ( '-2 day' , strtotime ( $date ) ) ;
$newdate = date ( 'd' , $newdate );
$periode = strtotime ( '-2 day' , strtotime ( $date ) ) ;
$periode = date ( 'Ymd' , $periode );

$font 	  	= "style=\"font-size:11px;\"";
$atable     = "style=\"margin-top:0px;background-color: white;border-collapse:collapse;border:0px solid black;\"";
$atable2    = "style=\"margin-top:6px;background-color: white;border-collapse:collapse;border:0px solid black;\"";
$atr        = " style=\"background-color: #F4A460;font-family:Lucida Sans; font-size:11px; color:#000000;border:0px solid white;\"";
$atr2       = " style=\"background-color: #F0FFFF;font-family:Lucida Sans; font-size:11px; color:#000000;border:0px solid white;\"";
$atr3       = " style=\"background-color: #E6E6FA;font-family:Lucida Sans; font-size:11px; color:#000000;border:0px solid white;\"";
$atd        = " style=\"border:0px solid white;\"";
$atd1       = " style=\"background-color: #A9A9A9;border:0px solid white;color:#FFFFFF;font-size:11px;\"";
$atd2       = " style=\"background-color: #4169E1;border:0px solid white;color:#FFFFFF;\"";
$atd3       = " style=\"background-color: #3CB371;border:0px solid white;color:#FFFFFF;font-size:11px;\"";
$atd4       = " style=\"background-color: #9370DB;border:0px solid white;color:#FFFFFF;font-size:11px;\"";
$atd5       = " style=\"background-color: #B22222;border:0px solid white;color:#FFFFFF;font-size:11px;\"";
$atd6       = " style=\"background-color: #008080;border:0px solid white;color:#FFFFFF;font-size:11px;\"";
$atd7       = " style=\"background-color: yellow;border:0px solid white;color:#000000;\"";
$atd8       = " style=\"background-color: green;border:0px solid white;color:#FFFFFF;\"";
$atd9       = " style=\"background-color: blue;border:0px solid white;color:#FFFFFF;\"";
$atd10      = " style=\"background-color: red;border:0px solid white;color:#FFFFFF;\"";
$atd11      = " style=\"background-color: orange;border:0px solid white;color:#FFFFFF;\"";
      

if(!is_loggedin())
{
	redirect('login');
}

switch($_GET['pilih'])
{
    default :

    try
	{
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_achv_performance_region 
		where period like '$periode' ;
		");
		$stmt->execute();
		$perf_new_region = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select tgl from tbl_sum_revenue_total_201811 order by tgl desc limit 1 ;
		");
		$stmt->execute();
		$tgl_vlr = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		/*$stmt = dbConnection_228()->prepare("
		select tgl,area,l1, actual,mom,yoy,ytd from tbl_sum_perf_area_l1
		where tgl like '$periode' && area like 'AREA 1' 
		&& l1 like 'Voice P2P' ;
		");
		$stmt->execute();
		$vlr_area_voice = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select tgl,area,l1, actual,mom,yoy,ytd from tbl_sum_perf_area_l1
		where tgl like '$periode' && area like 'AREA 1' 
		&& l1 like 'SMS P2P' ;
		");
		$stmt->execute();
		$vlr_area_sms = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select tgl,area,l1, actual,mom,yoy,ytd from tbl_sum_perf_area_l1
		where tgl like '$periode' && area like 'AREA 1' 
		&& l1 like 'Broadband' ;
		");
		$stmt->execute();
		$vlr_area_bb = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select tgl,area,l1, actual,mom,yoy,ytd from tbl_sum_perf_area_l1
		where tgl like '$periode' && area like 'AREA 1' 
		&& l1 like 'Digital Ser' ;
		");
		$stmt->execute();
		$vlr_area_digital = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select tgl,region,l1, actual,mom,yoy,ytd from tbl_sum_perf_region_l1
		where tgl like '$periode' && region like 'SUMBAGUT' 
		&& l1 like 'Voice P2P' ;
		");
		$stmt->execute();
		$vlr_sumbagut_voice = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select tgl,region,l1, actual,mom,yoy,ytd from tbl_sum_perf_region_l1
		where tgl like '$periode' && region like 'SUMBAGUT' 
		&& l1 like 'SMS P2P' ;
		");
		$stmt->execute();
		$vlr_sumbagut_sms = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select tgl,region,l1, actual,mom,yoy,ytd from tbl_sum_perf_region_l1
		where tgl like '$periode' && region like 'SUMBAGUT' 
		&& l1 like 'Broadband' ;
		");
		$stmt->execute();
		$vlr_sumbagut_bb = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select tgl,region,l1, actual,mom,yoy,ytd from tbl_sum_perf_region_l1
		where tgl like '$periode' && region like 'SUMBAGUT' 
		&& l1 like 'Digital Services' ;
		");
		$stmt->execute();
		$vlr_sumbagut_digital = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select tgl,region,l1, actual,mom,yoy,ytd from tbl_sum_perf_region_l1
		where tgl like '$periode' && region like 'SUMBAGSEL' 
		&& l1 like 'Voice P2P' ;
		");
		$stmt->execute();
		$vlr_sumbagsel_voice = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select tgl,region,l1, actual,mom,yoy,ytd from tbl_sum_perf_region_l1
		where tgl like '$periode' && region like 'SUMBAGSEL' 
		&& l1 like 'SMS P2P' ;
		");
		$stmt->execute();
		$vlr_sumbagsel_sms = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select tgl,region,l1, actual,mom,yoy,ytd from tbl_sum_perf_region_l1
		where tgl like '$periode' && region like 'SUMBAGSEL' 
		&& l1 like 'Broadband' ;
		");
		$stmt->execute();
		$vlr_sumbagsel_bb = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select tgl,region,l1, actual,mom,yoy,ytd from tbl_sum_perf_region_l1
		where tgl like '$periode' && region like 'SUMBAGSEL' 
		&& l1 like 'Digital Services' ;
		");
		$stmt->execute();
		$vlr_sumbagsel_digital = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select tgl,region,l1, actual,mom,yoy,ytd from tbl_sum_perf_region_l1
		where tgl like '$periode' && region like 'SUMBAGTENG' 
		&& l1 like 'Voice P2P';
		");
		$stmt->execute();
		$vlr_sumbagteng_voice = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select tgl,region,l1, actual,mom,yoy,ytd from tbl_sum_perf_region_l1
		where tgl like '$periode' && region like 'SUMBAGTENG' 
		&& l1 like 'SMS P2P';
		");
		$stmt->execute();
		$vlr_sumbagteng_sms = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select tgl,region,l1, actual,mom,yoy,ytd from tbl_sum_perf_region_l1
		where tgl like '$periode' && region like 'SUMBAGTENG' 
		&& l1 like 'Broadband';
		");
		$stmt->execute();
		$vlr_sumbagteng_bb = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select tgl,region,l1, actual,mom,yoy,ytd from tbl_sum_perf_region_l1
		where tgl like '$periode' && region like 'SUMBAGTENG' 
		&& l1 like 'Digital Services';
		");
		$stmt->execute();
		$vlr_sumbagteng_digital = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select tgl,region,l1, mom,yoy,ytd from tbl_sum_perf_region_l1
		where tgl like '$periode' && region like 'SUMBAGUT' ;
		");
		$stmt->execute();
		$vlr_sumbagut = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		select * from summary_performance where branch_cluster like 'SUMBAGUT';
		");
		$stmt->execute();
		$sumbagut_summary = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_tigers()->prepare("
		select actual, growth_mom, growth_yoyptd, growth_yoyytd 
		from tigers_lacci_vlr_reg_summary 
		where regional like 'SUMBAGTENG'
		order by date desc
		limit 1;
		");
		$stmt->execute();
		$sumbagteng_act = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_tigers()->prepare("
		select actual, growth_mom, growth_yoyptd, growth_yoyytd 
		from tigers_lacci_vlr_reg_summary 
		where regional like 'SUMBAGSEL'
		order by date desc
		limit 1;
		");
		$stmt->execute();
		$sumbagsel_act = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_tigers()->prepare("
		select actual from tigers_lacci_vlr_area_summary where area like 'AREA 1'
		order by date desc
		limit 1;
		");
		$stmt->execute();
		$area_act = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_act_4l1 where region like 'SUMBAGUT';
		");
		$stmt->execute();
		$sumbagut_4l1_act = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_act_4l1 where region like 'SUMBAGTENG';
		");
		$stmt->execute();
		$sumbagteng_4l1_act = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_act_4l1 where region like 'SUMBAGSEL';
		");
		$stmt->execute();
		$sumbagsel_4l1_act = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select * from tbl_sum_act_4l1 where region like 'AREA 1';
		");
		$stmt->execute();
		$area_4l1_act = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select a.region, (a.voice/b.voice)-1 as ytd_voice,
		(a.sms/b.sms)-1 as ytd_sms, (a.broadband/b.broadband)-1 as ytd_broadband,
		(a.digital/b.digital)-1 as ytd_digital
		from 
		(select * from tbl_sum_ytd_4l1) a
		inner join 
		(select * from tbl_sum_fullyear_4l1) b
		on a.region = b.region
		where a.region like 'SUMBAGUT';
		");
		$stmt->execute();
		$ytd_4l1_sumbagut = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select a.region, (a.voice/b.voice)-1 as ytd_voice,
		(a.sms/b.sms)-1 as ytd_sms, (a.broadband/b.broadband)-1 as ytd_broadband,
		(a.digital/b.digital)-1 as ytd_digital
		from 
		(select * from tbl_sum_ytd_4l1) a
		inner join 
		(select * from tbl_sum_fullyear_4l1) b
		on a.region = b.region
		where a.region like 'SUMBAGTENG';
		");
		$stmt->execute();
		$ytd_4l1_sumbagteng = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select a.region, (a.voice/b.voice)-1 as ytd_voice,
		(a.sms/b.sms)-1 as ytd_sms, (a.broadband/b.broadband)-1 as ytd_broadband,
		(a.digital/b.digital)-1 as ytd_digital
		from 
		(select * from tbl_sum_ytd_4l1) a
		inner join 
		(select * from tbl_sum_fullyear_4l1) b
		on a.region = b.region
		where a.region like 'SUMBAGSEL';
		");
		$stmt->execute();
		$ytd_4l1_sumbagsel = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select (sum(a.voice)/sum(b.voice))-1 as ytd_voice,
		(sum(a.sms)/sum(b.sms))-1 as ytd_sms, (sum(a.broadband)/sum(b.broadband))-1 as ytd_broadband,
		(sum(a.digital)/sum(b.digital))-1 as ytd_digital
		from 
		(select * from tbl_sum_ytd_4l1) a
		inner join 
		(select * from tbl_sum_fullyear_4l1) b
		on a.region = b.region;
		");
		$stmt->execute();
		$ytd_4l1_area = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = dbConnection_228()->prepare("
		select sum(rev01/1000000000) as r1, sum(rev02/1000000000) as r2, sum(rev03/1000000000) as r3, sum(rev04/1000000000) as r4, sum(rev05/1000000000) as r5, sum(rev06/1000000000) as r6,
		sum(rev07/1000000000) as r7, sum(rev08/1000000000) as r8, sum(rev09/1000000000) as r9, sum(rev10/1000000000) as r10, sum(rev11/1000000000) as r11, sum(rev12/1000000000) as r12,
		sum(rev13/1000000000) as r13, sum(rev14/1000000000) as r14, sum(rev15/1000000000) as r15, sum(rev16/1000000000) as r16, sum(rev17/1000000000) as r17, sum(rev18/1000000000) as r18,
		sum(rev19/1000000000) as r19, sum(rev20/1000000000) as r20, sum(rev21/1000000000) as r21, sum(rev22/1000000000) as r22, sum(rev23/1000000000) as r23, sum(rev24/1000000000) as r24,
		sum(rev25/1000000000) as r25, sum(rev26/1000000000) as r26, sum(rev27/1000000000) as r27, sum(rev28/1000000000) as r28, sum(rev29/1000000000) as r29, sum(rev30/1000000000) as r30, 
		sum(rev31/1000000000) as r31
		from tbl_sum_pivot_3_revenue_total_201811
		where level_daerah like 'SUMBAG%%';
		");
		$stmt->execute();
		$comparing_total_area_now = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select sum(rev01/1000000000) as r1, sum(rev02/1000000000) as r2, sum(rev03/1000000000) as r3, sum(rev04/1000000000) as r4, sum(rev05/1000000000) as r5, sum(rev06/1000000000) as r6,
		sum(rev07/1000000000) as r7, sum(rev08/1000000000) as r8, sum(rev09/1000000000) as r9, sum(rev10/1000000000) as r10, sum(rev11/1000000000) as r11, sum(rev12/1000000000) as r12,
		sum(rev13/1000000000) as r13, sum(rev14/1000000000) as r14, sum(rev15/1000000000) as r15, sum(rev16/1000000000) as r16, sum(rev17/1000000000) as r17, sum(rev18/1000000000) as r18,
		sum(rev19/1000000000) as r19, sum(rev20/1000000000) as r20, sum(rev21/1000000000) as r21, sum(rev22/1000000000) as r22, sum(rev23/1000000000) as r23, sum(rev24/1000000000) as r24,
		sum(rev25/1000000000) as r25, sum(rev26/1000000000) as r26, sum(rev27/1000000000) as r27, sum(rev28/1000000000) as r28, sum(rev29/1000000000) as r29, sum(rev30/1000000000) as r30, 
		sum(rev31/1000000000) as r31
		from tbl_sum_pivot_3_revenue_total_201711
		where level_daerah like 'SUMBAG%%';	
		");
		$stmt->execute();
		$comparing_total_area_lastyear = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select sum(rev01/1000000000) as r1, sum(rev02/1000000000) as r2, sum(rev03/1000000000) as r3, sum(rev04/1000000000) as r4, sum(rev05/1000000000) as r5, sum(rev06/1000000000) as r6,
		sum(rev07/1000000000) as r7, sum(rev08/1000000000) as r8, sum(rev09/1000000000) as r9, sum(rev10/1000000000) as r10, sum(rev11/1000000000) as r11, sum(rev12/1000000000) as r12,
		sum(rev13/1000000000) as r13, sum(rev14/1000000000) as r14, sum(rev15/1000000000) as r15, sum(rev16/1000000000) as r16, sum(rev17/1000000000) as r17, sum(rev18/1000000000) as r18,
		sum(rev19/1000000000) as r19, sum(rev20/1000000000) as r20, sum(rev21/1000000000) as r21, sum(rev22/1000000000) as r22, sum(rev23/1000000000) as r23, sum(rev24/1000000000) as r24,
		sum(rev25/1000000000) as r25, sum(rev26/1000000000) as r26, sum(rev27/1000000000) as r27, sum(rev28/1000000000) as r28, sum(rev29/1000000000) as r29, sum(rev30/1000000000) as r30, 
		sum(rev31/1000000000) as r31
		from tbl_sum_pivot_3_revenue_total_201810
		where level_daerah like 'SUMBAG%%'	
		");
		$stmt->execute();
		$comparing_total_area_lastmonth = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = dbConnection_228()->prepare("
			select sum(rev01/1000000000) as r1, sum(rev02/1000000000) as r2, sum(rev03/1000000000) as r3, sum(rev04/1000000000) as r4, sum(rev05/1000000000) as r5, sum(rev06/1000000000) as r6,
			sum(rev07/1000000000) as r7, sum(rev08/1000000000) as r8, sum(rev09/1000000000) as r9, sum(rev10/1000000000) as r10, sum(rev11/1000000000) as r11, sum(rev12/1000000000) as r12,
			sum(rev13/1000000000) as r13, sum(rev14/1000000000) as r14, sum(rev15/1000000000) as r15, sum(rev16/1000000000) as r16, sum(rev17/1000000000) as r17, sum(rev18/1000000000) as r18,
			sum(rev19/1000000000) as r19, sum(rev20/1000000000) as r20, sum(rev21/1000000000) as r21, sum(rev22/1000000000) as r22, sum(rev23/1000000000) as r23, sum(rev24/1000000000) as r24,
			sum(rev25/1000000000) as r25, sum(rev26/1000000000) as r26, sum(rev27/1000000000) as r27, sum(rev28/1000000000) as r28, sum(rev29/1000000000) as r29, sum(rev30/1000000000) as r30, sum(rev31/1000000000) as r31
			from tbl_sum_pivot_3_revenue_total_201811
			where level_daerah like 'SUMBAG%%'
		");
		$stmt->execute();
		$comparing_total_area = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
			select level_daerah, rev01/1000000000 as r1, rev02/1000000000 as r2, rev03/1000000000 as r3, rev04/1000000000 as r4, rev05/1000000000 as r5, rev06/1000000000 as r6,
			rev07/1000000000 as r7, rev08/1000000000 as r8, rev09/1000000000 as r9, rev10/1000000000 as r10, rev11/1000000000 as r11, rev12/1000000000 as r12,
			rev13/1000000000 as r13, rev14/1000000000 as r14, rev15/1000000000 as r15, rev16/1000000000 as r16, rev17/1000000000 as r17, rev18/1000000000 as r18,
			rev19/1000000000 as r19, rev20/1000000000 as r20, rev21/1000000000 as r21, rev22/1000000000 as r22, rev23/1000000000 as r23, rev24/1000000000 as r24,
			rev25/1000000000 as r25, rev26/1000000000 as r26, rev27/1000000000 as r27, rev28/1000000000 as r28, rev29/1000000000 as r29, rev30/1000000000 as r30, rev31/1000000000 as r31
			from tbl_sum_pivot_3_revenue_total_201811
			where level_daerah like 'SUMBAG%%'
			order by level_daerah desc;
		");
		$stmt->execute();
		$comparing_total = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_tigers()->prepare("
			select sum(a.growth_yoyptd)/3 as yoyptd_area, sum(a.growth_mom)/3 as mom_area, 
			sum(a.growth_yoyytd)/3 as yoyytd_area
			from 
			(
			select date,regional,growth_yoyptd, growth_mom, growth_yoyytd from tigers_lacci_vlr_reg_summary
			order by date desc limit 3
			) a
		");
		$stmt->execute();
		$tigers_area = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_tigers()->prepare("
			select date,regional,growth_yoyptd, growth_mom, growth_yoyytd from tigers_lacci_vlr_reg_summary
			where regional like 'SUMBAGUT'
			order by date desc limit 1;
		");
		$stmt->execute();
		$tigers_sumbagut = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_tigers()->prepare("
			select date,regional,growth_yoyptd, growth_mom, growth_yoyytd from tigers_lacci_vlr_reg_summary
			where regional like 'SUMBAGSEL'
			order by date desc limit 1;
		");
		$stmt->execute();
		$tigers_sumbagsel = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_tigers()->prepare("
			select date,regional,growth_yoyptd, growth_mom, growth_yoyytd from tigers_lacci_vlr_reg_summary
			where regional like 'SUMBAGTENG'
			order by date desc limit 1;
		");
		$stmt->execute();
		$tigers_sumbagteng = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnection_228()->prepare("
		select  
		sum(yi.yoy_region_total)/3 as yoy_region_total_area, 
		sum(yj.yoy_region_voice)/3 as yoy_region_voice_area, 
		sum(yk.yoy_region_sms)/3 as yoy_region_sms_area, 
		sum(yl.yoy_region_broadband)/3 as yoy_region_broadband_area, 
		sum(ym.yoy_region_digital)/3 as yoy_region_digital_area
		from
		(
			select a.level_daerah, a.act_thismonth_total, (a.act_thismonth_total/b.act_lastyear_total)-1 as yoy_region_total
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_total
				from tbl_sum_revenue_total_201809 
				where level_daerah like 'SUM%%' 
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastyear_total
				from tbl_sum_revenue_total_201708 
				where level_daerah like 'SUM%%' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) yi
		left join
		(
			select a.level_daerah, a.act_thismonth_voice, (a.act_thismonth_voice/b.act_lastyear_voice)-1 as yoy_region_voice
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_voice 
				from tbl_sum_revenue_l1_201809 
				where tahun = '2019' && level_daerah like 'SUM%%' && level_layanan like 'voice p2p'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastyear_voice 
				from tbl_sum_revenue_l1_201708 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'voice p2p' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) yj
		on yi.level_daerah = yj.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_sms, (a.act_thismonth_sms/b.act_lastyear_sms)-1 as yoy_region_sms
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_sms 
				from tbl_sum_revenue_l1_201809 
				where tahun = '2019' && level_daerah like 'SUM%%' && level_layanan like 'sms p2p'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastyear_sms 
				from tbl_sum_revenue_l1_201708 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'sms p2p' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) yk
		on yj.level_daerah = yk.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_broadband, (a.act_thismonth_broadband/b.act_lastyear_broadband)-1 as yoy_region_broadband
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_broadband 
				from tbl_sum_revenue_l1_201809 
				where tahun = '2019' && level_daerah like 'SUM%%' && level_layanan like 'broadband'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastyear_broadband
				from tbl_sum_revenue_l1_201708 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'broadband' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) yl
		on yk.level_daerah = yl.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_digital, (a.act_thismonth_digital/b.act_lastyear_digital)-1 as yoy_region_digital
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_digital 
				from tbl_sum_revenue_l1_201809 
				where tahun = '2019' && level_daerah like 'SUM%%' && level_layanan like 'digital services'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastyear_digital
				from tbl_sum_revenue_l1_201708 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'digital services' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) ym
		on yl.level_daerah = ym.level_daerah
		where yi.level_daerah like 'SUMBAG%%'
		order by yi.level_daerah;
		
		");
		$stmt->execute();
		$yoy_area = $stmt->fetchAll(PDO::FETCH_ASSOC);

		
		$stmt = dbConnection_228()->prepare("
		select  
		sum(xi.act_thismonth_total/1000000000) as act_thismonth_total_area , 
		sum(xi.mom_region_total)/3 as mom_region_total_area, 
		(sum(xj.act_thismonth_voice/1000000000)) as act_thismonth_voice_area, 
		sum(xj.mom_region_voice)/3 as mom_region_voice_area, 
		(sum(xk.act_thismonth_sms/1000000000)) as act_thismonth_sms_area, 
		sum(xk.mom_region_sms)/3 as mom_region_sms_area, 
		(sum(xl.act_thismonth_broadband/1000000000)) as act_thismonth_broadband_area, 
		sum(xl.mom_region_broadband)/3 as mom_region_broadband_area, 
		(sum(xm.act_thismonth_digital/1000000000)) as act_thismonth_digital_area, 
		sum(xm.mom_region_digital)/3 as mom_region_digital_area
		from
		(
			select a.level_daerah, a.act_thismonth_total, (a.act_thismonth_total/b.act_lastmonth_total)-1 as mom_region_total
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_total
				from tbl_sum_revenue_total_201808 
				where level_daerah like 'SUM%%' 
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastmonth_total
				from tbl_sum_revenue_total_201807 
				where level_daerah like 'SUM%%' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) xi
		left join
		(
			select a.level_daerah, a.act_thismonth_voice, (a.act_thismonth_voice/b.act_lastmonth_voice)-1 as mom_region_voice
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_voice 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'voice p2p'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastmonth_voice 
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'voice p2p' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) xj
		on xi.level_daerah = xj.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_sms, (a.act_thismonth_sms/b.act_lastmonth_sms)-1 as mom_region_sms
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_sms 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'sms p2p'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastmonth_sms 
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'sms p2p' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) xk
		on xj.level_daerah = xk.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_broadband, (a.act_thismonth_broadband/b.act_lastmonth_broadband)-1 as mom_region_broadband
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_broadband 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'broadband'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastmonth_broadband
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'broadband' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) xl
		on xk.level_daerah = xl.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_digital, (a.act_thismonth_digital/b.act_lastmonth_digital)-1 as mom_region_digital
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_digital 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'digital services'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastmonth_digital
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'digital services' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) xm
		on xl.level_daerah = xm.level_daerah
		where xi.level_daerah like 'SUMBAG%%'
		order by xi.level_daerah;
		
		");
		$stmt->execute();
		$mom_area = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
    	
		
		$stmt = dbConnection_228()->prepare("
		
		select xi.level_daerah, xi.act_thismonth_total/1000000000 as act_thismonth_total, xi.mom_region_total, 
		xj.act_thismonth_voice/1000000000 as act_thismonth_voice, xj.mom_region_voice, 
		xk.act_thismonth_sms/1000000000 as act_thismonth_sms, xk.mom_region_sms, 
		xl.act_thismonth_broadband/1000000000 as act_thismonth_broadband, xl.mom_region_broadband, 
		xm.act_thismonth_digital/1000000000 as act_thismonth_digital, xm.mom_region_digital
		from
		(
			select a.level_daerah, a.act_thismonth_total, (a.act_thismonth_total/b.act_lastmonth_total)-1 as mom_region_total
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_total
				from tbl_sum_revenue_total_201808 
				where level_daerah like 'SUM%%' 
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastmonth_total
				from tbl_sum_revenue_total_201807 
				where level_daerah like 'SUM%%' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) xi
		left join
		(
			select a.level_daerah, a.act_thismonth_voice, (a.act_thismonth_voice/b.act_lastmonth_voice)-1 as mom_region_voice
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_voice 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'voice p2p'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastmonth_voice 
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'voice p2p' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) xj
		on xi.level_daerah = xj.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_sms, (a.act_thismonth_sms/b.act_lastmonth_sms)-1 as mom_region_sms
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_sms 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'sms p2p'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastmonth_sms 
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'sms p2p' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) xk
		on xj.level_daerah = xk.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_broadband, (a.act_thismonth_broadband/b.act_lastmonth_broadband)-1 as mom_region_broadband
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_broadband 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'broadband'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastmonth_broadband
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'broadband' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) xl
		on xk.level_daerah = xl.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_digital, (a.act_thismonth_digital/b.act_lastmonth_digital)-1 as mom_region_digital
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_digital 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'digital services'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastmonth_digital
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'digital services' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) xm
		on xl.level_daerah = xm.level_daerah
		where xi.level_daerah like 'SUMBAGUT'
		group by xi.level_daerah
		order by xi.level_daerah;
		");
		$stmt->execute();
		$region_mom_sumbagut = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
    	$stmt = dbConnection_228()->prepare("
		select yi.level_daerah, yi.act_thismonth_total, yi.yoy_region_total, 
		yj.act_thismonth_voice, yj.yoy_region_voice, 
		yk.act_thismonth_sms, yk.yoy_region_sms, 
		yl.act_thismonth_broadband, yl.yoy_region_broadband, 
		ym.act_thismonth_digital, ym.yoy_region_digital
		from
		(
			select a.level_daerah, a.act_thismonth_total, (a.act_thismonth_total/b.act_lastyear_total)-1 as yoy_region_total
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_total
				from tbl_sum_revenue_total_201808 
				where level_daerah like 'SUM%%' 
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastyear_total
				from tbl_sum_revenue_total_201807 
				where level_daerah like 'SUM%%' && tgl between '01' and '15'
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) yi
		left join
		(
			select a.level_daerah, a.act_thismonth_voice, (a.act_thismonth_voice/b.act_lastyear_voice)-1 as yoy_region_voice
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_voice 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'voice p2p'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastyear_voice 
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'voice p2p' && tgl between '01' and '15'
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) yj
		on yi.level_daerah = yj.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_sms, (a.act_thismonth_sms/b.act_lastyear_sms)-1 as yoy_region_sms
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_sms 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'sms p2p'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastyear_sms 
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'sms p2p' && tgl between '01' and '15'
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) yk
		on yj.level_daerah = yk.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_broadband, (a.act_thismonth_broadband/b.act_lastyear_broadband)-1 as yoy_region_broadband
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_broadband 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'broadband'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastyear_broadband
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'broadband' && tgl between '01' and '15'
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) yl
		on yk.level_daerah = yl.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_digital, (a.act_thismonth_digital/b.act_lastyear_digital)-1 as yoy_region_digital
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_digital 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'digital services'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastyear_digital
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'digital services' && tgl between '01' and '15'
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) ym
		on yl.level_daerah = ym.level_daerah
		where yi.level_daerah like 'SUMBAGUT'
		group by yi.level_daerah
		order by yi.level_daerah;
		");
		$stmt->execute();
		$region_yoy_sumbagut = $stmt->fetchAll(PDO::FETCH_ASSOC);	
		
		$stmt = dbConnection_228()->prepare("
		
		select xi.level_daerah, xi.act_thismonth_total/1000000000 as act_thismonth_total, xi.mom_region_total, 
		xj.act_thismonth_voice/1000000000 as act_thismonth_voice, xj.mom_region_voice, 
		xk.act_thismonth_sms/1000000000 as act_thismonth_sms, xk.mom_region_sms, 
		xl.act_thismonth_broadband/1000000000 as act_thismonth_broadband, xl.mom_region_broadband, 
		xm.act_thismonth_digital/1000000000 as act_thismonth_digital, xm.mom_region_digital
		from
		(
			select a.level_daerah, a.act_thismonth_total, (a.act_thismonth_total/b.act_lastmonth_total)-1 as mom_region_total
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_total
				from tbl_sum_revenue_total_201808 
				where level_daerah like 'SUM%%' 
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastmonth_total
				from tbl_sum_revenue_total_201807 
				where level_daerah like 'SUM%%' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) xi
		left join
		(
			select a.level_daerah, a.act_thismonth_voice, (a.act_thismonth_voice/b.act_lastmonth_voice)-1 as mom_region_voice
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_voice 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'voice p2p'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastmonth_voice 
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'voice p2p' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) xj
		on xi.level_daerah = xj.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_sms, (a.act_thismonth_sms/b.act_lastmonth_sms)-1 as mom_region_sms
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_sms 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'sms p2p'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastmonth_sms 
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'sms p2p' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) xk
		on xj.level_daerah = xk.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_broadband, (a.act_thismonth_broadband/b.act_lastmonth_broadband)-1 as mom_region_broadband
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_broadband 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'broadband'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastmonth_broadband
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'broadband' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) xl
		on xk.level_daerah = xl.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_digital, (a.act_thismonth_digital/b.act_lastmonth_digital)-1 as mom_region_digital
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_digital 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'digital services'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastmonth_digital
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'digital services' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) xm
		on xl.level_daerah = xm.level_daerah
		where xi.level_daerah like 'SUMBAGSEL'
		group by xi.level_daerah
		order by xi.level_daerah;
		");
		$stmt->execute();
		$region_mom_sumbagsel = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
    	$stmt = dbConnection_228()->prepare("
		select yi.level_daerah, yi.act_thismonth_total, yi.yoy_region_total, 
		yj.act_thismonth_voice, yj.yoy_region_voice, 
		yk.act_thismonth_sms, yk.yoy_region_sms, 
		yl.act_thismonth_broadband, yl.yoy_region_broadband, 
		ym.act_thismonth_digital, ym.yoy_region_digital
		from
		(
			select a.level_daerah, a.act_thismonth_total, (a.act_thismonth_total/b.act_lastyear_total)-1 as yoy_region_total
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_total
				from tbl_sum_revenue_total_201808 
				where level_daerah like 'SUM%%' 
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastyear_total
				from tbl_sum_revenue_total_201807 
				where level_daerah like 'SUM%%' && tgl between '01' and '15'
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) yi
		left join
		(
			select a.level_daerah, a.act_thismonth_voice, (a.act_thismonth_voice/b.act_lastyear_voice)-1 as yoy_region_voice
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_voice 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'voice p2p'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastyear_voice 
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'voice p2p' && tgl between '01' and '15'
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) yj
		on yi.level_daerah = yj.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_sms, (a.act_thismonth_sms/b.act_lastyear_sms)-1 as yoy_region_sms
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_sms 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'sms p2p'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastyear_sms 
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'sms p2p' && tgl between '01' and '15'
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) yk
		on yj.level_daerah = yk.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_broadband, (a.act_thismonth_broadband/b.act_lastyear_broadband)-1 as yoy_region_broadband
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_broadband 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'broadband'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastyear_broadband
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'broadband' && tgl between '01' and '15'
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) yl
		on yk.level_daerah = yl.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_digital, (a.act_thismonth_digital/b.act_lastyear_digital)-1 as yoy_region_digital
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_digital 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'digital services'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastyear_digital
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'digital services' && tgl between '01' and '15'
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) ym
		on yl.level_daerah = ym.level_daerah
		where yi.level_daerah like 'SUMBAGSEL'
		group by yi.level_daerah
		order by yi.level_daerah;
		");
		$stmt->execute();
		$region_yoy_sumbagsel = $stmt->fetchAll(PDO::FETCH_ASSOC);	
		
    	$stmt = dbConnection_228()->prepare("
		
		select xi.level_daerah, xi.act_thismonth_total/1000000000 as act_thismonth_total, xi.mom_region_total, 
		xj.act_thismonth_voice/1000000000 as act_thismonth_voice, xj.mom_region_voice, 
		xk.act_thismonth_sms/1000000000 as act_thismonth_sms, xk.mom_region_sms, 
		xl.act_thismonth_broadband/1000000000 as act_thismonth_broadband, xl.mom_region_broadband, 
		xm.act_thismonth_digital/1000000000 as act_thismonth_digital, xm.mom_region_digital
		from
		(
			select a.level_daerah, a.act_thismonth_total, (a.act_thismonth_total/b.act_lastmonth_total)-1 as mom_region_total
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_total
				from tbl_sum_revenue_total_201808 
				where level_daerah like 'SUM%%' 
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastmonth_total
				from tbl_sum_revenue_total_201807 
				where level_daerah like 'SUM%%' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) xi
		left join
		(
			select a.level_daerah, a.act_thismonth_voice, (a.act_thismonth_voice/b.act_lastmonth_voice)-1 as mom_region_voice
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_voice 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'voice p2p'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastmonth_voice 
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'voice p2p' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) xj
		on xi.level_daerah = xj.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_sms, (a.act_thismonth_sms/b.act_lastmonth_sms)-1 as mom_region_sms
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_sms 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'sms p2p'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastmonth_sms 
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'sms p2p' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) xk
		on xj.level_daerah = xk.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_broadband, (a.act_thismonth_broadband/b.act_lastmonth_broadband)-1 as mom_region_broadband
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_broadband 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'broadband'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastmonth_broadband
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'broadband' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) xl
		on xk.level_daerah = xl.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_digital, (a.act_thismonth_digital/b.act_lastmonth_digital)-1 as mom_region_digital
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_digital 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'digital services'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastmonth_digital
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'digital services' && tgl between '01' and $newdate
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) xm
		on xl.level_daerah = xm.level_daerah
		where xi.level_daerah like 'SUMBAGTENG'
		group by xi.level_daerah
		order by xi.level_daerah;
		");
		$stmt->execute();
		$region_mom_sumbagteng = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
    	$stmt = dbConnection_228()->prepare("
		select yi.level_daerah, yi.act_thismonth_total, yi.yoy_region_total, 
		yj.act_thismonth_voice, yj.yoy_region_voice, 
		yk.act_thismonth_sms, yk.yoy_region_sms, 
		yl.act_thismonth_broadband, yl.yoy_region_broadband, 
		ym.act_thismonth_digital, ym.yoy_region_digital
		from
		(
			select a.level_daerah, a.act_thismonth_total, (a.act_thismonth_total/b.act_lastyear_total)-1 as yoy_region_total
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_total
				from tbl_sum_revenue_total_201808 
				where level_daerah like 'SUM%%' 
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastyear_total
				from tbl_sum_revenue_total_201807 
				where level_daerah like 'SUM%%' && tgl between '01' and '15'
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) yi
		left join
		(
			select a.level_daerah, a.act_thismonth_voice, (a.act_thismonth_voice/b.act_lastyear_voice)-1 as yoy_region_voice
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_voice 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'voice p2p'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastyear_voice 
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'voice p2p' && tgl between '01' and '15'
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) yj
		on yi.level_daerah = yj.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_sms, (a.act_thismonth_sms/b.act_lastyear_sms)-1 as yoy_region_sms
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_sms 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'sms p2p'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastyear_sms 
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'sms p2p' && tgl between '01' and '15'
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) yk
		on yj.level_daerah = yk.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_broadband, (a.act_thismonth_broadband/b.act_lastyear_broadband)-1 as yoy_region_broadband
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_broadband 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'broadband'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastyear_broadband
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'broadband' && tgl between '01' and '15'
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) yl
		on yk.level_daerah = yl.level_daerah
		left join
		(
			select a.level_daerah, a.act_thismonth_digital, (a.act_thismonth_digital/b.act_lastyear_digital)-1 as yoy_region_digital
			from 
			(
				select level_daerah, sum(revenue) as act_thismonth_digital 
				from tbl_sum_revenue_l1_201808 
				where tahun = '2018' && level_daerah like 'SUM%%' && level_layanan like 'digital services'
				group by level_daerah
				order by level_daerah
			) a
			left join
			(
				select level_daerah, sum(revenue) as act_lastyear_digital
				from tbl_sum_revenue_l1_201807 
				where tahun = '2018' &&  level_daerah like 'SUM%%' && level_layanan like 'digital services' && tgl between '01' and '15'
				group by level_daerah
				order by level_daerah
			)b
			on a.level_daerah = b.level_daerah
			group by level_daerah
			order by level_daerah
		) ym
		on yl.level_daerah = ym.level_daerah
		where yi.level_daerah like 'SUMBAGTENG'
		group by yi.level_daerah
		order by yi.level_daerah;
		");
		$stmt->execute();
		$region_yoy_sumbagteng = $stmt->fetchAll(PDO::FETCH_ASSOC);	*/	
	}
	catch(PDOException $e)
	{
		//echo $e->getMessage();echo $newdate; //
	}
?>
<main>
	<div class="loading" alt="Loading...">
	
	</div>
    <section class="pb-4">
        <div class="card">
        	<h3 class="card-header teal darken-3 white-text">VLR REGION      
			<?Php foreach ($tgl_vlr as $data) {print $data['tgl']. "\n";} ?> November 2018 </h3>
            <div class="card-body">
			<div class="table-responsive fixed-table-body">
            	<?php
				//$qry_2 = "select * from tbl_sum_achv_performance_region where period like '$fulldate'";
				//$rs_2  = mysql_query($qry_2,$const);// $atable2
				echo  "<div id=\"tbl_tampil\">
				<font style=\"font-family:Arial, Helvetica, sans-serif;font-size:11px;color:red;\">
				(Revenue dalam milyar)
				</font>
				<table width=\"100%\">
                <tr $atr>
                    <td $atd1 valign=\"middle\" rowspan=\"2\" width=\"15%\"><center><b>REGION</b></center></td>
                    <td $atd4 valign=\"middle\" colspan=\"3\"><center><b>REVENUE ALL</b></center></td>
                    <td $atd5 valign=\"middle\" colspan=\"3\"><center><b>VOICE</b></center></td>
                    <td $atd6 valign=\"middle\" colspan=\"3\"><center><b>SMS</b></center></td>
                    <td $atd7 valign=\"middle\" colspan=\"3\"><center><b>BROADBAND</b></center></td>
                    <td $atd8 valign=\"middle\" colspan=\"3\"><center><b>DIGITAL SERVICE</b></center></td>
                </tr>
                <tr $atr>
                    <td $atd9 valign=\"middle\"><center><b>MoM(%)</b></center></td>
                    <td $atd9 valign=\"middle\"><center><b>YoY(%)</b></center></td>
                    <td $atd9 valign=\"middle\"><center><b>YTD(%)</b></center></td>
                    <td $atd9 valign=\"middle\"><center><b>MoM(%)</b></center></td>
                    <td $atd9 valign=\"middle\"><center><b>YoY(%)</b></center></td>
                    <td $atd9 valign=\"middle\"><center><b>YTD(%)</b></center></td>
                    <td $atd9 valign=\"middle\"><center><b>MoM(%)</b></center></td>
                    <td $atd9 valign=\"middle\"><center><b>YoY(%)</b></center></td>
                    <td $atd9 valign=\"middle\"><center><b>YTD(%)</b></center></td>
                    <td $atd9 valign=\"middle\"><center><b>MoM(%)</b></center></td>
                    <td $atd9 valign=\"middle\"><center><b>YoY(%)</b></center></td>
                    <td $atd9 valign=\"middle\"><center><b>YTD(%)</b></center></td>
                    <td $atd9 valign=\"middle\"><center><b>MoM(%)</b></center></td>
                    <td $atd9 valign=\"middle\"><center><b>YoY(%)</b></center></td>
                    <td $atd9 valign=\"middle\"><center><b>YTD(%)</b></center></td>
                </tr>";
				
				
				$i=0;
                foreach ($perf_new_region as $data)
				{
					
				
                  if($i%2==0)
                  {
                    echo "<tr $atr3>
                         <td $atd>".$data["level_daerah"]."</td>";
                         if($r->mom_all < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["mom_all"],2)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["mom_all"],2)."</center></td>";
                         }
                         if($r->yoy_all < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["yoy_all"],2)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["yoy_all"],2)."</center></td>";
                         }
                         if($r->ytd_all < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["ytd_all"],2)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["ytd_all"],2)."</center></td>";
                         }
                         if($r->mom_voice < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["mom_voice"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["mom_voice"],1)."</center></td>";
                         }
                         if($r->yoy_voice < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["yoy_voice"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["yoy_voice"],1)."</center></td>";
                         }
                         if($r->ytd_voice < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["ytd_voice"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["ytd_voice"],1)."</center></td>";
                         }
                         if($r->mom_sms < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["mom_sms"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["mom_sms"],1)."</center></td>";
                         }
                         if($r->yoy_sms < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["yoy_sms"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["yoy_sms"],1)."</center></td>";
                         }
                         if($r->ytd_sms < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["ytd_sms"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["ytd_sms"],1)."</center></td>";
                         }
                         if($r->mom_bb < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["mom_bb"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["mom_bb"],1)."</center></td>";
                         }
                         if($r->yoy_bb < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["yoy_bb"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["yoy_bb"],1)."</center></td>";
                         }
                         if($r->ytd_bb < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["ytd_bb"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["ytd_bb"],1)."</center></td>";
                         }
                         if($r->mom_digital < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["mom_digital"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["mom_digital"],1)."</center></td>";
                         }
                         if($r->yoy_digital < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["yoy_digital"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["yoy_digital"],1)."</center></td>";
                         }
                         if($r->ytd_digital < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["ytd_digital"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["ytd_digital"],1)."</center></td>";
                         }
                   echo "</tr>";    
                  }
                  else
                  {
                    echo "<tr $atr2>
                    <td $atd>".$data["level_daerah"]."</td>";
                         if($r->mom_all < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["mom_all"],2)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["mom_all"],2)."</center></td>";
                         }
                         if($r->yoy_all < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["yoy_all"],2)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["yoy_all"],2)."</center></td>";
                         }
                         if($r->ytd_all < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["ytd_all"],2)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["ytd_all"],2)."</center></td>";
                         }
                         if($r->mom_voice < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["mom_voice"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["mom_voice"],1)."</center></td>";
                         }
                         if($r->yoy_voice < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["yoy_voice"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["yoy_voice"],1)."</center></td>";
                         }
                         if($r->ytd_voice < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["ytd_voice"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["ytd_voice"],1)."</center></td>";
                         }
                         if($r->mom_sms < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["mom_sms"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["mom_sms"],1)."</center></td>";
                         }
                         if($r->yoy_sms < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["yoy_sms"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["yoy_sms"],1)."</center></td>";
                         }
                         if($r->ytd_sms < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["ytd_sms"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["ytd_sms"],1)."</center></td>";
                         }
                         if($r->mom_bb < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["mom_bb"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["mom_bb"],1)."</center></td>";
                         }
                         if($r->yoy_bb < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["yoy_bb"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["yoy_bb"],1)."</center></td>";
                         }
                         if($r->ytd_bb < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["ytd_bb"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["ytd_bb"],1)."</center></td>";
                         }
                         if($r->mom_digital < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["mom_digital"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["mom_digital"],1)."</center></td>";
                         }
                         if($r->yoy_digital < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["yoy_digital"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["yoy_digital"],1)."</center></td>";
                         }
                         if($r->ytd_digital < 0)
                         {
                             echo "<td $atd align=\"right\"><center><font color=\"red\">".number_format($data["ytd_digital"],1)."</font></center></td>";    
                         }
                         else
                         {
                             echo "<td $atd align=\"right\"><center>".number_format($data["ytd_digital"],1)."</center></td>";
                         }     
                   echo "</tr>";    
                  }
                  $i++;
                }
      echo  "</table>";
				?>
				<!--<table class="collaptable table table-sm table-striped table-responsive " id="dataTables">
				<thead>
						<tr>
							<th rowspan="2" style="background-color:#006666;text-align:center;color:#fff" ><b>REGION</b></th>
							<th colspan="4" style="background-color:#cc3300;text-align:center;color:#fff" ><b>Revenue All</b></th>
							<th colspan="4" style="background-color:#cc3300;text-align:center;color:#fff" ><b>Voice</b></th>
							<th colspan="4" style="background-color:#cc3300;text-align:center;color:#fff" ><b>SMS</b></th>
							<th colspan="4" style="background-color:#cc3300;text-align:center;color:#fff" ><b>Broadband</b></th>
							<th colspan="4" style="background-color:#cc3300;text-align:center;color:#fff" ><b>Digital Services</b></th>
						</tr>
						<tr>
							<th style="font-size:10px;background-color:#ff9900;text-align:center;color:#fff"><b>Act</th>
							<th style="font-size:10px;background-color:#ff9900;text-align:center;color:#fff">MoM</th>
							<th style="font-size:10px;background-color:#ff9900;text-align:center;color:#fff">YoY</th>
							<th style="font-size:10px;background-color:#ff9900;text-align:center;color:#fff">YTD</th>
														
							<th style="font-size:10px;background-color:#ff9900;text-align:center;color:#fff">Act</th>
							<th style="font-size:10px;background-color:#ff9900;text-align:center;color:#fff">MoM</th>
							<th style="font-size:10px;background-color:#ff9900;text-align:center;color:#fff">YoY</th>
							<th style="font-size:10px;background-color:#ff9900;text-align:center;color:#fff">YTD</th>
														
							<th style="font-size:10px;background-color:#ff9900;text-align:center;color:#fff">Act</th>
							<th style="font-size:10px;background-color:#ff9900;text-align:center;color:#fff">MoM</th>
							<th style="font-size:10px;background-color:#ff9900;text-align:center;color:#fff">YoY</th>
							<th style="font-size:10px;background-color:#ff9900;text-align:center;color:#fff">YTD</th>
														
							<th style="font-size:10px;background-color:#ff9900;text-align:center;color:#fff">Act</th>
							<th style="font-size:10px;background-color:#ff9900;text-align:center;color:#fff">MoM</th>
							<th style="font-size:10px;background-color:#ff9900;text-align:center;color:#fff">YoY</th>
							<th style="font-size:10px;background-color:#ff9900;text-align:center;color:#fff">YTD</th>
														
							<th style="font-size:10px;background-color:#ff9900;text-align:center;color:#fff">Act</th>
							<th style="font-size:10px;background-color:#ff9900;text-align:center;color:#fff">MoM</b></th>
							<th style="font-size:10px;background-color:#ff9900;text-align:center;color:#fff">YoY</th>
							<th style="font-size:10px;background-color:#ff9900;text-align:center;color:#fff">YTD</th>
							
						</tr>
					</thead>
					<tbody>
					
					
					
				<?php
				/*$i=0;
				foreach ($perf_new_region as $data)
				{
					
				?>
				
							<!--<tr style="border:1px solid black; background-color:#F2F4BB">
                            <td style="font-size:11px"><b><?//= $data['branch_cluster'] ?></td>
							<td style="font-size:11px;text-align:center"><b><?//= $data['actual_ptd'] ?></td>-->
							<?php
							/*if($data['mom_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['mom_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['mom_all'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['yoy_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['yoy_all'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_all'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['ytd_all'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['ytd_all'],2).'</td>';
							}
							?>
							<?php
							}
							foreach ($sumbagut_4l1_act as $data)
							{
							?>
							<td style="font-size:10px;text-align:center"><b><?= number_format($data['voice_act'],2) ?></td>
							<?php
							}
							foreach ($sumbagut_summary as $data)
							{	
							?>
							<?php
							
							if($data['mom_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['mom_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['mom_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['yoy_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['yoy_voice'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_voice'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['ytd_voice'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['ytd_voice'],2).'</td>';
							}
							?>
							<?php	
							}
							foreach ($sumbagut_4l1_act as $data)
							{
							?>
							<td style="font-size:10px;text-align:center"><b><?= number_format($data['sms_act'],2) ?></td>
							<?php
							}
							foreach ($sumbagut_summary as $data)
							{	
							?>
							<?php
							
							if($data['mom_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['mom_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['mom_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['yoy_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['yoy_sms'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_sms'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['ytd_sms'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['ytd_sms'],2).'</td>';
							}
							?>
							<?php
							}
							foreach ($sumbagut_4l1_act as $data)
							{
							?>
							<td style="font-size:10px;text-align:center"><b><?= number_format($data['broadband_act'],2) ?></td>
							<?php
							}
							foreach ($sumbagut_summary as $data)
							{	
							?>
							<?php
							
							if($data['mom_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['mom_broadband'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['mom_broadband'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['yoy_broadband'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['yoy_broadband'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_broadband'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['ytd_broadband'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['ytd_broadband'],2).'</td>';
							}
							?>
							<?php	
							}
							foreach ($sumbagut_4l1_act as $data)
							{
							?>
							<td style="font-size:10px;text-align:center"><b><?= number_format($data['digital_act'],2) ?></td>
							<?php
							}
							foreach ($sumbagut_summary as $data)
							{	
							?>
							<?php
							
							if($data['mom_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['mom_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['mom_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['yoy_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['yoy_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['yoy_digital'],2).'</td>';
							}
							?>
							<?php
							if($data['ytd_digital'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['ytd_digital'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center">'.number_format($data['ytd_digital'],2).'</td>';
							}
							?>
                        </tr>
				<?php
					$i++;
				}
				?>
						
						<?php
							foreach ($region_mom_sumbagsel as $data)
						{
						?>
						<tr>
							<td style="font-size:10px;text-align:left"><b><?= $data['level_daerah'] ?></td>
						<?php
							foreach ($sumbagsel_act as $data)
						{
						?>
							<td style="font-size:10px;text-align:center"><b><?= number_format($data['actual'],2) ?></td>	
							<?php
							if($data['growth_mom'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['growth_mom'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['growth_mom'],2).'</td>';
							}
							?>
							<?php
							if($data['growth_yoyptd'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['growth_yoyptd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['growth_yoyptd'],2).'</td>';
							}
							?>
							<?php
							if($data['growth_yoyytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['growth_yoyytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['growth_yoyytd'],2).'</td>';
							}
							?>							
						<?php
						}
						?>
						<?php	
						}
							foreach ($sumbagsel_4l1_act as $data)
						{
						?>
							<td style="font-size:10px;text-align:center"><b><?= number_format($data['voice_act'],2) ?></td>
						
						<?php	
						}
							foreach ($vlr_sumbagsel_voice as $data)
						{
						?>
						<?php
							if($data['mom'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							?>
						<?php	
						}
							foreach ($vlr_sumbagsel_voice as $data)
						{
						?>
						<?php
							if($data['yoy'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
						?>
						<?php	
						}
							foreach ($vlr_sumbagsel_voice as $data)
						{
						?>
						<?php
							if($data['ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
						?>
						<?php	
						}
							foreach ($sumbagsel_4l1_act as $data)
						{
						?>							
							<td style="font-size:10px;text-align:center"><b><?= number_format($data['sms_act'],2) ?></td>
												<?php	
						}
							foreach ($vlr_sumbagsel_sms as $data)
						{
						?>
						<?php
							if($data['mom'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							?>
						<?php	
						}
							foreach ($vlr_sumbagsel_sms as $data)
						{
						?>
						<?php
							if($data['yoy'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
						?>
						<?php	
						}
							foreach ($vlr_sumbagsel_sms as $data)
						{
						?>
						<?php
							if($data['ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
						?>
						<?php	
						}
							foreach ($sumbagsel_4l1_act as $data)
						{
						?>								
							<td style="font-size:10px;text-align:center"><b><?= number_format($data['broadband_act'],2) ?></td>
						<?php	
						}
							foreach ($vlr_sumbagsel_bb as $data)
						{
						?>
						<?php
							if($data['mom'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							?>
						<?php	
						}
							foreach ($vlr_sumbagsel_bb as $data)
						{
						?>
						<?php
							if($data['yoy'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
						?>
						<?php	
						}
							foreach ($vlr_sumbagsel_bb as $data)
						{
						?>
						<?php
							if($data['ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
						?>
						<?php	
						}
							foreach ($sumbagsel_4l1_act as $data)
						{
						?>								
							<td style="font-size:10px;text-align:center"><b><?= number_format($data['digital_act'],2) ?></td>
						<?php	
						}
							foreach ($vlr_sumbagsel_digital as $data)
						{
						?>
						<?php
							if($data['mom'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							?>
						<?php	
						}
							foreach ($vlr_sumbagsel_digital as $data)
						{
						?>
						<?php
							if($data['yoy'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
						?>
						<?php	
						}
							foreach ($vlr_sumbagsel_digital as $data)
						{
						?>
						<?php
							if($data['ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
						?>
						</tr>
						<?php
						}
						?>
						<?php
							foreach ($region_mom_sumbagteng as $data)
						{
						?>
						<tr>
							<td style="font-size:10px;text-align:left"><b><?= $data['level_daerah'] ?></td>
						<?php
							foreach ($sumbagteng_act as $data)
						{
						?>
							<td style="font-size:10px;text-align:center"><b><?= number_format($data['actual'],2) ?></td>
						<?php
							if($data['growth_mom'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['growth_mom'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['growth_mom'],2).'</td>';
							}
							?>
							<?php
							if($data['growth_yoyptd'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['growth_yoyptd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['growth_yoyptd'],2).'</td>';
							}
							?>
							<?php
							if($data['growth_yoyytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['growth_yoyytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['growth_yoyytd'],2).'</td>';
							}
							?>
						<?php
						}
						?>					
						<?php	
						}
						foreach ($sumbagteng_4l1_act as $data)
						{
						?>
							<td style="font-size:10px;text-align:center"><b><?= number_format($data['voice_act'],2) ?></td>
						<?php	
						}
						foreach ($vlr_sumbagteng_voice as $data)
						{
						?>
						<?php
							if($data['mom'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							?>
						<?php	
						}
							foreach ($vlr_sumbagteng_voice as $data)
						{
						?>
						<?php
							if($data['yoy'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
						?>
						<?php	
						}
							foreach ($vlr_sumbagteng_voice as $data)
						{
						?>
						<?php
							if($data['ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
						?>
						<?php	
						}
							foreach ($sumbagteng_4l1_act as $data)
						{
						?>							
							<td style="font-size:10px;text-align:center"><b><?= number_format($data['sms_act'],2) ?></td>
						<?php	
						}
						foreach ($vlr_sumbagteng_sms as $data)
						{
						?>
						<?php
							if($data['mom'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							?>
						<?php	
						}
							foreach ($vlr_sumbagteng_sms as $data)
						{
						?>
						<?php
							if($data['yoy'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
						?>
						<?php	
						}
							foreach ($vlr_sumbagteng_sms as $data)
						{
						?>
						<?php
							if($data['ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
						?>
						<?php	
						}
							foreach ($sumbagteng_4l1_act as $data)
						{
						?>								
							<td style="font-size:10px;text-align:center"><b><?= number_format($data['broadband_act'],2) ?></td>
						<?php	
						}
						foreach ($vlr_sumbagteng_bb as $data)
						{
						?>
						<?php
							if($data['mom'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							?>
						<?php	
						}
							foreach ($vlr_sumbagteng_bb as $data)
						{
						?>
						<?php
							if($data['yoy'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
						?>
						<?php	
						}
							foreach ($vlr_sumbagteng_bb as $data)
						{
						?>
						<?php
							if($data['ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
						?>
						<?php	
						}
							foreach ($sumbagteng_4l1_act as $data)
						{
						?>								
							<td style="font-size:10px;text-align:center"><b><?= number_format($data['digital_act'],2) ?></td>
						<?php	
						}
						foreach ($vlr_sumbagteng_digital as $data)
						{
						?>
						<?php
							if($data['mom'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							?>
						<?php	
						}
							foreach ($vlr_sumbagteng_digital as $data)
						{
						?>
						<?php
							if($data['yoy'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
						?>
						<?php	
						}
							foreach ($vlr_sumbagteng_digital as $data)
						{
						?>
						<?php
							if($data['ytd'] < 0)
							{
								echo '<td style="font-size:11px;color: red;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="font-size:11px;color: black;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
						?>
						</tr>
						<?php
						}
						?>
						
						<tr>
							<td style="background-color:#B0B0B0;font-size:10px;text-align:left"><b>AREA 1</td>
						<?php	
							foreach ($area_act as $data)
						{
						?>
							<td style="background-color:#B0B0B0;font-size:10px;text-align:center"><b><?= number_format($data['actual'],2) ?></td>
						<?php	
						}
							foreach ($tigers_area as $data)
						{
						?>
						
						<?php
							if($data['mom_area'] < 0)
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: red;text-align:center"><b>'.number_format($data['mom_area'],2).'</td>';
							}
							else
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: black;text-align:center"><b>'.number_format($data['mom_area'],2).'</td>';
							}
							?>
							<?php
							if($data['yoyptd_area'] < 0)
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: red;text-align:center"><b>'.number_format($data['yoyptd_area'],2).'</td>';
							}
							else
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: black;text-align:center"><b>'.number_format($data['yoyptd_area'],2).'</td>';
							}
							?>
							<?php
							if($data['yoyytd_area'] < 0)
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: red;text-align:center"><b>'.number_format($data['yoyytd_area'],2).'</td>';
							}
							else
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: black;text-align:center"><b>'.number_format($data['yoyytd_area'],2).'</td>';
							}
							?>
						<?php	
						}
							foreach ($vlr_area_voice as $data)
						{
						?>
							<td style="background-color:#B0B0B0;font-size:10px;text-align:center"><b><?= number_format($data['actual'],2) ?></td>
						<?php	
						}
						foreach ($vlr_area_voice as $data)
						{
						?>
						<?php
							if($data['mom'] < 0)
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: red;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							else
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: black;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							?>
						<?php	
						}
							foreach ($vlr_area_voice as $data)
						{
						?>
						<?php
							if($data['yoy'] < 0)
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: red;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
							else
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: black;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
						?>
						<?php	
						}
							foreach ($vlr_area_voice as $data)
						{
						?>
						<?php
							if($data['ytd'] < 0)
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: red;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: black;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
						?>
						<?php	
						}
							foreach ($vlr_area_sms as $data)
						{
						?>							
							<td style="background-color:#B0B0B0;font-size:10px;text-align:center"><b><?= number_format($data['actual'],2) ?></td>
						<?php	
						}
						foreach ($vlr_area_sms as $data)
						{
						?>
						<?php
							if($data['mom'] < 0)
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: red;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							else
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: black;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							?>
						<?php	
						}
							foreach ($vlr_area_sms as $data)
						{
						?>
						<?php
							if($data['yoy'] < 0)
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: red;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
							else
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: black;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
						?>
						<?php	
						}
							foreach ($vlr_area_sms as $data)
						{
						?>
						<?php
							if($data['ytd'] < 0)
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: red;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: black;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
						?>
						<?php	
						}
							foreach ($vlr_area_bb as $data)
						{
						?>								
							<td style="background-color:#B0B0B0;font-size:10px;text-align:center"><b><?= number_format($data['actual'],2) ?></td>
						<?php	
						}
						foreach ($vlr_area_bb as $data)
						{
						?>
						<?php
							if($data['mom'] < 0)
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: red;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							else
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: black;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							?>
						<?php	
						}
							foreach ($vlr_area_bb as $data)
						{
						?>
						<?php
							if($data['yoy'] < 0)
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: red;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
							else
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: black;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
						?>
						<?php	
						}
							foreach ($vlr_area_bb as $data)
						{
						?>
						<?php
							if($data['ytd'] < 0)
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: red;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: black;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
						?>
						<?php	
						}
							foreach ($vlr_area_digital as $data)
						{
						?>								
							<td style="background-color:#B0B0B0;font-size:10px;text-align:center"><b><?= number_format($data['actual'],2) ?></td>
						<?php	
						}
						foreach ($vlr_area_digital as $data)
						{
						?>
						<?php
							if($data['mom'] < 0)
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: red;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							else
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: black;text-align:center"><b>'.number_format($data['mom'],2).'</td>';
							}
							?>
						<?php	
						}
							foreach ($vlr_area_digital as $data)
						{
						?>
						<?php
							if($data['yoy'] < 0)
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: red;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
							else
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: black;text-align:center"><b>'.number_format($data['yoy'],2).'</td>';
							}
						?>
						<?php	
						}
							foreach ($vlr_area_digital as $data)
						{
						?>
						<?php
							if($data['ytd'] < 0)
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: red;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
							else
							{
								echo '<td style="background-color:#B0B0B0;font-size:11px;color: black;text-align:center"><b>'.number_format($data['ytd'],2).'</td>';
							}
						?>
						</tr>
						<?php
						}*/
						?>
					</tbody>
				</table>-->
			</div>
            </div>
        </div>
    </section>
	<!-- COMPARING CHART-->
	<section class="pb-4">
		<div class="card">
			<div class="card-body">
				<div class="row" align="center">
            		<div class="col-lg-6 col-md-12">
                		<select id="l1_comparing" name="l1_comparing" class="mdb-select" required>
                            <option value="" disabled selected>Pilih L1</option>
                            <option value="total">REVENUE ALL</option>
							<option value="voice">VOICE</option>
							<option value="sms">SMS</option>
							<option value="broadband">BROADBAND</option>
							<option value="digitalservices">DIGITAL SERVICES</option>
                        </select>
                	</div>
                	<div class="col-lg-6 col-md-12">
                        <select id="bulan_scriptx" name="bulan_scriptx" class="mdb-select" required disabled>
                            <option value="" disabled selected>Pilih Bulan</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Agustus</option>
                            <option value="08">Agustus</option>
                            <option value="09">OKTOBER</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                	</div>
            	</div>

				<div id="script_region_c" style="margin: 0 auto"></div>

				<div class="table-responsive fixed-table-body">
					<table class="collaptable table table-sm table-striped table-hover mb-0">
						<thead>
							<tr id="tanggal" style="border:1px solid black">
								<th rowspan="2" style="font-family:Arial, sans-serif;font-size:11px;font-weight:normal;padding:3.5px 1px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#fff;color:#fff;background-color:#027367;text-align:center;vertical-align:center"><b>DATE</b></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$font = "style=\"font-size:11px;\"";
							foreach ($comparing_total as $data)
							{
							?>
							<tr id="comparing_total">
								<td style="font-size:13px"><b><?= $data['level_daerah'] ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r1'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r2'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r3'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r4'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r5'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r6'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r7'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r8'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r9'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r10'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r11'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r12'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r13'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r14'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r15'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r16'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r17'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r18'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r19'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r20'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r21'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r22'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r23'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r24'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r25'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r26'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r27'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r28'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r29'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r30'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r31'],1) ?></td>
							</tr>
							<?php
								$i++;
							}
							?>
							<?php
							$i=0;
							$font = "style=\"font-size:11px;\"";
							foreach ($comparing_total_area as $data)
							{
							?>
							<tr id="comparing_total_area">
								<td style="background-color:#BEBEBE;font-size:13px"><b>AREA 1</td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r1'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r2'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r3'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r4'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r5'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r6'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r7'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r8'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r9'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r10'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r11'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r12'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r13'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r14'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r15'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r16'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r17'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r18'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r19'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r20'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r21'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r22'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r23'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r24'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r25'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r26'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r27'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r28'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r29'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r30'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r31'],1) ?></td>
							</tr>
							<?php
								$i++;
							}
							?>
							<?php
							$i=0;
							$font = "style=\"font-size:11px;\"";
							foreach ($comparing_sumbagut as $data)
							{
							?>
							<tr id="comparing_sumbagut">
								<td style="font-size:13px"><b><?= $data['level_daerah'] ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r1'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r2'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r3'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r4'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r5'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r6'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r7'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r8'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r9'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r10'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r11'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r12'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r13'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r14'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r15'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r16'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r17'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r18'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r19'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r20'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r21'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r22'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r23'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r24'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r25'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r26'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r27'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r28'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r29'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r30'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r31'],1) ?></td>
							</tr>
							<?php
								$i++;
							}
							?>
							<?php
							$i=0;
							$font = "style=\"font-size:11px;\"";
							foreach ($comparing_sumbagteng as $data)
							{
							?>
							<tr id="comparing_sumbagteng">
								<td style="font-size:13px"><b><?= $data['level_daerah'] ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r1'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r2'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r3'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r4'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r5'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r6'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r7'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r8'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r9'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r10'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r11'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r12'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r13'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r14'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r15'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r16'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r17'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r18'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r19'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r20'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r21'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r22'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r23'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r24'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r25'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r26'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r27'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r28'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r29'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r30'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r31'],1) ?></td>
							</tr>
							<?php
								$i++;
							}
							?>
							<?php
							$i=0;
							$font = "style=\"font-size:11px;\"";
							foreach ($comparing_sumbagsel as $data)
							{
							?>
							<tr id="comparing_sumbagsel">
								<td style="font-size:13px"><b><?= $data['level_daerah'] ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r1'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r2'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r3'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r4'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r5'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r6'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r7'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r8'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r9'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r10'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r11'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r12'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r13'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r14'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r15'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r16'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r17'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r18'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r19'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r20'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r21'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r22'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r23'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r24'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r25'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r26'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r27'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r28'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r29'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r30'],1) ?></td>
								<td style="font-size:11px"><b><?= number_format($data['r31'],1) ?></td>
							</tr>
							<?php
								$i++;
							}
							?>
							<?php
							$i=0;
							$font = "style=\"font-size:11px;\"";
							foreach ($comparing_area as $data)
							{
							?>
							<tr id="comparing_area">
								<td style="background-color:#BEBEBE;font-size:13px"><b>AREA 1</td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r1'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r2'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r3'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r4'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r5'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r6'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r7'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r8'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r9'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r10'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r11'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r12'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r13'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r14'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r15'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r16'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r17'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r18'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r19'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r20'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r21'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r22'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r23'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r24'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r25'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r26'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r27'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r28'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r29'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r30'],1) ?></td>
								<td style="background-color:#BEBEBE;font-size:11px"><b><?= number_format($data['r31'],1) ?></td>
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

	
	<section>
		<div>
			<div>
			
			</div>
		</div>
	</section>
</main>
<?php
		break;
}
?>