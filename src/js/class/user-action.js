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
      url: "./stock-interface-app/website-access/view_access.php",
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
        $(".features-incomming").addClass("d-none");
        $(".uncompleted-password").addClass("d-none");
        $(".validation-connexion").addClass("d-none");
        $(".error-connexion").addClass("d-none");
        $(".authorization").addClass("d-none");
        $(".contact-admin").removeClass("d-none");
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
      $(".validation-connexion").addClass("d-none");
      $(".error-connexion").addClass("d-none");
      $(".features-incomming").addClass("d-none");
      $(".contact-admin").addClass("d-none");
      $(".authorization").addClass("d-none");
      $(".uncompleted-password").removeClass("d-none");
      return false;
    } else {
      $(".uncompleted-password").addClass("d-none");
      this.form.id.css("background-color", "white");
      this.form.pass.css("background-color", "white");
      return true;
    }
  }

  EmployeeViewAccess() {
    if (this.AuthorizedView) {
      $(".error-connexion").addClass("d-none");
      $(".uncompleted-password").addClass("d-none");
      $(".contact-admin").addClass("d-none");
      $(".features-incomming").addClass("d-none");
      $(".validation-connexion").addClass("d-none");
      $(".authorization").removeClass("d-none");
      $.ajax({
        type: "POST",
        url: "update_access_logs.php",
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
      $(".validation-connexion").addClass("d-none");
      $(".error-connexion").addClass("d-none");
      $(".uncompleted-password").addClass("d-none");
      $(".contact-admin").addClass("d-none");
      $(".authorization").addClass("d-none");
      $(".features-incomming").removeClass("d-none");
      return false;
    }
  }

  VerifyUsersPermissions() {
    if (!this.ConfirmFormInformations()) {
      return false;
    }
    $.ajax({
      type: "GET",
      url: "admin_access.php",
      data: { id: this.id, pass: this.pass },
      success: function (server_response) {
        if (server_response == true) {
          $(".error-connexion").addClass("d-none");
          $(".features-incomming").addClass("d-none");
          $(".uncompleted-password").addClass("d-none");
          $(".contact-admin").addClass("d-none");
          $(".authorization").addClass("d-none");
          $(".validation-connexion").removeClass("d-none");

           setTimeout(() => {
             document.location.replace('./admin-panel.php')
           }, 1725);

        } else if (server_response == false) {
          $(".features-incomming").addClass("d-none");
          $(".uncompleted-password").addClass("d-none");
          $(".validation-connexion").addClass("d-none");
          $(".contact-admin").addClass("d-none");
          $(".authorization").addClass("d-none");
          $(".error-connexion").removeClass("d-none");
        } else {
          $(".features-incomming").addClass("d-none");
          $(".uncompleted-password").addClass("d-none");
          $(".validation-connexion").addClass("d-none");
          $(".error-connexion").addClass("d-none");
          $(".authorization").addClass("d-none");
          $(".contact-admin").removeClass("d-none");
        }
      },
      error: function () {
        $(".features-incomming").addClass("d-none");
        $(".uncompleted-password").addClass("d-none");
        $(".validation-connexion").addClass("d-none");
        $(".error-connexion").addClass("d-none");
        $(".authorization").addClass("d-none");
        $(".contact-admin").removeClass("d-none");
      },
    });
  }
}