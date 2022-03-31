import {consoleLog} from "../global/app.js";

export class Navbar {

    constructor() {
        this.option = new URLSearchParams(window.location.search).get("nav");
    };

    InitializeNavbarSelection() {

        if (!this.option) {
            location.replace('./dashboard.php?nav=mvmt');
        }

        const selection = document.querySelector(`.${this.option}`);
        consoleLog(`Onglet actif : ${this.option}`, 's');
        selection.classList += ' nav-active';

        if (this.option === 'alerts' || this.option === 'settings') {
            consoleLog('Onglet actif : ' + this.option + ' => Scroll nécessaire', 'e');
            const Navbar = document.querySelector('.features-navigation');

            Navbar.scroll({
                top: '300',
                behavior: 'smooth'
            }) // Envoi l'utilisateur (si l'écran n'est pas grand) en scrollant sur ce qui est en bas du menu si coché.

        }

    }

    DisconnectUser() {
        consoleLog('Vous avez été déconnecté !', 's');
        setTimeout(() => {
            location.replace('../../../index.php');
        }, 800)
    }

}