import mysql from 'mysql2'; 

const database = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "root",
    database: "projeto_tarefa"
});

database.connect((err) => {
    if (err) throw err; 
    console.log('Conectado com o banco!'); 
})

export default database;