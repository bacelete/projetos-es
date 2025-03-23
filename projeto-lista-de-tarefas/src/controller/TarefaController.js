import TarefaRepository from "../model/repository/TarefaRepository.js";

class TarefaController {
    async post(req, res) {
        const tarefa = req.body;
        TarefaRepository.create(tarefa); 

        res.status(200).json({tarefa: tarefa});
    }
}

export default new TarefaController(); 