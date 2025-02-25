const btnNumbers = document.getElementsByClassName('btn-number');
const operators = document.getElementsByClassName('operators'); 
const display = document.querySelector('.display');
const buttons = document.getElementsByClassName('btn');

let valorDisplay;
let arrValoresDisplay = []; 

function imprimirNaTela(event) {
    valorDisplay = document.createElement("span");

    let btnValor = event.target.textContent;
    console.log(btnValor);

    if (btnValor === "C" && btnValor === "CE") {
        display.innerHTML = ""; 
        arrValoresDisplay = []; 
        return;
    }
    if (btnValor === "=") {
        realizarOperacoes(); 
        return;
    }
    if(btnValor === "±") {
        inverterSinal();
        return;
    }

    arrValoresDisplay.push(btnValor);
    atualizarDisplay();
}

function atualizarDisplay() {
    display.innerHTML = arrValoresDisplay.join('');
}

function inverterSinal() {
    
}

function realizarOperacoes() {
   
}

for (let btn of buttons) {
    btn.addEventListener("click", imprimirNaTela)
}
