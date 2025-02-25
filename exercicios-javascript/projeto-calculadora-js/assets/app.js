const operators = document.getElementsByClassName('operators');
const display = document.querySelector('.display');
const buttons = document.getElementsByClassName('btn');

var arrValoresDisplay = [];

function clicarBotoesCalculadora(event) {
    btnValor = event.target.textContent;

    if (btnValor === "C" || btnValor === "CE") {
        limparDisplay();
        return;
    }
    if (btnValor === "=") {
        realizarOperacoes();
        return;
    }
    if (btnValor === "±") {
        inverterSinal();
        return;
    }
    if (btnValor === "«") {
        removerCaracter();
        return;
    }

    arrValoresDisplay.push(btnValor);
    console.log(arrValoresDisplay);

    //transformarEmPontoFlutuante(); 
    atualizarDisplay();
}

function atualizarDisplay() {
    display.innerHTML = arrValoresDisplay.join('');
}

function removerCaracter() {
    arrValoresDisplay.pop();
    atualizarDisplay();
}

/*
function transformarEmPontoFlutuante() {
    if (arrValoresDisplay.includes(',')) {
        let valorDisplay = arrValoresDisplay.join(''); 
        valorDisplay = parseFloat(valorDisplay.replace(',', '.'));

        arrValoresDisplay = [valorDisplay]; 
    }
    atualizarDisplay(); 
}
*/

function validarOperacoes() {
    let i = arrValoresDisplay.indexOf('/');
    let aux = arrValoresDisplay.indexOf('0');

    if (aux === i + 1) {
        display.innerHTML = "Error";
        arrValoresDisplay = []; 
        return false;
    }

    return true;
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
    if (validarOperacoes()) {
        let resultadoExpressao = eval(arrValoresDisplay.join(''));

        while (arrValoresDisplay.length) {
            arrValoresDisplay.pop();
        }

        arrValoresDisplay.push(resultadoExpressao);
        display.innerHTML = resultadoExpressao;
    }
}

for (let btn of buttons) {
    btn.addEventListener("click", clicarBotoesCalculadora)
}
