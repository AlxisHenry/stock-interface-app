import { UserActionClass } from "./class/user-action.class.js";

$(document).ready(function () {

    //new UserActionClass().AuthorizedView; // Set website-access to employee page

    $(".submit-admin-panel").click(function () {
        new UserActionClass().ConfirmFormInformations();
        new UserActionClass().VerifyUsersPermissions();
        // Manage admin request
    });

    $("#form-pass").on("keypress", function (e) {
        if (e.which == 13) { // Listen 'Enter' key
            $(".submit-admin-panel").click();
            // Manage admin request
        }
    });

    $(".redirect-dashboard-user").click(function () {
        new UserActionClass().AuthorizedView; // Set website-access to employee page
        new UserActionClass().EmployeeViewAccess();
        // Manage employee request
    });

});
