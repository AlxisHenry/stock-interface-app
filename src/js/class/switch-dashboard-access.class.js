import {consoleLog, popUp} from "../global/app.js";

export class SwitchDashboardAccess {

    constructor() {
        this.indicator = document.querySelector('.switch-indicator');
        this.textIndicator = document.querySelector('.toggle-span');
        this.state = false;
    }

    InitSwitchState() {

        $.ajax({
            type: "POST",
            url: `../../php/website-access/manage.php`,
            data: { target:"employee", type: "access" },
            success: function (server_response) {
                switch (server_response) {
                    case 'false':
                        break;
                    case 'true':
                        new SwitchDashboardAccess().SwitchDashboardAccessOn();
                        break;
                    default:
                        consoleLog('Une erreur est survenue durant le traitement de la requête (InitSwitchState())', 'e');
                        break;
                }
            },
            error: function () {
                consoleLog("Une erreur est survenue durant l'initialisation du switch on/off.", 'e');
            },
        });
    }

    SwitchDashboardState() {

        if ((!this.indicator.classList.contains('switch-indicator-transition-left') && !this.indicator.classList.contains('switch-indicator-transition-right'))) {
            this.SwitchDashboardAccessOn();
        } else if (this.indicator.classList.contains('switch-indicator-transition-left')) {
            this.SwitchDashboardAccessOn();
        } else if (this.indicator.classList.contains('switch-indicator-transition-right')) {
            this.SwitchDashboardAccessOff();
        }

    }

    SwitchDashboardAccessOn() {
        this.state = true;
        consoleLog('DASHBOARD :: Switch Dashboard Access to on :: State : ' + this.state);
        this.indicator.classList.remove('switch-indicator-transition-left');
        this.indicator.classList.add('switch-indicator-transition-right');
        this._SwitchAccess('on', 'employee');
    }

    SwitchDashboardAccessOff() {
        this.state = false;
        consoleLog('DASHBOARD :: Switch Dashboard Access to off :: State : ' + this.state);
        this.indicator.classList.remove('switch-indicator-transition-right');
        this.indicator.classList.add('switch-indicator-transition-left');
        this._SwitchAccess('off', 'employee');
    }

    _SwitchAccess(value, target) {
            $.ajax({
                type: "POST",
            url: `../../php/website-access/manage.php`,
            data: { target: target, type: 'edit-access', value: value },
                success: function (server_response) {
                    consoleLog(server_response, 's');
                },
                error: function () {
                    consoleLog("Une erreur est survenue durant la requête pour modifier l'accès.", 'e');
                },
            });
    }
}