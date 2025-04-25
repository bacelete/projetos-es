package service;

import java.io.IOException;
import dao.AgendaDAO;
import model.Contato;
import model.Agenda;
import model.WriterAndReader;

public class AgendaService {
    private AgendaDAO agendaDAO; 
    private Agenda agenda; 
    private static final String PATH = "agenda.txt"; 

    public AgendaService() {
        agenda = new Agenda(); 
        agendaDAO = new AgendaDAO(); 
    }

    public void adicionarContato(Contato contato) {
        try {
            WriterAndReader.escrever(contato, PATH); //salva o contato no arquivo. 
        }
        catch (IOException e) {
            e.getStackTrace(); 
        }

        agenda.adicionar(contato);
        agendaDAO.salvarContato(contato); //salva o contato no banco
    }

    public void listarContatos() {
        System.out.println();
        for (Contato contato : agenda.getContatos()) {
            System.out.println(
                "Nome: "+contato.getNome()+" | Telefone: "+contato.getTelefone()+ " | E-mail: "+contato.getEmail()
            );
        }
    }

    public void buscarContato(String nome) { 
        if (nome.isEmpty() || nome.isBlank()) {
            throw new IllegalArgumentException("Nome deve ser valido"); 
        }

        if (agenda.getContatos().size() <= 0) {
            throw new ArithmeticException("A lista de contatos esta vazia"); 
        }

        for (Contato contato : agenda.getContatos()) {
            if (contato.getNome().equalsIgnoreCase(nome)) {
                agendaDAO.buscarContato(nome); //busca o contato apenas no banco 
            }
        }

    }

    public void removerContato(String nome) {
        if (agenda.getContatos().size() <= 0) {
            throw new ArithmeticException("A lista de contatos esta vazia"); 
        }

        for (Contato contato : agenda.getContatos()) {
            if (contato.getNome().toLowerCase() == nome.toLowerCase()) {
                agenda.remover(contato); 
                agendaDAO.removerContato(nome); //remove o contato no banco
            }
        }

    }

}
