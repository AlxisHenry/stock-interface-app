import {consoleLog, popUp} from "../../global/app.js";
import {Stock} from "../stock.class.js";

export class stock_in extends Stock {

    constructor() {
        super()
    }

    Submit() {

        const values = {
            article: document.querySelector('.article-name-select').dataset.art,
            cc: document.querySelector('.ccout-target').value,
            qty: document.querySelector('.article-quantity-to-add').value,
            order: document.querySelector('.command-order').value,
            commentary: document.querySelector('.about-entry').value
        }

        if (!values.article || !values.qty) {
            popUp('uncompleted-data')
            return false;
        } else if (isNaN(values.qty)) {
            popUp('invalid-quantity')
            return false;
        }

        console.log(values)

        $.ajax({
            type: "POST",
            url: `../../ajax/stock-action.php`,
            data: { values: values, type: 'in' },
            success: (re) => {
                popUp('in/out-done')
                console.log(re)
            },
            error: (err) => {
                console.log(err)
                consoleLog("Une erreur est survenue durant l'entrée de stock (Ajax request failed).", 'e')
            },
        });

    }

    __Action__() {


        const _GetExistArticle = this.UrlParamId ? this.UrlParamId : false
        if (!isNaN(parseInt(_GetExistArticle))) {
            document.querySelector('.exit-article-focus').classList.remove('invisible')
            document.querySelector('.article-name-select').classList.add('hidden')
            document.querySelector('.article-name').classList.remove('hidden')
            document.querySelector('.card-form-article-submit').addEventListener('click', this.Submit)
            return false;
        }  else if (_GetExistArticle === '') {
            location.replace('stock_in.php?nav=s-entry')
        }

    }

    Clear() {
        console.log('Clear');
        document.location.replace('stock_in.php?nav=s-entry');
    }

    EntryToNewArticle() {
        console.log("Global event")
        document.querySelector('.new').addEventListener('click', () => {
            location.replace('config-articles.php?nav=c-article')
        })
    }

    ExistArticleChange(e) {
        document.location.replace('stock_in.php?nav=s-entry&id=' + e.target.value)
    }


}