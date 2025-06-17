document.addEventListener("DOMContentLoaded", function(){
    const td = document.querySelector('.status'); 

    if (td) {
        console.log(td);
        const icon = document.createElement('i');
        icon.classList = "fa-solid fa-circle mx-2"; 
        td.prepend(icon); 

        if (td.textContent === "Finalizada") {
            icon.classList.add('text-dark');
        } 
        if (td.textContent === "Aprovada") {
            icon.classList.add('text-success');
        } 
        if (td.textContent === "Pendente" || td.textContent === "Em Análise") {
            icon.classList.add('text-warning');
        } 
        if (td.textContent === "Recusada") {
            icon.classList.add('text-danger');
        } 
    }

});