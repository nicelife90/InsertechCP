<?php
require 'sections/header_top_nav.php';
require 'sections/menu.php';
//Utils::IdentityVerification();

/*
 * Add User
 */
if (isset($_POST['add-user']) && $_POST['DBLP'] == $_SESSION['DBLP']) {

    //verification query
    $username_count = $_DB->query("SELECT COUNT(*) FROM `users` WHERE `username`='" . $_POST['username'] . "'")->fetch_row();

    //validation des champs
    if (empty($_POST['first_name']) ||
        empty($_POST['last_name']) ||
        empty($_POST['username']) ||
        empty($_POST['pwd']) ||
        empty($_POST['email'])

    ) {
        $_SESSION['error_msg'] = '<div class="alert alert-danger"><i class="fa fa-times-circle"></i> Vous devez remplir tous les champs.</div>';
    } //validation du email
    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_msg'] = '<div class="alert alert-danger"><i class="fa fa-times-circle"></i> L\'adresse courriel est invalide.</div>';
    } //validation du nom d'utilisateur - UTILISER !UTILISER
    elseif ($username_count[0] != 0) {
        $_SESSION['error_msg'] = '<div class="alert alert-danger"><i class="fa fa-times-circle"></i> Le nom d\'utilisateur est déjà utilisé.</div>';
    } //Ajout de l'utilisateur.
    else {

        //préparation mot de passe - intranet
        $pwd_hash = sha1(strtoupper($_POST['username']) . ":" . $_POST['pwd']);

        //Préparation INTRANET
        $query = "INSERT INTO `users`	(
																`first_name`,
																`last_name`,
																`username`,
																`pwd_hash`,
																`email`
																
													)VALUES(
													 			'" . $_DB->escape_string(ucfirst($_POST['first_name'])) . "',
																'" . $_DB->escape_string(ucfirst($_POST['last_name'])) . "',
													 			'" . $_DB->escape_string($_POST['username']) . "',
																'" . $pwd_hash . "',
																'" . $_DB->escape_string($_POST['email']) . "'
													)";

        //requette
        if ($_DB->query($query)) {
            $_SESSION['ok_msg'] = '<div class="alert alert-success"><i class="fa fa-check-circle"></i> L\'utilisateur a bien été ajouté.</div>';
        } //Erreur durant la requette
        else {
            $_SESSION['error_msg'] = '<div class="alert alert-danger"><i class="fa fa-times-circle"></i> Une erreur s\'est produite: ' . $_DB->error . '</div>';
        }
    }
}

/*
 * Delete user
 */
if (isset($_GET['id']) && $_GET['token'] == $_SESSION['DBLP']) {

    if ($_DB->query("DELETE FROM `users` WHERE `id`='" . $_GET['id'] . "'")) {
        $_SESSION['ok_msg'] = '<div class="alert alert-success"><i class="fa fa-check-circle"></i> L\'utilisateur a bien été supprimé!</div>';
    } //ERROR
    else {
        $_SESSION['error_msg'] = '<div class="alert alert-danger"><i class="fa fa-times-circle"></i> Une erreur s\'est produite: ' . $_DB->error . '</div>';
    }
}
?>


    <div class="content-wrapper">

        <section class="content-header">
            <h1>Gestion des utilisateurs</h1>
        </section>

        <section class="content">
            <?php
            //MESSAGE
            if (isset($_SESSION['error_msg'])) {
                echo $_SESSION['error_msg'];
                unset($_SESSION['error_msg']);
            }

            if (isset($_SESSION['ok_msg'])) {
                echo $_SESSION['ok_msg'];
                unset($_SESSION['ok_msg']);
            }

            //Double Post
            $_SESSION['DBLP'] = uniqid();

            //FORM ACTION LINK
            parse_str($_SERVER['QUERY_STRING']);
            $action_link = Utils::rootpath() . $_SERVER['PHP_SELF'];

            ?>
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Formulaire</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <form action="<?php echo $action_link; ?>" method="post">
                                <input type="hidden" name="DBLP" value="<?php echo $_SESSION['DBLP']; ?>"/>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <label>Prénom</label>
                                        <div class="input-group"><span class="input-group-addon"><i
                                                    class="fa fa-user"></i></span>
                                            <input class="form-control" name="first_name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Nom</label>
                                        <div class="input-group"><span class="input-group-addon"><i
                                                    class="fa fa-user"></i></span>
                                            <input class="form-control pointer" name="last_name" type="text">
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <label>Nom d'utilisateur</label>
                                        <div class="input-group"><span class="input-group-addon"><i
                                                    class="fa fa-tag"></i></span>
                                            <input class="form-control" name="username" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Mot de passe</label>
                                        <div class="input-group"><span class="input-group-addon"><i
                                                    class="fa fa-key"></i></span>
                                            <input class="form-control" name="pwd" type="password" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <label>Courriel</label>
                                        <div class="input-group"><span class="input-group-addon"><i
                                                    class="fa fa-envelope"></i></span>
                                            <input id="email" class="form-control" name="email" type="text">
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <input class="btn btn-danger" type="submit" name="add-user" value="Ajouter">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Liste des utilisateurs</h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Nom d'utilisateur</th>
                            <th>Courriel</th>
                            <th>Dernière connexion</th>
                            <th>Dernière IP</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        //Affichage des utilisateur
                        $users = $_DB->query("SELECT * FROM `users`");
                        while ($user = $users->fetch_object()) {

                            //Actions
                            $removelink = $action_link . '?&id=' . $user->id . '&token=' . $_SESSION['DBLP'];

                            echo '<tr>
                            <td>' . $user->first_name . '</td>
                            <td>' . $user->last_name . '</td>
                            <td>' . $user->username . '</td>
                            <td>' . $user->email . '</td>
                            <td>' . $user->last_con . '</td>
                            <td>' . $user->last_ip . '</td>
                            <td>
                            <a class="ttip btn btn-default btn-sm" title="Supprimer le compte" onclick="return confirm(\'Êtes-vous de vouloir supprimer cet utilisateur\')" href="' . $removelink . '" target="_self"><i class="fa fa-trash-o fa-fw"></i></a>
                            </td>
                          </tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

<?php
require 'sections/footer.php';
?>