import React from 'react';
import ReactDOM from 'react-dom/client';
import AlertaSucesso from './components/AlertaSucesso';

const alert = document.getElementById('react-alert');

const btnEnviarSolicitacao = document.getElementById('btnEnviarSolicitacao'); 

btnEnviarSolicitacao.addEventListener('click', () => {
    ReactDOM.createRoot(alert).render(<AlertaSucesso />);
})





