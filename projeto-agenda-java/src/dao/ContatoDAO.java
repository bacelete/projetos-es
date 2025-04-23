package dao;

import java.sql.*; 
import database.Conexao; //importa a classe do database

public class ContatoDAO {
    Connection con = Conexao.connect(); 

    public void buscarContato(String nome) {
        String sql = "SELECT * WHERE nome = ?"; 
        try {
            PreparedStatement query = con.prepareStatement(sql);
            ResultSet rs = query.executeQuery(sql);

            String nome = rs.getString("nome"); 
            String email = rs.getString("email");
            String telefone = rs.getString("telefone"); 

            System.out.println("Nome: "+nome+" | Email: "+email+" | Telefone: "+telefone);

        } catch (SQLException e) {
            e.printStackTrace(); 
        }

    }
}
