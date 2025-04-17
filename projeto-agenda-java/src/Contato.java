public class Contato {
    public String nome; 
    public String telefone; 
    public String email;

    public Contato(String nome, String telefone, String email) {
        this.email = email;
        this.nome = nome; 
        this.telefone = telefone; 
    }

    public String getNome() {
        return nome; 
    }

    public String getTelefone() {
        return telefone; 
    }

    public String getEmail() {
        return email; 
    }

}
