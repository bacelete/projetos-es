const btnNumbers = document.getElementsByClassName('btn-number');
const operators = document.getElementsByClassName('operators'); 
const display = document.querySelector('.display');
const buttons = document.getElementsByClassName('btn');

let valorDisplay;
let arrValoresDisplay = []; 

function imprimirNaTela(event) {
    valorDisplay = document.createElement("span");

    let btnValor = event.target.textContent;

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
    console.log(display.innerHTML);
}

function inverterSinal() {
    
}

function realizarOperacoes() {
    let resultadoExpressao = eval(arrValoresDisplay.join(''));

    while(arrValoresDisplay.length) {
        arrValoresDisplay.pop();
    }
    
    arrValoresDisplay.push(resultadoExpressao);
    display.innerHTML = resultadoExpressao;
}

for (let btn of buttons) {
    btn.addEventListener("click", imprimirNaTela)
}
