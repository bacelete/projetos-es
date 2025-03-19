import UsuarioRepository from "../model/repository/UsuarioRepository.js";
import Usuario from "../model/Usuario.js"

class UsuarioController {
    async getUser(req, res) {
        const id = req.params.id
        const usuario = await UsuarioRepository.findById(id);
        res.status(200).send(usuario); 
    }
    async post(req, res) {
        const usuario = req.body; 

        UsuarioRepository.create(usuario);
        new Usuario(req.body.id, req.body.username, req.body.password);

        res.status(200).send(usuario);
    }
    async delete(req, res) {
        const id = req.params.id; 
        const usuario = await UsuarioRepository.delete(id);
        
        res.status(200).send(usuario);
    }
}

export default new UsuarioController(); 