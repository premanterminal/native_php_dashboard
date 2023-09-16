<?php
session_start();

define('BL', true);

require_once('../controllers/UserController.php');

if(!is_loggedin())
{
	redirect('login');
}

if(isset($_POST['btn_edit']))
{
    $username = anti_injection($_SESSION['username']);
    $password = anti_injection($_POST['password']);
    $nama_lengkap = anti_injection($_POST['nama_lengkap']);
    $email = anti_injection($_POST['email']);
    $role = anti_injection($_SESSION['role']);

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
    else
    {
        if(strlen($file) == 0)
        {
            if(editUser($username, $password, $nama_lengkap, $email, $role))
            {
                $success = "Profil telah diubah.";
            }
        }
        elseif(strlen($file) > 3)
        {
            if(editUserPicture($username, $password, $nama_lengkap, $email, $role, $file, $tipe_file))
            {
                $success = "Profil telah diubah.";
            }
        }
    }
}

switch($_GET['pilih'])
{
    default :

    $username = $_SESSION['username'];

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
                        <div class="card-header red white-text">
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
                        <div class="card-header red white-text">
                            <h4 class="mb-0">Edit Profil</h4>
                        </div>
                        <div class="card-body text-center">
						<br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input type="text" name="username" id="form1" class="form-control validate" value="<?= $user['username'] ?>" disabled>
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
<?php
    break;
}
?>