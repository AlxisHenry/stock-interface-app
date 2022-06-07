import {stock_in} from "../class/stocks/stock_in.class.js";

window.addEventListener('load', () => {

    new stock_in().EntryToNewArticle()
    new stock_in().__Action__()

    document.querySelector('.article-name-select').addEventListener('change', (e) => {
        new stock_in().ExistArticleChange(e)
    })

    document.querySelector('.exit-article-focus').addEventListener('click', () => {
        new stock_in().Clear()
    })
    
})