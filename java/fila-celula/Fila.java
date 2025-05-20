public class Fila<T> {
    private Celula<T> frente;
    private Celula<T> tras; 
    private Celula<T> sentinela; 

    public Fila() {
        this.sentinela = new Celula<>(); 
        this.frente = this.tras = sentinela; 
    }

    public boolean isEmpty() {
        return frente == tras; 
    }

    public void enfileirar(T item) {
        Celula<T> novo = new Celula(item); 
        tras.setProximo(novo); 
        tras = tras.getProximo(); 
    }

    public T desenfileirar() { 
        Celula<T> primeiro; 
        T item = frente.getProximo().getItem(); 

        primeiro = frente.getProximo(); 
        frente.setProximo(primeiro.getProximo());

        primeiro.setProximo(null); 

        if (primeiro == tras) {
            tras = frente; 
        }

        return item; 
    }

}