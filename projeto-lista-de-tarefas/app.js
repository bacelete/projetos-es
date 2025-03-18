import express from "express";
import path from "path";
import { fileURLToPath } from "url";

const app = express(); 
const PORT = 3000; 

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

app.use('/static', express.static(path.join(__dirname, 'view')))

app.listen(PORT, () => {
    console.log(`Servidor rodando em: http://localhost:${PORT}`);
});

app.get('/', (req, res) => {
    res.send('Hello World!'); 
})

export default app; 