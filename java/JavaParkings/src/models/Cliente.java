/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package model;

import dao.ClienteDAO;
import dao.VeiculoDAO;
import java.time.format.DateTimeFormatter;
import java.util.List;
import java.util.ArrayList;
import java.util.HashSet;
import java.util.Set;

/**
 *
 * @author nanda
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
        ClienteDAO.salvar(this); 
    }

    public void cadastrarVeiculo(Veiculo veiculo) {
        if (placasCadastradas.contains(veiculo.getPlaca())) {
            System.out.println("Placa ja existente!");
        } else {
            if (verificarVeiculoJaCadastrado(veiculo)) {
                throw new IllegalArgumentException("Placa duplicada!");
            } else {
                this.veiculos.add(veiculo);
                veiculo.setIdCliente(idCliente); 
                placasCadastradas.add(veiculo.getPlaca());
            }
        }
    }

    public void addTicket(Ticket ticket) {
        this.ticket = ticket;
        ClienteDAO.addTicket(this);
    }

    public void removerTicket() {
        this.ticket = null;
    }

    /*public void imprimirTicket() {
        if (ticket != null) {
            System.out.println("\nID do ticket: " + ticket.getIdTicket());
            System.out.println("Nome do cliente: " + nomeCliente);
            System.out.println("Horario de entrada: " + ticket.getHorarioDeEntrada());
            System.out.println("Vaga ocupada: " + ticket.getVaga().getIdVaga());
            System.out.println("Data: " + ticket.getData());
            System.out.println("Horario de saida: " + ticket.getHorarioDeSaida());
            System.out.println("Preco total: " + ticket.getPrecoTotal());
        }
    }
     */
    private boolean verificarVeiculoJaCadastrado(Veiculo veiculo) {
        for (Veiculo v : veiculos) {
            if (v.getPlaca() == veiculo.getPlaca()) {
                return true;
            }
        }
        return false;
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
