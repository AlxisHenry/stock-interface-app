import {consoleLog, popUp} from "../global/app.js";

export class Switch {

    constructor() {
        this.ToLeft = 'switch-indicator-transition-left';
        this.ToRight = 'switch-indicator-transition-right';
    }

    InitState() {
        $.ajax({
            type: "GET",
            url: `../../ajax/init-switch-state.php`,
            data: { method: 'init'},
            success: function (server_response) {
                console.table( JSON.parse(server_response) );

                const States = JSON.parse(server_response);

                States.forEach((el) => {

                    const Element = document.querySelector('.' + el['nom']);

                    if (Element.classList.contains('contain-switch')) {
                        const Children = Element.children[0].children[0].classList;
                        if (el['state'] === 1) {
                            Children.remove('switch-indicator-transition-left');
                            Children.add('switch-indicator-transition-right');
                        } else {
                            Children.remove('switch-indicator-transition-right');
                            Children.add('switch-indicator-transition-left');
                        }
                    }

                   Element.title = 'Dernière modification le ' + el['modification'];

                });

            },
            error: function () {
            },
        });
    }

    SwitchState(e) {
        if (e.target.classList.contains(this.ToLeft)) {
            this.SwitchToOn(e);
            this.SwitchAction(e, 'up');
        } else if (e.target.classList.contains(this.ToRight)) {
            this.SwitchToOff(e);
            this.SwitchAction(e, 'down');
        }
    }

    SwitchToOn(e) {
        e.target.classList.remove(this.ToLeft);
        e.target.classList.add(this.ToRight);
    }

    SwitchToOff(e) {
        e.target.classList.remove(this.ToRight);
        e.target.classList.add(this.ToLeft);
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
                consoleLog('Changement réussi. Element : ' + server_response, 's');
            },
            error: function () {
                consoleLog("Une erreur est survenue lors du changement d'état " +  action + " (Ajax request failed).", 'e');
            },
        });
    }
}