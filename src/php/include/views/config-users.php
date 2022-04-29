<?php
include '../templates/home.php';



?>

<section class="section form-section user-section">

    <div class="form-section-card">

        <div class="card-action">

            <div class="new">
                <div class="refresh-database">
                    <i class="fa-solid fa-rotate"></i> <span>Rafraîchir la liste</span>
                </div>
            </div>

            <div class="exist config-active-action">
                Tous les utilisateurs
            </div>

        </div>

        <div class="move-pages">

            <?php

            $nb_pages = GetPagesCount()[0];

            for ($i = 1; $i < ($nb_pages + 1); $i++) {
                echo '<a href="?nav=c-users&p='.$i.'"> <span class="page to-page-'.$i.' active-page">'.$i.'</span> </a>';
            }

            ?>

        </div>

        <div class="page-separator"></div>

        <div class="pages-contain-users">

            <?php

            $page = intval($_GET['p']);

            if ($page === 0 || $page < 0 || $page > $nb_pages) {
                echo "<script> document.location.replace('config-users.php?nav=c-users&p=1') </script>";
                die();
            }

            (int)$min = (($page - 1) * 50);
            $rows = GetPagesCount()[1];

            $QUERY = "SELECT * FROM `utilisateurs` LIMIT $min, $rows ";

            $RESULT = Connection()->query($QUERY);

            while ($DATA = $RESULT->fetch()) {

                echo '<div class="main-user-row">

                        <div class="matricule">
                            <span> ' . $DATA[2] . ' </span>
                        </div>
        
                        <div class="identity">
                            <span>  ' . $DATA[3] . ',' . $DATA[4] . ' </span>
                        </div>
        
                        <div class="c_cout">
                            <span>  ' . $DATA[5] . ' </span>
                        </div>
        
                        <div class="c_affection">
                            <span>  ' . $DATA[6] . ' </span>
                        </div>

                    </div>';

            }

            $RESULT->closeCursor();

            ?>

        </div>

    </div>

</section>

<script type="module" src="../../../js/main/c_users.js"></script>

</body>
</html>