/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package model;

import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;
import java.time.temporal.ChronoUnit;

/**
 *
 * @author nanda
 */
public class Ticket {

    private static int contadorId = 1;
    private int idTicket;
    private int idEstacionamento;
    private Vaga vaga;
    private double precoTotal = 0.0;
    private static final double PRECO_FIXO = 4.00;
    private LocalDateTime horarioDeEntrada;
    private LocalDateTime horarioDeSaida;
    private String data;

    //.format(DateTimeFormatter.ofPattern("HH:mm:ss"));
    public Ticket(int idEstacionamento, Vaga vaga) {
        this.idEstacionamento = idEstacionamento; 
        this.horarioDeEntrada = LocalDateTime.now();
        this.data = LocalDateTime.now().format(DateTimeFormatter.ofPattern("dd/MM/yyyy"));
        this.idTicket = contadorId++;
        this.vaga = vaga;
    }

    public double calcularValorHora() {
        if (horarioDeEntrada == null && horarioDeSaida == null) {
            throw new IllegalStateException("Horário de entrada e/ou saida nao pode ser nulo.");
        }
        long minutos = ChronoUnit.MINUTES.between(horarioDeEntrada, horarioDeSaida);
        this.precoTotal = PRECO_FIXO * (minutos / 15.0);

        return precoTotal;
    }

    public Vaga getVaga() {
        return vaga;
    }

    public int getIdTicket() {
        return idTicket;
    }
    
    public int getIdEstacionamento() {
        return idEstacionamento; 
    }

    public LocalDateTime getHorarioDeEntrada() {
        return horarioDeEntrada;
    }

    public LocalDateTime getHorarioDeSaida() {
        return horarioDeSaida;
    }

    public String getDataEmissao() {
        return data;
    }

    public double getPrecoTotal() {
        return precoTotal;
    }

    public void setHorarioDeSaida(LocalDateTime horarioDeSaida) {
        this.horarioDeSaida = horarioDeSaida;
    }

}
