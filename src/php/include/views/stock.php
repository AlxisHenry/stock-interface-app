<?php include '../templates/home.php'; ?>

<section class="section visu-stock">

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
            $GET_STOCK = Connection()->query('SELECT * FROM `articles`;');
            $i = 2;
            while ($STOCK = $GET_STOCK->fetch()) {
                echo "<td class='column-0 column-values'>".$STOCK['id']."</td>";
                echo "<td class='column-1 column-values'>".$STOCK['famille']."</td>";
                echo "<td class='column-2 column-values'>".$STOCK['nom']."</td>";
                echo "<td class='column-3 column-values'>llllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll".$STOCK['commentaire']."</td>";
                echo "<td class='column-4 column-values'>".$STOCK['code']."</td>";
                echo "<td class='column-5 column-values'>".$STOCK['localisation']."</td>";
                echo "<td class='column-6 column-values'>".$STOCK['dateModification']."</td>";
                echo "<td class='column-7 column-values action a-entry'><i class='fa-solid fa-plus'></i></td>";
                echo "<td class='column-8 column-values action a-checkout'><i class='nav-fa-icons fa-solid fa-dolly'></td>";
                echo "<td class='column-9 column-values action a-edit'><i class='nav-fa-icons fa-solid fa-user-gear'></i></td>";
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