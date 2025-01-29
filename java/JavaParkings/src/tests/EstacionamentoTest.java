/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/UnitTests/JUnit5TestClass.java to edit this template
 */
package tests;

import java.util.List;
import org.junit.jupiter.api.AfterEach;
import org.junit.jupiter.api.AfterAll;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.BeforeAll;
import org.junit.jupiter.api.Test;
import static org.junit.jupiter.api.Assertions.*;
import models.*;

/**
 *
 * @author arthu
 */
public class EstacionamentoTest {

    static Estacionamento estacionamento;

    @BeforeAll
    static void init() {
        estacionamento = new Estacionamento("Estacionamento Teste");
        estacionamento.gerarVagas(10);

    }

    @Test
    void testaGerarVagasComVagasJaExistentes() {
        Exception exception = assertThrows(RuntimeException.class, () -> {
            estacionamento.gerarVagas(5);
        });

        assertEquals(exception.getMessage(), "As vagas ja foram criadas!");
    }

    @Test
    void testaGerarTicketClienteSemVeiculo() {
        Cliente cliente = new Cliente("Emanuelly");

        Exception exception = assertThrows(IllegalStateException.class, () -> {
            estacionamento.gerarTicket(cliente);
        });

        assertEquals(exception.getMessage(), "Cliente nao possui veiculo cadastrado.");
    }
    
    @Test
    void testaGerarTicketClienteComTicketJaAtivo() {
        Cliente cliente = new Cliente("Emanuelly");
        Veiculo veiculo = new Veiculo("XYZ-111");
        
        cliente.adicionarVeiculo(veiculo);
        estacionamento.gerarTicket(cliente); 
        
        Exception exception = assertThrows(IllegalStateException.class, () -> {
            estacionamento.gerarTicket(cliente); 
        });
        
        assertEquals(exception.getMessage(), "Cliente ja possui um ticket vinculado."); 
    }
    
    @Test
    void testaGerarTicketComTodasAsVagasOcupadas() {
        List<Vaga> vagas = estacionamento.getVagas(); 
        
        for (Vaga v : vagas) {
            estacionamento.atribuirVagaOcupada(v); 
        }
        
        Cliente cliente = new Cliente("Emanuelly");
        Veiculo veiculo = new Veiculo("XYZ-111");
        
        cliente.adicionarVeiculo(veiculo);
        Exception exception = assertThrows(RuntimeException.class, () -> {
            estacionamento.gerarTicket(cliente); 
        });
        
        assertEquals(exception.getMessage(), "Nao ha vagas disponiveis!"); 
    }

}
