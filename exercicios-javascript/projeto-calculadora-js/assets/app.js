const btnNumbers = document.getElementsByClassName('btn-number');
const operators = document.getElementsByClassName('operators'); 
const display = document.querySelector('.display');
const buttons = document.getElementsByClassName('btn');

let arrValoresDisplay = []; 
let valorDisplay;

function imprimirNaTela(event) {
    valorDisplay = document.createElement("span");

    let btnValor = event.target.textContent;
    console.log(btnValor);

    if (btnValor === "C" || btnValor === "CE") {
        display.innerHTML = ""; 
        arrValoresDisplay = [];
    }
    if (btnValor === "=") {
        realizarOperacoes(); 
    }
    if(btnValor === "±") {
        inverterSinal();
        return;
    }
    else {
        valorDisplay.textContent = btnValor; 
        display.appendChild(valorDisplay); 
    }
}

function inverterSinal() {
    
}

function realizarOperacoes() {
    
}

for (let btn of buttons) {
    btn.addEventListener("click", imprimirNaTela)
}
