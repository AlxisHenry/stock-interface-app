import { UserAction } from "./class/user-action.class.js";
import { popUp } from "./global/app.js";

window.addEventListener('load', () =>  {

    popUp('clean');

    document.querySelector(".submit-admin-panel").addEventListener('click', () => {
        setTimeout(() => { new UserAction().VerifyUsersPermissions(); }, 75);
        // Manage admin request
    });

    document.querySelector("#form-pass").addEventListener("keypress",  (e) => {
        if (e.which === 13) { // Listen 'Enter' key
            document.querySelector(".submit-admin-panel").click();
            // Manage admin request
        }
    });

    document.querySelector("#form-id").addEventListener("keypress", (e) => {
        if (e.which === 13) { // Listen 'Enter' key
            document.querySelector(".submit-admin-panel").click();
            // Manage admin request
        }
    })

    document.querySelector(".redirect-dashboard-user").addEventListener("click", () => {
        new UserAction().EmployeeViewAccess();
        // Manage employee request
    });

});
