import {consoleLog, popUp} from "../../global/app.js";

export class c_Article {

    constructor() {

    }

    __Action__() {

        consoleLog('Launch __Action__', 's')

        const _NewArticle = document.querySelector('.new-article')
        const _ExistArticle = document.querySelector('.existing-article')
        const _GetUrlParam = new URLSearchParams(window.location.search).get("id");
        const _GetExistArticle = _GetUrlParam ? _GetUrlParam : false

        // Arrivée sur la page depuis l'onglet 'Voir le stock'
        if (!isNaN(parseInt(_GetExistArticle))) {

            _NewArticle.classList.remove('config-active-action')
            _ExistArticle.classList.add('config-active-action')

            const Family = document.querySelector('.article-family-select').dataset.family
            const FamilySelect = document.querySelector('.opt-' + Family)
            if (FamilySelect) {
                FamilySelect.setAttribute('selected', true)
            }

            console.log('id in url')

            return false;
        }


        _NewArticle.classList.add('config-active-action')
        _ExistArticle.classList.remove('config-active-action')


        console.log(_NewArticle, _ExistArticle)

    }

}
