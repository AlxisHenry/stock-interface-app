import { UserAction } from "./class/user-action.js";

$(document).ready(function () {

    new UserAction().AuthorizedView; // Set website-access to employee page

    $(".submit-admin-panel").click(function () {
        new UserAction().ConfirmFormInformations();
        new UserAction().VerifyUsersPermissions();
        // Manage admin request
    });

    $("#form-pass").on("keypress", function (e) {
        if (e.which == 13) { // Search 'Enter' key
            new UserAction().ConfirmFormInformations();
            new UserAction().VerifyUsersPermissions();
            // Manage admin request
        }
    });

    $(".redirect-dashboard-user").click(function () {
        new UserAction().EmployeeViewAccess();
        // Manage employee request
    });

});
