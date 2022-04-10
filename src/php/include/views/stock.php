<?php include '../templates/home.php'; ?>

<div class="search-articles">
    <input class="searchbar" placeholder=" Rechercher un article..." type="text">
</div>

<section class="section visu-stock">

    <table class="table-visu-stock">

        <thead class="table-header">

            <?php
// TODO : Optimiser le chargement du stock. Temps de chargement un peu long...

            $FIELD = array('Numéro', 'Famille', 'Nom', 'Commentaire', 'Code', 'Localisation', 'Dernière modification');
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
            $GET_STOCK = Connection()->query('SELECT articles.id, familles.nom as Famille, articles.nom, articles.commentaire, code, localisation,articles.dateCreation, articles.dateModification 
                                                       FROM `articles` 
                                                       INNER JOIN `familles` 
                                                       ON articles.famille = familles.id;');

            $i = 2;

            echo "<tr class='row-1 row-values'>";

            while ($STOCK = $GET_STOCK->fetch()) {
                echo "<td class='column-0 column-values'>".$STOCK['id']."</td>";
                echo "<td class='column-1 column-values'>".$STOCK['Famille']."</td>";
                echo "<td class='column-2 column-values'>".$STOCK['nom']."</td>";
                echo "<td class='column-3 column-values'>".$STOCK['commentaire']."</td>";
                echo "<td class='column-4 column-values'>".$STOCK['code']."</td>";
                echo "<td class='column-5 column-values'>".$STOCK['localisation']."</td>";
                echo "<td class='column-6 column-values'>".$STOCK['dateModification']."</td>";
                echo "<td class='column-7 column-values action'><i title='' class='fa-solid fa-plus action entry'></i></td>";
                echo "<td class='column-8 column-values action'><i title='' class='fa-solid fa-minus action checkout'></td>";
                echo "<td class='column-9 column-values action'><i title='' class='fa-solid fa-pen-clip action edit'></i></td>";
                echo "</tr>\n";
                echo "<tr class='row-$i row-values'>";
                $i++;
            }

            echo "</tr>";

            $GET_STOCK->closeCursor();

            ?>

        </tbody>

    </table>

</section>

<script type="module" src="../../../js/main/stock.js"></script>

</body>
</html>