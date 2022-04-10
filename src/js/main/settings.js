import { Switch } from "../class/settings/switch.class.js";
import { Informations } from "../class/settings/informations.class.js";
import { Configurations } from "../class/settings/configurations.class.js";

window.addEventListener('load', () => {

    // TODO : Dans la table créer un compteur pour chaque fonctionnalités. L'update à chaque fois. Cela permettra d'avoir un aperçu de l'utilisation des fonctionnalités.

    new Switch().InitState();

    document.querySelectorAll('.switch').forEach(SwitchStatus => {
        SwitchStatus.addEventListener('click', (e) => {

            new Switch().SwitchState(e);

        })
    })

    document.querySelector('.website-info .switch .switch-indicator').addEventListener('click', () => {

        new Informations().Toggle();

    })

    document.querySelector('.website-configs .switch .switch-indicator').addEventListener('click', () => {

        new Configurations().Toggle();

    })

    document.querySelector('.website-theme').addEventListener('click', () => {

        // new Themes().Toggle();

    })

    document.querySelector('.alerts-indicator .switch .switch-indicator').addEventListener('click', () => {

        // new Alerts().Toggle();

    })

})