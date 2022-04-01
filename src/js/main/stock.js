import {RemoveLastColumn, ResponsiveColumns} from "../global/app.js";
import { StockActionClass } from "../class/stock-action.class.js";

window.addEventListener('load', () => {

    RemoveLastColumn();
    ResponsiveColumns();

    window.addEventListener('resize', () => {
            ResponsiveColumns();
    })

    document.querySelectorAll('.entry').forEach(Entry => Entry.addEventListener('click', (e) => {
        new StockActionClass().ActionEntry(e);
    }));

    document.querySelectorAll('.checkout').forEach(Entry => Entry.addEventListener('click', (e) => {
        new StockActionClass().ActionCheckout(e);
    }));

    document.querySelectorAll('.edit').forEach(Entry => Entry.addEventListener('click', (e) => {
        new StockActionClass().ActionEdit(e);
    }));


})