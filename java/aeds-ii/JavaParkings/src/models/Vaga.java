/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package models;

/**
 *
 * @author nanda
 */
public class Vaga {
    private static int contadorId = 1; 
    private int idVaga; 
    private int idEstacionamento; 
    private boolean statusVaga; 
    
    public Vaga(int idEstacionamento) {
        this.idEstacionamento = idEstacionamento; 
        this.statusVaga = false; 
        this.idVaga = contadorId++; 
    }
    
    public boolean isOcupada() {
        return statusVaga;
    }
    
    public int getIdVaga() {
        return idVaga; 
    }
    
    public void setStatus(boolean statusVaga) {
        this.statusVaga = statusVaga;
    }
    
    public int getIdEstacionamento() {
        return idEstacionamento; 
    }
    
    public String getStatusVaga() {
        if (statusVaga == false) {
            return "livre"; 
        }
        return "ocupada"; 
    }
    
}
