import { c_Users } from "../class/configs/c_users.class.js"

window.addEventListener('load', () => {

    new c_Users().InitializePage()

    document.querySelector('.refresh-database').addEventListener('click', () => {
        new c_Users().RefreshDatabase()
    })

})