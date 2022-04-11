import { Switch } from "../class/settings/switch.class.js";
import { Informations } from "../class/settings/informations.class.js";
import { Configurations } from "../class/settings/configurations.class.js";
import { Themes } from "../class/settings/themes.class.js";
import { Alerts } from "../class/settings/alerts.class.js";

window.addEventListener('load', () => {
    
    new Switch().InitState();

    // Cet event va modifier les données dans la base de données.

    document.querySelectorAll('.switch').forEach(SwitchStatus => {
        SwitchStatus.addEventListener('click', (e) => {
            new Switch().SwitchState(e);

        })
    })

    // Ces events appliquent les modifications visuellement.

    document.querySelector('.website-info .switch').addEventListener('click', () => {

            new Informations().Toggle();

    })

    document.querySelector('.website-configs .switch').addEventListener('click', () => {

            new Configurations().Toggle();

    })

    //document.querySelector('.website-theme .switch').addEventListener('click', () => {

      //       new Themes().Toggle();

    //})

    document.querySelector('.alerts-indicator .switch').addEventListener('click', () => {

             new Alerts().Toggle();

    })

})