
const divAlert = document.getElementById('alert');
const btnCriarCarro = document.getElementById('create_carro');
const form = document.getElementById('formCarro');

function alertDadosSalvos() {
    divAlert.className = "card mt-2 p-2 bg-success text-center text-white fs-6 fw-bolder w-25 h-50";
    let elem = document.createElement("p");
    let icon = document.createElement("i");

    icon.className = "fa-solid fa-circle-xmark float-end close-button";
    elem.innerHTML = "Dados salvos com sucesso!";

    elem.appendChild(icon);
    divAlert.appendChild(elem);
    setTimeout(fecharAlerta, 5000);
}

function fecharAlerta() {
    if (divAlert) {
        divAlert.remove();
    }
}


//Object.fromEntries() converte o iterador (chave, valor) em obj js
//new FormData(form) gera um objeto FormData com os campos e valores
//.entries() converte em iterador
