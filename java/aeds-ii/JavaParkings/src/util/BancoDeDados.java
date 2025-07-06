/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package util;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

/**
 *
 * @author nanda
 */
public class BancoDeDados {
    private static Connection connection; 
    private static final String username = "root"; 
    private static final String password = "root";
    private static final String url = "jdbc:mysql://localhost:3306/java_parkings"; 
    private static final String JDBC_driver = "com.mysql.cj.jdbc.Driver"; 
    
    
    //jdbc: mysql:/localhost:3306/java_parkings/ 
    
    public BancoDeDados() {}
    
    public static Connection getConnection() {
        try {
            if (connection == null) {
                //Carrega o driver do banco de dados:
                Class.forName(JDBC_driver); 
                
                //Criando a conexão com o banco de dados: 
                connection = DriverManager.getConnection(url, username, password); 
            }
            else if (connection.isClosed()) {
                connection = null; 
                return getConnection(); 
            }
        }
        catch(ClassNotFoundException e) {
            System.out.println("Erro ao carregar o driver: " +e);
        }
        catch (SQLException e) {
            System.out.println("Erro de conexao com o banco de dados: "+e); 
        }
        return connection; 
    }
    
    public static void closeConnection() {
        if (connection != null) {
            try {
                connection.close(); 
            }
            catch (SQLException e) {
                System.out.println("Erro ao fechar o banco de dados: "+e);
            }
            
        }
    }
    
    
            
}
