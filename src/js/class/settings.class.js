import {consoleLog, popUp} from "../global/app.js";

export class Switch {

    constructor() {
        this.ToLeft = 'switch-indicator-transition-left';
        this.ToRight = 'switch-indicator-transition-right';
    }

    SwitchState(e) {
        if ((!e.target.classList.contains(this.ToLeft) && !e.target.classList.contains(this.ToRight))) {
            this.SwitchToOn(e);
        } else if (e.target.classList.contains(this.ToLeft)) {
            this.SwitchToOn(e);
        } else if (e.target.classList.contains(this.ToRight)) {
            this.SwitchToOff(e);
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

    SwitchAction(e) {
        this.SwitchActionRequest(e.target.parentNode.parentNode.classList[0]);
    }

    SwitchActionRequest(action) {
        $.ajax({
            type: "POST",
            url: `../../ajax/request-switch-state.php`,
            data: { element: action},
            success: function (server_response) {
                consoleLog('Changement réussi. Element : ' + server_response, 's');
            },
            error: function () {
                consoleLog("Une erreur est survenue lors du changement d'état " +  action + " (Ajax request failed).", 'e');
            },
        });
    }
}