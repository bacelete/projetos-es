//App configuration: 
import express from "express";
import path from "path";
import { fileURLToPath } from "url";
import routes from './routes.js'
import database from './src/database/connection.js'

//Passport Configuration: 
import passport from "passport";
import expressSession from 'express-session';
import Auth0Strategy from 'passport-auth0';
import dotenv from "dotenv";

dotenv.config();

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const app = express(); 
const port = process.env.PORT || "8000"; 

// view and static files conf:
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'src', 'view', 'html'));
app.use('/static', express.static(path.join(__dirname, 'src', 'view', 'css')));
app.use(express.json()); 

// session configuration:
const session = {
    secret: process.env.SESSION_SECRET,
    cookie: {},
    resave: false, 
    saveUnitializated: false,
};

if (app.get("env") === "production") {
    session.cookie.secure = true;
}

// create a server:
app.listen(port, () => {
    console.log(`Servidor rodando em: http://localhost:${port}`);
});

//use routes from 'routes.js'
app.use(routes); 

export default app; 