const minValue = 1;
const maxValue = 100; 
const campoPalpite = document.getElementById('inp-texto');
const btnEnviarPalpite = document.getElementById('btnEnviar');
let turno = 1;
let tentativas = [];

function gerarNumeroAleatorio() {
    return Math.floor(Math.random() * (maxValue - minValue) + minValue);
}

let valor = gerarNumeroAleatorio();
console.log(`Valor gerado: ${valor}`); 

function validarEntradaUsuario() {
    let valor = campoPalpite.value;

    if (valor === "") {
        throw new Error("Entrada inválida"); 
    }

    let numPalpite = Number(valor);
    tentativas.push(numPalpite);
}

function imprimirTentativas() {
    
}

btnEnviarPalpite.addEventListener("click", validarEntradaUsuario);



