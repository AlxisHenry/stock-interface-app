import {consoleLog, popUp} from "../../global/app.js";
import {Stock} from "../stock.class.js";

export class stock_out extends Stock {

    constructor() {
        super()
    }

    CheckoutToAnotherArticle() {
        console.log("Global event redirect to all others articles")
        document.querySelector('.new').addEventListener('click', () => {
            location.replace('stock.php?nav=visu')
        })
    }




}