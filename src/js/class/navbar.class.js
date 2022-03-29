export class Navbar {

    constructor() {
        this.option = new URLSearchParams(window.location.search).get("nav");
    };

    InitializeNavbarSelection() {

        const selection = document.querySelector(`.${this.option}`);
        selection.style.backgroundColor = 'red';

    }
}