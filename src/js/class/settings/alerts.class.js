import {Switch} from "./switch.class.js";

export class Alerts extends Switch {

    constructor() {
        super();
    }

    Toggle() {

        if (document.querySelector('.alert-indication')) {
            this.RemoveAlerts();
        } else {
            this.ShowAlerts();
        }

    }


    ShowAlerts() {

        const Parent = document.querySelector('.alerts');

        const Element = `<div class="alert-indication" title="Nombre d'alertes">8</div>`;

        Parent.insertAdjacentHTML('beforeend', Element);

    }

    RemoveAlerts() {

        document.querySelector('.alert-indication').remove();

    }

}