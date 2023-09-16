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

	/*
		$msisdn_x =0;
		$bulan_x =0; 	*/
	
if(isset($_POST['btn_cek']))
{
	/*
		$program = anti_injection($_POST['program']);
		$msisdn = anti_injection($_POST['msisdn']);
		$bulan = anti_injection($_POST['bulan']);
		$username = $_SESSION['username'];
		$msisdn_x = $msisdn;
		$bulan_x = $bulan; 									*/

	//echo $program;
	
	$branch_taker = anti_injection($_POST['branch']);
	$layer_1 = anti_injection($_POST['layer_1']);
	$tahun_awal = anti_injection($_POST['tahun_awal']);
	$bln_awal = anti_injection($_POST['bln_awal']);
	$tgl_awal = anti_injection($_POST['tgl_awal']);
	$tahun_akhir = anti_injection($_POST['tahun_akhir']);	
	$bln_akhir = anti_injection($_POST['bln_akhir']);
	$tgl_akhir = anti_injection($_POST['tgl_akhir']);
	
	if($branch_taker=="")
	{
		$error = "Branch Harus Dipilih.";
	}
	elseif($layer_1=="")
	{
		$error = "L1 Harus Dipilih.";
	}
	elseif($tahun_awal=="")
	{
		$error = "Tahun Awal Harus Dipilih.";
	}
	elseif($bln_awal=="")
	{
		$error = "Bulan Awal Harus Dipilih.";
	}
	elseif($tgl_awal=="")
	{
		$error = "Tanggal Awal Harus Dipilih.";
	}
	elseif($tahun_akhir=="")
	{
		$error = "Tahun Akhir Harus Dipilih.";
	}
	elseif($bln_akhir=="")
	{
		$error = "Bulan Akhir Harus Dipilih.";
	}
	elseif($tgl_akhir=="")
	{
		$error = "Tanggal Akhir Harus Dipilih.";
	}
	else
	{	
		if(getMailRep($branch_taker, $layer_1, $tahun_awal, $bln_awal, $tgl_awal, $tahun_akhir, $bln_akhir, $tgl_akhir))
		{
			$success = "Data Cek Flash telah ditambahkan.";
			echo $success;
			/*
				$daftar_flash = getFlash($bulan_x,$msisdn_x);
				$flash = json_decode($daftar_flash, true);		*/
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
	
    //$daftar_flash = getFlash($bulan_x,$msisdn_x);
	//$flash = json_decode($daftar_flash, true);
	
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
						
		            		<label class="active">DATEPICKER</label>
	                        <div class="container">
							<div class='col-md-5'>
								<div class="form-group">
									<div class='input-group date' id='datetimepicker6'>
										<input type='text' class="form-control" />
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</div>
							</div>
							<div class='col-md-5'>
								<div class="form-group">
									<div class='input-group date' id='datetimepicker7'>
										<input type='text' class="form-control" />
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</div>
							</div>
						</div>
                    	</div>
					</div>
					<br>
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
	                    	<label class="active">Tahun Awal</label>
	                        <select name="tahun_awal" class="mdb-select" required>
	                            <option value="" disabled selected>Tahun Awal</option>
	                            <option value="2017">2017</option>
	                            <option value="2018">2018</option>
	                        </select>
	                    </div>
						<br>
                    </div>
                    <div class="col-md-12">
                    	<div class="md-form">
	                    	<label class="active">Bulan Awal</label>
	                        <select name="bln_awal" class="mdb-select" required>
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
	                    	<label class="active">Tahun Akhir</label>
	                        <select name="tahun_akhir" class="mdb-select" required>
	                            <option value="" disabled selected>Tahun Akhir</option>
	                            <option value="2017">2017</option>
	                            <option value="2018">2018</option>
								<!--<option value="2019">2019</option>-->
	                        </select>
	                    </div>
						<br>
                    </div>

					 <div class="col-md-12">
                    	<div class="md-form">
	                    	<label class="active">Bulan Akhir</label>
	                        <select name="bln_akhir" class="mdb-select" required>
	                            <option value="" disabled selected>Bulan Akhir</option>
	                            <option value="01">Januari</option>
	                            <option value="02">Februari</option>
	                            <option value="03">Maret</option>
	                            <option value="04">April</option>
	                            <option value="05">Mei</option>
								<option value="06">Juni</option>
	                            <option value="07">Juli</option>
	                            <option value="08">Agustus</option>
	                            <option value="09">September</option>
	                            <option value="10">Oktober</option>
								<option value="11">November</option>
	                            <option value="12">Desember</option>
	                        </select>
	                    </div>
						<br>
                    </div>
                    <div class="col-md-12">
                    	<div class="md-form">
	                    	<label class="active">Tanggal Akhir</label>
	                        <select name="tgl_akhir" class="mdb-select" required>
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
							<button type="submit" name="btn_cek" id="btn_cek" class="btn btn-outline-default btn-rounded waves-effect col-lg-8 col-md-12">DOWNLOAD FILE</button>
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
			if($msisdn_x!=''){
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
<script type="text/javascript">
    $(function () {
        $('#datetimepicker6').datetimepicker();
        $('#datetimepicker7').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>

<script>
		/*$(function () {
		   var bindDatePicker = function() {
				$(".date").datetimepicker({
				format:'YYYY-MM-DD',
					icons: {
						time: "fa fa-clock-o",
						date: "fa fa-calendar",
						up: "fa fa-arrow-up",
						down: "fa fa-arrow-down"
					}
				}).find('input:first').on("blur",function () {
					// check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
					// update the format if it's yyyy-mm-dd
					var date = parseDate($(this).val());

					if (! isValidDate(date)) {
						//create date based on momentjs (we have that)
						date = moment().format('YYYY-MM-DD');
					}

					$(this).val(date);
				});
			}
		   
		   var isValidDate = function(value, format) {
				format = format || false;
				// lets parse the date to the best of our knowledge
				if (format) {
					value = parseDate(value);
				}

				var timestamp = Date.parse(value);

				return isNaN(timestamp) == false;
		   }
		   
		   var parseDate = function(value) {
				var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
				if (m)
					value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

				return value;
		   }
		   
		   bindDatePicker();
		 });*/
</script>
</main>
<?php
		break;
}
?>