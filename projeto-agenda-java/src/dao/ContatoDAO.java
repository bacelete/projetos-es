package dao;

public class ContatoDAO extends GenericDAO {
    public void buscarContato(String nome) {
        String sql = "SELECT * WHERE nome = ?"; 
        buscar(sql); 
    }
}
