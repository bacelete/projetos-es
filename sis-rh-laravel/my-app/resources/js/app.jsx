import React from 'react';
import ReactDOM from 'react-dom/client';
import AlertaSucesso from './components/AlertaSucesso';

const divAlert = document.getElementById('alert');
const btnEnviarSolicitacao = document.getElementById('btnEnviarSolicitacao'); 

btnEnviarSolicitacao.addEventListener('click', () => {
    ReactDOM.createRoot(divAlert).render(<AlertaSucesso />);
})




