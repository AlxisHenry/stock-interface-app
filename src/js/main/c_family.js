import { c_Family } from "../class/configs/c_family.class.js";

window.addEventListener('load', () => {

   new c_Family().__Action__()

    document.querySelector('.new').addEventListener('click', (e) => {
        new c_Family()._NAV_NewFamily(e);
    })


    document.querySelector('.exist').addEventListener('click', (e) => {
        new c_Family()._NAV_ExistFamily(e);
    })

    document.querySelector('.family-name-select').addEventListener('change', (e) => {
        new c_Family().ExistFamilyChange(e)
    })

    document.querySelector('.exit-article-focus').addEventListener('click', () => {
        new c_Family().Clear()
    })

    document.querySelector('.card-form-family-submit').addEventListener('click', (e) => {
        new c_Family().ConfirmChange();
    })

    document.querySelector('.exist-family-deleted').addEventListener('click', (e) => {
        new c_Family().Delete(e)
    })

})