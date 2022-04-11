import { Switch } from "./switch.class.js";

export class Inputs extends Switch {

    constructor() {
        super();
        this.Eye = '';
        this.Input = '';
        this._dEye = 'fa-eye-slash'
        this._aEye = 'fa-eye';
    }


    DisabledEye(e) {

        this.Eye = e.target;
        this.Input = e.target.parentNode.children[0];

        if (this.Eye.classList.contains(this._dEye)) {
            this.Eye.classList.remove(this._dEye);
            this.Eye.classList.add(this._aEye);
            this.Input.type = 'text';
        } else {
            e.preventDefault();
        }


    }

    ActiveEye(e) {

        this.Eye = e.target;
        this.Input = e.target.parentNode.children[0];

        if (this.Eye.classList.contains(this._aEye)) {
            this.Eye.classList.remove(this._aEye);
            this.Eye.classList.add(this._dEye);
            this.Input.type = 'password';
        } else {
            e.preventDefault();
        }
    }


}