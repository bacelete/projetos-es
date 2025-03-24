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
        const tarefa = await TarefaRepository.delete(id);
        console.log(tarefa);

        res.status(200).send(tarefa); 
    }
}

export default new TarefaController(); 