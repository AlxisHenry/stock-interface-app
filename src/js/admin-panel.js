import { SwitchDashboardAccessClass } from "./class/switch-dashboard-access.class.js";

$(document).ready(() => {
    document.querySelector('.switch-indicator').addEventListener('click', () => {
            new SwitchDashboardAccessClass().SwitchDashboard();
    })
})
