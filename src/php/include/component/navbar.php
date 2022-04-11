

    <div class="logo">
        <a href="./dashboard.php?nav=mvmt"> <img src="../../../../assets/images/Timken.png" title="Retourner à l'accueil " alt="Logo de la société Timken"> </a>
    </div>

    <div class="contain-features">
        <div class="features mvmt last-mouvements"><a class="nav-redirection" href="./dashboard.php?nav=mvmt" title="Visualiser les mouvements"><i class="nav-fa-icons fa-solid fa-arrow-trend-up"></i><span class="nav-span">Derniers mouvements</span></a></div>
        <div class="features s-entry stock-entry"><a class="nav-redirection" href="./stock_in.php?nav=s-entry" title="Réaliser uen entrée de stock"><i class="nav-fa-icons fa-solid fa-boxes-stacked"></i><span class="nav-span">Entrée de stock</span></a></div>
        <div class="features s-checkout stock-checkout"><a class="nav-redirection" href="./stock_out.php?nav=s-checkout" title="Sortir un/des articles"><i class="nav-fa-icons fa-solid fa-dolly"></i><span class="nav-span">Sortie de stock</span></a></div>
        <div class="features visu visualisation"><a class="nav-redirection" href="./stock.php?nav=visu" title="Visualiser le stock"><i class="nav-fa-icons fa-solid fa-box-open"></i><span class="nav-span">Voir le stock</span></a></div>
        <?php if(CHECK_SETTINGS_STATE('website-configs')[0][0]) { include '../component/configurations.php'; } ?>
    </div>

    <hr class="nav-separator">

    <div class="contain-actions">
        <!-- todo Relier au back-end ::: Pop up avec le nombres ? Si 0 = rien, sinon le nombres d'alertes ? -->
        <div class="features alerts"><a class="nav-redirection" href="./alerts.php?nav=alerts" title="Voir les alertes"><i class="nav-fa-icons fa-solid fa-bell"></i><span class="nav-span">Notifications</span></a>
                <?php if(CHECK_SETTINGS_STATE('alerts-indicator')[0][0]){ echo '<div class="alert-indication" title="Alertes">8</div>'; } ?>
        </div>
        <div class="features settings"><a class="nav-redirection" href="./settings.php?nav=settings" title="Voir les paramètres"><i class="nav-fa-icons fa-solid fa-gear"></i><span class="nav-span">Paramètres</span></a></div>
        <div class="features disconnect"><a class="nav-redirection" href="#"><i class="nav-fa-icons fa-solid fa-right-from-bracket"></i><span title="Me déconnecter" class="nav-span">Me déconnecter</span></a></div>
    </div>
