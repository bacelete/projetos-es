const minValue = 1;
const maxValue = 100; 
const divTentativas = document.getElementById("tentativas");
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
    let valor = campoPalpite.value.trim();

    if (valor === "" || isNaN(valor)) {
        throw new Error("Entrada inválida"); 
    }

    let numPalpite = Number(valor);

    tentativas.push(numPalpite);
    imprimirTentativas();
}

function imprimirTentativas() {
    divTentativas.innerHTML = ""; 

    tentativas.forEach((valorTentativa) => {
        let elemTentativa = document.createElement("p"); 
        elemTentativa.textContent = valorTentativa;
        divTentativas.appendChild(elemTentativa);
    });
}

btnEnviarPalpite.addEventListener("click", validarEntradaUsuario);



