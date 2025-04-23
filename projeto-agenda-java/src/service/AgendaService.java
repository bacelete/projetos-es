package service;

import java.io.IOException;

import dao.AgendaDAO;
import model.Contato;
import model.Contato;
import model.WriterAndReader;

public class AgendaService {
    private AgendaDAO agendaDAO; 
    private Agenda agenda; 
    private static final String PATH = "agenda.txt"; 

    public void adicionarContato(Contato contato) {
        try {
            WriterAndReader.escrever(contato, PATH); 
        }
        catch (IOException e) {
            e.getStackTrace(); 
        }
    }

    public void listarContatos() {
        if (contatos.size() <= 0) {
            throw new ArithmeticException("A lista de contatos esta vazia"); 
        }

        System.out.println();
        for (Contato contato : contatos) {
            System.out.println(
                "Nome: "+contato.getNome()+" | Telefone: "+contato.getTelefone()+ " | E-mail: "+contato.getEmail()
            );
        }
    }

    public Contato buscarContato(String nome) { 
        Contato contatoEncontrado = null; 

        if (nome.isEmpty() || nome.isBlank()) {
            throw new IllegalArgumentException("Nome deve ser valido"); 
        }

        if (contatos.size() <= 0) {
            throw new ArithmeticException("A lista de contatos esta vazia"); 
        }

        for (Contato contato : contatos) {
            if (contato.getNome().equalsIgnoreCase(nome)) {
                contatoEncontrado = contato; 
            }
        }

        exibirInfoContato(contatoEncontrado);
        return contatoEncontrado; 
    }

    public void removerContato(String nome) {
        if (contatos.size() <= 0) {
            throw new ArithmeticException("A lista de contatos esta vazia"); 
        }

        for (Contato contato : contatos) {
            if (contato.getNome().toLowerCase() == nome.toLowerCase()) {
                contatos.remove(contato); 
                
            }
        }

    }

    private void exibirInfoContato(Contato contato) {
        System.out.println("\nContato encontrado:");
        System.out.println(
                "Nome: "+contato.getNome()+" | Telefone: "+contato.getTelefone()+ " | E-mail: "+contato.getEmail()
        );
    }
}
