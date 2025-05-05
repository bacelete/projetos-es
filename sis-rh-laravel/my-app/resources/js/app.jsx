import React from 'react';
import ReactDOM from 'react-dom/client';
import AlertaSucesso from './components/AlertaSucesso';
import BotaoEnviar from './components/BotaoEnviar';

const alert = document.getElementById('react-alert');
let btnEnviar = document.getElementById('react-button'); 

ReactDOM.createRoot(btnEnviar).render(<BotaoEnviar />); 




