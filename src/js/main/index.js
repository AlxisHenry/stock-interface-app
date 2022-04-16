import { Users } from "../class/users.class.js";
import { popUp } from "../global/app.js";

window.addEventListener('load', () =>  {

    popUp('clean');

    document.querySelector(".submit-admin-panel").addEventListener('click', () => {
        setTimeout(() => { new Users().Login(); }, 75);
    })

    document.querySelector("#form-pass").addEventListener("keypress",  (e) => {
        if (e.which === 13) {
            document.querySelector(".submit-admin-panel").click();
        }
    })

    document.querySelector("#form-id").addEventListener("keypress", (e) => {
        if (e.which === 13) {
            document.querySelector(".submit-admin-panel").click();
        }
    })

    const Employee = document.querySelector(".redirect-dashboard-user") ? document.querySelector(".redirect-dashboard-user") : document.querySelector(".redirect-dashboard-user-off");

    Employee.addEventListener("click", () => {
        new Users().Employee();
    })

});
