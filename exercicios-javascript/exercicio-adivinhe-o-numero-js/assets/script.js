const MIN_VALUE = 1;
const MAX_VALUE = 100; 
const QTD_MAX_TURNO = 10; 
const divTentativas = document.getElementById("tentativas");
const campoPalpite = document.getElementById('inp-texto');
const btnEnviarPalpite = document.getElementById('btnEnviar');
const divReiniciarJogo = document.getElementById('restart-game'); 
let turno = 1;
let tentativas = [];

function gerarNumeroAleatorio() {
    return Math.floor(Math.random() * (MAX_VALUE - MIN_VALUE) + MIN_VALUE);
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
    turno++; 
    imprimirTentativa();
}

function verificarTentativa(palpite) {
    if (palpite === valorGerado) {
        alert("Parabéns, você acertou!"); 
        btnEnviarPalpite.disabled = "true"; 
        gerarMensagemUsuario(); 
    } 
    if (turno < QTD_MAX_TURNO) {
        if (palpite < valorGerado) {
            alert("O palpite está abaixo!"); 
        }
        if (palpite > valorGerado) {
            alert("O palpite está acima!"); 
        }
    }
    else {
        
    }
}

function gerarMensagemUsuario() {
    let elemReiniciar = document.createElement("span");
    elemReiniciar.innerHTML = "Reiniciar o jogo?"

    let btnReiniciar = document.createElement("button");
    btnReiniciar.id = "btnReiniciar"; 
    btnReiniciar.innerHTML = "Sim"; 

    divReiniciarJogo.appendChild(elemReiniciar);
    divReiniciarJogo.appendChild(btnReiniciar); 

    btnReiniciar.addEventListener("click", reiniciarJogo);
}

function reiniciarJogo() {
    window.location.reload(true); 
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



