import express from 'express'
import UsuarioController from './src/controller/UsuarioController.js';

const router = express.Router(); 

router.get('/', (req, res) => {
    res.send('Hello World!'); 
})

router.get('/user/:id', UsuarioController.getUser); 

export default router;