package dao;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

import database.Conexao;

public abstract class GenericDAO {
    Connection con = null; 

    public void buscar(String sql) {
        con = Conexao.connect(); 
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
        con = Conexao.connect(); 
        try {
            PreparedStatement query = con.prepareStatement(sql);
            ResultSet rs = query.executeQuery(sql);

            System.out.println("Dados salvos com sucesso!");
        } catch (SQLException e) {
            e.printStackTrace(); 
        }
    }

}
