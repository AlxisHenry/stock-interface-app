import { Switch } from "../class/switch.class.js";
import { Informations } from "../class/informations.class.js";

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

})