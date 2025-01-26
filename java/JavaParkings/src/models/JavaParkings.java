/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package models;

/**
 *
 * @author arthu
 */
public class JavaParkings {

    public static void main(String[] args) {
        Estacionamento es = new Estacionamento("Java Parkings"); 
        
        Veiculo v = new Veiculo("XYZ-111");
        Cliente c = new Cliente("Arthur"); 
        Cliente d = new Cliente("Ana"); 
        
        es.gerarVagas(10);
        
        c.adicionarVeiculo(v); 
        
        es.gerarTicket(c); 
        es.pagarTicket(c, 100); 
        es.imprimirVagas(); 
        
    }
}
