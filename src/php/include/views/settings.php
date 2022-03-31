<?php
include '../templates/home.php';
?>
<section class="section">
    <div class="contain-settings-sections">
        <div class="fl employee-section">

            <h1>Paramètres : Employés.</h1>

            <hr class="settings-hr">

            <div class="edit-password">
                Modifier le mot de passe du compte employé :
            </div>

            <div class="employee-access">
                Souhaitez vous activer l'accès au dashboard ?.
                <div class="switch">
                    <div class="switch-indicator"></div>
                </div>
            </div>

            <div class="logs">
                Souhaitez vous activer les logs de connexion ?
            </div>

        </div>

        <div class="fl admin-section">

            <h1>Paramètres : Administrateurs.</h1>

            <hr class="settings-hr">

            <div class="edit-password">
                Modifier le mot de passe du compte administrateur :
            </div>

            <div class="employee-access">
                Souhaitez vous activer l'accès au dashboard ?.
                <div class="switch">
                    <div class="switch-indicator"></div>
                </div>
            </div>


            <div class="logs">
                Souhaitez vous activer les logs de connexion ?
            </div>

        </div>

        <div class="fl website-section">

            <h1>Paramètres : Site.</h1>

            <hr class="settings-hr">

            <div class="show-users-info">
                Souhaitez-vous afficher la barre d'informations ?
            </div>

            <div class="configuration-onglet">
                Souhaitez-vous voir les onglets de configuration ?
            </div>

            <div class="settings-theme">
                Quel thème souhaitez-vous utiliser ?
            </div>

        </div>

        <div class="fl alert-section">

            <h1>Paramètres : Notifications.</h1>

            <hr class="settings-hr">

            <div class="mail-alerts">
                Souhaitez-vous recevoir les alertes par mail ?
            </div>

            <div class="show-alerts">
                Souhaitez-vous afficher les alertes dans le menu ?
            </div>

            <div class="seuil-alert">
                Modifier le seuil avant alerte :
            </div>

        </div>

    </div>
</section>

<script type="module" src="../../../js/main/settings.js"></script>

</body>
</html>