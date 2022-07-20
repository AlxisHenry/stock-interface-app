<?php include '../templates/home.php'; ?>

<div class="search-articles">
    <input class="searchbar" placeholder=" Rechercher un article..." type="text">
</div>

<section class="section visu-stock">

    <table class="table-visu-stock">

        <thead class="table-header">

            <?php

            $FIELD = array('ID', 'Famille', 'Nom', 'Quantité', 'Commentaire', 'Code' , 'Localisation', 'Dernière modification');
            $i = 0;

            echo '<tr class="row-0 row-values">';

            foreach ($FIELD as $TR) {
                if ($TR === 'ID' || $TR === 'Code') {
                    echo "<th class='column-$i column-title hidden'>$TR</th>\n";
                } else {
                    echo "<th class='column-$i column-title'>$TR</th>\n";
                }
                $i++;
            }

            echo "</tr>";

            ?>

        </thead>

        <tbody class="table-body">

            <?php
            echo "<tr class='row-1 row-values'>";

            $GET_STOCK = Connection()->query(" SELECT articles.id, familles.nom as Famille, articles.nom, articles.quantityStock ,articles.commentaire, code, localisation,articles.dateCreation, articles.dateModification FROM `articles` 
            INNER JOIN `familles` 
            ON articles.famille = familles.id
            ORDER BY familles.nom, articles.nom;");

            $i = 1;

            while ($STOCK = $GET_STOCK->fetch()) {
                $FORMAT_DATE = date('d/m/Y, H:i', strtotime($STOCK['dateModification']));
                echo "
            <tr class='row-$i row-values'>
            <td class='column-0 column-values hidden'>".$STOCK['id']."</td>
            <td class='column-1 column-values'>".$STOCK['Famille']."</td>
            <td class='column-2 column-values'>".$STOCK['nom']."</td>
            <td class='column-3 column-values'>".$STOCK['quantityStock']."</td>
            <td class='column-4 column-values'>".$STOCK['commentaire']."</td>
            <td class='column-5 column-values hidden'>".$STOCK['code']."</td>
            <td class='column-6 column-values'>".$STOCK['localisation']."</td>
            <td class='column-7 column-values'>".$FORMAT_DATE."</td>
            <td class='column-8 column-values action'><a class='redirect-entry' href='./stock_in.php?nav=s-entry&id=".$STOCK['id']."'><i title='Entrée de stock pour ".$STOCK['nom']."' class='fa-solid fa-plus action entry'></i></a></td>
            <td class='column-9 column-values action'><a class='redirect-out' href='./stock_out.php?nav=s-checkout&id=".$STOCK['id']."'><i title='Sortie de stocc pour ".$STOCK['nom']."' class='fa-solid fa-minus action checkout'></a></td>
            <td class='column-10 column-values action'><a class='redirect-edit' href='./config-articles.php?nav=c-article&id=".$STOCK['id']."'><i title='Editer ".$STOCK['nom']."' class='fa-solid fa-pen-clip action edit'></i></a></td>
            </tr>\n";
                $i = $i + 1;
            }

            $GET_STOCK->closeCursor();

            ?>

        </tbody>

    </table>

</section>

<script type="module" src="../../../js/main/stock.js"></script>

</body>
</html>