<?php
session_start();

define('BL', true);

require_once('../controllers/vas_Controller.php');
require_once('../common/config/DbController.php');
require_once('../common/controllers/CommonController.php');


if(!is_loggedin())
{
	redirect('login');
}

	$msisdn_x =0;
	$bulan_x =0;
	$program_x=0;
if(isset($_POST['btn_cek']))
{
	$program = anti_injection($_POST['program']);
	$msisdn = anti_injection($_POST['msisdn']);
	$bulan = anti_injection($_POST['bulan']);
	$username = $_SESSION['username'];
	$msisdn_x = $msisdn;
	$bulan_x = $bulan;
	$program_x = $program;

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
		if(getVasBnum($bulan, $msisdn, $program))
		{
			$success = "Data Cek Flash telah ditambahkan.";
			//echo $success;
			//echo $program;
			$daftar_vas = getVasBnum($bulan_x,$msisdn_x,$program_x);
			$vas = json_decode($daftar_vas, true);
		}

		else
		{
			$error = "Data Anda tidak sesuai.";
			//echo $error;
			//echo $program;
		}
	}


}

switch($_GET['pilih'])
{
    default :
	$daftar_vas = getVasBnum($bulan_x,$msisdn_x,$program_x);
	$vas = json_decode($daftar_vas, true);
	
?>
<main>
	<div class="row">
	<div class="col-lg-12 col-md-12">

		<section class="pb-4">
        <div class="card">
            <h3 class="card-header teal white-text">CEK VAS</h3>
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
	                            <option value="BULK">BULK</option>
								<option value="DATA">DATA</option>
								<option value="LEGACY">LEGACY</option>
	                            <!--<option value="data">MKIOS DATA</option>
	                            <option value="voice">MKIOS VOICE</option>
	                            <option value="bulk">MKIOS BULK</option>-->
	                        </select>
                    	</div>
                    </div>
                    <div class="col-md-12">
                    	<div class="md-form">
	                    	<label class="active">Bulan</label>
	                        <select name="bulan" class="mdb-select" required>
	                            <option value="" disabled selected>Pilih Bulan</option>
	                            <option value="201801_lacci">Januari</option>
	                            <option value="201802_lacci">Februari</option>
	                            <option value="201803_lacci">Maret</option>
	                            <option value="201804_lacci">April</option>
	                            <option value="201805_lacci">Mei</option>
								<option value="201806_lacci">Juni</option>
	                            <option value="201807_lacci">Juli</option>
	                            <option value="201808_lacci">Agustus</option>
	                            <option value="201809_lacci">September</option>
	                            <option value="201810_lacci">Oktober</option>
								<option value="201811_lacci">November</option>
	                            <option value="201812_lacci">Desember</option>
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
										<th>Anum</th>
										<th>Bnum</th>
										<th>Denom</th>
										<th>Tgl_trx</th>
										<th>Channel</th>
										<th>SIte</th>
										<th>Branch</th>
										<th>Cluster</th>
										<th>Kabupaten</th>
										<th>Kecamatan</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($vas as $data)
							{
						?>
								<tr>
												<td><?= $data['Anum']?></td>
												<td><b><?= $data['Bnum']?></b></td>
												<td><?= $data['Denom']?></td>
												<td><?= $data['Tgl_trx']?></td>
												<td><b><?= $data['Channel']?></b></td>
												<td><?= $data['SIte']?></td>
												<td><?= $data['Branch']?></td>
												<td><?= $data['Cluster']?></td>
												<td><?= $data['Kabupaten']?></td>
												<td><?= $data['Kecamatan']?></td>
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