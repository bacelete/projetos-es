const operators = document.getElementsByClassName('operators');
const display = document.querySelector('.display');
const buttons = document.getElementsByClassName('btn');
const QTD_MAX_DIGITOS = 12;

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

    atualizarDisplay();
}

function atualizarDisplay() {
    if (arrValoresDisplay.length < QTD_MAX_DIGITOS) {
        display.innerHTML = arrValoresDisplay.join('').replace(',', '.');
    }
}

function removerCaracter() {
    arrValoresDisplay.pop();
    atualizarDisplay();
}

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
    arrValoresDisplay = [];
    arrValoresDisplay.push(display.innerHTML * (-1));

    atualizarDisplay(); 
}

function limparDisplay() {
    arrValoresDisplay = [];
    display.innerHTML = 0;
}

function realizarOperacoes() {
    if (validarOperacoes()) {
        let resultado = eval(arrValoresDisplay.join('').replace(',', '.'));

        while (arrValoresDisplay.length) {
            arrValoresDisplay.pop();
        }

        arrValoresDisplay.push(resultado);
        atualizarDisplay(); 
    }
}

for (let btn of buttons) {
    btn.addEventListener("click", clicarBotoesCalculadora)
}
