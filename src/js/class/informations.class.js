import {Switch} from "./switch.class.js";

export class Informations extends Switch {

    constructor() {
        super();
    }

    Informations() {

            if (document.querySelector('.contain-users-informations')) {
                this.RemoveInformations();
            } else {
                try {
                    this.RemoveInformations();
                } catch (error) {
                }
                this.ShowInformations();
            }

    }

    ShowInformations() {
     // TODO : Ajout d'une popup d'erreur.
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
            },
        });
    }

    RemoveInformations() {

        const ElementToRemove = document.querySelector('.contain-users-informations');

        ElementToRemove.remove();

    }

}