const btnNumbers = document.getElementsByClassName('btn-number');
const operators = document.getElementsByClassName('operators'); 
const display = document.querySelector('.display');
const buttons = document.getElementsByClassName('btn');

let arrValoresDisplay = []; 
let valorDisplay;

function imprimirNaTela() {
    valorDisplay = document.createElement("span");

    let btnValor = event.target.textContent;
    console.log(btnValor);

    if (btnValor === "C" || btnValor === "CE") {
        display.innerHTML = ""; 
        while(arrValoresDisplay.length) {
            arrValoresDisplay.pop(); 
        }
    }
    else {
        valorDisplay.innerHTML = btnValor; 
    }
    realizarOperacoes(btnValor); 
}

function realizarOperacoes(btnValor) {
    if (btnValor !== "=" && btnValor !== "C" && btnValor !== "CE") {
        display.appendChild(valorDisplay);
        arrValoresDisplay.push(btnValor);
    }
    else {
        display.innerHTML = "";
        let strArray = arrValoresDisplay.join('');
        console.log(strArray); 

        let result = eval(strArray);
        console.log(result);

        //Exclui todos os elementos do array e coloca somente o resultado final
        while(arrValoresDisplay.length) {
            arrValoresDisplay.pop(); 
        }
        arrValoresDisplay.push(result);
        //

        let resultadoFinal = document.createElement("span"); 
        resultadoFinal.textContent = result;
        display.appendChild(resultadoFinal);
    }
}

for (let btn of buttons) {
    btn.addEventListener("click", imprimirNaTela)
}
