import { SwitchDashboardAccess } from "../class/switch-dashboard-access.class.js";

window.addEventListener('load', () => {

    new SwitchDashboardAccess().InitSwitchState();

    document.querySelector('.switch-indicator').addEventListener('click', () => {

        new SwitchDashboardAccess().SwitchDashboardState()

    })



})