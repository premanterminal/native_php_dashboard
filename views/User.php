<?php
session_start();

define('BL', true);

require_once('../controllers/UserController.php');

if(!is_loggedin())
{
	redirect('login');
}

if(isset($_POST['btn_tambah']))
{
    $username = anti_injection($_POST['username']);
    $password = anti_injection($_POST['password']);
    $nama_lengkap = anti_injection($_POST['nama_lengkap']);
    $email = anti_injection($_POST['email']);
    $role = anti_injection($_POST['role']);

    if($username == "")
    {
        $error = "Username harus diisi.";
    }
    elseif($password == "")
    {
        $error = "Password harus diisi.";
    }
    elseif($nama_lengkap == "")
    {
        $error = "Nama lengkap harus diisi.";
    }
    elseif($email == "")
    {
        $error = "Email harus diisi";
    }
    elseif($role == "")
    {
        $error = "Role harus diisi.";
    }
    else
    {
        if(tambahUser($username, $password, $nama_lengkap, $email, $role))
        {
            $success = "Data user sudah ditambah.";
        }
        else
        {
            $error = "Data user gagal ditambah, periksa kembali input Anda.";
        }
    }
}

if(isset($_POST['btn_edit']))
{
    $username = anti_injection($_POST['username']);
    $password = anti_injection($_POST['password']);
    $nama_lengkap = anti_injection($_POST['nama_lengkap']);
    $email = anti_injection($_POST['email']);
    $role = anti_injection($_POST['role']);

    $nama_file = $_FILES['file_foto']['name'];
    $file = $_FILES['file_foto']['tmp_name'];
    $tipe_file = $_FILES['file_foto']['type'];

    if($username == "")
    {
        $error = "Username harus diisi.";
    }
    elseif($nama_lengkap == "")
    {
        $error = "Nama lengkap harus diisi.";
    }
    elseif($email == "")
    {
        $error = "Email harus diisi";
    }
    elseif($role == "")
    {
        $error = "Role harus diisi.";
    }
    else
    {
        if(strlen($file) == 0)
        {
            if(editUser($username, $password, $nama_lengkap, $email, $role))
            {
                $success = "Data User telah diubah.";
            }
        }
        elseif(strlen($file) > 3)
        {
            if(editUserPicture($username, $password, $nama_lengkap, $email, $role, $file, $tipe_file))
            {
                $success = "Data User telah diubah.";
            }
        }
    }
}

if(isset($_POST['reset_user']))
{
	$username = anti_injection($_POST['username']);

	$reset = resetUser($username);
	$success = 'Username '.$username.' mempunyai password baru : '.$reset.'';
}

if(isset($_POST['aktif_user']))
{
    $username = anti_injection($_POST['username']);

    if(aktifUser($username))
    {
        $success = "Akun sudah aktif.";
    }
}

if(isset($_POST['nonaktif_user']))
{
    $username = anti_injection($_POST['username']);

    if(nonaktifUser($username))
    {
        $success = "Akun sudah dinonaktifkan.";
    }
}

if(isset($_POST['hapus_user']))
{
	$username = anti_injection($_POST['username']);

	if(hapusUser($username))
	{
		$success = "Akun Sudah Dihapus.";
	}
}

if(isAdmin())
{

switch($_GET['pilih'])
{
    default :

    $daftar_user = getDataUser();
    $username = json_decode($daftar_user, true);
?>
<head>
</head>
<body>

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
            <h3 class="card-header red white-text">Data User</h3>
			<div class="card-body">
                <a href="?p=user&pilih=tambah" class="btn btn-md btn-primary">Tambah Data</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-responsive" id="dataTables">
					<thead>
						<tr>
							<th>Username</th>
							<th>Nama Lengkap</th>
							<th>Email</th>
							<th>Status</th>
							<th>Role</th>
							<th>Pilih</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($username as $data)
						{
						?>
						<tr>
							<td><?= $data['username'] ?></td>
							<td><?= $data['nama_lengkap'] ?></td>
							<td><?= $data['email'] ?></td>
							<td><?php if($data['aktif']=='Y') {echo 'Aktif';} else{echo 'Tidak Aktif';} ?></td>
							<td><?= $data['role'] ?></td>
							<td>
                                <a href="?p=user&pilih=edit&username=<?= $data['username'] ?>" class="btn btn-sm btn-primary">Edit</a>
								<a href="javascript:;" id="reset" class="btn btn-sm btn-warning" data-id="<?= $data['username'] ?>" data-toggle="modal" data-target="#modal-reset">Reset</a>

                                <?php if($data['aktif']=='Y') { ?>
								<a href="javascript:;" id="nonaktif" class="btn btn-sm btn-warning" data-id="<?= $data['username'] ?>" data-toggle="modal" data-target="#modal-nonaktif">Non Aktif</a>
                                <?php } else { ?>
                                <a href="javascript:;" id="aktif" class="btn btn-sm btn-success" data-id="<?= $data['username'] ?>" data-toggle="modal" data-target="#modal-aktif">Aktif</a>
                                <?php } ?>

								<a href="javascript:;" id="hapus" class="btn btn-sm btn-danger" data-id="<?= $data['username'] ?>" data-toggle="modal" data-target="#modal-hapus">Hapus</a>
							</td>
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

<div class="modal fade" id="modal-reset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-warning" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading">Reset User</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <p>Apa Anda yakin ingin me-reset password akun ini?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <form role="form" action="" method="post">
                    <input type="hidden" name="username" id="username" value="<?= $data['username'] ?>">
                    <button type="submit" name="reset_user" class="btn btn-primary-modal">Reset</button>
                    <a type="button" class="btn btn-outline-secondary-modal waves-effect" data-dismiss="modal">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-aktif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-success" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading">Aktif User</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <p>Apa Anda yakin ingin mengaktifkan akun ini?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <form role="form" action="" method="post">

                    <input type="hidden" name="username" id="username" value="<?= $data['username'] ?>">
                    <button type="submit" name="aktif_user" class="btn btn-primary-modal">Aktif</button>
                    <a type="button" class="btn btn-outline-secondary-modal waves-effect" data-dismiss="modal">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-nonaktif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-warning" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading">Non Aktif User</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <p>Apa Anda yakin ingin me-nonaktifkan akun ini?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <form role="form" action="" method="post">
                    <input type="hidden" name="username" id="username" value="<?= $data['username'] ?>">
                    <button type="submit" name="nonaktif_user" class="btn btn-primary-modal">Non Aktif</button>
                    <a type="button" class="btn btn-outline-secondary-modal waves-effect" data-dismiss="modal">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading">Hapus User</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <p>Apa Anda yakin ingin menghapus data akun ini?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <form role="form" action="" method="post">
                    <input type="hidden" name="username" id="username" value="<?= $data['username'] ?>">
                    <button type="submit" name="hapus_user" class="btn btn-primary-modal">Hapus</button>
                    <a type="button" class="btn btn-outline-secondary-modal waves-effect" data-dismiss="modal">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
	   break;
    case "tambah" :
?>
<body style="background-color:#e60000">
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
	
    <section class="pb-4" >
        <div class="card" >
            <h3 class="card-header blue-gradient white-text">Tambah User</h3>
            <div class="card-body">
                <form role="form" action="" method="post">
                    <div class="col-md-12">
                        <div class="md-form">
                            <label class="active">Username</label>
                            <input type="text" id="username" name="username" class="form-control validate" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="md-form">
                            <label class="active">Password</label>
                            <input type="password" id="password" name="password" class="form-control validate" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="md-form">
                            <label class="active">Nama Lengkap</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control validate" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="md-form">
                            <label class="active">Email</label>
                            <input type="text" id="email" name="email" class="form-control validate" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="md-form">
                            <select name="role" class="mdb-select" required>
                                <option value="" disabled selected>Role</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-center mt-1-half">
                        <button type="submit" name="btn_tambah" id="btn_tambah" class="btn btn-primary mb-1">Tambah</button>
                        <button type="reset" name="btn_reset" id="btn_reset" class="btn btn-danger mb-1">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
</body>
<?php
        break;
    case "edit" :

    $username = $_GET['username'];

    try
    {
        $stmt = dbConnection()->prepare("SELECT username, nama_lengkap, email, user_picture, picture_type, role FROM tb_user WHERE username=:username");
        $stmt->execute(array(':username'=>$username));
        $user = $stmt->fetch();
    }
    catch(PDOException $e)
    {
        //echo $e->getMessage();
    }
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
    <section class="section">
        <form role="form" enctype="multipart/form-data" action="" method="post">
            <div class="row">
                <div class="col-lg-4 mb-r">
                    <div class="card">
                        <div class="card-header blue-gradient white-text">
                            <h4 class="mb-0">Foto Profil</h4>
                        </div>
                        <div class="card-body text-center">
                            <img src="data:<?=$user['picture_type']?>;base64, <?= base64_encode($user['user_picture']) ?>" alt="User Photo" class="z-depth-1 mb-3 mx-auto" /><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="file-field">
                                        <div class="btn btn-primary btn-sm waves-effect waves-light">
                                            <span>Ganti Foto</span>
                                            <input type="file" name="file_foto" id="file_foto" accept="image/*">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" placeholder="File Foto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mb-r">
                    <div class="card">
                        <div class="card-header blue-gradient white-text">
                            <h4 class="mb-0">Edit Profil</h4>
                        </div>
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input type="text" name="username" id="form1" class="form-control validate" value="<?= $user['username'] ?>" required>
                                        <label for="form1" data-error="wrong" data-success="right">Username</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input type="text" name="password" id="form2" class="form-control validate">
                                        <label for="form2" data-error="wrong" data-success="right">Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input type="text" name="nama_lengkap" id="form81" class="form-control validate" value="<?= $user['nama_lengkap'] ?>" required>
                                        <label for="form81" data-error="wrong" data-success="right">Nama Lengkap</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input type="email" name="email" id="form82" class="form-control validate" value="<?= $user['email'] ?>" required>
                                        <label for="form82" data-error="wrong" data-success="right">Email</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <select name="role" class="mdb-select" required>
                                            <?php if($user['role'] == 'admin') { ?>
                                            <option value="admin" selected>Admin</option>
                                            <?php } elseif($user['role'] == 'user') { ?>
                                            <option value="user" selected>User</option>
                                            <?php } ?>
                                            <option value="user">User</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <input type="submit" name="btn_edit" value="Ubah Profil" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</main>
</body>
<?php
    break;
}
}
?>