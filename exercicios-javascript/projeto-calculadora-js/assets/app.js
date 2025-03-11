const display = document.querySelector('.display');
const buttons = document.getElementsByClassName('btn');
const QTD_MAX_DIGITOS = 12;

var arrValoresDisplay = [];
var operadores = ["+", "-", "*", "/", "."]; 
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

    if (operadores.includes(btnValor) && !verificarOperadores()) {
        return; 
    }

    arrValoresDisplay.push(btnValor);
    atualizarDisplay();
}

function atualizarDisplay() {
    console.log(arrValoresDisplay); 
    console.log("Tamanho: "+arrValoresDisplay.length);
    
    if (arrValoresDisplay.length >= QTD_MAX_DIGITOS) {
        arrValoresDisplay = parseFloat(arrValoresDisplay).toFixed(8); 
        display.innerHTML = arrValoresDisplay[0]; 
    }
    if (arrValoresDisplay.length == 0) {
        display.innerHTML = 0; 
    }
    else {
        display.innerHTML = arrValoresDisplay.join(''); 
    }
}

function removerCaracter() {
    arrValoresDisplay.pop();
    atualizarDisplay();
}

function verificarOperadores() {
    let ultimoValor = arrValoresDisplay[arrValoresDisplay.length - 1];

    if (operadores.includes(ultimoValor)) {
        return false; 
    } 
    
    for (let i = 0; i < arrValoresDisplay.length; i++) {
        if(operadores.includes(arrValoresDisplay[i]) && operadores.includes(arrValoresDisplay[i+1])){
            return false;
        }
    }

    return true; 
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
        let resultado = eval(arrValoresDisplay.join(''));

        while (arrValoresDisplay.length) {
            arrValoresDisplay.pop();
        }
        
        resultado = resultado.toString(); 
        arrValoresDisplay.push(resultado);

        atualizarDisplay(); 
    }
}

for (let btn of buttons) {
    btn.addEventListener("click", clicarBotoesCalculadora)
}
