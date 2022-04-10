import { Users } from "../class/users.class.js";
import { popUp } from "../global/app.js";

// TODO : À terme exclure jQuery, changer les requêtes ajax par fetch ?

window.addEventListener('load', () =>  {

    popUp('clean');

    document.querySelector(".submit-admin-panel").addEventListener('click', () => {
        setTimeout(() => { new Users().VerifyUsersPermissions(); }, 75);
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
        new Users().EmployeeViewAccess();
        // Manage employee request
    });

});
