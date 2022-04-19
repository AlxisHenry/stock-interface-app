import { consoleLog, popUp } from "../global/app.js";

export class Users {

  constructor() {
    this.form = {
      id: document.querySelector("#form-id"),
      pass: document.querySelector("#form-pass"),
    };
    this.id = this.form.id.value;
    this.pass = this.form.pass.value;
    this.valid = "#faceca";
    this.cancel = "white";
  };

  Validity() {
      if (this.pass.length === 0 && this.id.length === 0) {
        this.form.pass.style.backgroundColor = this.valid;
        this.form.id.style.backgroundColor = this.valid;
        popUp('uncompleted-data');
        return false;
      } else if (this.pass.length === 0) {
        consoleLog('ConfirmFormData() :: Uncompleted Password', 'e')
        this.form.id.style.backgroundColor = this.cancel;
        this.form.pass.style.backgroundColor = this.valid;
        popUp('uncompleted-data');
        return false;
      } else if (this.id.length === 0) {
        consoleLog('ConfirmFormData() :: Uncompleted Id', 'e')
        this.form.pass.style.backgroundColor = this.cancel;
        this.form.id.style.backgroundColor = this.valid;
        popUp('uncompleted-data');
        return false;
      } else {
        consoleLog('ConfirmFormData() :: Correct', 's')
        popUp('clean');
        this.form.id.style.backgroundColor = this.cancel;
        this.form.pass.style.backgroundColor = this.cancel;
        return true;
    }
  }

  Login() {
    if (!this.Validity()) {
      consoleLog('VerifyUsersPermissions() :: Wrong Form Values', 'e');
      return false;
    }
    $.ajax({
      type: "POST",
      url: `./src/php/website-access/login.php`,
      data: { target: this.id,
              id: this.id,
              pass: this.pass,
              type: 'login' },
      success: function (login) {
        const LoginInformations = login.includes('bool') ? null : JSON.parse(login);
        console.table(LoginInformations)
        if (LoginInformations === null) {
          consoleLog('VerifyUsersPermissions() :: Wrong Login Informations (LoginInformations === null)', 'e');
          popUp('error-connexion');
          return false;
        }
        switch (LoginInformations[0][1]) {
          case 'true':
            popUp('validation');
            consoleLog('VerifyUsersPermissions() :: Connexion success', 's');
            $.ajax({
              type: "POST",
              url: './src/php/website-access/logs.php',
              data: {
                target: LoginInformations[0][2],
                id: null,
                pass: null,
                type : 'logs',
              },
              success: function () {
                consoleLog('Update logs. target: login.', 's');
                setTimeout(() => {
                  document.querySelector('.redirect-admin').setAttribute('href','./src/php/include/views/dashboard.php?nav=mvmt');
                  document.querySelector('.redirect-admin').click();
                }, 1725);
              }
            })
            break;
          case "disabled":
            popUp('actually-disabled');
            break;
          case "false":
            consoleLog('VerifyUsersPermissions() :: Wrong Login Informations', 'e');
            popUp('error-connexion');
            break;
          default:
            consoleLog('VerifyUsersPermissions() :: Wrong Login Informations', 'e');
            popUp('error-connexion');
            break;
        }
      },
      error: function () {
        consoleLog('VerifyUsersPermissions() :: Back-end Error', 'e');
        popUp('contact-admin');
      },
    });
  }

    Employee() {
      $.ajax({
        type: "POST",
        url: `./src/php/website-access/login.php`,
        data: { target: 'employee',
                id: null,
                pass: null,
                type: 'view' },
        success: function (access) {
          if (access === 'false') {
            consoleLog(`Success ajax :: Employee Dashboard status on ${access} !`, 's');
            popUp('actually-disabled');
          } else if (access === 'true') {
            consoleLog(`Success ajax :: Employee Dashboard status on ${access} !`, 's');
            $.ajax({
              type: "POST",
              url: './src/php/website-access/logs.php',
              data: {
                  target: 'employee',
                  id: null,
                  pass: null,
                  type : 'logs',
              },
              success: function () {
                consoleLog('Update logs. target: employee.', 's');
              }
            })
            popUp('authorization');
            consoleLog('Redirect to dashboard. target: employee.', 's');
            setTimeout(() => {
                  document.querySelector('.redirect-employee-dashboard').setAttribute('href','./src/php/include/views/view.php');
                  document.querySelector('.redirect-employee-dashboard').click();
            }, 1725)
          } else {
            consoleLog('Success ajax :: Error during request','e');
            popUp('actually-disabled');
            return null;
          }
        },});
    }

}