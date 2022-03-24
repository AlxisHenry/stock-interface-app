export function popUp(type) {

    const containMessage = document.querySelector('.contain-send-message');

    switch (type) {
        case 'validation':
            containMessage.innerHTML = '';
            containMessage.insertAdjacentHTML( 'beforeEnd', "<div class=\"s-message validation-connexion\"> <i class=\"fa-regular fa-circle-check\"></i> Vous avez été connnecté, redirection en cours.</div>\n");
            break;
        case 'uncompleted-password':
            containMessage.html = '';
            containMessage.insertAdjacentHTML('beforeEnd',"<div class=\"s-message uncompleted-password\"> <i class=\"fa-solid fa-lock\"></i> Pensez à entrer votre mot de passe.</div>\n");
            break;
        case 'error-connexion':
            containMessage.innerHTML = '';
            containMessage.insertAdjacentHTML( 'beforeEnd', "<div class=\"s-message error-connexion\"><i class=\"fa-solid fa-xmark\"></i>Tentative de connection échouée.</div>\n");
            break;
        case 'features-incoming':
            containMessage.innerHTML = '';
            containMessage.insertAdjacentHTML( 'beforeEnd', "<div class=\"s-message features-incoming\"> <i class=\"fa-solid fa-circle-exclamation\"></i> Navré, cette fonctionnalité n'est pas encore disponible.</div>\n");
            break;
        case 'contact-admin':
            containMessage.innerHTML = '';
            containMessage.insertAdjacentHTML( 'beforeEnd', "<div class=\"s-message contact-admin\"><i class=\"fa-solid fa-screwdriver-wrench\"></i>Une panne s'est produite, réssayer plus tard.</div>\n");
            break;
        case 'authorization':
            containMessage.innerHTML = '';
            containMessage.insertAdjacentHTML( 'beforeEnd', "<div class=\"s-message authorization\"><i class=\"fa-regular fa-square-check\"></i>Redirection en cours !</div>\n");
            break;
        default:
            containMessage.innerHTML = '';
            break;
    }
}