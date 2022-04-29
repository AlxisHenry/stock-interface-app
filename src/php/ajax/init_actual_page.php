<?php

include '../functions.php';

$nb_pages = GetPagesCount()[0];
$page = intval($_POST['page']);

$rows = GetPagesCount()[1];
(int)$min = (($page - 1) * $rows);

$QUERY = "SELECT * FROM `utilisateurs` LIMIT $min, $rows ";

$RESULT = Connection()->query($QUERY);

$i=1;
while ($DATA = $RESULT->fetch()) {

    echo '<div class="main-user-row user-row'.$i.' user'.$DATA[0].'">

                        <div class="matricule">
                            <span> ' . $DATA[2] . ' </span>
                        </div>
        
                        <div class="identity">
                            <span>  ' . $DATA[3] . ', ' . $DATA[4][0] . '' . strtolower(substr($DATA[4], 1,strlen($DATA[4]))) . '</span>
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

$RESULT->closeCursor();
