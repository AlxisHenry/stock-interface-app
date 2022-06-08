import {consoleLog, popUp, popUpCustom} from "../../global/app.js";
import {Stock} from "../stock.class.js";

export class stock_out extends Stock {

    constructor() {
        super()
    }

    Submit(tabularData) {

        const values = {
            article: document.querySelector('.article-name-select').dataset.art,
            cc: document.querySelector('.ccout-target').value,
            qty: document.querySelector('.article-quantity-to-add').value,
            order: document.querySelector('.command-order').value,
            commentary: document.querySelector('.about-entry').value
        }

        let CheckNegative = values.qty.toLocaleString()

        if (!values.article || !values.qty) {
            popUp('uncompleted-data')
            return false
        } else if (isNaN(values.qty)) {
            popUp('invalid-quantity')
            return false
        } else if (CheckNegative.includes('-')) {
            popUpCustom('error-signe', `Ne pas insérer de signe -  dans la quantité`, 's', 'rgb(203,78,105)')
            return false
        }

        console.log(values)

        $.ajax({
            type: "POST",
            url: `../../ajax/stock-action.php`,
            data: { values: values, type: 'out' },
            success: (re) => {
                let Status = JSON.parse(re)[3]
                let RestQuantity = JSON.parse(re)[1] === 0 ? "d'articles" : `que ${JSON.parse(re)[1]} article(s)`
                let Name = JSON.parse(re)[0]
                console.table(re)
                console.log(Status, RestQuantity, Name)
                if (Status) {
                    popUp('in/out-done')
                } else {
                    popUpCustom('error-checkout', `${Name}, n'a plus ${RestQuantity} disponible(s).`, 's', 'rgb(255,78,120)')
                }
            },
            error: (err) => {
                popUp('contact-admin')
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
            location.replace('stock_out.php?nav=s-entry')
        }

    }

    Clear() {
        console.log('Clear');
        document.location.replace('stock_out.php?nav=s-checkout');
    }

    CheckoutToAnotherArticle() {
        console.log("Global event")
        document.querySelector('.new').addEventListener('click', () => {
            location.replace('stock.php?nav=visu')
        })
    }

    ExistArticleChange(e) {
        document.location.replace('stock_out.php?nav=s-checkout&id=' + e.target.value)
    }


}