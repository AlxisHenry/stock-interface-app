import {c_Article} from "../class/configs/c_article.class.js"

window.addEventListener('load', () => {


    new c_Article().__Action__()


    document.querySelector('.new').addEventListener('click', (e) => {
        new c_Article()._NAV_NewArticle(e);
    })


    document.querySelector('.exist').addEventListener('click', (e) => {
        new c_Article()._NAV_ExistArticle(e);
    })


    document.querySelector('.article-name-select').addEventListener('change', (e) => {
        new c_Article().ExistArticleChange(e);
    })


    document.querySelector('.card-form-article-submit').addEventListener('click', () => {
        new c_Article().ConfirmChange();
    })

    document.querySelector('.exit-article-focus').addEventListener('click', () => {
        new c_Article().Clear();
    })

    document.querySelector('.exist-article-deleted').addEventListener('click', () => {
        new c_Article().Delete();
    })


})