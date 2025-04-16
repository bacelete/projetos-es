document.addEventListener("DOMContentLoaded", function () {
    const btnRecolherMenu = document.getElementById('recolherMenu');
    const topics = document.getElementsByClassName('nav-link');
    const navbar = document.querySelector('.navbar');
    let isMenuAberto = true;

    btnRecolherMenu.addEventListener("click", () => {
        if (isMenuAberto) {
            navbar.style.width = "8%";
            navbar.style.transition = ".2s";

            for (let i = 0; i < topics.length; i++) {
                topics[i].textContent = "";
            }

            btnRecolherMenu.innerHTML = "<i class='fa-solid fa-arrow-right'></i>";
        }
        else {
            navbar.style.width = "15%";
            navbar.style.transition = ".2s";
            
            topics[0].textContent = "Home";
            topics[1].textContent = "Lista";

            btnRecolherMenu.innerHTML = "<i class='fa-solid fa-arrow-left m-1'></i>Recolher menu";
        }
        isMenuAberto = !isMenuAberto; 
    })

});