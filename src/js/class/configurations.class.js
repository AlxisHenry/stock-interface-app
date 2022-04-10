import {Switch} from "./switch.class.js";

export class Configurations extends Switch {

    constructor() {
        super();
    }

    Configurations() {

        if (document.querySelector('.contain-features .configuration')) {
            this.RemoveConfigurations();
        } else {
            try {
                this.RemoveConfigurations();
            } catch (e) {}
            this.ShowConfigurations();
        }

    }

    ShowConfigurations() {

        const Parent = document.querySelector('.features-navigation .contain-features');

        const ThisElement = `
                <div class="features c-users config-users configuration"><a class="nav-redirection" href="./configs.php?nav=c-users" title="Configurer les utilisateurs"><i class="nav-fa-icons fa-solid fa-user-gear"></i><span class="nav-span">Configurer Utilisateurs</span></a></div>
                <div class="features c-article config-article configuration"><a class="nav-redirection" href="./configs.php?nav=c-article" title="Configurer les articles"><i class="nav-fa-icons fa-solid fa-user-gear"></i><span class="nav-span">Configurer Articles</span></a></div>
                <div class="features c-famille config-famille configuration"><a class="nav-redirection" href="./configs.php?nav=c-famille" title="Configurer les familles"><i class="nav-fa-icons fa-solid fa-user-gear"></i><span class="nav-span">Configurer Familles</span></a></div>
                <div class="features c-ccout config-ccout configuration"><a class="nav-redirection" href="./configs.php?nav=c-ccout" title="Configurer les centres de coûts"><i class="nav-fa-icons fa-solid fa-user-gear"></i><span class="nav-span">Configurer C. Coût</span></a></div>
                 `

        Parent.insertAdjacentHTML('beforeend', ThisElement);

    }

    RemoveConfigurations() {

        const ConfigurationsMenu = document.querySelectorAll('.contain-features .configuration');

        ConfigurationsMenu.forEach((Configuration) => {
            Configuration.remove();
        })

    }

}