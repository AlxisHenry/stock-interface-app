<?php

include '../functions.php';

$value = $_POST['Value'];

$GET_STOCK = Connection()->query("SELECT * FROM `utilisateurs` WHERE `nom` LIKE '%$value%' OR `prenom` LIKE '%$value%' OR `centreDeCout` LIKE '%$value%' ORDER BY nom, prenom LIMIT 50;");

$i=1;
while ($DATA = $GET_STOCK->fetch()) {

    echo '<div class="main-user-row user-row'.$i.' user'.$DATA[0].'">

                        <div class="matricule">
                            <span> ' . $DATA[2] . ' </span>
                        </div>
        
                        <div class="identity">
                            <span>  ' . $DATA[3] . ', ' . $DATA[4][0] . strtolower(substr($DATA[4], 1,strlen($DATA[4]))) . '</span>
                        </div>
        
                        <div class="c_cout">
                            <span>  ' . $DATA[5] . ' </span>
                        </div>
        
                        <div class="c_affection">
                            <span>  ' . $DATA[6] . ' </span>
                        </div>

                    </div>';

    $i++;

}


$GET_STOCK->closeCursor();