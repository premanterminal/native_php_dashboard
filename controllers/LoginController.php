<?php
session_start();

if (!defined('BL')) {
    die('Tidak boleh diakses langsung.');
}

require_once('../common/config/DbController.php');
require_once('../common/controllers/CommonController.php');

function masuk($user, $pass)
{
	$username = anti_injection($user);
	$password = anti_injection($pass);

	try
	{
		$stmt = dbConnection()->prepare("SELECT * FROM tb_user WHERE username=:user AND aktif='Y' AND hapus='N'");
		$stmt->execute(array(':user'=>$username));
		$currentUser = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($stmt->rowCount() == 1)
		{
			if(password_verify($password, $currentUser['password']))
			{
				$date = date('Y-m-d H:i:s');

				session_set_cookie_params(28800,"/");
				session_start();

	            $_SESSION['id_user'] = $currentUser['id_user'];
	            $_SESSION['username'] = $currentUser['username'];
	            $_SESSION['nama_lengkap'] = $currentUser['nama_lengkap'];
	            $_SESSION['email'] = $currentUser['email'];
	            $_SESSION['aktif'] = $currentUser['aktif'];
	            $_SESSION['role'] = $currentUser['role'];

	            $state = dbConnection()->prepare("INSERT INTO tb_history(id_user,username,last_login) VALUES (:id_user, :username, :last_login)");
		        $state->bindparam(":id_user", $currentUser['id_user']);
		        $state->bindparam(":username", $currentUser['username']);
		        $state->bindparam(":last_login", $date);
		        $state->execute();

	            return true;
			}
			else
			{
				return false;
			}
		}
	}
	catch(PDOException $e)
	{
		//echo $e->getMessage();
	}
}

function is_loggedin()
{
	if(isset($_SESSION['username']))
	{
		return true;
	}
}

function doLogout()
{
	session_start();
	session_destroy();
	header('location:login');
	return true;
}

/*
public function fn_ldap_authentication($userdomain,$userpassword)
{
    $host 		= "10.33.97.231";  //10.65.181.233
    $port 		= "389";
    $user 		= "hr_receiver";
    $password 	= "Tsel2008";
    $dn 		= "cn=hr_receiver,ou=outsources,ou=headoffice,dc=Telkomsel,dc=co,dc=id";
                                
    $connection = ldap_connect($host,$port);

    if($connection)
    {
        $ldapbind = ldap_bind($connection,$dn,$password);
        $list_ous=array("HeadOffice","Batam","Medan","Palembang");
        foreach($list_ous as $list_ou)
        {
            $cari = "ou=".$list_ou.",dc=Telkomsel,dc=co,dc=id";
            
            $sr = ldap_search($connection,$cari,"sAMAccountName=".$userdomain);
            if(ldap_count_entries($connection,$sr)==1)
            {
                $info 		= ldap_get_entries($connection,$sr);          // get all properties of ldap entry

                $dnUser 	= $info[0]['distinguishedname'][0]."\n";    // cn=rezaper,ou=Medan,ou=headoffice,dc=telkomsel.co.id
                $nikUser 	= $info[0]['extensionattribute1'][0];
                echo $nikUser;
                $cn 		= $info[0]['cn'][0];
                $email 		= $info[0]['mail'][0];   
                break;
            }  
        }                
        $passUser = $userpassword;
        $ldapbinduser = ldap_bind($connection,$dnUser,$passUser); 
        if($ldapbinduser)
        {
            return $nikUser;   
        }
    }
}
*/

?>