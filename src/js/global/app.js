export function consoleLog(message, type) {
    switch (type) {
        case 's':
            const Success = 'font-size: 15px; color: green; text-decoration: underline;';
            console.log(`%c${message}`,`${Success}`);
            break;
        case 'e':
            const Error = 'font-size: 15px; color: red; text-decoration: underline;';
            console.log(`%c${message}`,`${Error}`);
            break;
        default:
            const Default = 'font-size: 15px; color: white; text-decoration: underline;';
            console.log(`%c${message}`,`${Default}`);
            break;

    }
}

export function popUp(type) {

    const containMessage = document.querySelector('.contain-send-message');

    switch (type) {
        case 'validation':
            containMessage.innerHTML = '';
            containMessage.insertAdjacentHTML( 'beforeEnd', "<div class=\"s-message popup validation-connexion\"> <i class=\"fa-regular fa-pop-up fa-circle-check\"></i> Vous avez été connnecté, redirection en cours.</div>\n");
            SetPopupColor('s', 'rgb(191, 236, 191)');
            break;
        case 'uncompleted-data':
            containMessage.innerHTML = '';
            containMessage.insertAdjacentHTML('beforeEnd',"<div class=\"s-message popup uncompleted-data\"> <i class=\"fa-solid fa-pop-up fa-lock\"></i>Pensez à compléter les différents champs.</div>\n");
            SetPopupColor('e', 'rgb(204, 241, 255)');
            break;
        case 'error-connexion':
            containMessage.innerHTML = '';
            containMessage.insertAdjacentHTML( 'beforeEnd', "<div class=\"s-message popup error-connexion\"><i class=\"fa-solid fa-pop-up fa-xmark\"></i>Tentative de connection échouée.</div>\n");
            SetPopupColor('e', 'rgb(255, 150, 150)');
            break;
        case 'actually-disabled':
            containMessage.innerHTML = '';
            containMessage.insertAdjacentHTML( 'beforeEnd', "<div class=\"s-message popup actually-disabled\"> <i class=\"fa-solid fa-pop-up fa-circle-exclamation\"></i> Navré, cette fonctionnalité est actuellement indisponible.</div>\n");
            SetPopupColor('e', 'rgb(239, 206, 229)');
            break;
        case 'contact-admin':
            containMessage.innerHTML = '';
            containMessage.insertAdjacentHTML( 'beforeEnd', "<div class=\"s-message popup contact-admin\"><i class=\"fa-solid fa-pop-up fa-screwdriver-wrench\"></i>Une panne s'est produite, réssayer plus tard.</div>\n");
            SetPopupColor('e', 'rgb(242, 199, 255)');
            break;
        case 'authorization':
            containMessage.innerHTML = '';
            containMessage.insertAdjacentHTML( 'beforeEnd', "<div class=\"s-message popup authorization\"><i class=\"fa-regular fa-pop-up fa-square-check\"></i>Redirection en cours !</div>\n");
            SetPopupColor('s', 'rgb(80, 221, 255)');
            break;
        case 'success':
            containMessage.innerHTML = '';
            containMessage.insertAdjacentHTML( 'beforeEnd', "<div class=\"s-message popup success\"><i class=\"fa-regular fa-pop-up fa-square-check\"></i>Changement effectué avec succès !</div>\n");
            SetPopupColor('s', 'rgb(80, 221, 255)');
            break;
        case 'clean':
            containMessage.innerHTML = '';
            break;
        default:
            containMessage.innerHTML = '';
            containMessage.insertAdjacentHTML( 'beforeEnd', "<div class=\"s-message popup contact-admin\"><i class=\"fa-solid fa-pop-up fa-screwdriver-wrench\"></i>Une panne s'est produite, réssayer plus tard.</div>\n");
            SetPopupColor('e', 'rgb(242, 199, 255)');
            consoleLog('Default case of Popup function', 'e');
            break;
    }

    setTimeout( () => {

        containMessage.classList.remove('reverseBump');
        containMessage.classList.add('reverseBump');

        setTimeout( () => {  containMessage.innerHTML = ''; containMessage.classList.remove('reverseBump'); }, 400)

    }, 1625);

}

function SetPopupColor(type, color) {

    const PopUp = document.querySelector('.popup');

    PopUp.style.backgroundColor = color;
    PopUp.style.border = `solid ${color}`;

}