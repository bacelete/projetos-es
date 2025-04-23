package model;

import java.util.ArrayList;
import java.io.IOException;
import model.WriterAndReader; 

public class Agenda {
    private ArrayList<Contato> contatos;

    public Agenda() {}

    public ArrayList<Contato> getContatos() {
        return contatos; 
    }

    public void setContatos(ArrayList<Contato> contatos) {
        this.contatos = contatos;
    }

}
