class UserAction {
  constructor() {
    this.form = {
      id: $("#form-id"),
      pass: $("#form-pass"),
    };
    //// On considère que le compte admin est tfadmin (mais les visiteurs ne voient pas le réel compte (placholder => admin)) on rajoutera en backend le 'tf'
    this.id = this.form.id[0].placeholder;
    this.pass = this.form.pass.val();
    this.confirm_id = "admin";
    //   this.AuthorizedView est une variable liée au back-end qui récupère une information
    this.AuthorizedView = $.ajax({
      type: "GET",
      url: "view_access.php",
      data: { condition: "employee" },
      success: function (server_response) {
        if (server_response == 'false') {
          return false;
          console.log("success ajax " + server_response);
        } else if (server_response == 'true') {
          return true;
          console.log("success ajax " + server_response);
        } else {
          return undefined;
          console.log('Erreur requête');
        }
      },
      error: function () {
        $(".features-incomming").addClass("d-none");
        $(".uncompleted-password").addClass("d-none");
        $(".validation-connexion").addClass("d-none");
        $(".error-connexion").addClass("d-none");
        $(".authorization").addClass("d-none");
        $(".contact-admin").removeClass("d-none");
        console.log("Ajax error : can't initialize authorized view for employee");
      },
    });
  };

// Les messages d'erreurs seront à éxécuter dynamiquement (et non jouer avec les classes)
  ConfirmFormInformations() {
    if (this.id != this.confirm_id) {
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
        url: "update_logs.php",
        data: { session: 'employee',  },
        success: function (server_response) {

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
      url: "test.php",
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
             // Renvoi l'utilisateur vers le pannel admin
             document.location.replace('./admin-panel.php')
           }, 1725);

        } else if (server_response == false) {
          $(".features-incomming").addClass("d-none");
          $(".uncompleted-password").addClass("d-none");
          $(".validation-connexion").addClass("d-none");
          $(".contact-admin").addClass("d-none");
          $(".authorization").addClass("d-none");
          $(".error-connexion").removeClass("d-none");
          // setTimeout(() => {
          //   $(".error-connexion").addClass("d-none");
          // }, 3500);
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

$(document).ready(function () {
  $(".submit-admin-panel").click(function () {
    new UserAction().ConfirmFormInformations();
    new UserAction().VerifyUsersPermissions();
  });
  $("#form-pass").on("keypress", function (e) {
    if (e.which == 13) {
      new UserAction().ConfirmFormInformations();
      new UserAction().VerifyUsersPermissions();
    }
  });
  $(".redirect-dashboard-user").click(function () {
    new UserAction().EmployeeViewAccess();
  });
});
