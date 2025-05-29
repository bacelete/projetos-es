import ReactDOM from 'react-dom/client';
import AlertaSucesso from './components/AlertaSucesso';

const alertSucesso = document.getElementById('react-alert-success');
const form = document.querySelector('.needs-validation');

form.addEventListener('submit', function (event) {
    if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
    } else {
        ReactDOM.createRoot(alertSucesso).render(
            <AlertaSucesso mensagem="A solicitação foi enviada com sucesso!" />
        );
        // O submit segue normalmente
    }
    form.classList.add('was-validated');
});





