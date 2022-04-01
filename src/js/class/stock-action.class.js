import {consoleLog} from "../global/app.js";

export class StockActionClass {

    constructor() {
        this.ActionArticleValues = [];
    };

    ActionEntry(e) {

        const ParentElement = e.target.parentNode.parentNode;
        const TargetAllElements = ParentElement.childNodes;
        this.ActionArticleValues.push(e.target.classList[3]);

        for (let Element = 0; Element < TargetAllElements.length; Element++) {
            this.ActionArticleValues.push(TargetAllElements[Element].innerText);
        }

        console.table(this.ActionArticleValues);

    }

    ActionCheckout(e) {

        const ParentElement = e.target.parentNode.parentNode;
        const TargetAllElements = ParentElement.childNodes;
        this.ActionArticleValues.push(e.target.classList[3]);

        for (let Element = 0; Element < TargetAllElements.length; Element++) {
            this.ActionArticleValues.push(TargetAllElements[Element].innerText);
        }

        console.table(this.ActionArticleValues);

    }

    ActionEdit(e) {

        const ParentElement = e.target.parentNode.parentNode;
        const TargetAllElements = ParentElement.childNodes;
        this.ActionArticleValues.push(e.target.classList[3]);

        for (let Element = 0; Element < TargetAllElements.length; Element++) {
            this.ActionArticleValues.push(TargetAllElements[Element].innerText);
        }

        console.table(this.ActionArticleValues);

    }
}