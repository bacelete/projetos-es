/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package models;

import dao.VeiculoDAO;
import java.util.HashSet;
import java.util.Set;

/**
 *
 * @author nanda
 */
public class Veiculo {
    private String placa; 
    private int idCliente; 
    private static Set<String> placas = new HashSet();
    
    public Veiculo(String placa) {
        if (!placas.contains(placa)) {
            this.placa = placa; 
            placas.add(placa); 
            VeiculoDAO.salvar(this); 
        }
        else {
            System.out.println("Placa duplicada!");
        }
    }
    
    public String getPlaca() {
        return placa; 
    }
    
    public void setIdCliente(int idCliente) {
        this.idCliente = idCliente;
        VeiculoDAO.addCliente(idCliente); 
    }
    
}
