/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package dao;

import java.sql.*;
import models.Estacionamento;
import util.BancoDeDados;

/**
 *
 * @author nanda
 */
public class EstacionamentoDAO {

    private static final String sql = "INSERT INTO estacionamento (id_estacionamento, num_vagas, nome) VALUES (?, ?, ?)";

    public static void salvar(Estacionamento es) {
        try (Connection con = BancoDeDados.getConnection()) {
            PreparedStatement ps = con.prepareStatement(sql);
            ps.setInt(1, es.getIdEstacionamento());
            ps.setInt(2, es.getNumVagas());
            ps.setString(3, es.getNomeEstacionamento());
            ps.executeUpdate();
            System.out.println("Estacionamento salvo com sucesso!");
        } catch (SQLException e) {
            System.out.println(e);
        }
    }
}
