import TarefaRepository from "../model/repository/TarefaRepository.js";

class TarefaController {
    async post(req, res) {
        try {
            const tarefa = req.body;
            TarefaRepository.create(tarefa); 
    
            res.status(201).send(`Tarefa '${tarefa.nome}' criada com sucesso!`);
        }
        catch (error) {
            console.log('Não foi possível criar a tarefa');
            res.status(500).send(`Não foi possível criar a tarefa.`)
        }
    }
    async get(req, res) {
        const id = req.params.id; 
        const tarefa = await TarefaRepository.findById(id);

        res.status(200).send(tarefa); 
    }
    async delete(req, res) {
        try {
            const nome = decodeURIComponent(req.params.nome);
            const affectedRows = await TarefaRepository.delete(nome);
            if (affectedRows > 0) {
                res.status(204).send(`Tarefa '${nome}' excluída com sucesso!`);                
            }
            else {
                res.status(404).send(`Tarefa ${nome} não foi encontrada`);
            }
        }
        catch (error) {
            console.error('Erro ao excluir a tarefa: '+error);
            res.status(500).send('Erro ao excluir a tarefa');
        }

    }
    async update(req, res) {
        try {
            const newTarefa = req.body; 
            const nome = decodeURIComponent(req.params.nome);

            const tarefa = await TarefaRepository.update(newTarefa, nome);
            res.status(200).send(`Tarefa '${nome}' foi alterada para '${newTarefa.nome}'`);
        }
        catch(error) {
            res.status(500).send('Erro ao editar a tarefa: '+error);
        }
    }
}

export default new TarefaController(); 