<?php session_unset(); ?>
<?php
session_unset();
require_once 'controller/abonnementController.php';
$controller = new abonnementController();
?>
<section id="our-courses" class="our-courses pt90 pt650-992">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mouse_scroll">
                    <div class="icon"><span class="flaticon-download-arrow"></span></div>
                    <h2>Liste des Abonnement</h2>
                    <div class="row">
                        <form class="pull-right" action="index.php?act=search" method="post">
                            <input type="text" name="search" placeholder="title">
                            <button type="submit"> rechercher</button>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                             <a href="view/ajouterAbonnement.php"><i class="fa fa-plus pull-right">Ajouter </i></a>

                            <?php
                            if (count($result) > 0) {
                                echo "<table style='width: 100%' class='table-bordered'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>#</th>";
                                echo "<th>Abonnement</th>";
                                echo "<th>Type d'Abonnement</th>";
                                echo "<th>Date d'Abonnement</th>";
                                echo "<th>Action</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                foreach ($result as $row) {
                                    echo "<tr>";
                                    echo "<td>" . $row['idAb'] . "</td>";
                                    echo "<td>" . $row['nom'] . "</td>";
                                    echo "<td>" . $row['type'] . "</td>";
                                    echo "<td>" . $row['dateAb'] . "</td>";
                                    echo "<td>";

                                    echo "<a href='index.php?act=update&id=" . $row['idAb'] . "' ><i class='fa fa-edit'></i> modifier</a><br>";
                                    echo "<a style='color:red' href='index.php?act=delete&id=" . $row['idAb'] . "' ><i class='fa fa-remove'></i> supprimer</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                                // Free result set
                            } else {
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                            ?>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>

