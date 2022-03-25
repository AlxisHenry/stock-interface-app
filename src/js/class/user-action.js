import { popUp } from "../global/popup.js"
import { consoleLog } from "../global/console.log.js";

export class UserAction {
  constructor() {
    this.form = {
      id: $("#form-id"),
      pass: $("#form-pass"),
    };
    this.id = this.form.id[0].placeholder;
    this.pass = this.form.pass.val();
    this.confirm_id = "admin";
    this.AuthorizedView = $.ajax({
      type: "GET",
      url: "./website-access/view_access.php",
      data: { condition: "employee" },
      success: function (server_response) {
        if (server_response === 'false') {
          consoleLog(`Success ajax :: Employee Dashboard status on ${server_response} !`);
          return false;
        } else if (server_response === 'true') {
          consoleLog(`Success ajax :: Employee Dashboard status on ${server_response} !`);
          return true;
        } else {
          consoleLog('Request error');
          return undefined;
        }
      },
      error: function () {
        consoleLog("Ajax error : can't initialize authorized view for employee");
      },
    });
  };

  ConfirmFormInformations() {
    if (this.id !== this.confirm_id) {
      this.form.id.css("background-color", "#faceca");
      return false;
    } else if (this.pass.length === 0) {
      this.form.pass.css("background-color", "#faceca");
      popUp('error-connexion');
      return false;
    } else {
      popUp('clean');
      this.form.id.css("background-color", "white");
      this.form.pass.css("background-color", "white");
      return true;
    }
  }

  EmployeeViewAccess() {
    if (this.AuthorizedView) {

      //todo Update employee logs:
      $.ajax({
        type: "POST",
        url: "./website-access/update_access_logs.php",
        data: { target: 'employee', type: 'logs' },
        success: function (server_response) {
          consoleLog('Update logs table. target: employee.');
        },
        error: function () {
          consoleLog('Error during update of logs. target: employee.');
          },
      });

      popUp('authorization');
      consoleLog('Redirect to dashboard. target: employee.');
      setTimeout(() => {
        document.location.replace('./dashboard.php')
      }, 1725)

    } else {
      popUp('features-incoming');
      return false;
    }
  }

  VerifyUsersPermissions() {
    if (!this.ConfirmFormInformations()) {
      return false;
    }
    $.ajax({
      type: "GET",
      url: "./website-access/admin_access.php",
      data: { id: this.id, pass: this.pass },
      success: function (server_response) {
        switch (server_response) {
          case "true":
            $.ajax({
              type: "POST",
              url: "./website-access/update_access_logs.php",
              data: {target: 'tfadmin', type: 'logs'},
              success: function (server_response) {
                consoleLog('Update logs table. target: tfadmin.');
              },
              error: function () {
                consoleLog('Error during update of logs. target: tfadmin.');
              },
            });

            popUp('validation');
            consoleLog('Connection réussie.');
            setTimeout(() => {
              document.location.replace('./admin-panel.php')
            }, 1725);
            break;
          case "false":
            consoleLog('Informations incorrectes');
            popUp('error-connexion');
            break;
          default:
            consoleLog('Erreur de return lors de la requête Ajax.');
            popUp('contact-admin');
            break;
        }
      },
      error: function () {
        consoleLog('Erreur lors de la tentative de connection');
        popUp('contact-admin');
      },
    });
  }
}