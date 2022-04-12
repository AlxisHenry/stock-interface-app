<?php include '../templates/home.php'; ?>

<section class="section">
    <div class="contain-settings-sections">
        <div class="fl employee-section">

            <h1>Paramètres : Employés.</h1>

            <hr class="settings-hr">

            <div class="employee-password contain-settings">
                <label>
                    Changer le mot de passe du compte Employé :
                    <?php
                        echo "<input type='password' value='". GET_PASSWORD('employee') ."' class='reset-employee-password'>";
                    ?>
                </label>
                <i class="password-eye fa-regular fa-eye-slash"></i>
                <span class="save-modification">Sauvegarder</span>
            </div>

            <div class="employee-access contain-switch">
                Souhaitez vous activer l'accès au dashboard ?
                <div class="switch">
                    <div class="switch-indicator"></div>
                </div>
            </div>

            <div class="employee-logs contain-switch">
                Souhaitez vous activer les logs de connexion ?
                <div class="switch">
                    <div class="switch-indicator"></div>
                </div>
            </div>

        </div>

        <div class="fl admin-section">

            <h1>Paramètres : Administrateurs.</h1>

            <hr class="settings-hr">

            <div class="admin-password contain-settings">
                <label>
                    Changer le mot de passe du compte Administrateur :
                    <?php echo "<input type='password' value='". GET_PASSWORD('tfadmin') ."' class='reset-admin-password'>" ?>
                </label>
                <i class="password-eye fa-regular fa-eye-slash"></i>
                <span class="save-modification">Sauvegarder</span>
            </div>

            <div class="admin-access contain-switch">
                Souhaitez vous activer l'accès au dashboard ?.
                <div class="switch">
                    <div class="switch-indicator"></div>
                </div>
            </div>

            <div class="admin-logs contain-switch">
                Souhaitez vous activer les logs de connexion ?
                <div class="switch">
                    <div class="switch-indicator"></div>
                </div>
            </div>

        </div>

        <div class="fl website-section">

            <h1>Paramètres : Site.</h1>

            <hr class="settings-hr">

            <div class="website-info contain-switch">
                Souhaitez-vous afficher la barre d'informations ?
                <div class="switch">
                    <div class="switch-indicator"></div>
                </div>
            </div>

            <div class="website-configs contain-switch">
                Souhaitez-vous voir les onglets de configuration ?
                <div class="switch">
                    <div class="switch-indicator"></div>
                </div>
            </div>

            <div class="website-theme contain-settings">
                Quel thème souhaitez-vous utiliser ?

            </div>

        </div>

        <div class="fl alerts-section">

            <h1>Paramètres : Notifications.</h1>

            <hr class="settings-hr">

            <div class="alerts-mail contain-switch">
                Souhaitez-vous recevoir les alertes par mail ?
                <div class="switch">
                    <div class="switch-indicator"></div>
                </div>
            </div>

            <div class="alerts-indicator contain-switch">
                Souhaitez-vous afficher les alertes dans le menu ?
                <div class="switch">
                    <div class="switch-indicator"></div>
                </div>
            </div>

            <div class="alerts-minimal contain-settings">
                <label>
                    Modifier le seuil avant alerte :
                    <?php  echo "<input type='number' value='24' class='change-count-alert'>" ?>
                </label>
                <span></span>
                <span class="save-modification">Sauvegarder</span>
            </div>

        </div>
    </div>
</section>

<script type="module" src="../../../js/main/settings.js"></script>

</body>
</html>