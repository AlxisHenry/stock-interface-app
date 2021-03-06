import {consoleLog, popUp} from "../../global/app.js";

export class Switch {

    constructor() {
        this.ToLeft = 'switch-indicator-transition-left';
        this.ToRight = 'switch-indicator-transition-right';
        this._Left = 'switch-transition-left';
        this._Right = 'switch-transition-right';
    }

    InitState() {
        $.ajax({
            type: "GET",
            url: `../../ajax/init-switch-state.php`,
            data: { method: 'init'},
            success: function (server_response) {

                const States = JSON.parse(server_response);

                States.forEach((el) => {

                    //const Element = document.querySelector('.' + el['nom']);
                    const Element = document.querySelector('[data-front-id="' + el['id']  + '"]');
                    //console.log(Element);

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

                    const FormatDate = {
                        mdy: {
                            year: el['modification'].split(' ')[0].split('-')[0],
                            months: el['modification'].split(' ')[0].split('-')[1],
                            days: el['modification'].split(' ')[0].split('-')[2]
                        },
                        hms: el['modification'].split(' ')[1].slice(0,5)
                    }

                    const FullDate = [
                        FormatDate.mdy.days + '/' + FormatDate.mdy.months + '/' + FormatDate.mdy.year,
                        FormatDate.hms
                    ]

                    const FormattedDate = FullDate.join(' ?? ')

                    Element.title = 'Derni??re modification le ' + FormattedDate;

                });

            },
            error: function () {

                popUp('contact-admin');

            },
        });
    }

    SwitchState(e) {

        if ((e.target.classList.contains(this.ToLeft)) || (e.target.classList.contains(this.ToRight))) {

            if (e.target.classList.contains(this.ToLeft)) {

                e.target.classList.remove(this.ToLeft);
                e.target.parentNode.classList.remove(this._Left);
                e.target.classList.add(this.ToRight);
                e.target.parentNode.classList.add(this._Right);
                this.SwitchAction(e.target.parentNode.parentNode, 'up')

            } else {

                e.target.classList.remove(this.ToRight);
                e.target.parentNode.classList.remove(this._Right);
                e.target.classList.add(this.ToLeft);
                e.target.parentNode.classList.add(this._Left);
                this.SwitchAction(e.target.parentNode.parentNode, 'down')
            }

        } else if ((e.target.classList.contains(this._Left)) || (e.target.classList.contains(this._Right))) {

            if (e.target.classList.contains(this._Left)) {

                e.target.classList.remove(this._Left);
                e.target.children[0].classList.remove(this.ToLeft);
                e.target.classList.add(this._Right);
                e.target.children[0].classList.add(this.ToRight);
                this.SwitchAction(e.target.parentNode, 'up')

            } else {

                e.target.classList.remove(this._Right);
                e.target.children[0].classList.remove(this.ToRight);
                e.target.classList.add(this._Left);
                e.target.children[0].classList.add(this.ToLeft);
                this.SwitchAction(e.target.parentNode, 'down')

            }

        } else {
            e.preventDefault();
        }

    }

    SwitchAction(parent, turn) {
        console.log('data-id:' + parent.getAttribute('data-front-id'));
        this.SwitchActionRequest(parent.getAttribute('data-front-id'), turn);
        popUp('success');
    }

    SwitchActionRequest(action, turn) {
        $.ajax({
            type: "POST",
            url: `../../ajax/request-switch-state.php`,
            data: { element: action, turn: turn},
            success: function (server_response) {
                consoleLog('Mise ?? jour effectu??e.', 's');
            },
            error: function () {
                consoleLog("Une erreur est survenue lors du changement d'??tat " +  action + " (Ajax request failed).", 'e');
                popUp('contact-admin');
            },
        });
    }
}