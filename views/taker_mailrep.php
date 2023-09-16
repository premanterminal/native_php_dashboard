<?php
session_start();

define('BL', true);

//require_once('../controllers/mailrepController.php');
require_once('../common/config/DbController.php');
require_once('../common/controllers/CommonController.php');


if(!is_loggedin())
{
	redirect('login');
}
	//$msisdn_x =0;
	//$bulan_x =0;
	$branch_x =0; 
	$layer_satu_x =0; 
	$bulan_awal_x =0;
	$tgl_awal_x =0; 
	$bulan_akhir_x =0; 
	$tgl_akhir_x =0;
	
if(isset($_POST['btn_cek']))
{
	
	$branch = anti_injection($_POST['branch']); 
	$layer_satu = anti_injection($_POST['layer_satu']); 
	$bulan_awal = anti_injection($_POST['bulan_awal']);
	$tgl_awal = anti_injection($_POST['tgl_awal']); 
	$bulan_akhir = anti_injection($_POST['bulan_awal']);
	$tgl_akhir = anti_injection($_POST['tgl_akhir']);
	$username = $_SESSION['username'];
	$msisdn_x = $msisdn;
	$bulan_x = $bulan;
	$branch_x = $branch; 
	$layer_satu_x = $layer_satu; 
	$bulan_awal_x = $bulan_awal;
	$tgl_awal_x = $tgl_awal; 
	$bulan_akhir_x = $bulan_akhir; 
	$tgl_akhir_x = $tgl_akhir;
	
	if($branch=="")
	{
		$error = "Branch Harus Diisi.";
	}
	elseif($layer_satu=="")
	{
		$error = "L1 Harus Diisi.";
	}

	elseif($bulan_awal=="")
	{
		$error = "Bulan Awal Harus Diisi.";
	}
	
	elseif($tgl_awal=="")
	{
		$error = "Tanggal Awal Harus Diisi.";
	}
	
	elseif($bulan_akhir=="")
	{
		$error = "Bulan Akhir Harus Diisi.";
	}
	
	elseif($tgl_akhir=="")
	{
		$error = "Tanggal Akhir Harus Diisi.";
	}
	
	else
	{	
		/*if(getMailRep($branch, $layer_satu, $bulan_awal, $tgl_awal, $bulan_akhir, $tgl_akhir))
		{
			$success = "Data Cek Mailrep telah ditambahkan.";
			echo $success;
			$daftar_mailrep = getMailRep($bulan_x,$msisdn_x);
			$mailrep = json_decode($daftar_mailrep, true);
		}

		else
		{*/
			$error = "Data Anda tidak sesuai.";
			echo $error;
		//}
		
	}

}




switch($_GET['pilih'])
{
/*    default :
	
   $daftar_mailrep = getMailRep($bulan_x,$msisdn_x);
   $mailrep = json_decode($daftar_mailrep, true);*/
	
?>
<main>
	<div class="row">
	<div class="col-lg-12 col-md-12">

		<section class="pb-4">
        <div class="card">
            <h3 class="card-header teal white-text">MAIL REP TAKER DOWNLOADER</h3>
            <div class="card-body">
			<br>
					

            	<form role="form" enctype="multipart/form-data" action="" method="post">
	            	
					<div class="col-md-12">
	            		<div class="md-form">
						
		            		<label class="active">BRANCH</label>
	                        <select name="branch_taker" class="mdb-select" required>
	                            <option value="" disabled selected>Pilih Branch</option>
	                            <option value="aceh">ACEH</option>
								<option value="central medan">CENTRAL MEDAN</option>
								<option value="padang sidempuan">PADANG SIDEMPUAN</option>
								<option value="pematang siantar">PEMATANG SIANTAR</option>
								<option value="western medan">WESTERN MEDAN</option>
								
	                        </select>
                    	</div>
						
						<!--<div class="md-form">						
		            		<label class="active">CLUSTER</label>
	                        <select name="cluster_taker" class="mdb-select" required>
	                            <option value="" disabled selected>Pilih Cluster</option>
	                            <option value="">BANDA ACEH</option>
								<option value="">MEULABOH</option>
								<option value="">LHOKSEUMAWE</option>
								<option value="">LANGSA</option>
								<option value="">BINJAI</option>
								<option value="">MEDAN INNER</option>
								<option value="">MEDAN OUTER</option>
								<option value="">LUBUL PAKAM</option>
								<option value="">PEMATANG SIANTAR</option>
								<option value="">KISARAN</option>
								<option value="">KABAN JAHE</option>
								<option value="">PADANG SIDEMPUAN</option>
								<option value="">RANTAU PRAPAT</option>
								<option value="">SIBOLGA</option>								
	                        </select>
                    	</div>-->
						
						<div class="md-form">
						
		            		<label class="active">L1</label>
	                        <select name="layer_1" class="mdb-select" required>
	                            <option value="" disabled selected>Pilih L1</option>
	                            <option value="broadband">BROADBAND</option>
								<option value="digital services">DIGITAL SERVICES</option>
								<option value="international roaming">INTERNATIONAL ROAMING</option>
								<option value="sms">SMS</option>
								<option value="voice">VOICE</option>
								<option value="others">OTHERS</option>

	                           
	                        </select>
                    	</div>
                    </div>
                    <div class="col-md-12">
                    	<div class="md-form">
	                    	<label class="active">Bulan Awal</label>
	                        <select name="tgl_awal" class="mdb-select" required>
	                            <option value="" disabled selected>Bulan Awal</option>
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
					<div class="col-md-12">
                    	<div class="md-form">
	                    	<label class="active">Tanggal Awal</label>
	                        <select name="tgl_awal" class="mdb-select" required>
	                            <option value="" disabled selected>Tanggal Awal</option>
	                            <option value="01">01</option>
	                            <option value="02">02</option>
	                            <option value="03">03</option>
	                            <option value="04">04</option>
	                            <option value="05">05</option>
								<option value="06">06</option>
	                            <option value="07">07</option>
	                            <option value="08">08</option>
	                            <option value="09">09</option>
	                            <option value="10">10</option>
								<option value="11">11</option>
	                            <option value="12">12</option>
								<option value="13">13</option>
	                            <option value="14">14</option>
	                            <option value="15">15</option>
								<option value="16">16</option>
	                            <option value="17">17</option>
	                            <option value="18">18</option>
	                            <option value="19">19</option>
	                            <option value="20">20</option>
								<option value="21">21</option>
	                            <option value="22">22</option>
								<option value="23">23</option>
	                            <option value="24">24</option>
	                            <option value="25">25</option>
								<option value="26">26</option>
	                            <option value="27">27</option>
	                            <option value="28">28</option>
	                            <option value="29">29</option>
	                            <option value="30">30</option>
								<option value="31">31</option>
	                        </select>
	                    </div>
						<br>
                    </div>
					 <div class="col-md-12">
                    	<div class="md-form">
	                    	<label class="active">Bulan Akhir</label>
	                        <select name="tgl_akhir" class="mdb-select" required>
	                            <option value="" disabled selected>Bulan Akhir</option>
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
                    <div class="col-md-12">
                    	<div class="md-form">
	                    	<label class="active">Tanggal Akhir</label>
	                        <select name="tgl_awal" class="mdb-select" required>
	                            <option value="" disabled selected>Tanggal Akhir</option>
	                            <option value="01">01</option>
	                            <option value="02">02</option>
	                            <option value="03">03</option>
	                            <option value="04">04</option>
	                            <option value="05">05</option>
								<option value="06">06</option>
	                            <option value="07">07</option>
	                            <option value="08">08</option>
	                            <option value="09">09</option>
	                            <option value="10">10</option>
								<option value="11">11</option>
	                            <option value="12">12</option>
								<option value="13">13</option>
	                            <option value="14">14</option>
	                            <option value="15">15</option>
								<option value="16">16</option>
	                            <option value="17">17</option>
	                            <option value="18">18</option>
	                            <option value="19">19</option>
	                            <option value="20">20</option>
								<option value="21">21</option>
	                            <option value="22">22</option>
								<option value="23">23</option>
	                            <option value="24">24</option>
	                            <option value="25">25</option>
								<option value="26">26</option>
	                            <option value="27">27</option>
	                            <option value="28">28</option>
	                            <option value="29">29</option>
	                            <option value="30">30</option>
								<option value="31">31</option>
	                        </select>
	                    </div>
						<br>
                    </div>
					<!--Grid row-->
					<div class="row d-flex align-items-center mb-4">
						<!--Grid column-->
						<div class="col-md-12 col-md-1 text-center">
							<!--<button type="submit" name="btn_cek" id="btn_cek" class="btn btn-teal btn-block btn-rounded z-depth-1">CEK THIS MSISDN</button>-->
							<button type="submit" name="btn_cek_taker" id="btn_cek_taker" class="btn btn-outline-default btn-rounded waves-effect col-lg-8 col-md-12">DOWNLOAD FILE</button>
						</div>
						<!--Grid column-->

						<!--Grid column-->
						<div class="col-md-6">
						
						</div>
						<!--Grid column-->

					</div>
					<!--Grid row-->
				</form>
			<?php
			if($date_x!=''){
			?>
			<table class="table table-striped table-responsive" id="dataTables">
					<thead>
						<tr>
							<th>Date</th>
							<th>Region</th>
							<th>Branch</th>
							<th>Wok</th>
							<th>L1</th>
							<th>L2</th>
							<th>L3</th>
							<th>Product</th>
							<th>Price Plan</th>
							<th>Transaksi</th>
							<th>Duration</th>
							<th>Revenue</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($mailrep as $data)
							{
						?>
								<tr>
									<td><?= $data['date']?></td>
									<td><?= $data['region']?></td>
									<td><?= $data['branch']?></td>
									<td><?= $data['wok']?></td>
									<td><?= $data['l1']?></td>
									<td><?= $data['l2']?></td>
									<td><?= $data['l3']?></td>
									<td><?= $data['product']?></td>
									<td><?= $data['priceplan']?></td>
									<td><?= $data['trx']?></td>
									<td><?= $data['duration']?></td>
									<td><?= $data['revenue']?></td>
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