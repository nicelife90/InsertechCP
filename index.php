<?php
require 'sections/header_top_nav.php';
require 'sections/menu.php';
Utils::IdentityVerification();

?>

    <div class="content-wrapper">

        <section class="content-header">
            <h1>Bienvenue</h1>
        </section>

        <section class="content">


            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Bienvenue</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <p>Message d'accueil</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>




<?php
require 'sections/footer.php';
?>