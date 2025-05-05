import React from 'react';
import ReactDOM from 'react-dom/client';
import AlertaSucesso from './components/AlertaSucesso';

const divAlert = document.getElementById('alert'); 

if (divAlert) {
    ReactDOM.createRoot(divAlert).render(<AlertaSucesso />);
}
