import { Navbar } from './class/navbar.class.js';

window.addEventListener('load', () => {
    new Navbar().InitializeNavbarSelection();

    document.querySelector('.disconnect').addEventListener('click', () => {
        new Navbar().DisconnectUser();
    })

})

/*
import { SwitchDashboardAccessClass } from "./class/switch-dashboard-access.class.js";

window.addEventListener('load', () => {

    new SwitchDashboardAccessClass().InitDashboard(); // Initialisation du switch

    document.querySelector('.switch-indicator').addEventListener('click', () => {
            new SwitchDashboardAccessClass().SwitchDashboardState(); // Changement de status du switch (on/off)
    });

})
*/