package models;

import java.time.LocalDateTime;
import java.util.List;
import java.util.ArrayList;
import dao.*;


/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
/**
 *
 * @author nanda
 */
public class Estacionamento {

    private static int contadorId = 1;
    private int idEstacionamento;
    private int numVagas;
    private String nomeEstacionamento;
    private List<Vaga> vagas;
    private List<Ticket> tickets;
    private List<Cliente> clientes;

    public Estacionamento(String nomeEstacionamento) {
        this.nomeEstacionamento = nomeEstacionamento;
        this.tickets = new ArrayList<>();
        this.clientes = new ArrayList<>();
        this.idEstacionamento = contadorId++;
    }

    public void gerarVagas(int numVagas) {
        if (vagas != null) {
            throw new RuntimeException("As vagas ja foram criadas!");
        }
        if (numVagas < 0) {
            throw new IllegalArgumentException("O numero de vagas deve ser valido!");
        } else {
            this.vagas = new ArrayList<>();
            this.numVagas = numVagas;

            for (int i = 0; i < numVagas; i++) {
                Vaga v = new Vaga(idEstacionamento);
                vagas.add(v);
            }
            //EstacionamentoDAO.salvar(this);
            //VagaDAO.salvar(vagas);

        }

    }

    public void imprimirVagas() {
        String status;
        if (!vagas.isEmpty()) {
            for (Vaga v : vagas) {
                if (!v.isOcupada()) {
                    status = "desocupada";
                } else {
                    status = "ocupada";
                }
                System.out.println("ID: " + v.getIdVaga() + ", status: " + status);
            }
        } else {
            throw new IllegalStateException("O estacionamento nao possui vagas criadas.");
        }
    }

    private Vaga localizarVagaLivre() {
        for (Vaga vaga : vagas) {
            if (vaga.isOcupada() == false) {
                return vaga;
            }
        }
        return null;
    }

    public Ticket gerarTicket(Cliente cliente) {
        if (!vagas.isEmpty()) {
            List<Veiculo> veiculosCliente = cliente.getVeiculos();
            //Se o cliente existir e tiver veiculo cadastrado
            if (cliente != null && (!veiculosCliente.isEmpty())) {
                //Se o cliente nao possui um ticket vinculado:
                if (cliente.getTicket() == null) {
                    Vaga vagaLivre = localizarVagaLivre();

                    Ticket ticket = new Ticket(this.idEstacionamento, vagaLivre);
                    TicketDAO.salvar(ticket); //Salva o ticket no banco de dados; 
                    cliente.addTicket(ticket);
                    this.clientes.add(cliente);

                    if (!tickets.contains(ticket)) { //Se não há um ticket gerado no estacionamento, 
                        tickets.add(ticket);
                        atribuirVagaOcupada(vagaLivre);

                        return ticket;
                    }
                } else {
                    throw new IllegalStateException("Cliente ja possui um ticket vinculado.");
                }
            } else {
                throw new IllegalStateException("Cliente invalido ou veiculo nao cadastrado!");
            }
        }
        return null;
    }

    private void atribuirVagaOcupada(Vaga vaga) {
        vaga.setStatus(true);
    }

    private void atribuirVagaDesocupada(Vaga vaga) {
        vaga.setStatus(false);
    }

    public void pagarTicket(Cliente cliente, double valor) {
        if (clientes.contains(cliente)) {
            Ticket ticketCliente = cliente.getTicket();
            LocalDateTime horarioDeSaida = LocalDateTime.now();
            Vaga vaga = ticketCliente.getVaga();

            ticketCliente.setHorarioDeSaida(horarioDeSaida);
            double precoTotal = ticketCliente.calcularValorHora();

            if (valor >= precoTotal) {
                atribuirVagaDesocupada(vaga);
                this.tickets.remove(ticketCliente); //So nao seria util se vc quisesse pegar o historico dos tickets;
                cliente.removerTicket();
            }
        }
    }

    public List<Cliente> getClientes() {
        return clientes;
    }

    public List<Ticket> getTickets() {
        return tickets;
    }

    public List<Vaga> getVagas() {
        return vagas;
    }

    public int getIdEstacionamento() {
        return idEstacionamento;
    }

    public int getNumVagas() {
        return numVagas;
    }

    public String getNomeEstacionamento() {
        return nomeEstacionamento;
    }

}
//e.pagarTicket(ticket1, arthur); 
