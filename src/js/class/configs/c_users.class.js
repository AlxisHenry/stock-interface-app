import {consoleLog, popUp} from "../../global/app.js";

export class c_Users {

    constructor() {
        this.Pages = new URLSearchParams(window.location.search).get('p')
        this.PageIndicator = document.querySelectorAll('.to-page-' + this.Pages)
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

        this.PageIndicator.forEach(indicator => {
            indicator.classList.add('active-page')
        })

    }

    Research(e) {
        const Value = e.target.value

        if (Value.length < 3) {
            return false;
        }

        $.ajax({
            type: "POST",
            url: `../../ajax/request-user-research.php`,
            data: {Value: Value},
            success: function (users) {

                const UsersElements = users;

                const Title = `<div class="main-user-row">
                <div class="main-user-title matricule">
                    <span> Matricule </span>
                </div>

                <div class="main-user-title identity">
                    <span>  Identité </span>
                </div>

                <div class="main-user-title c_cout">
                    <span>  Centre de coût </span>
                </div>

                <div class="main-user-title c_affection">
                    <span>  Lieu d'affection </span>
                </div>
                </div>`

                const PlaceElement = document.querySelector('.pages-contain-users')

                PlaceElement.innerHTML = ''
                PlaceElement.insertAdjacentHTML('beforeend', Title)
                PlaceElement.insertAdjacentHTML('beforeend', UsersElements)


            },
            error: function () {
                popUp('contact-admin')
                consoleLog("Une erreur est survenue durant le rafraîchissement de la base de données (Ajax request failed).", 'e');
            },
        });

    }

}
