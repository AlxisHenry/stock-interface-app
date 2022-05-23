import {consoleLog} from "../global/app.js";

export class Navbar {

    constructor() {
        this.option = new URLSearchParams(window.location.search).get("nav");
        this.AuthorizedPage = ['c-users' ,'c-article' , 'c-ccout', 'c-famille', 's-entry', 's-checkout', 'visu', 'alerts', 'settings', 'mvmt'];
        this.down = 'menu-burger-transition-element-down'
        this.up = 'menu-burger-transition-element-up'
    };

    InitializeNavbarSelection() {

        if (this.AuthorizedPage.indexOf(this.option) === -1) {
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
            location.replace('../../../../../index.php');
        }, 875);
    }

    BurgerOn() {

        const ElementToShow = document.querySelector('.features-navigation')
        const MenuElementUp = document.querySelector('.fa-bars')

        if (!ElementToShow) {
            return false
        }

        MenuElementUp.classList.remove('fa-bars')
        MenuElementUp.classList.add('hide-burger')
        MenuElementUp.classList.add('fa-xmark')
        ElementToShow.classList.remove(this.down)
        ElementToShow.classList.add(this.up)

    }

    BurgerOff() {

        const ElementToHide = document.querySelector('.features-navigation')
        const MenuElementDown = document.querySelector('.hide-burger')

        if (!ElementToHide) {
            return false
        }

        MenuElementDown.classList.remove('hide-burger')
        MenuElementDown.classList.remove('fa-xmark')
        MenuElementDown.classList.add('fa-bars')
        ElementToHide.classList.remove(this.up)
        ElementToHide.classList.add(this.down)

    }
}