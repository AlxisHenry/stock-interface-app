import { Stock } from "../class/stock.class.js";

window.addEventListener('load', () => {

    setTimeout( () => {
        new Stock().RemoveLastColumn();
    }, 225);

    console.log('Abc')
    new Stock().InitializeStockTitles();

    document.querySelectorAll('.entry').forEach(Entry => Entry.addEventListener('click', (e) => {
        new Stock().ActionEntry(e);
    }));

    document.querySelectorAll('.checkout').forEach(Entry => Entry.addEventListener('click', (e) => {
        new Stock().ActionCheckout(e);
    }));

    document.querySelectorAll('.edit').forEach(Entry => Entry.addEventListener('click', (e) => {
        new Stock().ActionEdit(e);
    }));

    document.querySelector('.searchbar').addEventListener('keyup', () => {
        new Stock().NewResearchRequest();
        //new Stock().ResponsiveColumns();
    });

});