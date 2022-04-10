import {consoleLog, popUp} from "../../global/app.js";

export class Switch {

    constructor() {
        this.ToLeft = 'switch-indicator-transition-left';
        this.ToRight = 'switch-indicator-transition-right';
        this._Left = 'switch-transition-left';
        this._Right = 'switch-transition-right';
    }

    InitState() {
        // TODO : Ajout d'une popup d'erreur.
        $.ajax({
            type: "GET",
            url: `../../ajax/init-switch-state.php`,
            data: { method: 'init'},
            success: function (server_response) {

                const States = JSON.parse(server_response);

                States.forEach((el) => {

                    const Element = document.querySelector('.' + el['nom']);

                    if (Element.classList.contains('contain-switch')) {
                        const Children = Element.children[0].children[0].classList;
                        if (el['state'] === 1) {
                            Element.children[0].classList.remove('switch-transition-left');
                            Element.children[0].classList.add('switch-transition-right');
                            Children.remove('switch-indicator-transition-left');
                            Children.add('switch-indicator-transition-right');
                        } else {
                            Element.children[0].classList.remove('switch-transition-right');
                            Element.children[0].classList.add('switch-transition-left');
                            Children.remove('switch-indicator-transition-right');
                            Children.add('switch-indicator-transition-left');
                        }
                    }
                  /*  if (el['state'] === 1) {
                        Element.children[0].classList.remove('switch-init-left');
                        Element.children[0].classList.add('switch-init-right');
                        Children.remove('switch-indicator-transition-left');
                        Children.add('switch-indicator-init-right');
                    } else {
                        Element.children[0].classList.remove('switch-init-right');
                        Element.children[0].classList.add('switch-init-left');
                        Children.remove('switch-indicator-init-right');
                        Children.add('switch-indicator-init-left');
                    }*/
                   Element.title = 'Dernière modification le ' + el['modification'];

                });

            },
            error: function () {
            },
        });
    }

    SwitchState(e) {

        if ((e.target.classList.contains(this.ToLeft)) || (e.target.classList.contains(this.ToRight))) {

            console.log(e.target);

            if (e.target.classList.contains(this.ToLeft)) {

                e.target.classList.remove(this.ToLeft);
                e.target.parentNode.classList.remove(this._Left);
                e.target.classList.add(this.ToRight);
                e.target.parentNode.classList.add(this._Right);

            } else {

                e.target.classList.remove(this.ToRight);
                e.target.parentNode.classList.remove(this._Right);
                e.target.classList.add(this.ToLeft);
                e.target.parentNode.classList.add(this._Left);

            }

        } else if ((e.target.classList.contains(this._Left)) || (e.target.classList.contains(this._Right))) {

            console.log(e.target.children);

            if (e.target.classList.contains(this._Left)) {

                e.target.classList.remove(this._Left);
                e.target.children[0].classList.remove(this.ToLeft);
                e.target.classList.add(this._Right);
                e.target.children[0].classList.add(this.ToRight);

            } else {

                e.target.classList.remove(this._Right);
                e.target.children[0].classList.remove(this.ToRight);
                e.target.classList.add(this._Left);
                e.target.children[0].classList.add(this.ToLeft);

            }

        }

    }

    SwitchAction(e, turn) {
        this.SwitchActionRequest(e.target.parentNode.parentNode.classList[0], turn);
    }

    SwitchActionRequest(action, turn) {
        $.ajax({
            type: "POST",
            url: `../../ajax/request-switch-state.php`,
            data: { element: action, turn: turn},
            success: function (server_response) {
                consoleLog('Mise à jour effectuée.', 's');
            },
            error: function () {
                consoleLog("Une erreur est survenue lors du changement d'état " +  action + " (Ajax request failed).", 'e');
            },
        });
    }
}