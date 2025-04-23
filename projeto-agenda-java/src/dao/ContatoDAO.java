package dao;

import java.sql.*; 
import database.Conexao; //importa a classe do database

public class ContatoDAO extends GenericDAO {
    public void buscarContato(String nome) {
        String sql = "SELECT * WHERE nome = ?"; 
        buscar(sql); 
    }
}
