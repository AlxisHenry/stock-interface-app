import { consoleLog } from "../global/console.log.js";

export class SwitchDashboardAccessClass {

    constructor() {
        this.indicator = document.querySelector('.switch-indicator');
    }

    SwitchDashboard() {
        if (this.indicator.classList.contains('switch-indicator-transition-left')) {
            new SwitchDashboardAccessClass().SwitchDashboardAccessOn();
        } else if (this.indicator.classList.contains('switch-indicator-transition-right')) {
            new SwitchDashboardAccessClass().SwitchDashboardAccessOff();
        } else {
            new SwitchDashboardAccessClass().SwitchDashboardAccessOn();
        }
    }

    SwitchDashboardAccessOn() {
        consoleLog('Switch Dashboard Access to on');

        this.indicator.classList.remove('switch-indicator-transition-left');
        this.indicator.classList.add('switch-indicator-transition-right');

    }

    SwitchDashboardAccessOff() {
        consoleLog('Switch Dashboard Access to off');

        this.indicator.classList.remove('switch-indicator-transition-right');
        this.indicator.classList.add('switch-indicator-transition-left');

    }

}