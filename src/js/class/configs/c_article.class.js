import {consoleLog, popUp} from "../../global/app.js";

export class c_Article {

    constructor() {
        this.UrlParamId = new URLSearchParams(window.location.search).get("id");
        this.UrlParamState = new URLSearchParams(window.location.search).get('st');
        this._NewArticle = document.querySelector('.new-article');
        this._ExistArticle = document.querySelector('.existing-article')
    }

    __Action__() {

        const _GetExistArticle = this.UrlParamId ? this.UrlParamId : false

        if (!isNaN(parseInt(_GetExistArticle))) {

            document.querySelector('.form-x').classList.remove('invisible')

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
        } else if (this.UrlParamState) {

            document.querySelector('.form-x').classList.add('invisible')

            this._NewArticle.classList.remove('config-active-action')
            this._ExistArticle.classList.add('config-active-action')

            document.querySelector('.article-nom').classList.add('hidden')
            document.querySelector('.article-nom-select').classList.remove('hidden')
            document.querySelector('.article-default-quantity').setAttribute('disabled', true)

            document.querySelector('.submit-form-config-article-values').dataset.target = "update";

        } else {
            document.querySelector('.form-x').classList.add('invisible')

            this._NewArticle.classList.add('config-active-action')
            this._ExistArticle.classList.remove('config-active-action')

            document.querySelector('.submit-form-config-article-values').dataset.target = "insert";
        }

    }

    _NAV_NewArticle(e) {

        if (this.UrlParamId) {
            document.location.replace('config-articles.php?nav=c-article')
        } else if (this._NewArticle.classList.contains('config-active-action')) {
            e.preventDefault()
            return false;
        }

        this._NewArticle.classList.add('config-active-action')
        this._ExistArticle.classList.remove('config-active-action')

        document.querySelector('.form-x').classList.add('invisible')
        document.querySelector('.article-nom').classList.remove('hidden')
        document.querySelector('.article-nom-select').classList.add('hidden')
        document.querySelector('.article-default-quantity').removeAttribute('disabled')

    }

    _NAV_ExistArticle(e) {

        if (this._ExistArticle.classList.contains('config-active-action')) {
            e.preventDefault();
            return false;
        }

        document.querySelector('.form-x').classList.add('invisible')
        this._NewArticle.classList.remove('config-active-action')
        this._ExistArticle.classList.add('config-active-action')

        document.querySelector('.article-nom').classList.add('hidden')
        document.querySelector('.article-nom-select').classList.remove('hidden')
        document.querySelector('.article-default-quantity').setAttribute('disabled', true)

    }

    ExistArticleChange(e) {
        document.location.replace('config-articles.php?nav=c-article&id=' + e.target.value )
    }

    ConfirmChange() {
        const TargetAction = document.querySelector('.submit-form-config-article-values').dataset.target;

        const Article_Data = {
            nom: document.querySelector('.article-nom').value,
            upnom: document.querySelector('.article-nom-select').value,
            quantity: document.querySelector('.article-default-quantity').value,
            comment: document.querySelector('.article-commentary').value,
            family: document.querySelector('.article-family-select').value,
            code: document.querySelector('.article-code').value,
            localisation: document.querySelector('.article-localisation').value,
            type: TargetAction,
        }

        if (Article_Data.nom < 1) {
            popUp('uncompleted-data')
            document.querySelector('.article-nom').style.backgroundColor = '#ffa4a4';
            setTimeout(() => { document.querySelector('.article-nom').style.backgroundColor = 'white' }, 1250)
            return false
        }

        document.querySelector('.article-nom').style.backgroundColor = 'white'
        popUp('clean')

        console.table(Article_Data)

        $.ajax({
            type: "POST",
            url: `../../ajax/config-article.php`,
            data: { Article_Data},
            success: function (rep) {
                consoleLog('Mise à jour effectuée.', 's');
                console.table(rep)
                popUp('success')
            },
            error: function () {
                 popUp('contact-admin');
            },
        });

    }

    Clear() {
        console.log('Clear');
        document.location.replace('config-articles.php?nav=c-article&st=true');

    }

}
