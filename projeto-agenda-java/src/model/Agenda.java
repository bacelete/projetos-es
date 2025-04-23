package model;

import java.util.ArrayList;
import java.io.IOException;
import model.WriterAndReader; 

public class Agenda {
    private ArrayList<Contato> contatos;

    public Agenda() {
        try {
            this.contatos = WriterAndReader.carregarContatos(PATH); //carrega os contatos do arquivo .txt;
        } catch (IOException e) {
            e.printStackTrace();
            this.contatos = new ArrayList<>();
        }
    }

    public ArrayList<Contato> getContatos() {
        return contatos; 
    }

}
