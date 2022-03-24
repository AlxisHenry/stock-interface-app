import { popUp } from "../global/popup.js"

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
          console.log("%cSuccess ajax :: Employee Dashboard status on " + server_response,'font-size:15px;');
          return false;
        } else if (server_response === 'true') {
          console.log("%cSuccess ajax :: Employee Dashboard status on " + server_response,'font-size:15px;');
          return true;
        } else {
          console.log('%Request error','font-size:15px;');
          return undefined;
        }
      },
      error: function () {
        console.log("%cAjax error : can't initialize authorized view for employee",'font-size:15px;');
      },
    });
  };

//todo >> Les messages d'erreurs seront à implémenter dynamiquement.

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
      popUp('authorization');
      $.ajax({
        type: "POST",
        url: "./website-access/update_access_logs.php",
        data: { target: 'employee', type: 'logs' },
        success: function (server_response) {
              if (server_response == 'true') {
                  console.log('%cUpdate logs table with success.','font-size:15px;')
              } else {
                  console.log('%cError during update of logs.','font-size:15px;')
              }
          },
        error: function () {

          },
      });
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
        if (server_response == true) {
           popUp('validation');

           setTimeout(() => {
             document.location.replace('./admin-panel.php')
           }, 1725);

        } else if (server_response == false) {
          popUp('error-connexion');
        } else {
          popUp('contact-admin');
        }
      },
      error: function () {
        popUp('contact-admin');
      },
    });
  }
}