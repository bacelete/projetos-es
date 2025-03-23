//App configuration: 
import express from "express";
import path from "path";
import { fileURLToPath } from "url";
import routes from './routes.js';
import database from './src/database/connection.js';
import cors from "cors";

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const app = express();
const port = process.env.PORT || "8000";

// view and static files conf:
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'src', 'view', 'html'));

app.use('/static', express.static(path.join(__dirname, 'src', 'view', 'css',)));
app.use('/static', express.static(path.join(__dirname, 'src', 'view', 'js',)));

app.use(express.json());  //to use json
app.use(cors());

// create a server:
app.listen(port, () => {
    console.log(`Servidor rodando em: http://localhost:${port}`);
});

//use routes from 'routes.js'
app.use(routes);

export default app; 