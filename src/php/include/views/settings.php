<?php include '../templates/home.php'; ?>

<section class="section">
    <div class="contain-settings-sections">
        <div class="fl employee-section">

            <h1>Paramètres : Employés.</h1>

            <hr class="settings-hr">

            <div data-front-id="2" class="employee-access contain-switch">
                Souhaitez vous activer l'accès au dashboard ?
                <div class="switch">
                    <div class="switch-indicator"></div>
                </div>
            </div>

            <div data-front-id="4" class="employee-logs contain-switch">
                Souhaitez vous activer les logs de connexion ?
                <div class="switch">
                    <div class="switch-indicator"></div>
                </div>
            </div>

        </div>

        <div class="fl admin-section">

            <h1>Paramètres : Administrateurs.</h1>

            <hr class="settings-hr">

            <div data-access-id="1" data-tg="access" class="admin-password contain-settings">
                <label>
                    Changer le mot de passe du compte Administrateur :
                    <?= "<input type='password' value='". Access_OBJECT_(1, 'id')->getPassword() ."' class='reset-admin-password'>" ?>
                </label>
                <i class="password-eye fa-regular fa-eye-slash"></i>
                <span class="save-modification">Sauvegarder</span>
            </div>

            <div data-front-id="1" class="admin-access contain-switch">
                Souhaitez vous activer l'accès au dashboard ?.
                <div class="switch">
                    <div class="switch-indicator"></div>
                </div>
            </div>

            <div data-front-id="3" class="admin-logs contain-switch">
                Souhaitez vous activer les logs de connexion ?
                <div class="switch">
                    <div class="switch-indicator"></div>
                </div>
            </div>

        </div>

        <div class="fl website-section">

            <h1>Paramètres : Site.</h1>

            <hr class="settings-hr">

            <div data-front-id="8" class="website-info contain-switch">
                Souhaitez-vous afficher la barre d'informations ?
                <div class="switch">
                    <div class="switch-indicator"></div>
                </div>
            </div>

            <div data-front-id="7" class="website-configs contain-switch">
                Souhaitez-vous voir les onglets de configuration ?
                <div class="switch">
                    <div class="switch-indicator"></div>
                </div>
            </div>

            <div data-front-id="9" class="website-theme contain-switch">
                Quel thème souhaitez-vous utiliser ?
                <div class="switch">
                    <div class="switch-indicator"></div>
                </div>
            </div>

        </div>

        <div class="fl alerts-section">

            <h1>Paramètres : Notifications.</h1>

            <hr class="settings-hr">

            <div data-front-id="5" class="alerts-mail contain-switch">
                Souhaitez-vous recevoir les alertes par mail ?
                <div class="switch">
                    <div class="switch-indicator"></div>
                </div>
            </div>

            <div data-front-id="6" class="alerts-indicator contain-switch">
                Souhaitez-vous afficher les alertes dans le menu ?
                <div class="switch">
                    <div class="switch-indicator"></div>
                </div>
            </div>

            <div data-alert-id="1" data-tg="alerts" class="alerts-minimal contain-settings">
                <label>
                    Modifier le seuil avant alerte :
                    <?= "<input type='number' value='". Alertes_OBJECT_(1, 'id')->getSeuil() ."' class='change-count-alert'>" ?>
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