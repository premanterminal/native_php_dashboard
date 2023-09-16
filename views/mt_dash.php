<?php
session_start();

define('BL', true);

require_once('../common/config/DbController.php');
require_once('../common/controllers/CommonController.php');

$date =date("Y/m/d");
$newdate = strtotime ( '-1 day' , strtotime ( $date ) ) ;
$newdate = date ( 'd' , $newdate );

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
		select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201806 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
		group by CLuster
		order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$mt_cluster = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201807 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
		group by CLuster
		order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$mt_fullmonth_juli = $stmt->fetchAll(PDO::FETCH_ASSOC);
		////////////////////////////////
		$stmt = dbConnectiondata()->prepare("
		select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201805 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
		group by CLuster
		order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$mt_fullmonth = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		////////////////////////
		$stmt = dbConnectiondata()->prepare("
		select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201806 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
		where CLuster like 'Banda Aceh'
		group by CLuster
		order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_bandaaceh = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201806 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
    where CLuster like 'Lhokseumawe'
		group by CLuster
    order by x.regional, x.branch, x.cluster	
		");
		$stmt->execute();
		$ao_lhokseumawe = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201806 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
    where CLuster like 'Meulaboh'
		group by CLuster
    order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_meulaboh = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201806 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
    where CLuster like 'Lubuk Pakam'
		group by CLuster
    order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_lubukpakam = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201806 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
    where CLuster like 'Medan Inner'
		group by CLuster
    order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_medaninner = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201806 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
    where CLuster like 'Medan Outer'
		group by CLuster
    order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_medanouter = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201806 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
    where CLuster like 'Padang Sidempuan'
		group by CLuster
    order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_padangsidempuan = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201806 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
    where CLuster like 'Rantau Prapat'
		group by CLuster
    order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_rantauprapat = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201806 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
    where CLuster like 'Sibolga'
		group by CLuster
    order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_sibolga = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201806 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
    where CLuster like 'Kaban Jahe'
		group by CLuster
    order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_kabanjahe = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201806 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
    where CLuster like 'Kisaran'
		group by CLuster
    order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_kisaran = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201806 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
    where CLuster like 'Pematang Siantar'
		group by CLuster
    order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_pematangsantar = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201806 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
    where CLuster like 'Binjai'
		group by CLuster
    order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_binjai = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201806 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
    where CLuster like 'Langsa'
		group by CLuster
    order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_langsa = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
	/////////////////////////////
	$stmt = dbConnectiondata()->prepare("
		select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201807 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
		where CLuster like 'Banda Aceh'
		group by CLuster
		order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_bandaaceh_juli = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201807 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
    where CLuster like 'Lhokseumawe'
		group by CLuster
    order by x.regional, x.branch, x.cluster	
		");
		$stmt->execute();
		$ao_lhokseumawe_juli = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201807 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
    where CLuster like 'Meulaboh'
		group by CLuster
    order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_meulaboh_juli = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201807 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
    where CLuster like 'Lubuk Pakam'
		group by CLuster
    order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_lubukpakam_juli = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201807 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
		where CLuster like 'Medan Inner'
		group by CLuster
		order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_medaninner_juli = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201807 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
		where CLuster like 'Medan Outer'
		group by CLuster
		order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_medanouter_juli = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201807 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
		where CLuster like 'Padang Sidempuan'
		group by CLuster
		order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_padangsidempuan_juli = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201807 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
		where CLuster like 'Rantau Prapat'
		group by CLuster
		order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_rantauprapat_juli = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201807 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
		where CLuster like 'Sibolga'
		group by CLuster
		order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_sibolga_juli = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201807 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
		where CLuster like 'Kaban Jahe'
		group by CLuster
		order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_kabanjahe_juli = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201807 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
		where CLuster like 'Kisaran'
		group by CLuster
		order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_kisaran_juli = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201807 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
		where CLuster like 'Pematang Siantar'
		group by CLuster
		order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_pematangsantar_juli = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201807 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
		where CLuster like 'Binjai'
		group by CLuster
		order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_binjai_juli = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		    select x.regional , x.branch , x.cluster ,x.jlh_ao, x.downloader, x.act_user, x.pkg_user, 
		x.pkg_rev,x.atotAccess, x.btotAccess, x.TotPkg, x.Totreve, x.perDownloader, x.perActUser, 
		x.perPkgUser,x.perPkgRev, (x.perDownloader*10)/100 as pointDownloader, 
		(x.perActUser*15)/100 as pointAct, 
		(x.perPkgUser*35)/100 as pointPkg, 
		(x.perPkgRev*50)/100 as pointRev,
		((x.perActUser*15)/100)+
		((x.perPkgUser*35)/100)+((x.perPkgRev*50)/100) as TotPoint
		from(
		select a.regional, a.branch, a.cluster, a.jlh_ao, a.downloader, a.act_user, a.pkg_user, a.pkg_rev, 
		b.totAccess as atotAccess , b.totAccess as btotAccess, b.TotPkg, b.Totreve,
		(b.totAccess/a.downloader)*100 as perDownloader, (b.totAccess/a.act_user)*100 as perActUser, 
		(b.TotPkg/a.pkg_user)*100 as perPkgUser, (b.Totreve/a.pkg_rev)*100 as perPkgRev
		from tbl_sum_target_MyTsel_201805 a left join 
		(
		  select Branch,Cluster, count(Anum), count(distinct Access_Bnum) as totAccess, count(distinct Pkg_Bnum) as TotPkg, 
		  sum(TotRev) as Totreve
		  from tbl_sum_MyTsel_201807 group by Cluster
		) b 
		on a.cluster = b.Cluster
		group by CLuster
		order by a.regional, a.branch, a.cluster
		) x
		where CLuster like 'Langsa'
		group by CLuster
		order by x.regional, x.branch, x.cluster
		");
		$stmt->execute();
		$ao_langsa_juli = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e)
	{
		//echo $e->getMessage();
	}
	
	//<?php echo"$newdate"; ?> 
?>
<main>

	<section class="pb-4">
        <div class="card">
        	<h3 class="card-header red white-text"> Performance MyTelkomsel Per CLuster Juli 2018 </h3>
            <div class="card-body">
            	<table class="table table-striped table-responsive" id="dataTables">
				<thead>
				
					<tr style="border:1px solid black">
						<th rowspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#4d4d33;text-align:center"><b>Regional</b></th>
						<th rowspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#4d4d33;text-align:center"><b>Branch</b></th>
						<th rowspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#4d4d33;text-align:center"><b>Cluster</b></th>
						<th rowspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#4d4d33;text-align:center"><b>Jumlah AO</b></th>
						<th colspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#FFF;background-color:#0073e6;text-align:center;vertical-align:top"><b>Target Direct Sales Cluster - Juli</b></th>
						<th colspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#FFF;background-color:#ffcc00;text-align:center;vertical-align:top"><b>Actual Direct Sales Cluster - Juli</b></th>
						<th colspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#FFF;background-color:#009933;text-align:center;vertical-align:top"><b>Ach Direct Sales Cluster - Juli</b></th>
						<th rowspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#4d4d33;text-align:center"><b>Total Score</b></th>	
					</tr>
					
					<tr style="border:1px solid black">
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#0073e6;text-align:center;vertical-align:top"><b>Active User</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#0073e6;text-align:center;vertical-align:top"><b>Package User</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#0073e6;text-align:center;vertical-align:top"><b>Package Revenue</b></td>
						
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ffcc00;text-align:center;vertical-align:top"><b>Active User</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ffcc00;text-align:center;vertical-align:top"><b>Package User</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ffcc00;text-align:center;vertical-align:top"><b>Package Revenue</b></td>
						
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#009933;text-align:center;vertical-align:top"><b>Active User</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#009933;text-align:center;vertical-align:top"><b>Package User</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#009933;text-align:center;vertical-align:top"><b>Package Revenue</b></td>
					</tr>
					<tr style="border:1px solid black">
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#0073e6;text-align:center;vertical-align:top"><b>15%</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#0073e6;text-align:center;vertical-align:top"><b>35%</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#0073e6;text-align:center;vertical-align:top"><b>50%</b></td>
						
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ffcc00;text-align:center;vertical-align:top"><b>15%</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ffcc00;text-align:center;vertical-align:top"><b>35%</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ffcc00;text-align:center;vertical-align:top"><b>50%</b></td>
						
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#009933;text-align:center;vertical-align:top"><b>15%</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#009933;text-align:center;vertical-align:top"><b>35%</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#009933;text-align:center;vertical-align:top"><b>50%</b></td>
					</tr>
				
				</thead>
					<!--<tbody>
						<?php
						/*foreach ($mt_fullmonth_juli as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><?= $data['cluster'] ?></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}*/
						?>
					</tbody>-->
					
					<tbody>
					<tr>
						<?php
						foreach ($ao_bandaaceh_juli as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>							
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster_juli/mt_ao_bandaaceh_juli.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					<tr>
						<?php
						foreach ($ao_lhokseumawe_juli as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster_juli/mt_ao_lhokseumawe_juli.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					<tr>
						<?php
						foreach ($ao_meulaboh_juli as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster_juli/mt_ao_meulaboh_juli.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					<tr>
						<?php
						foreach ($ao_langsa_juli as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster_juli/mt_ao_langsa_juli.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					
					<tr>
						<?php
						foreach ($ao_binjai_juli as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster_juli/mt_ao_binjai_juli.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					
					<tr>
						<?php
						foreach ($ao_medaninner_juli as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster_juli/mt_ao_medaninner_juli.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					
					<tr>
						<?php
						foreach ($ao_medanouter_juli as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster_juli/mt_ao_medanouter_juli.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					
					<tr>
						<?php
						foreach ($ao_lubukpakam_juli as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster_juli/mt_ao_lubukpakam_juli.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					
					<tr>
						<?php
						foreach ($ao_pematangsantar_juli as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster_juli/mt_ao_pematangsiantar_juli.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					
					<tr>
						<?php
						foreach ($ao_kisaran_juli as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster_juli/mt_ao_kisaran_juli.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					
					<tr>
						<?php
						foreach ($ao_kabanjahe_juli as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster_juli/mt_ao_kabanjahe_juli.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					
					<tr>
						<?php
						foreach ($ao_padangsidempuan_juli as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster_juli/mt_ao_padangsidempuan_juli.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					
					<tr>
						<?php
						foreach ($ao_rantauprapat_juli as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster_juli/mt_ao_rantauprapat_juli.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					
					<tr>
						<?php
						foreach ($ao_sibolga_juli as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster_juli/mt_ao_sibolga_juli.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					</tbody>
					
					
					<div class=" text-center" >
					Untuk Detail Performance per AO silahkan download di link berikut	
					<a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_juli.php">
					Download Per AO
					</a>
					</div>
					
					<div class=" text-center" >
					Untuk Detail Performance per AO silahkan download di link berikut	
					<a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_juli.php">
					Download Per Cluster
					</a>
					</div>
				</table>
            </div>
        </div>
    </section>
	

    <section class="pb-4">
        <div class="card">
        	<h3 class="card-header red white-text"> Performance MyTelkomsel Per CLuster  Juni 2018 </h3>
            <div class="card-body">
            	<table class="table table-striped table-responsive" id="dataTables">
				<thead>
				
					<tr style="border:1px solid black">
						<th rowspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#4d4d33;text-align:center"><b>Regional</b></th>
						<th rowspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#4d4d33;text-align:center"><b>Branch</b></th>
						<th rowspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#4d4d33;text-align:center"><b>Cluster</b></th>
						<th rowspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#4d4d33;text-align:center"><b>Jumlah AO</b></th>
						<th colspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#FFF;background-color:#0073e6;text-align:center;vertical-align:top"><b>Target Direct Sales Cluster - Juni</b></th>
						<th colspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#FFF;background-color:#ffcc00;text-align:center;vertical-align:top"><b>Actual Direct Sales Cluster - Juni</b></th>
						<th colspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#FFF;background-color:#009933;text-align:center;vertical-align:top"><b>Ach Direct Sales Cluster - Juni</b></th>
						<th rowspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#4d4d33;text-align:center"><b>Total Score</b></th>	
					</tr>
					
					<tr style="border:1px solid black">
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#0073e6;text-align:center;vertical-align:top"><b>Active User</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#0073e6;text-align:center;vertical-align:top"><b>Package User</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#0073e6;text-align:center;vertical-align:top"><b>Package Revenue</b></td>
						
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ffcc00;text-align:center;vertical-align:top"><b>Active User</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ffcc00;text-align:center;vertical-align:top"><b>Package User</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ffcc00;text-align:center;vertical-align:top"><b>Package Revenue</b></td>
						
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#009933;text-align:center;vertical-align:top"><b>Active User</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#009933;text-align:center;vertical-align:top"><b>Package User</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#009933;text-align:center;vertical-align:top"><b>Package Revenue</b></td>
					</tr>
					<tr style="border:1px solid black">
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#0073e6;text-align:center;vertical-align:top"><b>15%</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#0073e6;text-align:center;vertical-align:top"><b>35%</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#0073e6;text-align:center;vertical-align:top"><b>50%</b></td>
						
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ffcc00;text-align:center;vertical-align:top"><b>15%</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ffcc00;text-align:center;vertical-align:top"><b>35%</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ffcc00;text-align:center;vertical-align:top"><b>50%</b></td>
						
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#009933;text-align:center;vertical-align:top"><b>15%</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#009933;text-align:center;vertical-align:top"><b>35%</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#009933;text-align:center;vertical-align:top"><b>50%</b></td>
					</tr>
				
				</thead>
					<tbody>
					<tr>
						<?php
						foreach ($ao_bandaaceh as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>							
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster/mt_ao_bandaaceh.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					<tr>
						<?php
						foreach ($ao_lhokseumawe as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster/mt_ao_lhokseumawe.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					<tr>
						<?php
						foreach ($ao_meulaboh as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster/mt_ao_meulaboh.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					<tr>
						<?php
						foreach ($ao_langsa as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster/mt_ao_langsa.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					
					<tr>
						<?php
						foreach ($ao_binjai as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster/mt_ao_binjai.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					
					<tr>
						<?php
						foreach ($ao_medaninner as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster/mt_ao_medaninner.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					
					<tr>
						<?php
						foreach ($ao_medanouter as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster/mt_ao_medanouter.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					
					<tr>
						<?php
						foreach ($ao_lubukpakam as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster/mt_ao_lubukpakam.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					
					<tr>
						<?php
						foreach ($ao_pematangsantar as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster/mt_ao_pematangsiantar.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					
					<tr>
						<?php
						foreach ($ao_kisaran as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster/mt_ao_kisaran.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					
					<tr>
						<?php
						foreach ($ao_kabanjahe as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster/mt_ao_kabanjahe.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					
					<tr>
						<?php
						foreach ($ao_padangsidempuan as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster/mt_ao_padangsidempuan.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					
					<tr>
						<?php
						foreach ($ao_rantauprapat as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster/mt_ao_rantauprapat.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					
					<tr>
						<?php
						foreach ($ao_sibolga as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_cluster/mt_ao_sibolga.php"><?= $data['cluster'] ?></a></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tr>
					</tbody>
					
					<div class=" text-center" >
					Untuk Detail Performance per AO silahkan download di link berikut	
					<a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_juni.php">
					Download Per AO
					</a>
					</div>
					
					<div class=" text-center" >
					Untuk Detail Performance per AO silahkan download di link berikut	
					<a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_juni.php">
					Download Per Cluster
					</a>
					</div>

				</table>
            </div>
        </div>
    </section>
	
	    <section class="pb-4">
        <div class="card">
        	<h3 class="card-header red white-text"> Performance MyTelkomsel Per CLuster Mei 2018 </h3>
            <div class="card-body">
            	<table class="table table-striped table-responsive" id="dataTables">
				<thead>
				
					<tr style="border:1px solid black">
						<th rowspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#4d4d33;text-align:center"><b>Regional</b></th>
						<th rowspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#4d4d33;text-align:center"><b>Branch</b></th>
						<th rowspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#4d4d33;text-align:center"><b>Cluster</b></th>
						<th rowspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#4d4d33;text-align:center"><b>Jumlah AO</b></th>
						<th colspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#FFF;background-color:#0073e6;text-align:center;vertical-align:top"><b>Target Direct Sales Cluster - Mei</b></th>
						<th colspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#FFF;background-color:#ffcc00;text-align:center;vertical-align:top"><b>Actual Direct Sales Cluster - Mei</b></th>
						<th colspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#FFF;background-color:#009933;text-align:center;vertical-align:top"><b>Ach Direct Sales Cluster - Mei</b></th>
						<th rowspan="3" style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;font-weight:normal;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#4d4d33;text-align:center"><b>Total Score</b></th>	
					</tr>
					
					<tr style="border:1px solid black">
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#0073e6;text-align:center;vertical-align:top"><b>Active User</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#0073e6;text-align:center;vertical-align:top"><b>Package User</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#0073e6;text-align:center;vertical-align:top"><b>Package Revenue</b></td>
						
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ffcc00;text-align:center;vertical-align:top"><b>Active User</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ffcc00;text-align:center;vertical-align:top"><b>Package User</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ffcc00;text-align:center;vertical-align:top"><b>Package Revenue</b></td>
						
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#009933;text-align:center;vertical-align:top"><b>Active User</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#009933;text-align:center;vertical-align:top"><b>Package User</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#009933;text-align:center;vertical-align:top"><b>Package Revenue</b></td>
					</tr>
					<tr style="border:1px solid black">
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#0073e6;text-align:center;vertical-align:top"><b>15%</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#0073e6;text-align:center;vertical-align:top"><b>35%</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#0073e6;text-align:center;vertical-align:top"><b>50%</b></td>
						
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ffcc00;text-align:center;vertical-align:top"><b>15%</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ffcc00;text-align:center;vertical-align:top"><b>35%</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#ffcc00;text-align:center;vertical-align:top"><b>50%</b></td>
						
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#009933;text-align:center;vertical-align:top"><b>15%</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#009933;text-align:center;vertical-align:top"><b>35%</b></td>
						<td style="border:1px solid black;font-family:Arial, sans-serif;font-size:12px;padding:7px 3.5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#000;color:#fff;background-color:#009933;text-align:center;vertical-align:top"><b>50%</b></td>
					</tr>
				
				</thead>
					<tbody>
						<?php
						foreach ($mt_fullmonth as $data)
						{
						?>
							
							<tr style="border:1px solid black">
							<td style="font-size:12px"><?= $data['regional'] ?></td>
							<td style="font-size:12px"><?= $data['branch'] ?></td>
							<td style="font-size:12px"><?= $data['cluster'] ?></td>
							<td style="font-size:12px"><?= number_format($data['jlh_ao']) ?></td>
							<td style="font-size:12px"><?= number_format($data['act_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_user']) ?></td>
							<td style="font-size:12px"><?= number_format($data['pkg_rev']) ?></td>
							<td style="font-size:12px"><?= number_format($data['btotAccess']) ?></td>
							<td style="font-size:12px"><?= number_format($data['TotPkg']) ?></td>
							<td style="font-size:12px"><?= number_format($data['Totreve']) ?></td>
							<td style="font-size:12px"><?= number_format($data['perActUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgUser'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['perPkgRev'],2) ?>%</td>
							<td style="font-size:12px"><?= number_format($data['TotPoint'],2) ?>%</td>
							</tr>
							
						<?php
						}
						?>
					</tbody>
					<div class=" text-center" >
					Untuk Detail Performance per AO silahkan download di link berikut	
					<a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_ao_mei.php">
					Download Per AO
					</a>
					</div>
					
					<div class=" text-center" >
					Untuk Detail Performance per AO silahkan download di link berikut	
					<a href="http://10.33.97.177/tiramisu/autoemail_mcd/mt_mei.php">
					Download Per Cluster
					</a>
					</div>
				</table>
            </div>
        </div>
    </section>
	
	
</main>
<?php
		break;
}
?>