import { popUp } from "../global/popup.js";
import { consoleLog } from "../global/console.log.js";

export class UserAction {
  constructor() {
    this.form = {
      id: document.querySelector("#form-id"),
      pass: document.querySelector("#form-pass"),
    };
    this.id = this.form.id.value;
    this.pass = this.form.pass.value;
    this.confirm_id = "admin";
    this.accessFiles = './src/php/website-access/'
  };

  ConfirmFormData() {
    if (this.id !== this.confirm_id) {
      consoleLog('ConfirmFormData() :: Wrong Username', 'e')
      this.form.id.style.backgroundColor =  "#faceca";
      return false;
    } else if (this.pass.length === 0) {
      consoleLog('ConfirmFormData() :: Uncompleted Password', 'e')
      this.form.pass.style.backgroundColor = "#faceca";
      popUp('uncompleted-password');
      return false;
    } else {
      consoleLog('ConfirmFormData() :: Correct', 's')
      popUp('clean');
      this.form.id.style.backgroundColor = "white";
      this.form.pass.style.backgroundColor = "white";
      return true;
    }
  }

  EmployeeViewAccess() {
    $.ajax({
      type: "POST",
      url: `${this.accessFiles}manage.php`,
      data: { target: 'employee', type: 'access' },
      success: function (server_response) {
        if (server_response === 'false') {
          consoleLog(`Success ajax :: Employee Dashboard status on ${server_response} !`, 's');
          popUp('actually-disabled');
        } else if (server_response === 'true') {
          consoleLog(`Success ajax :: Employee Dashboard status on ${server_response} !`, 's');
          $.ajax({
            type: "POST",
            url: `${this.accessFiles}manage.php`,
            data: { target: 'employee', type: 'logs' },
            success: function (server_response) {
              consoleLog('Update logs. target: employee.', 's');
              popUp('authorization');
              consoleLog('Redirect to dashboard. target: employee.', 's');
              setTimeout(() => {
                document.location.replace('./dashboard.php');
              }, 1725)
            },
            error: function () {
              consoleLog('Update logs failed. target: employee.', 'e');
              popUp('actually-disabled');
            },
          });
        } else {
          consoleLog('Success ajax :: Error during request','e');
          popUp('actually-disabled');
          return null;
        }
      },});
  }

  VerifyUsersPermissions() {
    if (!this.ConfirmFormData()) {
      consoleLog('VerifyUsersPermissions() :: Wrong Form Values', 'e');
      return false;
    }
    $.ajax({
      type: "POST",
      url: `${this.accessFiles}manage-admin-access.php`,
      data: { id: this.id, pass: this.pass },
      success: function (server_response) {
        switch (server_response) {
          case "true":
            $.ajax({
              type: "POST",
              url: `${this.accessFiles}manage.php`,
              data: {target: 'tfadmin', type: 'logs'},
              success: function (server_response) {
                consoleLog('Update logs. target: tfadmin.', 's');
              },
              error: function () {
                consoleLog('Update logs failed. target: tfadmin.', 'e');
              },
            });

            popUp('validation');
            consoleLog('VerifyUsersPermissions() :: Connexion success', 's');
            setTimeout(() => {
              document.location.replace('./admin-panel.php')
            }, 1725);
            break;
          case "false":
            consoleLog('VerifyUsersPermissions() :: Wrong Login Informations', 'e');
            popUp('error-connexion');
            break;
          default:
            consoleLog('VerifyUsersPermissions() :: Back-end Return Error', 'e');
            popUp('contact-admin');
            break;
        }
      },
      error: function () {
        consoleLog('VerifyUsersPermissions() :: Back-end Error', 'e');
        popUp('contact-admin');
      },
    });
  }
}