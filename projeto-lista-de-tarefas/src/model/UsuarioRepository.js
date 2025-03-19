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

    static create(usuario) {
        const username = usuario.username;
        const password = usuario.password;
        const sql = "INSERT INTO usuario(username, password) VALUES (?, ?)"; 

        conexao.query(sql, [username, password], (err, result) => {
            if (err) throw err;
            return JSON.parse(JSON.stringify(result));
        })
    }

    static delete(id) {
        const sql = "DELETE FROM usuario WHERE id = ?"
        if (this.findById(id) !== null) {
            conexao.query(sql, [id], (err, result) => {
                if (err) throw err;
                return JSON.parse(JSON.stringify(result));
            })
        }
    }
}

export default UsuarioRepository;