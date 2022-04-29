import { c_Users } from "../class/configs/c_users.class.js"

window.addEventListener('load', () => {

    new c_Users().InitializePage()

    new c_Users().InitializeBar()

    document.querySelector('.refresh-database').addEventListener('click', () => {
        new c_Users().RefreshDatabase()
    })

    if (document.querySelector('.user-searchbar-input')) {
        document.querySelector('.user-searchbar-input').addEventListener('keyup', (e) => {
            new c_Users().Research(e)
        })
    }
})