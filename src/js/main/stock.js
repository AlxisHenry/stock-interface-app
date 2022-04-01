import { Stock } from "../class/stock-action.class.js";

window.addEventListener('load', () => {

    new Stock().RemoveLastColumn();
    new Stock().ResponsiveColumns();
    new Stock().InitializeStockTitles();

    window.addEventListener('resize', () => {
        new Stock().ResponsiveColumns();
    })

    document.querySelectorAll('.entry').forEach(Entry => Entry.addEventListener('click', (e) => {
        new Stock().ActionEntry(e);
    }));

    document.querySelectorAll('.checkout').forEach(Entry => Entry.addEventListener('click', (e) => {
        new Stock().ActionCheckout(e);
    }));

    document.querySelectorAll('.edit').forEach(Entry => Entry.addEventListener('click', (e) => {
        new Stock().ActionEdit(e);
    }));


})