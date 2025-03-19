import mysql from 'mysql2'; 

const conexao = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "root",
});

conexao.connect((err) => {
    if (err) throw err; 
    console.log('Conectado com o banco!'); 
})

export default conexao;