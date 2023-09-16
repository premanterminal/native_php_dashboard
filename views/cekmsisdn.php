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
		/*$stmt = dbConnectiondata()->prepare("select trx_date, msisdn, vas_code, region,
					trx, revenue, costband, content_id, lac, ci, cluster_hq 
					from mail_flash_sumbagut_$bulan where msisdn like '$msisdn';");
		$stmt->execute();
		$flash = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if($stmt) {echo "SUKSES";}
		else {echo "GAGAL";}*/
		//echo "tets";
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
<main>
	<div class="row">
	<div class="col-lg-12 col-md-12">

		<section class="pb-4">
        <div class="card">
            <h3 class="card-header teal white-text">CEK FLASH</h3>
            <div class="card-body">
			<br>
					<p>
					&nbsp &nbsp <b> Msisdn dimulai dengan 62</b>

					</p>

            	<form role="form" enctype="multipart/form-data" action="" method="post">
	            	
					<div class="col-md-12">
	            		<div class="md-form">
                            <label class="active">MSISDN</label>
                            <input type="text" id="msisdn" name="msisdn" class="form-control validate" required>
						</div>
						<div class="md-form">
						
		            		<label class="active">Program</label>
	                        <select name="program" class="mdb-select" required>
	                            <option value="" disabled selected>Pilih Program</option>
	                            <option value="flash">FLASH</option>
	                            
	                        </select>
                    	</div>
                    </div>
                    <div class="col-md-12">
                    	<div class="md-form">
	                    	<label class="active">Bulan</label>
	                        <select name="bulan" class="mdb-select" required>
	                            <option value="" disabled selected>Pilih Bulan</option>
	                            <option value="201801">Januari</option>
	                            <option value="201802">Februari</option>
	                            <option value="201803">Maret</option>
	                            <option value="201804">April</option>
	                            <option value="201805">Mei</option>
								<option value="201806">Juni</option>
	                            <option value="201807">Juli</option>
	                            <option value="201808">Agustus</option>
	                            <option value="201809">September</option>
	                            <option value="201810">Oktober</option>
								<option value="201811">November</option>
	                            <option value="201812">Desember</option>
	                        </select>
	                    </div>
						<br>
                    </div>
                    
					<!--Grid row-->
					<div class="row d-flex align-items-center mb-4">
						<!--Grid column-->
						<div class="col-md-12 col-md-1 text-center">
							<!--<button type="submit" name="btn_cek" id="btn_cek" class="btn btn-teal btn-block btn-rounded z-depth-1">CEK THIS MSISDN</button>-->
							<button type="submit" name="btn_cek" id="btn_cek" class="btn btn-outline-default btn-rounded waves-effect col-lg-8 col-md-12">CEK THIS MSISDN</button>
						</div>
						<!--Grid column-->

						<!--Grid column-->
						<div class="col-md-6">
						<!--	<p class="font-small grey-text d-flex justify-content-end">Have an account? <a href="#" class="blue-text ml-1"> Log in</a></p>
						-->
						</div>
						<!--Grid column-->

					</div>
					<!--Grid row-->
				</form>
			<?php
			if($msisdn_x!=''){
			?>
			<table class="table table-striped table-responsive" id="dataTables">
					<thead>
						<tr>
							<th>trx_date</th>
							<th>msisdn</th>
							<th>vas_code</th>
							<th>region</th>
							<th>trx</th>
							<th>revenue</th>
							<th>coshband</th>
							<th>content_id</th>
							<th>lac</th>
							<th>ci</th>
							<th>cluster_hq</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($flash as $data)
							{
						?>
								<tr>
									<td><?= $data['trx_date']?></td>
									<td><?= $data['msisdn']?></td>
									<td><?= $data['vas_code']?></td>
									<td><?= $data['region']?></td>
									<td><?= $data['trx']?></td>
									<td><?= $data['revenue']?></td>
									<td><?= $data['costband']?></td>
									<td><?= $data['content_id']?></td>
									<td><?= $data['lac']?></td>
									<td><?= $data['ci']?></td>
									<td><?= $data['cluster_hq']?></td>
								</tr>
						<?php
							
							}
						?>
					</tbody>
			</table>
			<?php
			}
			?>
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