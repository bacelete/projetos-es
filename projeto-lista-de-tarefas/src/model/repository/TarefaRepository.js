import TarefaController from "../../controller/TarefaController.js";
import conexao from '../../database/connection.js'

class TarefaRepository {
    static create(tarefa) {
        const sql = "INSERT INTO tarefa(nome, status) VALUES (?, ?)";

        return new Promise((resolve, reject) => {
            conexao.query(sql, [tarefa.nome, tarefa.status], (erro, result) => {
                if (erro) throw reject(erro);
                return resolve(result);
            })
        })
    }

    static findById(id) {
        const sql = "SELECT * from tarefa WHERE id = ?";

        return new Promise(function (resolve, reject) {
            conexao.query(sql, [id], (erro, result) => {
                if (erro) throw reject(erro);
                return resolve(result[0]);
            })
        });
    }

    static delete(id) {
        const sql = "DELETE from tarefa WHERE id = ?";

        return new Promise(function (resolve, reject) {
            conexao.query(sql, [id], (erro, result) => {
                if (erro) throw reject(erro);
                return resolve(result.affectedRows);
            })
        });
    }
}

export default TarefaRepository;