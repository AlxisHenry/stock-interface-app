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

        <div class="user-searchbar">
            <input class="user-searchbar-input"  placeholder="Rechercher un utilisateur" type="search">
        </div>

        <div class="pages-contain-users">

            <div class="main-user-row">

                <div class="main-user-title matricule">
                    <span> Matricule </span>
                </div>

                <div class="main-user-title identity">
                    <span>  Identité </span>
                </div>

                <div class="main-user-title c_cout">
                    <span>  Centre de coût </span>
                </div>

                <div class="main-user-title c_affection">
                    <span>  Lieu d'affection </span>
                </div>

            </div>
            <?php

            $page = intval($_GET['p']);

            if ($page === 0 || $page < 0 || $page > $nb_pages) {
                echo "<script> document.location.replace('config-users.php?nav=c-users&p=1') </script>";
                die();
            }

            $rows = GetPagesCount()[1];
            (int)$min = (($page - 1) * $page);

            $QUERY = "SELECT * FROM `utilisateurs` LIMIT $min, $rows ";

            $RESULT = Connection()->query($QUERY);

            while ($DATA = $RESULT->fetch()) {

                echo '<div class="main-user-row">

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

            }

            $RESULT->closeCursor();

            ?>

        </div>

        <div class="page-separator-bottom"></div>

        <div class="move-pages">

            <?php

            $nb_pages = GetPagesCount()[0];

            for ($i = 1; $i < ($nb_pages + 1); $i++) {
                echo '<a href="?nav=c-users&p='.$i.'"> <span class="page to-page-'.$i.' active-page">'.$i.'</span> </a>';
            }

            ?>

        </div>

    </div>

</section>

<script type="module" src="../../../js/main/c_users.js"></script>

</body>
</html>