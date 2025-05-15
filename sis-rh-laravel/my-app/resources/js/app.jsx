import ReactDOM from 'react-dom/client';
import AlertaSucesso from './components/AlertaSucesso';
import '../css/app.css';

const alertSucesso = document.getElementById('react-alert-success');
const alertEdit = document.getElementById('react-alert-edit');
const alertExclusao = document.getElementById('react-alert-delete');

const btnEnviarSolicitacao = document.getElementById('btnEnviarSolicitacao');
const btnEditarSolicitacao = document.getElementById('btnEditarSolicitacao');

if (btnEnviarSolicitacao) {
    btnEnviarSolicitacao.addEventListener('click', () => {
        ReactDOM.createRoot(alertSucesso).render(<AlertaSucesso mensagem="A solicitação foi enviada." />);
    })
}

if (btnEditarSolicitacao) {
    btnEditarSolicitacao.addEventListener('click', () => {
        ReactDOM.createRoot(alertEdit).render(<AlertaSucesso mensagem="A solicitação foi editada." />);
    })
}




