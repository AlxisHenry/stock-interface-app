import {consoleLog} from "../global/app.js";

export class Stock {

    constructor() {
        this.ActionArticleValues = [];
        this.ParentElement = '';
    };

    InitializeStockTitles() {

       const ActionNodeList = [document.querySelectorAll('.entry'), document.querySelectorAll('.checkout'),  document.querySelectorAll('.edit')]

        ActionNodeList.forEach(ActionType =>
            ActionType.forEach(Action => {
                Action.addEventListener('mouseover', (e) => {
                    switch (e.target.classList[3]) {
                        case 'entry':
                            this.ActionArticleValues = [];
                            this.ParentElement = e.target.parentNode.parentNode;
                            for (let Element = 0; Element < this.ParentElement.childNodes.length; Element++) {
                                this.ActionArticleValues.push(this.ParentElement.childNodes[Element].innerText);
                            }
                            e.target.title = 'Entrée de stock pour ' + this.ActionArticleValues[2];
                            break;
                        case 'checkout':
                            this.ActionArticleValues = [];
                            this.ParentElement = e.target.parentNode.parentNode;
                            for (let Element = 0; Element < this.ParentElement.childNodes.length; Element++) {
                                this.ActionArticleValues.push(this.ParentElement.childNodes[Element].innerText);
                            }
                            e.target.title = 'Sortie de stock pour ' + this.ActionArticleValues[2];
                            break;
                        case 'edit':
                            this.ActionArticleValues = [];
                            this.ParentElement = e.target.parentNode.parentNode;
                            for (let Element = 0; Element < this.ParentElement.childNodes.length; Element++) {
                                this.ActionArticleValues.push(this.ParentElement.childNodes[Element].innerText);
                            }
                            e.target.title = 'Editer ' + this.ActionArticleValues[2];
                            break;
                        default:
                            e.target.title = 'Gestion du stock de cet article';
                    }
                });
            })
        );
    }


    ActionEntry(e) {

        this.ActionArticleValues = [];
        this.ParentElement = e.target.parentNode.parentNode;
        for (let Element = 0; Element < this.ParentElement.childNodes.length; Element++) {
            this.ActionArticleValues.push(this.ParentElement.childNodes[Element].innerText);
        }

        console.table(this.ActionArticleValues);

    }

    ActionCheckout(e) {

        this.ActionArticleValues = [];
        this.ParentElement = e.target.parentNode.parentNode;
        for (let Element = 0; Element < this.ParentElement.childNodes.length; Element++) {
            this.ActionArticleValues.push(this.ParentElement.childNodes[Element].innerText);
        }

        console.table(this.ActionArticleValues);

    }

    ActionEdit(e) {

        this.ActionArticleValues = [];
        this.ParentElement = e.target.parentNode.parentNode;
        for (let Element = 0; Element < this.ParentElement.childNodes.length; Element++) {
            this.ActionArticleValues.push(this.ParentElement.childNodes[Element].innerText);
        }

        console.table(this.ActionArticleValues);

    }

    ResponsiveColumns() {

        const AllTableTitles = document.querySelectorAll('.column-title');

        AllTableTitles.forEach(Title => {
            switch (Title.innerHTML) {
                case 'Dernière modification':
                    RemoveColumns(Title, 1450);
                    break;
                case 'Commentaire':
                    RemoveColumns(Title, 1450);
                    break;
                case 'Numéro':
                    RemoveColumns(Title, 1450);
                    break;
                case 'Famille':
                    RemoveColumns(Title, 1450);
                    break;
                case 'Code':
                    RemoveColumns(Title, 900);
                    break;
                case 'Localisation':
                    RemoveColumns(Title, 900);
                    break;
            }
        })

        function RemoveColumns(value, step) {
            if(window.matchMedia("(max-width:"+ step +"px)").matches) {
                document.querySelectorAll(`.${value.classList[0]}`).forEach(Value => {
                    Value.classList.add('d-none');
                })
            } else {
                document.querySelectorAll(`.${value.classList[0]}`).forEach(Value => {
                    Value.classList.remove('d-none');
                })
            }
        }

    }

    RemoveLastColumn() {
        const AllColumns = document.querySelectorAll('.row-values');
        AllColumns[AllColumns.length -1].remove();
    }


}