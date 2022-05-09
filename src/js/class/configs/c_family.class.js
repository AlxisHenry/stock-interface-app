import {consoleLog, popUp} from "../../global/app.js";

export class c_Family {

    constructor() {
        this.UrlParamId = new URLSearchParams(window.location.search).get("id");
        this.UrlParamState = new URLSearchParams(window.location.search).get('st');
        this._NewFamily = document.querySelector('.new');
        this._ExistFamily = document.querySelector('.exist')
    }

    __Action__() {

        const _GetExistArticle = this.UrlParamId ? this.UrlParamId : false

        console.log(this._NewFamily, this._ExistFamily)

        if (!isNaN(parseInt(_GetExistArticle))) {
            this._NewFamily.classList.remove('config-active-action')
            this._ExistFamily.classList.add('config-active-action')
            document.querySelector('.exit-article-focus').classList.remove('invisible')
            document.querySelector('.delete-family').classList.remove('hidden')
        } else if (this.UrlParamState) {
            this._NewFamily.classList.remove('config-active-action')
            this._ExistFamily.classList.add('config-active-action')
            document.querySelector('.form-edit-family').classList.remove('hidden')
            document.querySelector('.form-new-family').classList.add('hidden')
        } else {
            document.querySelector('.form-edit-family').classList.add('hidden')
            document.querySelector('.form-new-family').classList.remove('hidden')
        }
    }

    _NAV_NewFamily(e) {

        if (this.UrlParamId || this.UrlParamState) {
            document.location.replace('config-familles.php?nav=c-famille')
        } else if (this._NewFamily.classList.contains('config-active-action')) {
            e.preventDefault()
            return false;
        }

        this._NewFamily.classList.add('config-active-action')
        this._ExistFamily.classList.remove('config-active-action')

    }

    _NAV_ExistFamily(e) {

        if (this._ExistFamily.classList.contains('config-active-action')) {
            e.preventDefault();
            return false;
        }

        document.location.replace('config-familles.php?nav=c-famille&st=true');

        this._NewFamily.classList.remove('config-active-action')
        this._ExistFamily.classList.add('config-active-action')

        document.querySelector('.form-edit-family').classList.remove('hidden')
        document.querySelector('.form-new-family').classList.add('hidden')

    }

    ExistFamilyChange(e) {
        document.location.replace('config-familles.php?nav=c-famille&id=' + e.target.value)
    }

    Clear() {
        console.log('Clear');
        document.location.replace('config-familles.php?nav=c-famille&st=true');
    }

    ConfirmChange() {
        const TargetAction = document.querySelector('.card-form-article-submit').dataset.target;
        const quantityStatus = document.querySelector('.article-alert-state').checked;
        const quantityMin = quantityStatus ? -1 : document.querySelector('.article-quantity-minimal').value

        const Article_Data = {
            nom: document.querySelector('.article-new-name').value,
            id: document.querySelector('.article-name-select').value,
            quantity: document.querySelector('.article-quantity').value,
            quantityMin: quantityMin,
            comment: document.querySelector('.article-commentary').value,
            family: document.querySelector('.article-family-select').value,
            code: document.querySelector('.article-code').value,
            localisation: document.querySelector('.article-localisation').value,
            type: TargetAction,
        }

        console.log(Article_Data)

    }

    Delete(e) {


        const Confirm = confirm("Vous êtes sur le point de supprimer la famille ! Les articles seront déplacés dans la famille Autre... ")

        if (Confirm) {

            const TargetAction = document.querySelector('.exist-family-deleted').dataset.target

            const FAMILLE_DATA = {
                id: document.querySelector('.family-name-select').dataset.family ?? null,
                nom: null,
                comment: null,
                type: TargetAction,
            }

            $.ajax({
                type: "POST",
                url: `../../ajax/config-famille.php`,
                data: { FAMILLE_DATA },
                success: function (rep) {
                    consoleLog('Mise à jour effectuée.', 's');
                    console.table(rep)
                    popUp('success')
                    document.location.replace('config-familles.php?nav=c-famille&st=true');
                },
                error: function () {
                    popUp('contact-admin');
                },
            });

        } else {
            e.preventDefault()
        }

    }

}
