<?php
session_start();

define('BL', true);

require_once('../controllers/WhitelistController.php');

if(!is_loggedin())
{
	redirect('login');
}


if(isset($_POST['btn_upload']))
{
	$program = anti_injection($_POST['program']);
	$cluster = anti_injection($_POST['cluster']);
	$jenis_file = anti_injection($_POST['jenis_file']);
	$bulan = anti_injection($_POST['bulan']);
	$username = $_SESSION['username'];

	$nama_file = $_FILES['file_whitelist']['name'];
    $file = $_FILES['file_whitelist']['tmp_name'];
    $tipe_file = $_FILES['file_whitelist']['type'];

    $mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv','application/csv','text/comma-separated-values','application/excel','application/vnd.msexcel','text/anytext','application/octet-stream','application/txt','application/octet-stream','txt','csv','xls');

	if($program=="")
	{
		$error = "Program Harus Diisi.";
	}
	elseif($cluster=="")
	{
		$error = "Cluster Harus Diisi.";
	}
	elseif($bulan=="")
	{
		$error = "Bulan Harus Diisi.";
	}
	elseif(strlen($file)==0)
	{
		$error = "File Harus Diisi.";
	}
	elseif($jenis_file=="")
	{
		$error = "Jenis File Harus Diisi.";
	}
	else
	{	
		if(in_array($tipe_file, $mimes))
		{
			if(tambahData($program, $cluster, $jenis_file, $bulan, $tipe_file, $file, $username, $_SESSION['id_user']))
			{
				$success = "Data Whitelist telah ditambahkan.";
			}
		}
		else
		{
			$error = "File Anda tidak sesuai.";
		}
	}

}

if(isset($_POST['hapus_whitelist']))
{
	$id = anti_injection($_POST['id']);
	$program = anti_injection($_POST['program']);
	$cluster = anti_injection($_POST['clusters']);
	$nama_file = anti_injection($_POST['nama_file']);
	$username = anti_injection([$_SESSION['username']]);



	if(hapusData($id, $program, $cluster, $nama_file))
	{
		$success = "Data Whitelist Sudah Dihapus.";
	}
}

switch($_GET['pilih'])
{
    default :
    if(isAdmin())
    {
    	$daftar_whitelist = getData();
    }
    else
    {
    	$daftar_whitelist = getDataUser($_SESSION['username']);
    }
    $whitelist = json_decode($daftar_whitelist, true);
	
	
?>

<head>
</head>
<body >

<main>
	<?php
	if(isset($success))
	{
	?>
	<section class="content-header">
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?= $success; ?>
		</div>
	</section>
	<?php
	}
	elseif(isset($error))
	{
	?>
	<section class="content-header">
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?= $error; ?>
		</div>
	</section>
	<?php
	}
	?>
    <section class="pb-4">
        <div class="card">
            <h3 class="card-header red white-text">Data Whitelist</h3>
            <div class="card-body">
				<!--<a href="?p=whitelist&pilih=tambah" class="btn btn-md btn-primary" style="background-color:black">Upload Whitelist</a>-->
				
				<a href="?p=whitelist&pilih=uptaker" class="btn btn-md btn-primary" style="background-color:black">Cek Taker</a>
				
				<!--<a href="?p=under" class="btn btn-md btn-primary" style="background-color:red">Cek Flash</a>-->
			</div>
            <div class="card-body">
                <table class="table table-striped table-responsive" id="dataTables">
					<thead>
						<tr>
							<th>Program</th>
							<th>Cluster</th>
							<th>Nama File</th>
							<th>Jenis File</th>
							<th>Uploader</th>
							<th>Tanggal Upload</th>
							<?php if(isAdmin()) { ?>
							<th>Pilih</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($whitelist as $data)
						{
						?>
						<tr>
							<td>
								<?php 
									if($data['program']=='flash')
									{
										echo 'Mkios FLASH';
									}
									elseif($data['program']=='data')
									{
										echo 'Mkios Data';
									}
									elseif($data['program']=='voice')
									{
										echo 'Mkios Voice';
									}
									elseif($data['program']=='bulk')
									{
										echo 'Mkios Bulk';
									}
								?>
							</td>
							<td><?= $data['cluster'] ?></td>
							<?php if(isAdmin()) { ?>
							<td><a href="<?= "http://10.35.105.233/mcdsumbagut/common/data/".$data['program']."/".$data['cluster']."/".$data['nama_file'] ?>"download><?= $data['nama_file'] ?></a></td>
							<?php } else { ?>
							<td><a href="<?= "http://10.35.105.233/mcdsumbagut/common/data/".$data['program']."/".$data['cluster']."/".$data['nama_file'] ?>"download><?= $data['nama_file'] ?></a></td>
							<?php } ?>
							<td><?= $data['jenis_file'] ?></td>
							<td><?= $data['nama_lengkap'] ?></td>
							<td><?= $data['tgl_upload'] ?></td>
							<td>
							
							<?php if(isAdmin()) { ?>
							<a href="<?= "http://10.35.105.233/mcdsumbagut/common/data/hasil/".$data['program']."/".$data['cluster']."/hasil_".$data['nama_file'] ?>" id="hasil-taker" class="btn btn-sm btn-md grey " download>Hasil</a>
							<?php } 
							else { ?>
							<a href="<?= "http://10.35.105.233/mcdsumbagut/common/data/hasil/".$data['program']."/".$data['cluster']."/hasil_".$data['nama_file'] ?>" id="hasil-taker" class="btn btn-sm btn-md grey " download>Hasil</a>
							<?php } ?>
							
							<!--<a href="<?= "http://10.35.105.233/mcdsumbagut/common/data/hasil/".$data['program']."/".$data['cluster']."/hasil_".$data['nama_file'] ?>" id="hasil-taker" class="btn btn-sm btn-md grey " download>Hasil</a>-->
							
							<?php if(isAdmin()) { ?>
							
								<a href="javascript:;" id="hapus-whitelist" class="btn btn-sm btn-danger" data-id="<?= $data['id'] ?>" data-program="<?= $data['program'] ?>" data-cluster="<?= $data['cluster'] ?>" data-nama_file="<?= $data['nama_file'] ?>" data-toggle="modal" data-target="#modal-hapus-whitelist">Hapus</a>
							</td>
							<?php } ?>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
            </div>
        </div>
    </section>
</main>
<?php if(isAdmin()) { ?>
<div class="modal fade" id="modal-hapus-whitelist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading">Hapus Whitelist</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <p>Apa Anda yakin ingin menghapus data whitelist ini?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
            	<form role="form" action="" method="post">
            		<input type="hidden" name="id" id="id" value="<?= $data['id'] ?>">
            		<input type="hidden" name="program" id="program" value="<?= $data['program'] ?>">
            		<input type="hidden" name="clusters" id="clusters" value="<?= $data['cluster'] ?>">
            		<input type="hidden" name="nama_file" id="nama_file" value="<?= $data['nama_file'] ?>">
                	<button type="submit" name="hapus_whitelist" id="hapus_whitelist" class="btn btn-primary-modal">Ya</button>
                	<a type="button" class="btn btn-outline-secondary-modal waves-effect" data-dismiss="modal">Tidak</a>
            	</form>
            </div>
        </div>
    </div>
</div>
<?php
}
		break;
    case "tambah" :
?>
<main>
	<?php
	if(isset($success))
	{
	?>
	<section class="content-header">
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?= $success; ?>
		</div>
	</section>
	<?php
	}
	elseif(isset($error))
	{
	?>
	<section class="content-header">
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?= $error; ?>
		</div>
	</section>
	<?php
	}
	?>
	<!--Halaman Upload Whitelist Not Taker -->
	<section class="pb-4">
        <div class="card">
            <h3 class="card-header black white-text">Upload Whitelist</h3>
            <div class="card-body">
			<br>
            	<form role="form" enctype="multipart/form-data" action="" method="post">
	            	<div class="col-md-12">
	            		<div class="md-form">
						
		            		<label class="active">Program</label>
	                        <select name="program" class="mdb-select" required>
	                            <option value="" disabled selected>Pilih Program</option>
	                            <option value="flash">FLASH</option>
	                            <option value="data">MKIOS DATA</option>
	                            <option value="voice">MKIOS VOICE</option>
	                            <option value="bulk">MKIOS BULK</option>
	                        </select>
                    	</div>
                    </div>
                    <div class="col-md-12">
                    	<div class="md-form">
	                    	<label class="active">Cluster</label>
	                        <select name="cluster" class="mdb-select" required>
	                            <option value="" disabled selected>Pilih Cluster</option>
								<option value="Banda_Aceh">Banda Aceh</option>
	                            <option value="LHOKSEUMAWE">Lhokseumawe</option>
	                            <option value="MEULABOH">Meulaboh</option>
	                            <option value="Lubuk_Pakam">Lubuk Pakam</option>
	                            <option value="Medan_Inner">Medan Inner</option>
	                            <option value="Medan_Outer">Medan Outer</option>
	                            <option value="Padang_Sidempuan">Padang Sidempuan</option>
								<option value="Rantau_Prapat">Rantau Prapat</option>
	                            <option value="SIBOLGA">Sibolga</option>
	                            <option value="Kaban_Jahe">Kaban Jahe</option>
	                            <option value="KISARAN">KISARAN</option>
	                            <option value="Pematang_Siantar">Pematang Siantar</option>
								<option value="BINJAI">Binjai</option>
	                            <option value="LANGSA">Langsa</option>
	                        </select>
	                    </div>
                    </div>
                     <div class="col-md-12">
                    	<div class="md-form">
	                    	<label class="active">Bulan</label>
	                        <select name="bulan" class="mdb-select" required>
	                            <option value="" disabled selected>Pilih Bulan</option>
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
                    </div>
                    <div class="col-md-12">
                    	<div class="md-form">
	                    	<label class="active">Jenis File</label>
	                    	<select name="jenis_file" class="mdb-select" required>
	                            <option value="" disabled selected>Jenis file</option>
	                            <option value="txt">*.txt</option>
	                        </select>
	                    </div>
                    </div>
                    <div class="col-md-12">
                    	<div class="file-field">
                            <div class="btn btn-primary btn-sm waves-effect black">
                                <span>Pilih File</span>
                                <input type="file" name="file_whitelist" id="file_whitelist">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload File...">
                            </div>
                        </div>
                    </div>
                    
                    <br><br>
                    <p><b>
					&nbsp Note: <br>
					&nbsp 1. File dengan format excel (.txt) <br>
					&nbsp 2. Isi whitelist dengan field [msisdn,cluster,program] <br>
					&nbsp 3. Msisdn dimulai dengan 62</b>

					</p>
                    <div class="text-center mt-1-half">
						<button type="submit" name="btn_upload" id="btn_upload" class="btn btn-primary mb-1 black">Upload</button>
    				</div>
				</form>
            </div>
        </div>
    </section>
</main>
</body>
<?php
		break;
		  case "uptaker" :
?>
<main>
	<?php
	if(isset($success))
	{
	?>
	<section class="content-header">
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?= $success; ?>
		</div>
	</section>
	<?php
	}
	elseif(isset($error))
	{
	?>
	<section class="content-header">
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?= $error; ?>
		</div>
	</section>
	<?php
	}
	?>
	<!--Halaman Cek Taker-->
	<section class="pb-4">
        <div class="card">
            <h3 class="card-header orange white-text">Upload Taker</h3>
            <div class="card-body">
			<br>
			<?php
			//echo exec("cat /dataweb/home/appmcdsumbagut/public_html/views/12_bulk_Binjai_4.txt");
		
			//$apa = system("awk -F'|' 'NR==FNR {a[$1]=$1;next}{if(a[$1]) print $0; else a[$1]}' ../common/data/data/Binjai/12_bulk_Binjai_4.txt ../common/data/data/mkiosbulk_201804.txt > ../common/data/hasil/bulk/Binjai/hasil_12_bulk_Binjai_4.txt");
			//echo count($apa);
			/*var_dump($return_var);
			echo "return_var is: $return_var" . "\n";
			var_dump($output);

			echo $return_var;*/
			
			//echo exec(" ls -ltr ");
			?>
            	<form role="form" enctype="multipart/form-data" action="" method="post">
	            	<div class="col-md-12">
	            		<div class="md-form">
						
		            		<label class="active">Program</label>
	                        <select name="program" class="mdb-select" required>
	                            <option value="" disabled selected>Pilih Program</option>
								<option value="flash">FLASH</option>
	                            <option value="data">MKIOS DATA</option>
	                            <option value="bulk">MKIOS BULK</option>
	                            <option value="voice">MKIOS VOICE</option>
	                        </select>
                    	</div>
                    </div>
                    <div class="col-md-12">
                    	<div class="md-form">
	                    	<label class="active">Cluster</label>
	                        <select name="cluster" class="mdb-select" required>
	                            <option value="" disabled selected>Pilih Cluster</option>
								<option value="Banda_Aceh">Banda Aceh</option>
	                            <option value="Lhokseumawe">Lhokseumawe</option>
	                            <option value="Meulaboh">Meulaboh</option>
	                            <option value="Lubuk_Pakam">Lubuk Pakam</option>
	                            <option value="Medan_Inner">Medan Inner</option>
								<option value="Medan_Outer">Medan Outer</option>
	                            <option value="Padang_Sidempuan">Padang Sidempuan</option>
								<option value="Rantau_Prapat">Rantau Prapat</option>
	                            <option value="Sibolga">Sibolga</option>
	                            <option value="Kaban_Jahe">Kaban Jahe</option>
	                            <option value="Kisaran">Kisaran</option>
	                            <option value="Pematang_Siantar">Pematang Siantar</option>
								<option value="Binjai">Binjai</option>
	                            <option value="Langsa">Langsa</option>
	                        </select>
	                    </div>
                    </div>
                    <div class="col-md-12">
                    	<div class="md-form">
	                    	<label class="active">Bulan</label>
	                        <select name="bulan" class="mdb-select" required>
	                            <option value="" disabled selected>Pilih Bulan</option>
	                            <option value="1">Januari</option>
	                            <option value="2">Februari</option>
	                            <option value="3">Maret</option>
	                            <option value="4">April</option>
	                            <option value="5">Mei</option>
								<option value="6">Juni</option>
	                            <option value="7">Juli</option>
	                            <option value="8">Agustus</option>
	                            <option value="9">September</option>
	                            <option value="10">Oktober</option>
								<option value="11">November</option>
	                            <option value="12">Desember</option>
	                        </select>
	                    </div>
                    </div>
                    <div class="col-md-12">
                    	<div class="md-form">
	                    	<label class="active">Jenis File</label>
	                    	<select name="jenis_file" class="mdb-select" required>
	                            <option value="" disabled selected>Jenis file</option>
	                            <option value="txt">*.txt</option>
	                        </select>
	                    </div>
                    </div>
                    <div class="col-md-12">
                    	<div class="file-field">
                            <div class="btn btn-primary btn-sm waves-effect orange">
                                <span>Pilih File</span>
                                <input type="file" name="file_whitelist" id="file_whitelist">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload File...">
                            </div>
                        </div>
                    </div>
					
                    <p>
					<br><br><b>
					&nbsp Note: <br>
					&nbsp 1. File dengan format text (.txt) <br>
					&nbsp 2. Isi whitelist dengan field [msisdn|cluster] <br>
					&nbsp 3. Msisdn dimulai dengan 62 <br>
					&nbsp 4. Taker yang bisa dicek adalah  Data H-2 <br>
					&nbsp 5. Pastikan pemisah antar kolom merupakan "|" <br></b>
					<!--Contoh file upload untuk cek taker dapat didownload disini.-->
					<!--&nbsp 5. Jumlah msisdn yang akan di cek maks 1.000 msisdn-->

					</p>
                    <div class="text-center mt-1-half">
						<button type="submit" name="btn_upload" id="btn_upload" class="btn btn-primary mb-1 orange">Upload</button>
    				</div>
				</form>
            </div>
        </div>
    </section>
</main>
</body>
<?php
		break;
}
?>