import {Switch} from "./switch.class.js";
import {popUp} from "../../global/app.js";

export class Informations extends Switch {

    constructor() {
        super();
    }

    Toggle() {

        setTimeout(() => {
            if (document.querySelector('.contain-users-informations')) {
                this.RemoveInformations();
            } else {
                try {
                    this.RemoveInformations();
                } catch (error) {
                }
                this.ShowInformations();
            }
        }, 125)

    }

    ShowInformations() {
        $.ajax({
            type: "GET",
            url: `../../ajax/init-asset-date.php`,
            data: { format: 'array', return: ['asset', 'date']},
            success: function (informations) {

                const Informations = JSON.parse(informations);

                const ElementBefore = document.querySelector('.contain-send-message');

                const ThisElement = `<div class='contain-users-informations'>
                                        <div class="host">
                                            <span class="hostname">Vous êtes connecté sur <span class="hostl">${Informations.asset}</span>.</span>
                                        </div>
                                        <div class="date">
                                            <span class="time">Dernière connexion il y a <span class="timel">${Informations.date}</span>.</span>
                                        </div>
                                    </div>`

                ElementBefore.insertAdjacentHTML('afterend', ThisElement);

            },
            error: function () {
                popUp('contact-admin');
            },
        });
    }

    RemoveInformations() {

        const ElementToRemove = document.querySelector('.contain-users-informations');

        ElementToRemove.remove();

    }

}