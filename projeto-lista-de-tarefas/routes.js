import express from 'express'
import UsuarioController from './src/controller/UsuarioController.js';

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

export default router;