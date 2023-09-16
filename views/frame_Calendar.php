<?php
session_start();

define('BL', true);

require_once('../controllers/flashController.php');
require_once('../common/config/DbController.php');
require_once('../common/controllers/CommonController.php');


if(!is_loggedin())
{
	redirect('login');
}

	$msisdn_x =0;
	$bulan_x =0;
if(isset($_POST['btn_cek']))
{
	$program = anti_injection($_POST['program']);
	$msisdn = anti_injection($_POST['msisdn']);
	$bulan = anti_injection($_POST['bulan']);
	$username = $_SESSION['username'];
	$msisdn_x = $msisdn;
	$bulan_x = $bulan;

	//echo $program;
	
	if($program=="")
	{
		$error = "Program Harus Diisi.";
	}
	elseif($msisdn=="")
	{
		$error = "Msisdn Harus Diisi.";
	}

	elseif($bulan=="")
	{
		$error = "Bulan Harus Diisi.";
	}
	else
	{	
		if(getFlash($bulan, $msisdn))
		{
			$success = "Data Cek Flash telah ditambahkan.";
			echo $success;
			$daftar_flash = getFlash($bulan_x,$msisdn_x);
			$flash = json_decode($daftar_flash, true);
		}

		else
		{
			$error = "Data Anda tidak sesuai.";
			echo $error;
		}
		
	}

}




switch($_GET['pilih'])
{
    default :
	//$msisdn = anti_injection($_POST['msisdn']);
	//$bulan = anti_injection($_POST['bulan']);
	
    $daftar_flash = getFlash($bulan_x,$msisdn_x);
	$flash = json_decode($daftar_flash, true);
	//echo $flash;
	//echo $bulan_x; echo $msisdn_x;
?>
<main >
	<div class="row" >
		<div class="col-lg-12 col-md-12">

			<section class="pb-4">
			<div class="card">
			<h3 class="card-header black white-text" style="font-size:26px"><b>CALENDAR EVENT</b></h3>
				<div class="card-body">
					<iframe height="800" width="100%" src="http://10.35.105.233/mcdsumbagut/views/x_full_calendar/fullcalendar.html"></iframe>
				</div>
			</div>
			</section>
		</div>
</div>
</main>
<?php
		break;
}
?>