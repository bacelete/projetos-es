import TarefaController from "../../controller/TarefaController.js";
import conexao from '../../database/connection.js'

class TarefaRepository {
    static create(tarefa) {
        const sql = "INSERT INTO tarefa(nome, status) VALUES (?, ?)";

        return new Promise((resolve, reject) => {
            conexao.query(sql, [tarefa.nome, tarefa.status], (err, result) => {
                if (err) throw reject(err);
                return resolve(result);
            })
        })
    }
}

export default TarefaRepository;