import conexao from '../database/connection.js'

class UsuarioRepository {
    async findById(id) {
        const sql = "SELECT * FROM usuario WHERE id = ?"; 
        conexao.query(sql, id, (err, result) => {
            if (err) throw err; 
            return JSON.parse(JSON.stringify(result)); 
        })
    }
}

export default new UsuarioRepository(); 