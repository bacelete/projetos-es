package dao;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

import database.Conexao;

public abstract class GenericDAO {
    Connection con = Conexao.connect();  

    public void buscar(String sql) {
        try {
            PreparedStatement query = con.prepareStatement(sql);
            ResultSet rs = query.executeQuery(sql);

            String name = rs.getString("nome"); 
            String email = rs.getString("email");
            String telefone = rs.getString("telefone"); 

            System.out.println("Nome: "+name+" | Email: "+email+" | Telefone: "+telefone);

        } catch (SQLException e) {
            e.printStackTrace(); 
        }
    }

    public void salvar(String sql, String nome, String email, String telefone) {
        try {
            PreparedStatement query = con.prepareStatement(sql);

            query.setString(1, nome);
            query.setString(2, email);
            query.setString(3, telefone);

            ResultSet rs = query.executeQuery(sql);

            System.out.println("Dados salvos com sucesso!");
        } catch (SQLException e) {
            e.printStackTrace(); 
        }
    }

}
