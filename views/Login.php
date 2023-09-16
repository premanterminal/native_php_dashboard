<?php
session_start();

define('BL', true);

require_once('../controllers/LoginController.php');
//require_once('../controllers/fungsi.php');

if(is_loggedin()!="")
{
    redirect('index?p=rev_total');
}

if(isset($_POST['btn-login']))
{
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if(masuk($user,$pass))
    {
        redirect('index?p=home');
    }
    else
    {
        $error = "Username atau Password salah.";
    }
}

?>
<!DOCTYPE html>
<html lang="en" class="full-height">
    <head>
        <title>MCD SUMBAGUT | Log In</title>
        <?php include_once "CommonAssets.php"; ?>
        <style>
            .intro-2 {
                background: url("views/assets/img/Presentasi-B.jpg")no-repeat center;
                background-size: cover;
            }
            .top-nav-collapse {
                background-color: #3f51b5 !important; 
            }
            .navbar:not(.top-nav-collapse) {
                background: transparent !important;
            }
            @media (max-width: 1200px) {
                .navbar:not(.top-nav-collapse) {
                    background: #3f51b5 !important;
                } 
            }
            
            .card {
                background-color: rgba(229, 228, 255, 0.2);
            }

             .md-form .prefix {
                font-size: 1.5rem;
                margin-top: 1rem;
            }
            .md-form label {
                color: #ffffff;
            }
            h6 {
                line-height: 1.7;
            }
            @media (max-width: 740px) {
                .full-height,
                .full-height body,
                .full-height header,
                .full-height header .view {
                    height: 750px; 
                } 
            }
            @media (min-width: 741px) and (max-height: 638px) {
                .full-height,
                .full-height body,
                .full-height header,
                .full-height header .view {
                    height: 750px; 
                } 
            }

            .card {
                margin-top: 30px;
                /*margin-bottom: -45px;*/

            }

            .md-form input[type=text]:focus:not([readonly]),
            .md-form input[type=password]:focus:not([readonly]) {
                border-bottom: 1px solid #8EDEF8;
                box-shadow: 0 1px 0 0 #8EDEF8;
            }
            .md-form input[type=text]:focus:not([readonly])+label,
            .md-form input[type=password]:focus:not([readonly])+label {
                color: #8EDEF8;
            }

            .md-form .form-control {
                color: #fff;
            }
        </style>
    </head>
    <body class="fixed-sn white-skin">
        <?php include_once "Akun.php";?>

        <?php include_once "CommonScript.php"; ?>
    </body>
</html>
