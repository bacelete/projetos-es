const btnNumbers = document.getElementsByClassName('btn-number');
const operators = document.getElementsByClassName('operators'); 
const display = document.getElementsByClassName('display');
const buttons = document.getElementsByClassName('btn');

function imprimirNaTela() {
    let value = document.createElement("span"); 
    value.innerHTML = btn.value;
    display.appendChild(value);
}

for (btn of buttons) {
    btn.addEventListener("click", imprimirNaTela)
}
