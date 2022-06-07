import {stock_out} from "../class/stocks/stock_out.class.js";

window.addEventListener('load', () => {

    new stock_out().CheckoutToAnotherArticle()
    new stock_out().__Action__()

    document.querySelector('.article-name-select').addEventListener('change', (e) => {
        new stock_out().ExistArticleChange(e)
    })

    document.querySelector('.exit-article-focus').addEventListener('click', () => {
        new stock_out().Clear()
    })

})