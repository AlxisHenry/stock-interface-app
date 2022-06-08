<?php
include '../templates/home.php';

// todo Entrées > Indications verte / Sorties > Indications rouge
// Forme de tableau (cf stock.php) # Avec récuparation de la table mouvements ainsi que du nom de l'article etc...
// todo Affichage de la quantité ajoutée / quantité totale (? + ancienne quantité ?)
// todo : Possibilité de supprimer le mouvement : Va automatiquement aller supprimer la quantité insérer dans le mouvement
// todo : Puis va update l'état de ce mouvement à 0 pour dire qu'il est annulé et créer un second en negatif (permet d'avoir des logs efficaces)
// todo : Possibilité de se rendre sur la page de l'article.
// todo : Possibilité de trier les mouvemenets (quantité, date, nom etc...)

?>

<div class="search-articles">
    <input class="searchbar" placeholder="Cibler un mouvement..." type="text">
</div>

<section class="section visu-stock">

    <table class="table-visu-stock">

        <thead class="table-header">

        <?php

        $FIELD = array('Réalisé le', 'Réalisé par', 'Type', 'Article', 'Quantité', 'Attribué à');
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

        $GET_STOCK = Connection()->query("
                SELECT
                    mouvements.id AS id,
                    mouvements.commentaire AS commentaire,
                    mouvements.type AS type,
                    mouvements.quantite AS quantite,
                    mouvements.orderNumber AS orderNumber,
                    mouvements.dateMouvement AS dateMouvement,
                    utilisateurs.centreDeCout AS centreDeCout,
                    access.username AS username,
                    articles.nom AS ArticleNom,
                    mouvements.dateCreation,
                    mouvements.dateModification
                FROM
                    `mouvements`
                INNER JOIN `utilisateurs` ON mouvements.centreDeCout = utilisateurs.id
                INNER JOIN `articles` ON mouvements.article = articles.id
                INNER JOIN `access` ON mouvements.creator = access.id;");


        echo "</tr>";

        $i = 1;

        while ($STOCK = $GET_STOCK->fetch()) {
            $FORMAT_DATE = $STOCK['dateMouvement'];
            $FORMAT_TYPE = $STOCK['type'] === 's' ? 'Sortie' : 'Entrée';
            echo "
                    <tr class='row-$i row-values'>
                    <td class='column-0 column-values hidden'>".$STOCK['id']."</td>
                    <td class='column-1 column-values'>".$FORMAT_DATE."</td>
                    <td class='column-2 column-values'>".$STOCK['username']."</td>
                    <td class='column-3 column-values'>".$FORMAT_TYPE."</td>
                    <td class='column-4 column-values'>".$STOCK['ArticleNom']."</td>
                    <td class='column-5 column-values'>".$STOCK['quantite']."</td>
                    <td class='column-6 column-values'>".$STOCK['centreDeCout']."</td>
                    </tr>\n";
            $i = $i + 1;
        }

        ?>

        </tbody>

    </table>

</section>


</body>
</html>