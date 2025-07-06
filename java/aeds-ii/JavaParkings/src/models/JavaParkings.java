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
        Cliente c = new Cliente("Arthur"); 
        Veiculo v = new Veiculo("XYZ-111");
        
        c.adicionarVeiculo(v); 
        c.adicionarVeiculo(v); 
    }
}
