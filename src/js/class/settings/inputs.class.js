import { Switch } from "./switch.class.js";
import { popUp } from "../../global/app.js";

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

    Save(e) {

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

        if (Save.main.value.length <= 0) {
            e.target.parentNode.children[0].style.backgroundColor = 'rgb(241,178,178)';
            popUp('uncompleted-data');
            setTimeout(() => {
                e.target.parentNode.children[0].style.backgroundColor = 'white';
            }, 1625)
            return false;
        }

        // todo: Requête de modification du mot de passe.
        // todo: Gérer les évènements:
            // - mot de passe identique à l'ancien, popUp : mot de passe identique
            // - mot de passe ne respectant pas la norme, popUp : mot de passe incorrect
            // - mot de passe vide, popUp : pensez à compléter les champs

        $.ajax({
            type: "POST",
            url: `../../ajax/apply-input-settings.php`,
            data: { settings: Save},
            success: function (call) {

                console.log(call)

            },
            error: function () {

                popUp('contact-admin');

            },
        });

        console.log(Save);

    }

}