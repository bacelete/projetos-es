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

let valorGerado = gerarNumeroAleatorio();
console.log(`Valor gerado: ${valorGerado}`); 

function validarEntradaUsuario() {
    let valor = campoPalpite.value.trim();

    if (valor === "" || isNaN(valor)) {
        throw new Error("Entrada inválida"); 
    }

    let palpite = Number(valor);

    tentativas.push(palpite);

    verificarTentativa(palpite);
    imprimirTentativa();
}

function verificarTentativa(palpite) {
    if (palpite === valorGerado) {
        alert("Parabéns, você acertou!"); 
        bloquearEntradaUsuario(); 
    } 
}

function bloquearEntradaUsuario() {
    campoPalpite.disabled = "true"; 
}

function imprimirTentativa() {
    divTentativas.innerHTML = ""; 

    tentativas.forEach((valorTentativa) => {
        let elemTentativa = document.createElement("span"); 
        elemTentativa.textContent = `${valorTentativa} `;
        divTentativas.appendChild(elemTentativa);
    });
    campoPalpite.value = ""; 
}

btnEnviarPalpite.addEventListener("click", validarEntradaUsuario);



