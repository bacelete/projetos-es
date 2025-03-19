import express from "express";
import path from "path";
import { fileURLToPath } from "url";
import routes from './routes.js'

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const app = express(); 
const PORT = 3000; 

app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'src', 'view', 'html'));
app.use('/static', express.static(path.join(__dirname, 'src', 'view', 'css')));

app.listen(PORT, () => {
    console.log(`Servidor rodando em: http://localhost:${PORT}`);
});

app.use('/', routes); 

export default app; 