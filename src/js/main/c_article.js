import {c_Article} from "../class/configs/c_article.class.js"

window.addEventListener('load', () => {

    new c_Article().__Action__()

    document.querySelector('.new-article').addEventListener('click', (e) => {
        new c_Article()._NAV_NewArticle(e);
    })

    document.querySelector('.existing-article').addEventListener('click', (e) => {
        new c_Article()._NAV_ExistArticle(e);
    })

    document.querySelector('.article-nom-select').addEventListener('change', (e) => {
        new c_Article().ExistArticleChange(e);
    })

})