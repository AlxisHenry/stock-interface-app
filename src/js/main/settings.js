import { Switch } from "../class/settings/switch.class.js";
import { Informations } from "../class/settings/informations.class.js";
import { Configurations } from "../class/settings/configurations.class.js";
import { Themes } from "../class/settings/themes.class.js";
import { Alerts } from "../class/settings/alerts.class.js";
import { Inputs } from "../class/settings/inputs.class.js";

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

    document.querySelector('.website-theme').addEventListener('click', () => {

             new Themes().Toggle();

    })

    document.querySelector('.alerts-indicator .switch').addEventListener('click', () => {

             new Alerts().Toggle();

    })

    // Ces events vont gérer les inputs.

    document.querySelectorAll('.password-eye').forEach(Eye => {

        Eye.addEventListener('mouseover', (e) => {

            new Inputs().DisabledEye(e);

        });

        Eye.addEventListener('mouseout', (e) => {

            new Inputs().ActiveEye(e);

        })

    })

    document.querySelectorAll('.save-modification').forEach(Save => {

        Save.addEventListener('click', (e) => {

            new Inputs().Save(e);

        })

    })

})