const btnNumbers = document.getElementsByClassName('btn-number');
const operators = document.getElementsByClassName('operators'); 
const display = document.querySelector('.display');
const buttons = document.getElementsByClassName('btn');
let arrValoresDisplay = []; 

function imprimirNaTela() {
    let valorDisplay = document.createElement("span"); 
    let btnValor = event.target.textContent;

    valorDisplay.innerHTML = btnValor; 
    if (btnValor !== "=") {
        display.appendChild(valorDisplay);
        arrValoresDisplay.push(btnValor);
    }
    else {
        let op = arrValoresDisplay.filter((elem) => (isNaN(elem))); 
        let numbers = arrValoresDisplay.filter((elem) => Number(elem)); 
    }
}

for (let btn of buttons) {
    btn.addEventListener("click", imprimirNaTela)
}
