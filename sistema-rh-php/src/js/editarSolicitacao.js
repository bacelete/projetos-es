document.addEventListener("DOMContentLoaded", function () {
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
});