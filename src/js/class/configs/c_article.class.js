import {consoleLog, popUp} from "../../global/app.js";

export class c_Article {

    constructor() {
        this.UrlParam = new URLSearchParams(window.location.search).get("id");
        this._NewArticle = document.querySelector('.new-article');
        this._ExistArticle = document.querySelector('.existing-article')

    }

    __Action__() {

        const _GetExistArticle = this.UrlParam ? this.UrlParam : false

        if (!isNaN(parseInt(_GetExistArticle))) {

            this._NewArticle.classList.remove('config-active-action')
            this._ExistArticle.classList.add('config-active-action')

            const Family = document.querySelector('.article-family-select').dataset.family
            const FamilySelect = document.querySelector('.opt-' + Family)
            if (FamilySelect) {
                FamilySelect.setAttribute('selected', true)
            }

            const _default_Article_Values = {
                name: document.querySelector('.article-nom').value,
                qte: document.querySelector('.article-default-quantity').value,
                comment: document.querySelector('.article-commentary').value,
                family: {
                    id: document.querySelector('.article-family-select').value,
                    name: document.querySelector('.article-family-select').options[document.querySelector('.article-family-select').value].dataset.name

                },
                code: document.querySelector('.article-default-quantity').value,
                localisation: document.querySelector('.article-default-quantity').value,
            }

            document.querySelector('.submit-form-config-article-values').dataset.target = "update";

            return false;
        }

        this._NewArticle.classList.add('config-active-action')
        this._ExistArticle.classList.remove('config-active-action')

        document.querySelector('.submit-form-config-article-values').dataset.target = "insert";

    }

    _NAV_NewArticle(e) {

        if (this.UrlParam) {
            document.location.replace('config-articles.php?nav=c-article')
        } else if (this._NewArticle.classList.contains('config-active-action')) {
            e.preventDefault()
            return false;
        }

        this._NewArticle.classList.add('config-active-action')
        this._ExistArticle.classList.remove('config-active-action')

    }

    _NAV_ExistArticle(e) {

        if (this._ExistArticle.classList.contains('config-active-action')) {
            e.preventDefault();
            return false;
        }

        this._NewArticle.classList.remove('config-active-action')
        this._ExistArticle.classList.add('config-active-action')



    }

}
