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
		");
		$stmt->execute();
		$mt_binjai = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
    	$stmt = dbConnectiondata()->prepare("
		");
		$stmt->execute();
		$mt_cluster = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		");
		$stmt->execute();
		$mt_fullmonth = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$stmt = dbConnectiondata()->prepare("
		");
		$stmt->execute();
		$mt_AO = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e)
	{
		//echo $e->getMessage();
	}
?>
<main>
    <section class="pb-4">
        
			<div class=" text-center" >
				<br>
				<h1><b>Sorry. This Page is under construction.</b></h>
                <a href="#" class="pl-0" ><img style="width: 700px;" src="views/assets/img/undercons.png" /></a>
            </div>
        
    </section>
</main>
<?php
		break;
}
?>