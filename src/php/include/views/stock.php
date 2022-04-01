<?php include '../templates/home.php'; ?>

<section class="section visu-stock">


    <div class="searchbar d-none">
               <input type="text" class="search-articles" placeholder="Rechercher un article.">
    </div>

    <table class="table-visu-stock">

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
        <i class="fa-solid fa-cart-circle-plus"></i>
        <tbody class="table-body">

           <tr class="row-1 row-values">

            <?php
            $GET_STOCK = Connection()->query('SELECT articles.id, familles.nom as Famille, articles.nom, articles.commentaire, code, localisation,articles.dateCreation, articles.dateModification FROM `articles` INNER JOIN `familles` ON articles.famille = familles.id;');
            $i = 2;
            while ($STOCK = $GET_STOCK->fetch()) {
                echo "<td class='column-0 column-values'>".$STOCK['id']."</td>";
                echo "<td class='column-1 column-values'>".$STOCK['Famille']."</td>";
                echo "<td class='column-2 column-values'>".$STOCK['nom']."</td>";
                echo "<td class='column-3 column-values'>llllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll".$STOCK['commentaire']."</td>";
                echo "<td class='column-4 column-values'>".$STOCK['code']."</td>";
                echo "<td class='column-5 column-values'>".$STOCK['localisation']."</td>";
                echo "<td class='column-6 column-values'>".$STOCK['dateModification']."</td>";
                echo "<td class='column-7 column-values action'><i title='Entrée de stock' class='fa-solid fa-boxes-stacked action entry'></i></td>";
                echo "<td class='column-8 column-values action'><i title='Sortie de stock' class='fa-solid fa-dolly action checkout'></td>";
                echo "<td class='column-9 column-values action'><i title='Editer' class='fa-solid fa-user-gear action edit'></i></td>";
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