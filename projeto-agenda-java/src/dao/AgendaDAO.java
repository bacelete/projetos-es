package dao;

import model.Contato;

public class AgendaDAO extends GenericDAO {
    public AgendaDAO() {}

    public void buscarContato(String nome) {
        String sql = "SELECT * FROM contato WHERE nome = ?"; 
        buscar(sql, nome); 
    }

    public void salvarContato(Contato contato) {
        String sql = "INSERT INTO contato (nome, telefone, email) VALUES (?, ?, ?)"; 
        salvar(sql, contato.getNome(), contato.getEmail(), contato.getTelefone()); 
    }

    public void listarContatos() {
        String sql = "SELECT * FROM contato";
        buscarTudo(sql); 
    }

    public void removerContato(String nome) {
        String sql = "DELETE * FROM contato WHERE nome = ?"; 
        deletar(sql); 
    }

}
