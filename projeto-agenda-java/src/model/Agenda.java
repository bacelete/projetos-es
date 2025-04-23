package model;

import java.util.ArrayList;


public class Agenda {
    private ArrayList<Contato> contatos;

    public Agenda() {}

    public void adicionar(Contato contato) {
        this.contatos.add(contato); 
    }

    public ArrayList<Contato> getContatos() {
        return contatos; 
    }

    public void setContatos(ArrayList<Contato> contatos) {
        this.contatos = contatos;
    }

    public void remover(Contato contato) {
        contatos.remove(contato);
    }

}
