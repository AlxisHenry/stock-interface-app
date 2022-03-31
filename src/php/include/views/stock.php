<?php include '../templates/home.php'; ?>
<section class="section">

    <table>

        <thead class="table-header">
        <tr class="row-0 row-values">
            <?php
            $FIELD = array('Numéro', 'Famille', 'Nom', 'Commentaire', 'Code', 'Localisation', 'Dernière modification');
            $i = 0;

            foreach ($FIELD as $TR) {
                echo "<th class='column-$i column-title'>$TR</th>";
                $i++;
            }
            ?>
        </tr>
        </thead>

        <tbody class="table-body">

        <tr class="row-1 row-values">

            <?php

            $GET_STOCK = Connection()->query('SELECT * FROM `articles`;');
            $i = 2;
            while ($STOCK = $GET_STOCK->fetch()) {
                echo "<th class='column-0 column-values'>".$STOCK['id']."</th>";
                echo "<th class='column-1 column-values'>".$STOCK['famille']."</th>";
                echo "<th class='column-2 column-values'>".$STOCK['nom']."</th>";
                echo "<th class='column-3 column-values'>".$STOCK['commentaire']."</th>";
                echo "<th class='column-4 column-values'>".$STOCK['code']."</th>";
                echo "<th class='column-5 column-values'>".$STOCK['localisation']."</th>";
                echo "<th class='column-6 column-values'>".$STOCK['dateModification']."</th>";
                echo "</tr><tr class='row-$i row-values'>";
                $i++;
            }
            $GET_STOCK->closeCursor();
            ?>
        </tr>
        </tbody>
    </table>
</section>

<script type="module" src="../../../js/main/stock.js"></script>

</body>
</html>