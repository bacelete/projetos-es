import express from 'express'

const router = express.Router(); 

router.post('/user', (req, res) => {
    const usuario = req.body; 
    res.json(usuario); 
})

router.get('/user/:id', (req, res) => {
    const id = req.params.id; 
})

export default router;