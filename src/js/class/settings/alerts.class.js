import {Switch} from "./switch.class.js";
import {popUp} from "../../global/app.js";

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

        $.ajax({
            type: "GET",
            url: `../../ajax/init-front-informations.php`,
            data: { format: 'array', return: ['asset', 'date', 'count-alert']},
            success: function (informations) {

                const Informations = JSON.parse(informations);

                const Parent = document.querySelector('.alerts');

                const Element = `<div class="alert-indication" title="Nombre d'alertes"><span>${Informations.count}</span></div>`;

                Parent.insertAdjacentHTML('beforeend', Element);

            },
            error: function () {
                popUp('contact-admin');
            },
        });

    }

    RemoveAlerts() {

        document.querySelector('.alert-indication').remove();

    }

}