package dao;

import model.Contato;

public class AgendaDAO extends GenericDAO {
    public AgendaDAO() {}

    public void buscarContato(String nome) {
        String sql = "SELECT * WHERE nome = ?"; 
        buscar(sql); 
    }

    public void salvarContato(Contato contato) {
        String sql = "INSERT INTO contato VALUES (?, ?, ?)"; 
        salvar(sql, contato.getNome(), contato.getEmail(), contato.getTelefone()); 
    }

}
