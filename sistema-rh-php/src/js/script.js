document.addEventListener("DOMContentLoaded", function () {
    const outrosMotivoContainer = document.getElementById('outrosMotivoContainer');
    const enviarSolicitacao = document.getElementById('enviarSolicitacao');
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

        //js do bootstrap para validar cada campo do form;
        (() => {
            'use strict'
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated');
                if (enviarSolicitacao) {
                    enviarSolicitacao.addEventListener("click", () => {
                        appendAlert("Solicitação enviada com sucesso!", "success");
                    })
                }
            }, false)
        })()

});