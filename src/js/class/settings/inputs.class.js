import { Switch } from "./switch.class.js";
import {consoleLog, popUp} from "../../global/app.js";

export class Inputs extends Switch {

    constructor() {
        super();
        this.Eye = '';
        this.Input = '';
        this._dEye = 'fa-eye-slash'
        this._aEye = 'fa-eye';
    }

    DisabledEye(e) {

        this.Eye = e.target;
        this.Input = e.target.parentNode.children[0].children[0];

        if (this.Eye.classList.contains(this._dEye)) {
            this.Eye.classList.remove(this._dEye);
            this.Eye.classList.add(this._aEye);
            this.Input.type = 'text';
        } else {
            e.preventDefault();
        }
    }

    ActiveEye(e) {

        this.Eye = e.target;
        this.Input = e.target.parentNode.children[0].children[0];

        if (this.Eye.classList.contains(this._aEye)) {
            this.Eye.classList.remove(this._aEye);
            this.Eye.classList.add(this._dEye);
            this.Input.type = 'password';
        } else {
            e.preventDefault();
        }
    }

    async Save(e) {

        const GetPassword = (e) => {
            if (!e.target.parentNode.classList.contains('alerts-minimal')) {
                return e.target.parentNode.children[0].children[0].value
            } else {
                return null;
            }
        }

        const GetQuantity = (e) => {
            if (e.target.parentNode.classList.contains('employee-password')) {
                return null;
            } else if (e.target.parentNode.classList.contains('admin-password')) {
                return null;
            } else {
                return e.target.parentNode.children[0].children[0].value;
            }
        }

        const GetUsername = (e) => {
            if (e.target.parentNode.classList.contains('alerts-minimal')) {
                return null;
            } else {
                return e.target.parentNode.classList[0].split('-')[0]
            }
        }

        const Save = {
            main: {
                target: e.target.parentNode.classList[0].split('-')[0],
                action: e.target.parentNode.classList[0].split('-')[1],
                type: e.target.parentNode.classList[0],
                value: e.target.parentNode.children[0].children[0].value
            },
            informations: {
                username: GetUsername(e),
                password: GetPassword(e),
                quantity: GetQuantity(e)
            },
            about: {
                date: Date.now(),
                url: document.location.href
            }
        }

        if (Save.main.value.length <= 0 || Save.main.value === -1) {
            e.target.parentNode.children[0].children[0].style.backgroundColor = 'rgb(241,178,178)';
            popUp('uncompleted-data');
            setTimeout(() => {
                e.target.parentNode.children[0].children[0].style.backgroundColor = 'white';
            }, 1625)
            return false;
        }

        // TODO: Relier le fetch au back-end
        // TODO: Refaire fonctionner l'update des switchs

        // Utilisation de fetch pour tester le principe des requêtes en JS
            await fetch(`../../ajax/apply-input-settings.php`, {
                method: 'POST',
                header: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(Save),
            }).then((response) => response.json()
            ).then((array) => {

                const [ Type, Target, Null, Status, Final ] = array[0];

                consoleLog('Requête effectuée, état de la réponse : ' + Status, 's');

            if (!Null) {
                switch (Type) {
                    case 'password':
                        if (!Status) {
                            if (!Final) {
                                consoleLog('Mot de passe du compte '+ Target +' changé avec succès.', 's');
                                popUp('update-password');
                            } else if (Final) {
                                consoleLog('Le mot de passe ne correspond pas aux critères demandés');
                                popUp('password-incorrect');
                            } else {
                                consoleLog('Une erreur est survenue dans la réponse du fetch.', 'e');
                                popUp('contact-admin');
                            }
                        } else if (Status) {
                            consoleLog('Le mot de passe du compte '+ Target +' est identique à votre ancien...', 'e');
                            popUp('same-password');
                        } else {
                            consoleLog('Une erreur est survenue dans la réponse du fetch.', 'e');
                            popUp('contact-admin');
                        }
                        break;
                    case 'alerts':
                        if (!Status) {
                            popUp('update-alert-minimum');
                        } else if (Status) {
                            consoleLog("Niveau d'alerte identique au précédent.", 'e');
                            popUp('update-alert-failed');
                        } else {
                            consoleLog('Une erreur est survenue dans la réponse du fetch.', 'e');
                            popUp('contact-admin');
                        }
                        break;
                }
            } else {
                popUp('uncompleted-data');
            }
            }).catch((e) => {
                consoleLog('Une erreur est survenue lors de la tentative de fetch.', 'e');
                console.log(e);
                popUp('contact-admin');
            });
    }
}