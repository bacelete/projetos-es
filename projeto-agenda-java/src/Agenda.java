import java.util.ArrayList;

public class Agenda {
    private ArrayList<Contato> contatos;

    public Agenda() {
        this.contatos = new ArrayList<>(); 
    }

    public void adicionarContato(Contato contato) {
        contatos.add(contato); 
    }

    public void listarContatos() {
        if (contatos.size() <= 0) {
            throw new ArithmeticException("A lista de contatos esta vazia"); 
        }

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
            if (contato.getNome().toLowerCase() == nome.toLowerCase()) {
                contatoEncontrado = contato; 
            }
        }

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

}
