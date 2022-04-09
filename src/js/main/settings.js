import { Switch } from "../class/switch.class.js";

window.addEventListener('load', () => {

    new Switch().InitState();

    document.querySelectorAll('.switch-indicator').forEach(SwitchStatus => {
        SwitchStatus.addEventListener('click', (e) => {

            new Switch().SwitchState(e);

        });
    });

})