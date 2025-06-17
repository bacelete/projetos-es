document.addEventListener("DOMContentLoaded", function () {
    const td = document.getElementsByClassName('status');
    console.log(td);

    if (td) {
        for (let i = 0; i < td.length; i++) {
            const icon = document.createElement('i');
            icon.classList = "fa-solid fa-circle mx-2";
            td[i].prepend(icon);

            if (td[i].textContent === "Finalizada") {
                icon.classList.add('text-dark');
            }
            if (td[i].textContent === "Aprovada") {
                icon.classList.add('text-success');
            }
            if (td[i].textContent === "Pendente" || td[i].textContent === "Em Análise") {
                icon.classList.add('text-warning');
            }
            if (td[i].textContent === "Recusada") {
                icon.classList.add('text-danger');
            }
        }
    }

});