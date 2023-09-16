<?php

session_start();

define('BL', true);

require_once('../controllers/LoginController.php');

if(!is_loggedin())
{
    redirect('login');
}
if(isset($_GET['branch']) && isset($_GET['mkios_data']))
{
    getMkiosDataBranch($_GET['branch']);
}
else if (isset($_GET['branch']) && isset($_GET['mkios_voice']))
{
    getMkiosVoiceBranch($_GET['branch']);
}
else if(isset($_GET['cluster']) && isset($_GET['mkios_data']))
{
    getMkiosDatacluster($_GET['cluster']);
}
else if (isset($_GET['cluster']) && isset($_GET['mkios_voice']))
{
    getMkiosVoicecluster($_GET['cluster']);
}

function getMkiosDataBranch($branch)
{
	if($cluster == 'SUMBAGUT')
    {
        $query = "
		select x.Branch, x.Cluster, y.RS, x.d5, x.d10, x.d20, x.d25, x.d50, x.d100, y.TotDenom  
		from tbl_Extended_Pivot_mkios_data x
		right join
		(
		  select Branch, CLuster, count(distinct Anum) as RS, sum(Denom) as TotDenom
		  from rm_mkios_data_201803_lacci
		  where Channel in ('063','062')
		  group by Branch,Cluster 
		) y
		on x.Cluster = y.Cluster
		group by Cluster
		order by Branch desc
		";
    }
    elseif($cluster != 'SUMBAGUT')
    {
        $query = "
		select x.Branch, sum(y.RS) as totRS, sum(x.d5) as totd5, sum(x.d10) as totd10, 
		sum(x.d20) as totd20, sum(x.d25) as totd25, sum(x.d50) as totd50, sum(x.d100) as totd100, 
		sum(y.TotDenom) as totdenom  
		from tbl_Extended_Pivot_mkios_data x
		right join
		(
		  select Branch, CLuster, count(distinct Anum) as RS, sum(Denom) as TotDenom
		  from rm_mkios_data_201803_lacci
		  where Channel in ('063','062')
		  && Branch like '$branch'
		) y
		on x.Cluster = y.Cluster
		order by Branch desc
		";
    }

    try
    {
        $stmt = dbConnectiondata()->prepare($query);
        $stmt->execute();
        $mkiosdata_cluster = $stmt->fetch(PDO::FETCH_ASSOC);

        $hasil = json_encode($$mkiosdata_cluster);
        header('Content-Type: application/json');
        echo $hasil;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

function getMkiosDatacluster($cluster)
{
	
}

function getMkiosVoiceBranch($branch)
{
	
}

function getMkiosVoicecluster($cluster)
{
	
}


?>