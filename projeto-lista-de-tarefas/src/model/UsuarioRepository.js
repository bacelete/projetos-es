import conexao from '../database/connection.js'

class UsuarioRepository {
    static findById(id) {
        const sql = "SELECT * FROM usuario WHERE id = ?"; 

        return new Promise((resolve, reject) => {
            conexao.query(sql, [id], (err, result) => {
                if (err) throw reject(err); 
                console.log(result[0]);
                return resolve(result[0]);
            });
        });
    }
}

export default UsuarioRepository;