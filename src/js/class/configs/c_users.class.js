import {consoleLog, popUp} from "../../global/app.js";

export class c_Users {

    constructor() {
        this.Pages = new URLSearchParams(window.location.search).get('p')
        this.PageIndicator = document.querySelector('.to-page-' + this.Pages)
    }

    RefreshDatabase() {
        document.querySelector('.fa-rotate').classList.add('fa-rotate-db-animation');
        document.querySelector('.refresh-database span').style.color = 'black';
        $.ajax({
            type: "POST",
            url: `../../ajax/refresh-database-with-csv.php`,
            success: function (refresh) {
                popUp('update-users');
            },
            error: function () {
                popUp('contact-admin')
                consoleLog("Une erreur est survenue durant le rafraîchissement de la base de données (Ajax request failed).", 'e');
            },
        });

        setTimeout(() => {
            document.querySelector('.fa-rotate').classList.remove('fa-rotate-db-animation');
            document.querySelector('.refresh-database span').style.color = 'gray';
            setTimeout( () => {
                document.location.replace('config-users.php?nav=c-users&p=' + this.Pages)
            }, 125)
        }, 3000)
    }

    InitializePage() {

        document.querySelectorAll('.page').forEach(removeActive => {
            removeActive.classList.remove('active-page');
        })

        this.PageIndicator.classList.add('active-page')

    }

}
