/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package models;

import dao.ClienteDAO;
import java.util.List;
import java.util.ArrayList;
import java.util.HashSet;
import java.util.Set;

/**
 * Classe para objetos do tipo cliente
 *
 * @author Arthur Bacelete
 */
public class Cliente {

    private List<Veiculo> veiculos;
    private Ticket ticket;
    private int idCliente;
    private String nomeCliente;
    private static int contadorId = 1;
    private static Set<String> placasCadastradas = new HashSet();

    public Cliente(String nomeCliente) {
        this.nomeCliente = nomeCliente;
        this.veiculos = new ArrayList<>();
        this.idCliente = contadorId++;
        //ClienteDAO.salvar(this);
    }

    /**
     * Método para cadastrar um veículo ao cliente
     *
     * @param veiculo Veiculo - Obj. do tipo veiculo
     */
    public void adicionarVeiculo(Veiculo veiculo) {
        String placa = veiculo.getPlaca();

        if (placasCadastradas.contains(placa)) {
            throw new IllegalArgumentException("Placa ja existente!");
        }

        this.veiculos.add(veiculo);
        veiculo.setIdCliente(idCliente);
        placasCadastradas.add(placa);
    }

    public void addTicket(Ticket ticket) {
        if (this.ticket != null) {
            throw new RuntimeException("Cliente ja possui um ticket ativo.");
        }
        this.ticket = ticket; 
        //ClienteDAO.addTicket(this);
    }

    public void removerTicket() {
        this.ticket = null;
    }

    public List<Veiculo> getVeiculos() {
        return veiculos;
    }

    public int getIdCliente() {
        return this.idCliente;
    }

    public String getNome() {
        return this.nomeCliente;
    }

    public Ticket getTicket() {
        return ticket;
    }
}
