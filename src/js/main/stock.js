import { Stock } from "../class/stock.class.js";

window.addEventListener('load', () => {

    setTimeout( () => {
        new Stock().RemoveLastColumn();
    }, 225);

    document.querySelector('.searchbar').addEventListener('keyup', () => {
        new Stock().NewResearchRequest();
    });

});