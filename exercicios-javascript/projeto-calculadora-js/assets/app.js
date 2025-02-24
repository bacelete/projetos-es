const btnNumbers = document.getElementsByClassName('btn-number');
const operators = document.getElementsByClassName('operators'); 
const display = document.querySelector('.display');
const buttons = document.getElementsByClassName('btn');

function imprimirNaTela() {
    let displayValor = document.createElement("span"); 
    displayValor.innerHTML = event.target.textContent;

    display.appendChild(displayValor);
}

for (let btn of buttons) {
    btn.addEventListener("click", imprimirNaTela)
}
