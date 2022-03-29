import {consoleLog} from "../global/console.log.js";

export class Navbar {

    constructor() {
        this.option = new URLSearchParams(window.location.search).get("nav");
    };

    InitializeNavbarSelection() {

        const selection = document.querySelector(`.${this.option}`);
        consoleLog(`Onglet actif : ${this.option}`, 's');
        selection.classList += ' nav-active';

    }

    DisconnectUser() {
        consoleLog('Vous avez été déconnecté !', 's');
        setTimeout(() => {
            location.replace('../../../index.php');
        }, 800)
    }

}