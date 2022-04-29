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

            $nb_pages = GetPagesCount();

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