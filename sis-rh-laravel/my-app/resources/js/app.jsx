import React from 'react';
import ReactDOM from 'react-dom/client';
import AlertaSucesso from './components/AlertaSucesso';

const alert = document.getElementById('react-alert');
let btnEnviar = document.getElementsByClassName('react-button'); 

const btnEnviarSolicitacao = document.getElementById('btnEnviarSolicitacao'); 

btnEnviarSolicitacao.addEventListener('click', () => {
    ReactDOM.createRoot(alert).render(<AlertaSucesso />);
})




