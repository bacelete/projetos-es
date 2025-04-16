document.addEventListener("DOMContentLoaded", function () {
    const outrosMotivoContainer = document.getElementById('outrosMotivoContainer');
    const form = document.querySelector('.needs-validation');

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
            `<div class="alert alert-${tipo}">`,
            `<div class="d-flex justify-content-between lign-items-start flex-wrap mt-1">`,
            `<div>${mensagem}</div>`,
            '<button type="submit" class="btn-close" data-bs-dismiss="alert" arial-label="Close"></button>',
            '</div>',
            '</div>',
        ].join('');

        alert.append(wrapper);

    };

    //js do bootstrap para validar cada campo do form;
    (() => {
        'use strict'
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            form.classList.add("was-validated");
        }, false)
        
    })()

});