import { Switch } from "../class/settings.class.js";

window.addEventListener('load', () => {

    document.querySelectorAll('.switch-indicator').forEach(SwitchStatus => {
        SwitchStatus.addEventListener('click', (e) => {

            new Switch().SwitchState(e);
            new Switch().SwitchAction(e);

        });
    });

})