import UsuarioRepository from "../model/UsuarioRepository.js";

class UsuarioController {
    async getUser(req, res) {
        const id = req.params.id
        const usuario = await UsuarioRepository.findById(id);
        res.send(usuario); 
    }
}

export default new UsuarioController(); 