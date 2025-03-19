import express from "express";
import path from "path";
import { fileURLToPath } from "url";
import routes from './routes.js'
import database from './src/database/connection.js'

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const app = express(); 
const PORT = 3000; 

// view and static files conf:
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'src', 'view', 'html'));
app.use('/static', express.static(path.join(__dirname, 'src', 'view', 'css')));
app.use(express.json()); 

// create a server:
app.listen(PORT, () => {
    console.log(`Servidor rodando em: http://localhost:${PORT}`);
});

//use routes from 'routes.js'
app.use(routes); 

export default app; 