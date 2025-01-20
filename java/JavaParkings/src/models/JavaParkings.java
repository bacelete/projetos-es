/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package model;
import dao.*;
import util.BancoDeDados; 

/**
 *
 * @author nanda
 */
public class JavaParkings {

    public static void main(String[] args) {
        Estacionamento es = new Estacionamento("Xulambs Parking");
        
        Cliente d = new Cliente("Manu"); 
        Veiculo v = new Veiculo("XYZ-111");
        d.cadastrarVeiculo(v); 
        Veiculo x = new Veiculo("ZZZ-222");
        
        es.gerarVagas(5);
        es.gerarTicket(d); 
        
    }
}
