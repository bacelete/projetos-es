//função para criar o alert
document.addEventListener("DOMContentLoaded", function () {
    const formDelete = document.getElementById('formDelete');
    const alert = document.getElementById('liveAlertPlaceholder');

    appendAlert = (mensagem, tipo) => {
        const wrapper = document.createElement("div");
        wrapper.innerHTML = [
            `<div class="alert alert-${tipo}">`,
            `<div class="d-flex justify-content-between lign-items-start flex-wrap mt-1">`,
                `<div>${mensagem}</div>`,
                '<button type="submit" class="btn-close" data-bs-dismiss="alert" arial-label="Close"></button>',
            '</div>',
            '<form method="POST" action="../backend/exclude_all.php">', //form para lidar com a requisicao de DELETE 
                '<button type="submit" id="delete_all" class="btn bg-danger text-white align-self-end mt-2 ">Confirmar</button>',
            '</form>',
            '</div>',
        ].join('');

        alert.append(wrapper);

    };

    formDelete.addEventListener("submit", (event) => {
        event.preventDefault();
        appendAlert("Deseja excluir todas as solicitações?", "danger");
    })



});

