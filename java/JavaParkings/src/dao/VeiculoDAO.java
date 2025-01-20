/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package dao;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import model.Veiculo;
import util.BancoDeDados;

/**
 *
 * @author nanda
 */
public class VeiculoDAO {
    private static final String sql = "INSERT INTO veiculo VALUES (?, ?)";
    
    
    public static void salvar(Veiculo veiculo) {
        try (Connection con = BancoDeDados.getConnection()) {
            PreparedStatement ps = con.prepareStatement(sql); 
            ps.setString(1, veiculo.getPlaca()); 
            ps.setNull(2, java.sql.Types.NULL); 
            ps.executeUpdate(); 
            System.out.println("Veiculo salvo com sucesso!");
        }
        catch(SQLException e) {
            System.out.println(e);
        }
    }
    
    public static void addCliente(int idCliente) {
        String updSQL = "UPDATE veiculo SET id_cliente = ?"; 
        try (Connection con = BancoDeDados.getConnection()) {
            PreparedStatement ps = con.prepareStatement(updSQL); 
            ps.setInt(1, idCliente);
            ps.executeUpdate(); 
        }
        catch(SQLException e) {
            System.out.println(e);
        }
    }
}
