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
        try {
            const nome = req.params.nome;
            const affectedRows = await TarefaRepository.delete(nome);
            if (affectedRows > 0) {
                res.status(200).send(`Tarefa '${nome}' excluída com sucesso!`);                
            }
        }
        catch (error) {
            console.error('Erro ao excluir a tarefa: '+tarefa);
            res.status(500).send('Erro ao excluir a tarefa');
        }

    }
}

export default new TarefaController(); 