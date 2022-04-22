<div class=" form-container">

    <div class="card-body">

        <h3 class="card-title">TIMKEN</h3>

        <div class="md-form">
            <i class="fa fa-user"></i>
            <input type="text" id="form-id" class="form-control"  value="tfadmin">
            <label for="form-id">Votre identifiant</label>
        </div>

        <div class="md-form">
            <i class="fa fa-lock fa-password"></i>
            <input type="password" id="form-pass" class="form-control">
            <label for="form-pass">Votre mot de passe</label>
        </div>

        <div class="caps-lock-indicator">Touche <span> MAJ </span> activée.</div>

        <a class="redirect-admin">
            <button type="submit" class="btn btn-primary submit-admin-panel">Me connecter</button>
        </a>

    </div>


    <div class="employee-session">

        <div class="redirect-employee">Vous travaillez ici ?
            <a class="redirect-employee-dashboard">
                <i data-id="2" data-comment="employee-access" class="<?= Front_OBJECT_('2', 'id')->getState() ? "redirect-dashboard-user" : "redirect-dashboard-user-off" ?> fa fa-solid fa-arrow-right-from-bracket"></i>
            </a>
        </div>

    </div>

</div>