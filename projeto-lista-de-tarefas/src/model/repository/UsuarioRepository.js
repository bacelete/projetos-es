import database from '../../database/connection.js'

class UsuarioRepository {
    static findById(id) {
        const sql = "SELECT * FROM usuario WHERE id = ?";

        return new Promise((resolve, reject) => {
            database.query(sql, [id], (err, result) => {
                if (err) throw reject(err);
                return resolve(result[0]);
            });
        });
    }

    static findByUsername(username) {
        const sql = "SELECT * FROM usuario WHERE username = ?";

        return new Promise((resolve, reject) => {
            database.query(sql, [username], (err, result) => {
                if (err) return reject(err);
                return resolve(result[0]); 
            }); 
        });
    }

    static create(usuario) {
        const username = usuario.username;
        const password = usuario.password;
        const sql = "INSERT INTO usuario(username, password) VALUES (?, ?)";

        database.query(sql, [username, password], (err, result) => {
            if (err) throw err;
            return JSON.parse(JSON.stringify(result));
        })
    }

    static async delete(id) {
        const sql = "DELETE FROM usuario WHERE id = ?"

        if (user !== null && user !== undefined) {
            return new Promise((resolve, reject) => {
                database.query(sql, [id], (err, result) => {
                    if (err) throw reject(err);
                    return JSON.parse(JSON.stringify(resolve(result)));
                })
            })

        }
    }

    static async update(id) {
        const sql = "ALTER TABLE usuario WHERE id = ?"

        const user = await this.findById(id);
        console.log(user);

        if (user !== null && user !== undefined) {
            return new Promise((resolve, reject) => {
                database.query(sql, [id], (err, result) => {
                    if (err) throw reject(err);
                    return JSON.parse(JSON.stringify(resolve(result)));
                })
            })

        }
    }
}

export default UsuarioRepository;