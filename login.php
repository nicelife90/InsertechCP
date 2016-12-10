<?php
require 'loader.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Connexion - CPanel</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo Utils::rootpath(); ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo Utils::rootpath(); ?>/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo Utils::rootpath(); ?>/plugins/iCheck/square/blue.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php

//USER ALREADY LOGED BY SESSION
if (isset($_SESSION['user'])) {

    header('Location: index.php');
    exit;

} else {

    if (isset($_POST['login'])) {

        /**
         * DEFINE ACCOUNT INFO
         */
        $accountName = $_DB->escape_string($_POST['user']);
        $accountPass = $_DB->escape_string($_POST['pwd']);

        /**
         * VALIDATE USER NAME
         */
        $user_qry = $_DB->query("SELECT COUNT(*) AS ucount FROM `users` WHERE `username`='" . $accountName . "'")->fetch_object();
        if ($user_qry->ucount < 1) {
            $error_msg = '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Nom d\'utilisateur invalide.</div>';
        } /**
         * VALIDATE PASSWORD
         */
        else {
            $pwd_hash = sha1(strtoupper($accountName) . ":" . $accountPass);
            $login = $_DB->query("SELECT * FROM `users` WHERE `username`='" . strtoupper($accountName) . "'")->fetch_object();

            //Si identifiant correct
            if (strtoupper($login->pwd_hash) == strtoupper($pwd_hash)) {

                //mise à jour du last_ip
                $_DB->query("UPDATE `users` SET `last_ip`='" . Utils::getIP() . "' WHERE username='" . strtoupper($accountName) . "'");

                //création de la variable session user
                $_SESSION['user'] = [
                    'username'  => $accountName,
                    'password'  => $pwd_hash,
                    'full_name' => $login->first_name . ' ' . $login->last_name,
                    'last_ip'   => $login->last_ip,
                    'last_con'  => $login->last_con
                ];

                //redirection vers le dashboard
                header('Location: index.php');
                exit;
            } //Mot de passe invalide
            else {
                $error_msg = '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Mot de passe invalide.</div>';
            }
        }
    }
}
?>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-box-body">
        <form action="<?php echo Utils::rootpath() . $_SERVER['PHP_SELF']; ?>" method="post">
            <?php echo isset($error_msg) ? $error_msg : null; ?>
            <div class="form-group has-feedback">
                <input name="user" type="text" class="form-control" placeholder="Utilisateur">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="pwd" type="password" class="form-control" placeholder="Mot de passe">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <input name="login" type="submit" value="Connexion" class="btn btn-primary btn-block btn-flat">
                </div>
            </div>
        </form>
    </div>
</div>

<script src="<?php echo Utils::rootpath(); ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo Utils::rootpath(); ?>/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

