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

        <?php
        if (Utilisateurs_OBJECT_('00006655', 'matricule')) {
            include '../component/all-users.php';
        }
        else {
            include '../component/users-not-found.php';
        }
        ?>

    </div>

</section>

<script type="module" src="../../../js/main/c_users.js"></script>

</body>
</html>