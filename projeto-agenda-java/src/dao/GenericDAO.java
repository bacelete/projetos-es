package dao;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

import database.Conexao;

public abstract class GenericDAO {
    Connection con = Conexao.connect();  

    public void buscar(String sql, String nome) {
        String name = "";
        String email = ""; 
        String telefone = "";

        try {
            PreparedStatement query = con.prepareStatement(sql); 
            query.setString(1, nome); //seta o nome na query SQL: "SELECT * from contato WHERE nome = ?"

            ResultSet rs = query.executeQuery();

            while (rs.next()) {
                name = rs.getString("nome"); 
                email = rs.getString("email");
                telefone = rs.getString("telefone"); 
            }

            System.out.println();
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

            query.executeUpdate();

            System.out.println("Dados salvos com sucesso!");

        } catch (SQLException e) {
            e.printStackTrace(); 
        }
    }

    public void buscarTudo(String sql) {
        try {
            PreparedStatement query = con.prepareStatement(sql);
            ResultSet rs = query.executeQuery(); 

            while (rs.next()) {
                System.out.println(
                    "Nome: "+rs.getString("nome")+" | Email: "+rs.getString("email")+
                    " | Telefone: "+rs.getString("telefone"));
            }

        }
        catch(SQLException e) {
            e.printStackTrace();
        }
    }

    public void deletar(String sql) {
        
    }


}
