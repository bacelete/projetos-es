/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package dao;

import models.Cliente;
import java.sql.*;
import models.Cliente;
import util.BancoDeDados;

/**
 *
 * @author nanda
 */
public class ClienteDAO {
    private static final String sql = "INSERT INTO cliente (id_cliente, id_ticket, nome) VALUES (?, ?, ?)";
    
    public static void salvar(Cliente cliente) {
        try (Connection con = BancoDeDados.getConnection()) {
            PreparedStatement ps = con.prepareStatement(sql);

            ps.setInt(1, cliente.getIdCliente());
            if (cliente.getTicket() != null) {
                ps.setInt(2, cliente.getTicket().getIdTicket());
            } else {
                ps.setNull(2, java.sql.Types.NULL);
            }
            ps.setString(3, cliente.getNome());
            ps.executeUpdate();
            System.out.println("Cliente salvo com sucesso!");
        } catch (SQLException e) {
            System.out.println(e);
        }
    }
    
    public static void addTicket(Cliente cliente) {
        String sql = "UPDATE cliente SET id_ticket = ?";
        try (Connection con = BancoDeDados.getConnection()) {
            PreparedStatement ps = con.prepareStatement(sql); 
            ps.setInt(1, cliente.getTicket().getIdTicket());
            ps.executeUpdate(); 
        }
        catch (SQLException e) {
            System.out.println(e);
        }
    }
}
