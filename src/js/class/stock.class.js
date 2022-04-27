import {consoleLog} from "../global/app.js";

export class Stock {

    constructor() {
        this.Searchbar = document.querySelector('.searchbar');
    };

    RemoveLastColumn() {
        const AllColumns = document.querySelectorAll('.row-values');
        document.querySelector('.' + AllColumns[AllColumns.length - 1].classList[0]).remove();
    }

    NewResearchRequest() {
            $.ajax({
                type: "POST",
                url: `../../ajax/request-stock-research.php`,
                data: { value: this.Searchbar.value},
                success: function (article) {
                    document.querySelector('.table-body').innerHTML = article;
                },
                error: function () {
                    consoleLog("Une erreur est survenue durant la recherche dynamique (Ajax request failed).", 'e');
                },
            });
    }
}