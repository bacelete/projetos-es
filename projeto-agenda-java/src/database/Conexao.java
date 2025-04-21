package database;

import java.sql.Connection;
import java.sql.DriverManager; 
import java.sql.SQLException; 

public class Conexao {
    private static String url = "jdbc: mysql:/localhost:3000/projeto_agenda"; 
    private static String password = "root"; 
    private static String username = "root";  
    private static String driver = "com.mysql.cj.jdbc.Driver";
    
    public Conexao() {}

    public static Connection connect() {
        Connection connection = null; 
        try {
            if (connection == null) {
                Class.forName(driver); //busca o driver 
                connection = DriverManager.getConnection(url, username, password); //retorna uma conexao com o banco;
            }
            else {
                System.out.println("Conexão com o banco de dados!");
            }
        }  
        catch (ClassNotFoundException e) {
            e.printStackTrace(); 
        }
        catch (SQLException e) {
            e.printStackTrace();
        }

        return connection;
    }
}
