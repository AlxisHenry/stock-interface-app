import {consoleLog} from "../global/app.js";

export class StockActionClass {

    constructor() {
    };

    ActionEntry(e) {

        const ParentElement = e.target.parentNode.parentNode;

        const TargetAllElements = ParentElement.childNodes;

        const TakeAllValues = ['entrée'];

        for (let Element = 0; Element < TargetAllElements.length; Element++) {
                TakeAllValues.push(TargetAllElements[Element].innerText);
        }

        console.log(TakeAllValues);

    }

    ActionCheckout(e) {

        const ParentElement = e.target.parentNode.parentNode;

        const TargetAllElements = ParentElement.childNodes;

        const TakeAllValues = ['sortie'];

        for (let Element = 0; Element < TargetAllElements.length; Element++) {
                TakeAllValues.push(TargetAllElements[Element].innerText);
        }

        console.log(TakeAllValues);

    }

    ActionEdit(e) {

        const ParentElement = e.target.parentNode.parentNode;

        const TargetAllElements = ParentElement.childNodes;

        const TakeAllValues = ['edit'];

        for (let Element = 0; Element < TargetAllElements.length; Element++) {
                TakeAllValues.push(TargetAllElements[Element].innerText);
        }

        console.log(TakeAllValues);

    }


}