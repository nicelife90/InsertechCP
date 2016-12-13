<?php
require 'sections/header_top_nav.php';
require 'sections/menu.php';
Utils::IdentityVerification();

/**
 * Search screen
 */
if (isset($_POST['search-screen']) && $_SESSION['DBLP'] == $_POST['DBLP']) {

    $query_params = [];
    foreach ($_POST as $key => $value) {
        if (!empty($value) && $value != "Recherche" && $key != "DBLP") {
            $query_params[] = "`" . $key . "` LIKE '%" . $value . "%'";
        }
    }

    if (count($query_params) > 0) {
        $search_query = "SELECT * FROM screen WHERE " . implode(" AND ", $query_params);
    }
}
?>


    <div class="content-wrapper">

        <section class="content-header">
            <h1>Centre de recherche</h1>
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
                    <h3 class="box-title">Rechercher un écrans</h3>
                </div>
                <div class="box-body">

                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <form action="<?php echo $action_link; ?>" method="post">
                                <input type="hidden" name="DBLP" value="<?php echo $_SESSION['DBLP']; ?>">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <label>Modèle</label>
                                        <div class="input-group"><span class="input-group-addon"><i
                                                        class="fa fa-pencil"></i></span>
                                            <input class="form-control" name="model" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Taille (Pouce)</label>
                                        <div class="input-group"><span class="input-group-addon"><i
                                                        class="fa fa-desktop"></i></span>
                                            <select class="form-control" name="size">
                                                <option value="0"></option>
                                                <option value="10.1">10.1</option>
                                                <option value="11.6">11.6</option>
                                                <option value="12.1">12.1</option>
                                                <option value="13.3">13.3</option>
                                                <option value="14">14</option>
                                                <option value="14.1">14.1</option>
                                                <option value="15">15</option>
                                                <option value="15.4">15.4</option>
                                                <option value="15.6">15.6</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="17.3">17.3</option>
                                                <option value="18.4">18.4</option>
                                                <option value="20.1">20.1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <label>Résolution</label>
                                        <div class="input-group"><span class="input-group-addon"><i
                                                        class="fa fa-arrows-alt"></i></span>
                                            <select class="form-control" name="resolution">
                                                <option value="0"></option>
                                                <option value="800 x 600">800 x 600</option>
                                                <option value="1024 x 768">1024 x 768</option>
                                                <option value="1152 x 864">1152 x 864</option>
                                                <option value="1280 x 720">1280 x 720</option>
                                                <option value="1280 x 768">1280 x 768</option>
                                                <option value="1280 x 800">1280 x 800</option>
                                                <option value="1280 x 1024">1280 x 1024</option>
                                                <option value="1366 x 768">1366 x 768</option>
                                                <option value="1440 x 900">1440 x 900</option>
                                                <option value="1600 x 1200">1600 x 1200</option>
                                                <option value="1680 x 1050">1680 x 1050</option>
                                                <option value="1920 x 1080">1920 x 1080</option>
                                                <option value="4K">4K</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Révision</label>
                                        <div class="input-group"><span class="input-group-addon"><i
                                                        class="fa fa-edit"></i></span>
                                            <input class="form-control pointer" name="revision" type="text">
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <label>Finition</label>
                                        <div class="input-group"><span class="input-group-addon"><i
                                                        class="fa fa-flask"></i></span>
                                            <select class="form-control" name="finition">
                                                <option value="0"></option>
                                                <option value="Mat">Mat</option>
                                                <option value="Brillant">Brillant</option>
                                                <option value="Tactile">Tactile</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Technologie</label>
                                        <div class="input-group"><span class="input-group-addon"><i
                                                        class="fa fa-anchor"></i></span>
                                            <select class="form-control" name="technologie">
                                                <option value="0"></option>
                                                <option value="LCD">LCD</option>
                                                <option value="LED">LED</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <label>Connecteur</label>
                                        <div class="input-group"><span class="input-group-addon"><i
                                                        class="fa fa-plug"></i></span>
                                            <input class="form-control" name="connector" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Position du connecteur</label>
                                        <div class="input-group"><span class="input-group-addon"><i
                                                        class="fa fa-arrows"></i></span>
                                            <select class="form-control" name="connector_position">
                                                <option value="0"></option>
                                                <option value="Haut Gauche">Haut Gauche</option>
                                                <option value="Haut Droite">Haut Droite</option>
                                                <option value="Bas Gauche">Bas Gauche</option>
                                                <option value="Bas Droite">Bas Droite</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <label>Grade</label>
                                        <div class="input-group"><span class="input-group-addon"><i
                                                        class="fa fa-signal"></i></span>
                                            <select class="form-control" name="grade">
                                                <option value="0"></option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <br/>

                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <input class="btn btn-danger" type="submit" name="search-screen"
                                               value="Recherche">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <hr>

                    <div class="row">

                        <div class="col-sm-12 col-md-12">

                            <table id="table-search"
                                   class="table table-bordered table-responsive table-striped table-condensed">
                                <thead>
                                <tr>
                                    <th>Model</th>
                                    <th>Size</th>
                                    <th>Resolution</th>
                                    <th>Revision</th>
                                    <th>Finition</th>
                                    <th>Technologie</th>
                                    <th>Connector</th>
                                    <th>Connector Position</th>
                                    <th>Grade</th>
                                    <th>Image</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                //Display all screen
                                if (isset($search_query)) {
                                    $data = $_DB->query($search_query);

                                    while ($row = $data->fetch_object()) {

                                        echo '<tr>';
                                        echo '<td>' . $row->model . '</td>';
                                        echo '<td>' . $row->size . '</td>';
                                        echo '<td>' . $row->resolution . '</td>';
                                        echo '<td>' . $row->revision . '</td>';
                                        echo '<td>' . $row->finition . '</td>';
                                        echo '<td>' . $row->technologie . '</td>';
                                        echo '<td>' . $row->connector . '</td>';
                                        echo '<td>' . $row->connector_position . '</td>';
                                        echo '<td>' . $row->grade . '</td>';
                                        if (!empty($row->image)) {
                                            echo '<td><a href="' . Utils::rootpath() . '/' . $row->image . '" data-lightbox="' . $row->image . '"><img src="' . Utils::rootpath() . '/' . $row->image . '" height="50" /></a></td>';
                                        } else {
                                            echo '<td>&nbsp</td>';
                                        }
                                        echo '</tr>';

                                    }
                                }

                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>


    <script type="text/javascript">

        /**
         * Datatable
         */


        $(function () {
            $('#table-search').dataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": true,
                "language": {url: "<?php echo Utils::rootpath(); ?>/plugins/datatables/french.json"}
            });
        });


        /**
         * File browser
         * @constructor
         */
        function HandleChange1() {
            var fileinput = document.getElementById("browse1");
            var textinput = document.getElementById("filename1");
            textinput.value = fileinput.value;
        }
        function HandleBrowseClick1() {
            var fileinput = document.getElementById("browse1");
            fileinput.click();
        }

    </script>

<?php
require 'sections/footer.php';
?>