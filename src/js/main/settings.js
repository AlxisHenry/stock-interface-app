import { Switch } from "../class/switch.class.js";
import { Informations } from "../class/informations.class.js";
import { Configurations } from "../class/configurations.class.js";

window.addEventListener('load', () => {

    new Switch().InitState();

    document.querySelectorAll('.switch-indicator').forEach(SwitchStatus => {
        SwitchStatus.addEventListener('click', (e) => {

            new Switch().SwitchState(e);

        });
    });

    document.querySelector('.website-info .switch .switch-indicator').addEventListener('click', () => {

        new Informations().Informations();

    })

    document.querySelector('.website-configs .switch .switch-indicator').addEventListener('click', () => {

        new Configurations().Configurations();

    })

})