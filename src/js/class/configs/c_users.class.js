import {consoleLog, popUp} from "../../global/app.js";

export class c_Users {

    constructor() {

    }

    RefreshDatabase() {
        document.querySelector('.fa-rotate').classList.add('fa-rotate-db-animation');
        document.querySelector('.refresh-database span').style.color = 'black';
        $.ajax({
            type: "POST",
            url: `../../ajax/refresh-database-with-csv.php`,
            success: function (refresh) {
            },
            error: function () {
                popUp('contact-admin')
                consoleLog("Une erreur est survenue durant le rafraîchissement de la base de données (Ajax request failed).", 'e');
            },
        });

        setTimeout(() => {
            document.querySelector('.fa-rotate').classList.remove('fa-rotate-db-animation');
            document.querySelector('.refresh-database span').style.color = 'gray';
        }, 3000)
    }


}
