<?php include '../templates/home.php'; ?>

<div class="search-articles">
    <input class="searchbar" placeholder=" Rechercher un article..." type="text">
</div>

<section class="section visu-stock">

    <table class="table-visu-stock">

        <thead class="table-header">

            <?php

            $FIELD = array('Famille', 'Nom', 'Quantité', 'Commentaire', 'Code', 'Localisation', 'Dernière modification');
            $i = 0;

            echo '<tr class="row-0 row-values">';

            foreach ($FIELD as $TR) {
                echo "<th class='column-$i column-title'>$TR</th>\n";
                $i++;
            }

            echo "</tr>";

            ?>

        </thead>

        <tbody class="table-body">

            <?php
            echo "<tr class='row-1 row-values'>";

            $i = 2;

            for ($id = 1; $id <= GetMaxCount() ; $id++) {
                $STOCK = Articles_OBJECT_($id, 'id');
                $date = $STOCK->getDateModification();
                $FORMAT_DATE = date('d/m/Y, H:i', strtotime($date));
                echo "<td class='column-0 column-values hidden'>".$STOCK->getId()."</td>";
                echo "<td class='column-1 column-values'>".Familles_OBJECT_($STOCK->getFamille(), 'id')->getNom()."</td>";
                echo "<td class='column-2 column-values'>".$STOCK->getNom()."</td>";
                echo "<td class='column-3 column-values'>".$STOCK->getQuantityStock()."</td>";
                echo "<td class='column-4 column-values'>".$STOCK->getCommentaire()."</td>";
                echo "<td class='column-5 column-values'>".$STOCK->getCode()."</td>";
                echo "<td class='column-6 column-values'>".$STOCK->getLocalisation()."</td>";
                echo "<td class='column-7 column-values'>".$FORMAT_DATE."</td>";
                echo "<td class='column-8 column-values action'><i title='' class='fa-solid fa-plus action entry'></i></td>";
                echo "<td class='column-9 column-values action'><i title='' class='fa-solid fa-minus action checkout'></td>";
                echo "<td class='column-10 column-values action'><i title='' class='fa-solid fa-pen-clip action edit'></i></td>";
                echo "</tr>\n";
                echo "<tr class='row-$i row-values'>";
                $i++;
            }

            echo "</tr>";

            ?>

        </tbody>

    </table>

</section>

<script type="module" src="../../../js/main/stock.js"></script>

</body>
</html>