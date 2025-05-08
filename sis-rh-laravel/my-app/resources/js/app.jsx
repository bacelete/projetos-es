import React from 'react';
import ReactDOM from 'react-dom/client';
import AlertaSucesso from './components/AlertaSucesso';

const alert = document.getElementById('react-alert');
const btnEnviarSolicitacao = document.getElementById('btnEnviarSolicitacao'); 
const btnEditarSolicitacao = document.getElementById('btnEditarSolicitacao'); 

btnEnviarSolicitacao.addEventListener('click', () => {
    ReactDOM.createRoot(alert).render(<AlertaSucesso mensagem="A solicitação foi enviada." />);
})





