import { Navbar } from '../class/navbar.class.js';

window.addEventListener('load', () => {

    new Navbar().InitializeNavbarSelection();

    document.querySelector('.disconnect').addEventListener('click', () => {

        new Navbar().DisconnectUser();

    })

})
