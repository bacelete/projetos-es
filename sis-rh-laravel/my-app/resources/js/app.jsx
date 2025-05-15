import React from 'react';
import ReactDOM from 'react-dom/client';
import AlertaSucesso from './components/AlertaSucesso';
import DialogoConfirmacao from './components/DialogoConfirmacao';

const alertSucesso = document.getElementById('react-alert-success');
const alertEdit = document.getElementById('react-alert-edit');
const alertExclusao = document.getElementById('react-alert-delete');

const btnEnviarSolicitacao = document.getElementById('btnEnviarSolicitacao'); 
const btnEditarSolicitacao = document.getElementById('btnEditarSolicitacao'); 

btnEnviarSolicitacao.addEventListener('click', () => {
    ReactDOM.createRoot(alertSucesso).render(<AlertaSucesso mensagem="A solicitação foi enviada." />);
})

btnEditarSolicitacao.addEventListener('click', () => {
    ReactDOM.createRoot(alertEdit).render(<AlertaSucesso mensagem="A solicitação foi editada." />);
})

btnExcluirSolicitacao.addEventListener('click', () => {
     ReactDOM.createRoot(alertExclusao).render(<DialogoConfirmacao />);
})




