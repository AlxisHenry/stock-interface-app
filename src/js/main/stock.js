import {RemoveLastColumn, ResponsiveColumns} from "../global/app.js";

window.addEventListener('load', () => {
    RemoveLastColumn();

    ResponsiveColumns();

    window.addEventListener('resize', () => {
            ResponsiveColumns();
    })

})