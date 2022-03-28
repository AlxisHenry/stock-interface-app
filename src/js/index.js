import { UserAction } from "./class/user-action.class.js";

$(document).ready(function () {

    $(".submit-admin-panel").click(function () {
        setTimeout(() => { new UserAction().VerifyUsersPermissions(); }, 75);
        // Manage admin request
    });

    $("#form-pass").on("keypress", function (e) {
        if (e.which === 13) { // Listen 'Enter' key
            $(".submit-admin-panel").click();
            // Manage admin request
        }
    });

    $(".redirect-dashboard-user").click(function () {
        new UserAction().EmployeeViewAccess();
        // Manage employee request
    });

});
