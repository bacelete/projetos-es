package dao;

public class AgendaDAO extends GenericDAO {
    public AgendaDAO() {}

    public void buscarContato(String nome) {
        String sql = "SELECT * WHERE nome = ?"; 
        buscar(sql); 
    }
}
