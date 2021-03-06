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

    Save(e) {

        const InputElement = e.target.parentNode.children[0].children[0];

        if (InputElement.value.length <= 0) {
            InputElement.classList.add('void-input');
            popUp('uncompleted-data');
            return false;
        }

        InputElement.classList.remove('void-input');

        const _DATA_SAVE_ = {
            target: e.target.parentNode.classList[0].split('-')[0],
            action: e.target.parentNode.classList[0].split('-')[1],
            __database__: e.target.parentNode.attributes[0].value,
            __table__: e.target.parentNode.attributes[1].value,
            value: e.target.parentNode.children[0].children[0].value
        }

        $.ajax({
            type: "POST",
            url: `../../ajax/apply-input-settings.php`,
            data: { _DATA_SAVE_ },
            success: (save) => {
                const [Value, Action] = JSON.parse(save);
                switch (Value) {
                    case false:
                        consoleLog('Valeur envoy??e vide', 'e');
                        popUp('uncompleted-data');
                        break;
                    case null:
                        consoleLog("Valeur identique ?? l'ancienne.", 'e');
                        switch (Action) {
                            case 'password':
                                popUp('same-password');
                                break;
                            case 'minimal':
                                popUp('same-level');
                                break;
                            default:
                                popUp('success')
                                break;
                        }
                        break;
                    case true:
                        consoleLog("Changement effectu??", 'e');
                        switch (Action) {
                            case 'password':
                                popUp('update-password');
                                break;
                            case 'minimal':
                                popUp('update-level');
                                $.ajax({
                                    type: "GET",
                                    url: `../../ajax/init-front-informations.php`,
                                    data: { format: 'array', return: ['asset', 'date', 'count-alert']},
                                    success: function (informations) {

                                        const Informations = JSON.parse(informations);

                                        if (!Informations.countState) {
                                            return false;
                                        }

                                        if (Informations.count !== 0) {
                                            if (document.querySelector('.alert-indication')) {
                                                document.querySelector('.alert-indication').children[0].innerHTML = Informations.count;
                                            } else {
                                                const Parent = document.querySelector('.alerts');
                                                const Element = `<div class="alert-indication" title="Nombre d'alertes"><span>${Informations.count}</span></div>`;
                                                Parent.insertAdjacentHTML('beforeend', Element);
                                            }
                                        } else {
                                            document.querySelector('.alert-indication').remove();
                                        }

                                    },
                                    error: function () {
                                        popUp('contact-admin');
                                    },
                                });
                                break;
                            default:
                                popUp('success');
                                break;
                        }
                        break;
                    case 'none':
                        consoleLog("La valeur entr??e ne correspond pas aux crit??res demand??s", 'e');
                        switch (Action) {
                            default:
                                popUp('value-not-corresponding');
                                break;
                        }
                        break;
                    default:
                        popUp('contact-admin')
                }
            },
            error: () => {
                popUp('contact-admin');
            },
        });

    }
}