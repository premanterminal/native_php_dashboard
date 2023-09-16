<?php
session_start();

if (!defined('BL')) {
    die('Tidak boleh diakses langsung.');
}

require_once('../common/config/DbController.php');
require_once('../common/controllers/CommonController.php');

function getDataUser()
{
	if(isAdmin())
	{
		try
		{
			$stmt = dbConnection()->prepare("SELECT username, nama_lengkap, email, aktif, role FROM tb_user WHERE hapus='N' AND username!='admin'");
			$stmt->execute();
			$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$return = [];

			foreach ($user as $row) {
				$return[] = [ 
					'username' => $row['username'],
					'nama_lengkap' => $row['nama_lengkap'],
					'email' => $row['email'],
					'aktif' => $row['aktif'],
					'role' => $row['role']
				];
			}

			$hasil = json_encode($return, true);
			return $hasil;
		}
		catch(PDOException $e)
		{
			//echo $e->getMessage();
		}
	}
}

function tambahUser($username, $password, $nama_lengkap, $email, $role)
{
	if(isAdmin())
	{
		try
	    {
	        $new_password = password_hash($password, PASSWORD_DEFAULT);

	        $stmt = dbConnection()->prepare("INSERT INTO 
	            tb_user(username,password,nama_lengkap,email,aktif,hapus,role,tgl_daftar) 
	            VALUES (:username, :password, :nama_lengkap, :email, 'Y', 'N', :role, :tgl_daftar)");
	        $stmt->bindparam(":username", $username);
	        $stmt->bindparam(":password", $new_password);
	        $stmt->bindparam(":nama_lengkap", $nama_lengkap);
	        $stmt->bindparam(":email", $email);
	        $stmt->bindparam(":role", $role);
	        $stmt->bindparam(":tgl_daftar", date("Ymd"));
	        $stmt->execute();

	        return true;
	    }
	    catch (PDOException $e)
	    {
	        //echo $e->getMessage();
	    }
    }
}

function editUser($username, $password, $nama_lengkap, $email, $role)
{
	try
    {
		if($password != "")
        {
        	$new_password = password_hash($password, PASSWORD_DEFAULT);
        	$stmt = dbConnection()->prepare("UPDATE tb_user SET password=:password, nama_lengkap=:nama_lengkap, email=:email, role=:role WHERE username=:username");
        	$stmt->bindparam(":password", $new_password);
	        $stmt->bindparam(":nama_lengkap", $nama_lengkap);
	        $stmt->bindparam(":email", $email);
	        $stmt->bindparam(":role", $role);
	        $stmt->bindparam(":username", $username);
	        $stmt->execute();

	        return true;
        }
        else
        {
        	$stmt = dbConnection()->prepare("UPDATE tb_user SET nama_lengkap=:nama_lengkap, email=:email, role=:role WHERE username=:username");
	        $stmt->bindparam(":nama_lengkap", $nama_lengkap);
	        $stmt->bindparam(":email", $email);
	        $stmt->bindparam(":role", $role);
	        $stmt->bindparam(":username", $username);
	        $stmt->execute();

	        return true;
    	}
    }
    catch (PDOException $e)
    {
        //echo $e->getMessage();
    }
}

function editUserPicture($username, $password, $nama_lengkap, $email, $role, $file, $tipe_file)
{
	try
    {
    	$foto = fopen($file, 'rb');

		if($password != "")
        {
        	$new_password = password_hash($password, PASSWORD_DEFAULT);
        	$stmt = dbConnection()->prepare("UPDATE tb_user SET password=:password, nama_lengkap=:nama_lengkap, email=:email, role=:role, user_picture=:user_picture, picture_type=:picture_type WHERE username=:username");
        	$stmt->bindparam(":password", $new_password);
	        $stmt->bindparam(":nama_lengkap", $nama_lengkap);
	        $stmt->bindparam(":email", $email);
	        $stmt->bindparam(":role", $role);
	        $stmt->bindParam(':user_picture', $foto, PDO::PARAM_LOB);
	        $stmt->bindparam(":picture_type", $tipe_file);
	        $stmt->bindparam(":username", $username);
	        $stmt->execute();

	        return true;
        }
        else
        {
        	$stmt = dbConnection()->prepare("UPDATE tb_user SET nama_lengkap=:nama_lengkap, email=:email, role=:role, user_picture=:user_picture, picture_type=:picture_type WHERE username=:username");
	        $stmt->bindparam(":nama_lengkap", $nama_lengkap);
	        $stmt->bindparam(":email", $email);
	        $stmt->bindparam(":role", $role);
	        $stmt->bindParam(':user_picture', $foto, PDO::PARAM_LOB);
	        $stmt->bindparam(":picture_type", $tipe_file);
	        $stmt->bindparam(":username", $username);
	        $stmt->execute();

	        return true;
    	}
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
}

function resetUser($username)
{
	if(isAdmin())
	{
		try
		{
			$password = md5(microtime() . '#$&^%$#' . mt_rand());
			$new_password = password_hash($password, PASSWORD_DEFAULT);

			$stmt = dbConnection()->prepare("UPDATE tb_user SET password=:password WHERE username=:username");
			$stmt->bindparam(":password", $new_password);
			$stmt->bindparam(":username", $username);
			$stmt->execute();

			return $password;
		}
		catch(PDOException $e)
		{
			//echo $e->getMessage();
		}
	}
}

function hapusUser($username)
{
	if(isAdmin())
	{
		try
		{
			$stmt = dbConnection()->prepare("UPDATE tb_user SET hapus='Y', aktif='N' WHERE username=:username");
			$stmt->execute(array(':username'=>$username));

			return true;
		}
		catch(PDOException $e)
		{
			//echo $e->getMessage();
		}
	}
}

function aktifUser($username)
{
	if(isAdmin())
	{
		try
		{
			$stmt = dbConnection()->prepare("UPDATE tb_user SET aktif='Y' WHERE username=:username");
			$stmt->execute(array(':username'=>$username));

			return true;
		}
		catch(PDOException $e)
		{
			//echo $e->getMessage();
		}
	}
}

function nonaktifUser($username)
{
	if(isAdmin())
	{
		try
		{
			$stmt = dbConnection()->prepare("UPDATE tb_user SET aktif='N' WHERE username=:username");
			$stmt->execute(array(':username'=>$username));

			return true;
		}
		catch(PDOException $e)
		{
			//echo $e->getMessage();
		}
	}
}

?>