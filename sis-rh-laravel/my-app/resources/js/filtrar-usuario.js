document.addEventListener("DOMContentLoaded", () => {
    const table = document.querySelector("table");
    const tr = table.getElementsByTagName("tr");
    const body = document.querySelector("tbody"); 
    const input = document.getElementById("search");
    const elem = document.createElement("h5"); 

    input.addEventListener("keyup", function () {
        const filter = input.value.toUpperCase();
        console.log(tr);

        for (let i = 1; i < tr.length; i++) {
            let td = tr[i].getElementsByTagName("td")[1];

            if (td.textContent.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
                body.removeChild(elem);
            } else {
                tr[i].style.display = "none";
                elem.textContent = "Nenhuma solicitação foi encontrada!";
                body.appendChild(elem)
            }

        }
    });

    const footer = document.getElementsByTagName("footer")[0];
    function exibirNumeroDeLinhas() {
        let numLinhas = tr.length - 1;

        let elemHTML = document.createElement("p");
        elemHTML.textContent = `Exibindo 0 a ${numLinhas} de ${numLinhas} linhas`;
        elemHTML.classList.add("text-secondary");

        footer.appendChild(elemHTML);
    }

    exibirNumeroDeLinhas();
});

