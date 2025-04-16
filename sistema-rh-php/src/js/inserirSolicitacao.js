document.addEventListener("DOMContentLoaded", function () {
    const outrosMotivoContainer = document.getElementById('outrosMotivoContainer');
    const form = document.querySelector('.needs-validation');
    const divAlert = document.getElementById('liveAlertPlaceholder');

    // adicionar a div de "outros" no motivo da solicitação
    document.querySelectorAll('input[name="motivo"]').forEach((element) => {
        element.addEventListener('change', function () {
            if (this.id === 'outros') {
                outrosMotivoContainer.style.display = "block";
            }
            else {
                outrosMotivoContainer.style.display = "none";
            }
        });
    });


    appendAlert = (mensagem, tipo) => {
        const wrapper = document.createElement("div");
        wrapper.innerHTML = [
            `<div class="alert alert-${tipo} mt-2">`,
            `<div class="d-flex justify-content-between lign-items-start flex-wrap mt-1">`,
            `<div>${mensagem}</div>`,
            '<button type="submit" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
            '</div>',
            '</div>',
        ].join('');

        divAlert.append(wrapper);

    };

    //js do bootstrap para validar cada campo do form;
    (() => {
        'use strict'
        form.addEventListener("submit", event => {
            event.preventDefault()

            if (!form.checkValidity()) {
                return; 
            }

            form.classList.add("was-validated");
            appendAlert("Solicitação enviada com sucesso!", "success");   

            setTimeout(() => {
                form.submit();
            }, 2000);

        }, false)
        
    })()

});