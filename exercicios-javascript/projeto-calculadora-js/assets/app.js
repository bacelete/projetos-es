const operators = document.getElementsByClassName('operators'); 
const display = document.querySelector('.display');
const buttons = document.getElementsByClassName('btn');

let arrValoresDisplay = []; 

function imprimirNaTela(event) {
    let btnValor = event.target.textContent;

    if (btnValor === "C" || btnValor === "CE") {
        limparDisplay(); 
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
    if (btnValor === "«") {
        removerCaracter();
        return;
    }

    arrValoresDisplay.push(btnValor);
    console.log(arrValoresDisplay);
    atualizarDisplay();
}

function atualizarDisplay() {
    display.innerHTML = arrValoresDisplay.join('');
}

function removerCaracter() {
    arrValoresDisplay.pop();
    atualizarDisplay(); 
}

function inverterSinal() {
    display.innerHTML = (-1) * display.innerHTML;
    arrValoresDisplay.pop();
    arrValoresDisplay.push(display.innerHTML);
}

function limparDisplay() { 
    arrValoresDisplay = [];
    display.innerHTML = 0;
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
