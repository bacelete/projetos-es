//App configuration: 
import express from "express";
import path from "path";
import { fileURLToPath } from "url";
import routes from './routes.js';
import authRouter from './auth.js';
import database from './src/database/connection.js';
import cors from "cors";

//Auth0 Configuration: 
import passport from "passport";
import expressSession from 'express-session';
import Auth0Strategy from 'passport-auth0';
import dotenv from "dotenv";

dotenv.config();

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const app = express();
const port = process.env.PORT || "8000";

// session configuration:
const session = {
    secret: process.env.SESSION_SECRET,
    cookie: {},
    resave: false,
    saveUninitialized: false,
};

if (app.get("env") === "production") {
    session.cookie.secure = true;
}

const strategy = new Auth0Strategy(
    {
        domain: process.env.AUTH0_DOMAIN,
        clientID: process.env.AUTH0_CLIENT_ID,
        clientSecret: process.env.AUTH0_CLIENT_SECRET,
        callbackURL: process.env.AUTH0_CALLBACK_URL
    },
    function (accessToken, refreshToken, extraParams, profile, done) {
        return done(null, profile);
    }
);

// view and static files conf:
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'src', 'view', 'html'));

app.use('/static', express.static(path.join(__dirname, 'src', 'view', 'css')));
app.use(express.json());  //to use json
app.use(cors());
app.use(expressSession(session));

//initialize the passport and modify the persistent login session using Passport.js:
app.use(passport.initialize()); 
app.use(passport.session()); //store data of its sessions
passport.use(strategy);

passport.serializeUser((user, done) => {
    done(null, user);
});

passport.deserializeUser((user, done) => {
    done(null, user);
});

// create a server:
app.listen(port, () => {
    console.log(`Servidor rodando em: http://localhost:${port}`);
});

//use routes from 'routes.js'
app.use(authRouter);
app.use(routes);

export default app; 