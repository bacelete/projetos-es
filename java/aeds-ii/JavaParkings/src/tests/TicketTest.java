/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/UnitTests/JUnit5TestClass.java to edit this template
 */
package tests;

import java.time.LocalDateTime;
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
public class TicketTest {
    static Ticket ticket; 
    static Vaga vaga; 
    static final int idEstacionamento = 1; 
    
   @BeforeAll
   static void init() {
       vaga = new Vaga(idEstacionamento); 
       ticket = new Ticket(idEstacionamento, vaga);
   }
   
   @Test
   void testaEntradasInvalidasNoCalcularValor() {
       LocalDateTime horarioDeEntrada;
       LocalDateTime horarioDeSaida; 
       
       Exception exception = assertThrows(NullPointerException.class, () -> {
           ticket.calcularValorHora(); 
       }); 
       
       assertEquals(exception.getMessage(), "temporal"); 
       
   }
     
}
