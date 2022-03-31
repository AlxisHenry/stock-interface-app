import { popUp, consoleLog } from "../global/app.js";

export class UserAction {
  constructor() {
    this.form = {
      id: document.querySelector("#form-id"),
      pass: document.querySelector("#form-pass"),
    };
    this.id = this.form.id.value;
    this.pass = this.form.pass.value;
  };

  ConfirmFormData() {

      if (this.pass.length === 0 && this.id.length === 0) {
        this.form.pass.style.backgroundColor = "#faceca";
        this.form.id.style.backgroundColor = "#faceca";
        popUp('uncompleted-data');
        return false;
      } else if (this.pass.length === 0) {
        consoleLog('ConfirmFormData() :: Uncompleted Password', 'e')
        this.form.pass.style.backgroundColor = "#faceca";
        popUp('uncompleted-data');
        return false;
      } else if (this.id.length === 0) {
        consoleLog('ConfirmFormData() :: Uncompleted Id', 'e')
        this.form.id.style.backgroundColor = "#faceca";
        popUp('uncompleted-data');
        return false;
      } else {
        consoleLog('ConfirmFormData() :: Correct', 's')
        popUp('clean');
        this.form.id.style.backgroundColor = "white";
        this.form.pass.style.backgroundColor = "white";
        return true;
    }
  }

  VerifyUsersPermissions() {
    if (!this.ConfirmFormData()) {
      consoleLog('VerifyUsersPermissions() :: Wrong Form Values', 'e');
      return false;
    }
    $.ajax({
      type: "POST",
      url: `./src/php/website-access/manage-admin-access.php`,
      data: {id: this.id, pass: this.pass},
      success: function (server_response) {
        switch (server_response) {
          case "true":
            $.ajax({
              type: "POST",
              url: `./src/php/website-access/manage.php`,
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
              document.querySelector('.redirect-admin').setAttribute('href','./src/php/include/views/dashboard.php?nav=mvmt');
              document.querySelector('.redirect-admin').click();
            }, 1725);
            break;
          case "false":
            consoleLog('VerifyUsersPermissions() :: Wrong Login Informations', 'e');
            popUp('error-connexion');
            break;
          case "employee-access":
            $.ajax({
              type: "POST",
              url: `./src/php/website-access/manage.php`,
              data: { target: 'employee', type: 'access' },
              success: function (server_response) {
                if (server_response === 'false') {
                  consoleLog(`Success ajax :: Employee Dashboard status on ${server_response} !`, 's');
                  popUp('actually-disabled');
                } else if (server_response === 'true') {
                  consoleLog(`Success ajax :: Employee Dashboard status on ${server_response} !`, 's');
                  $.ajax({
                    type: "POST",
                    url: `./src/php/website-access/manage.php`,
                    data: { target: 'employee', type: 'logs' },
                    success: function (server_response) {
                      consoleLog('Update logs. target: employee.', 's');
                      popUp('authorization');
                      consoleLog('Redirect to dashboard. target: employee.', 's');
                      setTimeout(() => {
                        document.querySelector('.redirect-employee-dashboard').setAttribute('href','./src/php/include/views/view.php');
                        document.querySelector('.redirect-employee-dashboard').click();
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

    EmployeeViewAccess() {
      $.ajax({
        type: "POST",
        url: `./src/php/website-access/manage.php`,
        data: { target: 'employee', type: 'access' },
        success: function (server_response) {
          if (server_response === 'false') {
            consoleLog(`Success ajax :: Employee Dashboard status on ${server_response} !`, 's');
            popUp('actually-disabled');
          } else if (server_response === 'true') {
            consoleLog(`Success ajax :: Employee Dashboard status on ${server_response} !`, 's');
            $.ajax({
              type: "POST",
              url: `./src/php/website-access/manage.php`,
              data: { target: 'employee', type: 'logs' },
              success: function (server_response) {
                consoleLog('Update logs. target: employee.', 's');
                popUp('authorization');
                consoleLog('Redirect to dashboard. target: employee.', 's');
                setTimeout(() => {
                  document.querySelector('.redirect-employee-dashboard').setAttribute('href','./src/php/include/views/view.php');
                  document.querySelector('.redirect-employee-dashboard').click();
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

}