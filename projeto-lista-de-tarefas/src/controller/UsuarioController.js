import UsuarioRepository from "../model/repository/UsuarioRepository.js";
import Usuario from "../model/Usuario.js"
import jwt from "jsonwebtoken";

const PRIVATE_KEY = 'Cpd@5383';

class UsuarioController {
    async getUser(req, res) {
        const id = req.params.id
        const usuario = await UsuarioRepository.findById(id);

        if (!usuario) {
            res.status(404).json({ 'erro': 'Usuário não encontrado' });
            return;
        }
        else {
            res.status(200).send(usuario);
        }

    }
    async post(req, res) {
        const usuario = req.body;

        UsuarioRepository.create(usuario);
        new Usuario(usuario.id, usuario.username, usuario.password);

        res.status(200).send(usuario);
    }
    async delete(req, res) {
        const id = req.params.id;
        const usuario = await UsuarioRepository.delete(id);

        res.status(200).send(usuario);
    }
    async update(req, res) {
        const id = req.params.id;
        const usuario = await UsuarioRepository.update(id);

        if (!usuario) {
            res.status(404).json({ 'erro': 'Usuário não encontrado' });
            return;
        }
        else {
            res.status(200).send(usuario);
        }
    }
    
}

//Singleton pattern: 
export default new UsuarioController(); 