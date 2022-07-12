<?php
include '../templates/home.php';
?>

<section class="section visu-stock">

    <table class="table-visu-stock">

        <thead class="table-header">

        <?php

        $FIELD = array('ID', 'Nom', 'Quantité Stock', 'Quantité minimale' ,'Code' , 'Localisation');
        $i = 0;

        echo '<tr class="row-0 row-values">';

        foreach ($FIELD as $TR) {
            if ($TR === 'ID') {
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

        $i = 2;

        foreach (GetAllMinArticles() as $y) {
            $date = $y['dateModification'];
            $FORMAT_DATE = date('d/m/Y, H:i', strtotime($date));
            echo "<td class='column-0 column-values hidden'>".$y['id']."</td>";
            echo "<td class='column-2 column-values'>".$y['nom']."</td>";
            echo "<td class='column-3 column-values'>".$y['quantityStock']."</td>";
            echo "<td class='column-4 column-values'>".$y['quantityMin']."</td>";
            echo "<td class='column-5 column-values'>".$y['code']."</td>";
            echo "<td class='column-6 column-values'>".$y['localisation']."</td>";
            echo "<td class='column-8 column-values action'><a href='./stock_in.php?nav=s-entry&id=".$y['id']."'><i title='Entrée de stock pour ".$y['nom']."' class='fa-solid fa-plus action entry'></i></a></td>";
            echo "<td class='column-9 column-values action'><a href='./stock_out.php?nav=s-checkout&id=".$y['id']."'><i title='Sortie de stock pour ".$y['nom']."' class='fa-solid fa-minus action checkout'></a></td>";
            echo "<td class='column-10 column-values action'><a href='./config-articles.php?nav=c-article&id=".$y['id']."'><i title='Editer ".$y['nom']."' class='fa-solid fa-pen-clip action edit'></i></a></td>";
            echo "</tr>\n";
            echo "<tr class='row-$i row-values'>";
            $i++;
        }

        echo "</tr>";

        ?>

        </tbody>

    </table>

</section>

</body>
</html>