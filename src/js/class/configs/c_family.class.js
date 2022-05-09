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

}
