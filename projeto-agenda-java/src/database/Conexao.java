package database;

import java.sql.Connection;
import java.sql.DriverManager; 
import java.sql.SQLException; 

public class Conexao {
    private static String url = "localhost"; 
    private static String port = "3000"; 
    private static String password = "root"; 
    private static String username = "root"; 
    private static String database = "projeto_agenda"; 
    private static String driver = "com.mysql.cj.jdbc.Driver";

    public Conexao() {}

    public static Connection connect() {
        Connection connection = null; 

        try {

        }  
        catch (e) {
            e.printStackTrace(); 
        }

        return connection;
    }
}
