/**
 * Required External Modules
 */

import express from 'express';
import router from './routes.js'; 
import passport from 'passport'; 
import querystring from 'querystring'; 
import dotenv from 'dotenv';

dotenv.config(); 

/**
 * Routes Definitions
 */

router.get(
    '/login',
    passport.authenticate("auth0", {
        scope: "openid email profile"
    }),
    (req, res) => {
        res.redirect('/');
    }
);



/**
 * Module Exports
 */