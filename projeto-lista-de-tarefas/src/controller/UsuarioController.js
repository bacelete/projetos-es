import UsuarioRepository from "../model/UsuarioRepository.js";

class UsuarioController {
    static getUser(req, res) {
        const id = req.params.id
        const usuario = UsuarioRepository.findById(id);
    }
}

export default new UsuarioController(); 