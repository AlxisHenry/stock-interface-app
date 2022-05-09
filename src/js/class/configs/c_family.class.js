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

        if (!isNaN(parseInt(_GetExistArticle))) {
            this._NewFamily.classList.remove('config-active-action')
            this._ExistFamily.classList.add('config-active-action')
            document.querySelector('.exit-article-focus').classList.remove('invisible')
            document.querySelector('.delete-family').classList.remove('hidden')
            document.querySelector('.family-name-select').children[0].removeAttribute('selected')
            document.querySelector('.opt-family-' + _GetExistArticle).setAttribute('selected', true)
            document.querySelector('.card-form-family-submit').dataset.target = 'update'
        } else if (this.UrlParamState) {
            this._NewFamily.classList.remove('config-active-action')
            this._ExistFamily.classList.add('config-active-action')
            document.querySelector('.form-edit-family').classList.remove('hidden')
            document.querySelector('.new-family-name').classList.add('hidden')
            document.querySelector('.new-family-name').parentNode.classList.add('hidden')
            document.querySelector('.card-form-family-submit').dataset.target = 'update'
        } else {
            document.querySelector('.form-edit-family').classList.add('hidden')
            document.querySelector('.new-family-name').classList.remove('hidden')
            document.querySelector('.new-family-name').parentNode.classList.remove('hidden')
            document.querySelector('.card-form-family-submit').dataset.target = 'insert'
        }
    }

    _NAV_NewFamily(e) {

        if (this.UrlParamId || this.UrlParamState) {
            document.location.replace('config-familles.php?nav=c-famille')
        } else if (this._NewFamily.classList.contains('config-active-action')) {
            e.preventDefault()
            return false;
        }

        document.querySelector('.card-form-family-submit').dataset.target = 'insert'

        this._NewFamily.classList.add('config-active-action')
        this._ExistFamily.classList.remove('config-active-action')

    }

    _NAV_ExistFamily(e) {

        if (this._ExistFamily.classList.contains('config-active-action')) {
            e.preventDefault();
            return false;
        }

        document.location.replace('config-familles.php?nav=c-famille&st=true');
        document.querySelector('.card-form-family-submit').dataset.target = 'update'

        this._NewFamily.classList.remove('config-active-action')
        this._ExistFamily.classList.add('config-active-action')

        document.querySelector('.form-edit-family').classList.remove('hidden')
        document.querySelector('.new-family-name').classList.add('hidden')
        document.querySelector('.new-family-name').parentNode.classList.add('hidden')

    }

    ExistFamilyChange(e) {
        document.location.replace('config-familles.php?nav=c-famille&id=' + e.target.value)
    }

    Clear() {
        console.log('Clear');
        document.location.replace('config-familles.php?nav=c-famille&st=true');
    }

    ConfirmChange() {

        const TargetAction = document.querySelector('.card-form-family-submit').dataset.target ?? false;

        if (!TargetAction) {
            popUp('uncompleted-data')
            return false
        }

        const FAMILLE_DATA = {
            id: document.querySelector('.family-name-select').value ?? 0,
            nom: document.querySelector('.new-family-name').value,
            comment: document.querySelector('.new-family-comment').value,
            type: TargetAction,
        }

        if (FAMILLE_DATA.nom.length < 1) {
            popUp('uncompleted-data')
            return false
        }

        popUp('clean')

        console.log(FAMILLE_DATA)
        $.ajax({
            type: "POST",
            url: `../../ajax/config-famille.php`,
            data: { FAMILLE_DATA },
            success: function (Famille_Status) {
                console.log(Famille_Status)
                consoleLog('Mise à jour effectuée.', 's');
            },
            error: function () {
                popUp('contact-admin');
            },
        });

    }

    Delete(e) {


        const Confirm = confirm("Vous êtes sur le point de supprimer la famille ! Les articles n'auront plus de famille... ")

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
