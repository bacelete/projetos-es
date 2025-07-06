package tests;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/UnitTests/JUnit5TestClass.java to edit this template
 */
import org.junit.jupiter.api.*;
import static org.junit.jupiter.api.Assertions.*;
import models.*;

/**
 *
 * @author arthu
 */
@DisplayName("Testes do model do cliente")
public class ClienteTest {

    static Cliente cliente;
    static Veiculo veiculo;

    @BeforeAll
    static void init() {
        cliente = new Cliente("Arthur");
        veiculo = new Veiculo("XYZ-111");
        cliente.adicionarVeiculo(veiculo);
    }

    @Test
    void testeDeAdicionarVeiculoComVeiculoJaAdicionado() {
        Veiculo v = new Veiculo("XYZ-111");

        Exception exception = assertThrows(IllegalArgumentException.class, () -> {
            cliente.adicionarVeiculo(v);
        });

        assertEquals(exception.getMessage(), "Placa ja existente!");
    }

    @Test
    void testeParaVerificarSeOClienteJaPossuiTicket() {
        Vaga vaga = new Vaga(1);
        Ticket ticket = new Ticket(1, vaga);
        Ticket ticket2 = new Ticket(1, vaga);

        cliente.addTicket(ticket);

        Exception exception = assertThrows(RuntimeException.class, () -> {
            cliente.addTicket(ticket2);
        });

        assertEquals(exception.getMessage(), "Cliente ja possui um ticket ativo.");   
    }

}
