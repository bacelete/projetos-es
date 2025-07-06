/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package dao;

import java.sql.*;
import models.Ticket;
import util.BancoDeDados;

/**
 *
 * @author nanda
 */
public class TicketDAO {
    private static final String sql = "INSERT INTO ticket (id_ticket, id_estacionamento, id_vaga, preco_total, data_emissao, horario_de_entrada, horario_de_saida)"
    + " VALUES (?, ?, ?, ?, ?, ?, ?)";

    public static void salvar(Ticket ticket) {
        try (Connection con = BancoDeDados.getConnection()) {

            PreparedStatement ps = con.prepareStatement(sql);
            ps.setInt(1, ticket.getIdTicket());
            ps.setInt(2, ticket.getIdEstacionamento());
            ps.setInt(3, ticket.getVaga().getIdVaga());
            ps.setDouble(4, ticket.getPrecoTotal());
            ps.setString(5, ticket.getDataEmissao());
            ps.setTimestamp(6, Timestamp.valueOf(ticket.getHorarioDeEntrada()));

            if (ticket.getHorarioDeSaida() != null) {
                ps.setTimestamp(7, Timestamp.valueOf(ticket.getHorarioDeSaida()));
            } else {
                ps.setNull(7, java.sql.Types.NULL);
            }
            ps.executeUpdate();
            System.out.println("Ticket salvo com sucesso!");
        } catch (SQLException e) {
            System.out.println(e);
        }
    }
    
}
