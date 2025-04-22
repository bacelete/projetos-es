package database;

import java.sql.Connection;
import java.sql.DriverManager; 
import java.sql.SQLException; 

public class Conexao {
    private static String url = "jdbc:mysql://localhost:3306/projeto_agenda"; 
    private static String password = "root"; 
    private static String username = "root";  

    public Conexao() {}

    public static Connection connect() {
        Connection connection = null; 
        try {
            if (connection == null) {
                connection = DriverManager.getConnection(url, username, password); //retorna uma conexao com o banco;
                System.out.println("Conectado com o banco de dados "+url);
            }
        }  
        catch (SQLException e) {
            e.printStackTrace();
        }

        return connection;
    }
}
