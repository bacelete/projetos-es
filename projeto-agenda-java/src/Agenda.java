import java.util.ArrayList;

public class Agenda {
    private ArrayList<Contato> contatos;

    public void adicionarContato(Contato contato) {

    }

    public void listarContatos() {
        
    }

    public Contato buscarContato(String nome) { 
        Contato contatoEncontrado = null; 

        if (nome.isEmpty() || nome.isBlank()) {
            throw new IllegalArgumentException("Nome deve ser valido"); 
        }
        for (Contato contato : contatos) {
            if (contato.getNome() == nome) {
                contatoEncontrado = contato; 
            }
        }

        return contatoEncontrado; 
    }

    public void removerContato(String nome) {

    }

}
