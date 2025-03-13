const display = document.querySelector('.display');
const buttons = document.getElementsByClassName('btn');
const QTD_MAX_DIGITOS = 9;

var arrValoresDisplay = ['0'];
var operadores = ["+", "-", "÷", ".", "x"];
display.innerHTML = 0;

function clicarBotoesCalculadora(event) {
    btnValor = event.target.textContent;

    if (btnValor === "CLEAR") {
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
    if (btnValor === ",") {
        btnValor = '.';
    }

    if (btnValor === "*") {
        btnValor = "x";
    }
    if (btnValor === "/") {
        btnValor = "÷"; 
    }

    if (operadores.includes(btnValor) && !verificarOperadoresRepetidosOuSozinhos()) {
        return;
    }

    arrValoresDisplay.push(btnValor);
    atualizarDisplay();
}

function atualizarDisplay() {
    console.log(arrValoresDisplay);
    console.log("Tamanho: " + arrValoresDisplay.length);

    if (arrValoresDisplay.length == 0) {
        display.innerHTML = 0;
    }
    if (arrValoresDisplay.length < QTD_MAX_DIGITOS) {
        display.innerHTML = arrValoresDisplay.join('');
    }
    else {
        arrValoresDisplay.pop();
    }
}

function removerCaracter() {
    arrValoresDisplay.pop();
    if (arrValoresDisplay.length > 0) {
        atualizarDisplay();
    }
    else {
        arrValoresDisplay = ['0']; 
        display.innerHTML = "0"; 
    }

}

function verificarOperadoresRepetidosOuSozinhos() {
    let ultimoValor = arrValoresDisplay[arrValoresDisplay.length - 1];

    if (operadores.includes(ultimoValor)) {
        return false;
    }

    for (let i = 0; i < arrValoresDisplay.length; i++) {
        if (operadores.includes(arrValoresDisplay[i]) && operadores.includes(arrValoresDisplay[i + 1])) {
            return false;
        }
    }

    return true;
}

function validarOperacoesComZero() {
    let i; 

    if (arrValoresDisplay.includes('/')) {
        i = arrValoresDisplay.indexOf('/');
    }

    let aux = arrValoresDisplay.indexOf('0');

    if (aux === i + 1) {
        display.innerHTML = "Error";
        arrValoresDisplay = [];
        return false;
    }

    return true;
}

function inverterSinal() {
    let ind = arrValoresDisplay.length - 1;
    let ultimoValor = arrValoresDisplay[ind];

    if (ind < 0) return; 

    if (!isNaN(ultimoValor)) {
        arrValoresDisplay[ind] = (arrValoresDisplay[ind]*(-1)).toString();
        if (isNaN(arrValoresDisplay[ind - 1])) {
            display.innerHTML = arrValoresDisplay.join('').replace(arrValoresDisplay[ind], `(${arrValoresDisplay[ind]})`)
        }
    }
    
}

function limparDisplay() {
    arrValoresDisplay = ['0'];
    display.innerHTML = 0;
}

function verificarSeEDecimal(valor) {
    return valor % 1 !== 0;
}

function realizarOperacoes() {
    let expressao = arrValoresDisplay.join('').replace('x', '*').replace('÷', '/');
    try {
        let resultado = eval(expressao);
        if (verificarSeEDecimal(resultado)) {
            resultado = parseFloat(resultado).toPrecision(QTD_MAX_DIGITOS - 1);
        }
        arrValoresDisplay = [resultado.toString()];
        atualizarDisplay();
    } catch {
        display.textContent = "Error";
        arrValoresDisplay = ['0'];
    }
}

for (let btn of buttons) {
    btn.addEventListener("click", clicarBotoesCalculadora)
}
