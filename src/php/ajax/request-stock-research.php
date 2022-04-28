<?php

include '../functions.php';

$VALUE = $_POST['value'];

$GET_STOCK = Connection()->query(" SELECT articles.id, familles.nom as Famille, articles.nom, articles.quantityStock ,articles.commentaire, code, localisation,articles.dateCreation, articles.dateModification FROM `articles` 
INNER JOIN `familles` 
ON articles.famille = familles.id
WHERE `articles`.nom LIKE '%$VALUE%'
OR `articles`.code LIKE '%$VALUE%'
OR `articles`.localisation LIKE '%$VALUE%'
OR `familles`.nom LIKE '%$VALUE%'
OR `articles`.dateModification LIKE '%$VALUE%';");

$i = 0;

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
            </tr>\n</tr><tr class='row-". ($i + 1) . " row-values'>";
    $i = $i + 2;
}
