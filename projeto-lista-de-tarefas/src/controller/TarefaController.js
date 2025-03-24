import TarefaRepository from "../model/repository/TarefaRepository.js";

class TarefaController {
    async post(req, res) {
        const tarefa = req.body;
        TarefaRepository.create(tarefa); 

        res.status(200).send(tarefa);
    }
    async get(req, res) {
        const id = req.params.id; 
        const tarefa = await TarefaRepository.findById(id);

        res.status(200).send(tarefa); 
    }
    async delete(req, res) {
        const id = req.params.id;
        TarefaRepository.delete(id);

        res.status(200).send('Usuário foi excluido com sucesso!'); 
    }
}

export default new TarefaController(); 