<?php
include '../templates/home.php';
echo Title('Visualisation du stock - Timken');
?>

<?php

$GET_STOCK = Connection()->query('SELECT * FROM `Articles`;');
$GET_FIELD = Connection()->query('DESCRIBE Articles;');

?>

<section class="section">

    <table>

        <thead>
        <tr>
            <?php

            $FIELD= $GET_FIELD->fetchAll(PDO::FETCH_COLUMN);

            foreach ($FIELD as $TR) {
                echo "<th>$TR</th>";
            }

            $GET_FIELD->closeCursor();

            ?>
        </tr>
        </thead>

        <tbody>

        <tr>

            <?php


            while ($STOCK = $GET_STOCK->fetch()) {

                echo "<th>".$STOCK['id']."</th>";
                echo "<th>".$STOCK['famille']."</th>";
                echo "<th>".$STOCK['nom']."</th>";
                echo "<th>".$STOCK['commentaire']."</th>";
                echo "<th>".$STOCK['code']."</th>";
                echo "<th>".$STOCK['localisation']."</th>";
                echo "<th>".$STOCK['dateCreation']."</th>";
                echo "<th>".$STOCK['dateModification']."</th>";
                echo "<th>".$STOCK['createUser']."</th>";
                echo "<th>".$STOCK['editUser']."</th>";
                echo "</tr><tr>";


            }


            $GET_STOCK->closeCursor();

            ?>


        </tr>

        </tbody>


    </table>


</section>


</body>
</html>