/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package dao;
import java.sql.*; 
import java.util.List;
import models.Vaga; 
import util.BancoDeDados; 

/**
 *
 * @author nanda
 */
public class VagaDAO {
    private static final String sql = "INSERT INTO vaga (id_vaga, id_estacionamento, status_vaga) VALUES (?, ?, ?)"; 
    
    public static void salvar(List<Vaga> vagas) {
        try (Connection con = BancoDeDados.getConnection()) {
            PreparedStatement ps = con.prepareStatement(sql); 
            for (Vaga v : vagas) {
                 ps.setInt(1, v.getIdVaga());
                 ps.setInt(2, v.getIdEstacionamento());
                 ps.setString(3, v.getStatusVaga());
                 ps.executeUpdate(); 
            }  
            System.out.println("Vagas salvas com sucesso!");
        } 
        catch(SQLException e) {
            System.out.println(e);
        }
    }
}
