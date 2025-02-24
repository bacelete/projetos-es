const btnNumbers = document.getElementsByClassName('btn-number');
const operators = document.getElementsByClassName('operators'); 
const display = document.getElementsByClassName('display');

function imprimirNaTela() {
    
}

for (btn of btnNumbers) {
    btn.addEventListener("click", imprimirNaTela)
}

for (op of operators) {
    op.addEventListener("click", imprimirNaTela);
}