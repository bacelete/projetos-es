import express from 'express'
import UsuarioController from './src/controller/UsuarioController.js';

const router = express.Router(); 

router.use((req, res, next) => {
    if (req.path === '/') {
        console.log('Acessando a tela de login...');
    }
    next(); 
})

router.get('/', (req, res) => {
    res.render('login'); 
})

router.get('/user/:id', UsuarioController.getUser); 
router.post('/user', UsuarioController.post);
router.delete('/user/:id', UsuarioController.delete);
router.put('/user/:id', UsuarioController.update);
router.post('/login', UsuarioController.login);

export default router;