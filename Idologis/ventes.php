<?php
require __DIR__ . '/admin/bdd/connect.php';
?>

<html> 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device_width, intial-scale=1">
        <title>Idologis</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="banner">
            <div class="navbar">
                <a href="index.php"><img src="img/logo.png" alt="" class="logo"></a>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="">Ventes</a></li>
                    <li><a href="locations.php">Locations</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="/idologis/admin/index.php">Admin</a><li>
                </ul>
            </div>
            <div class="content">
                <h2>Voici nos ventes :</h2>
                <?php
                // Requête SQL pour récupérer toutes les ventes
                $sql = "SELECT * FROM Ventes";
                $stmt = $db->query($sql);

                // Vérification s'il y a des résultats
                if ($stmt->rowCount() > 0) {
                    echo "<table>";
                    echo "<tr>
                    <th>Référence</th>
                    <th>Type</th>
                    <th>Secteur</th>
                    <th>Surface</th>
                    <th>Prix</th>
                    <th>Mail vendeur</th>
                    <th>Fiche détaillée</th>
                    </tr>";

                    // Affichage des données de chaque location
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $row['Reference'] . "</td>";
                        echo "<td>" . $row['Type'] . "</td>";
                        echo "<td>" . $row['Secteur'] . " m2</td>";
                        echo "<td>" . $row['Surface'] . "</td>";
                        echo "<td>" . $row['Prix'] . " €</td>";
                        echo "<td>" . $row['Mail_vendeur'] . "</td>";
                        //Affiche sur la page bien avec dans l'url les valeurs de référence et du type location ou vente
                        echo "<td><a href='bien.php?reference=" . $row['Reference'] . "&type=v'>Voir</a></td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                } else {
                    echo "<p>Aucune vente trouvée.<p>";
                }
                ?>

            </div>
        </div>
        <div class="footer">
            <p><?php
                $var = fopen("copyright.txt", "r");
                while ($ligne = fgets($var)) {
                    echo "$ligne<br>";
                }
                fclose($var);
                ?> 
            </p>
        </div>
    </body>
</html>