import { Users } from "../class/users.class.js";
import { popUp } from "../global/app.js";

window.addEventListener('load', () =>  {

    popUp('clean');

    document.querySelector(".submit-admin-panel").addEventListener('click', () => {
        setTimeout(() => { new Users().VerifyUsersPermissions(); }, 75);
    });

    document.querySelector("#form-pass").addEventListener("keypress",  (e) => {
        if (e.which === 13) {
            document.querySelector(".submit-admin-panel").click();
        }
    });

    document.querySelector("#form-id").addEventListener("keypress", (e) => {
        if (e.which === 13) {
            document.querySelector(".submit-admin-panel").click();
        }
    })

    const Employee_Redirection = document.querySelector(".redirect-dashboard-user") ? document.querySelector(".redirect-dashboard-user") : document.querySelector(".redirect-dashboard-user-off")

    Employee_Redirection.addEventListener("click", () => {
        new Users().EmployeeViewAccess();
    });


});
