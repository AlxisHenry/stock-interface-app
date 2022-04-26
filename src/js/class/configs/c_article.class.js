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

            document.querySelector('.article-nom').classList.add('hidden')
            document.querySelector('.article-nom-select').classList.remove('hidden')

            this._NewArticle.classList.remove('config-active-action')
            this._ExistArticle.classList.add('config-active-action')

            const Family = document.querySelector('.article-family-select').dataset.family
            const FamilySelect = document.querySelector('.opt-family-' + Family)
            if (FamilySelect) {
                FamilySelect.setAttribute('selected', true)
            }

            const Name = document.querySelector('.article-nom-select').dataset.art
            const NameSelect = document.querySelector('.opt-name-' + Name)
            if (NameSelect) {
                NameSelect.setAttribute('selected', true)
            } else {
                document.location.replace('config-articles.php?nav=c-article')
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

        document.querySelector('.article-nom').classList.remove('hidden')
        document.querySelector('.article-nom-select').classList.add('hidden')

    }

    _NAV_ExistArticle(e) {

        if (this._ExistArticle.classList.contains('config-active-action')) {
            e.preventDefault();
            return false;
        }

        this._NewArticle.classList.remove('config-active-action')
        this._ExistArticle.classList.add('config-active-action')

        document.querySelector('.article-nom').classList.add('hidden')
        document.querySelector('.article-nom-select').classList.remove('hidden')
        document.querySelector('.article-default-quantity').setAttribute('disabled', true)

    }

    ExistArticleChange(e) {
        document.location.replace('config-articles.php?nav=c-article&id=' + e.target.value )
    }

}
