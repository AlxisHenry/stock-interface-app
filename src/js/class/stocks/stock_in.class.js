import {consoleLog, popUp} from "../../global/app.js";
import {Stock} from "../stock.class.js";

export class stock_in extends Stock {

    constructor() {
        super()
    }

    EntryToNewArticle() {
        console.log("Global event")
        document.querySelector('.new').addEventListener('click', () => {
            location.replace('config-articles.php?nav=c-article')
        })
    }


}