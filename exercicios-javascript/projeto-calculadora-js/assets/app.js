const btnNumbers = document.getElementsByClassName('btn-number');
const operators = document.getElementsByClassName('operators'); 
const display = document.querySelector('.display');
const buttons = document.getElementsByClassName('btn');

let arrValoresDisplay = []; 
let valorDisplay;

function imprimirNaTela() {
    valorDisplay = document.createElement("span"); 
    let btnValor = event.target.textContent;

    valorDisplay.innerHTML = btnValor; 
    realizarOperacoes(btnValor); 
}

function realizarOperacoes(btnValor) {
    if (btnValor !== "=") {
        display.appendChild(valorDisplay);
        arrValoresDisplay.push(btnValor);
    }
    else {
        display.innerHTML = "";
        let strArray = arrValoresDisplay.join('');
        console.log(strArray); 

        let result = eval(strArray);
        console.log(result);

        let resultadoFinal = document.createElement("span"); 
        resultadoFinal.textContent = result;
        display.appendChild(resultadoFinal);
    }
}

for (let btn of buttons) {
    btn.addEventListener("click", imprimirNaTela)
}
