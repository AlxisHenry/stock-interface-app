import { consoleLog } from "../global/console.log.js";

export class SwitchDashboardAccess {

    constructor() {
        this.indicator = document.querySelector('.switch-indicator');
        this.state = false;
    }

    InitDashboard() {
        // Initialize switch position at loading
        consoleLog(this.state);
    }

    SwitchDashboardState() {
        if (!this.state) {
            this.SwitchDashboardAccessOn();
        } else if (this.state) {
            this.SwitchDashboardAccessOff();
        }
    }

    SwitchDashboardAccessOn() {
        this.state = true;
        consoleLog('DASHBOARD :: Switch Dashboard Access to on :: State : ' + this.state);
        this.indicator.classList.remove('switch-indicator-transition-left');
        this.indicator.classList.add('switch-indicator-transition-right');
        this.SwitchAccess(this.state)
    }

    SwitchDashboardAccessOff() {
        this.state = false;
        consoleLog('DASHBOARD :: Switch Dashboard Access to off :: State : ' + this.state);
        this.indicator.classList.remove('switch-indicator-transition-right');
        this.indicator.classList.add('switch-indicator-transition-left');
        this.SwitchAccess(this.state);
    }

    SwitchAccess(status) {
        consoleLog('Switch use' + mode);
        //todo Ajax request to turn on/off employee dashboard.
        $.ajax()


    }

}