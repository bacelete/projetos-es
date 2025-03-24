import express from 'express'
import UsuarioController from './src/controller/UsuarioController.js';
import TarefaController from './src/controller/TarefaController.js'

const router = express.Router(); 

//default route: 
router.get('/', (req, res) => {
    res.render('home');
})

//user routes
router.get('/user/:id', UsuarioController.getUser); 
router.post('/user', UsuarioController.post);
router.delete('/user/:id', UsuarioController.delete);
router.put('/user/:id', UsuarioController.update);

//task routes
router.get('/task/:id', TarefaController.get);
router.post('/task', TarefaController.post);
router.delete('/task/:id', TarefaController.delete);

export default router;