public class Lista<T> {
    private Celula<T> inicio; 
    private Celula<T> fim; 
    private int tamanho; 

    public Lista() {
        this.inicio = this.fim; 
        this.tamanho = 0; 
    }

    public boolean vazia() {
        return this.inicio == this.fim; 
    }

    //metodo que limpa a lista 
    public void limpa() {
        Celula<T> atual = this.inicio; 

        while (atual != null) {
            Celula<T> proximo = atual.getProximo();
            atual.setElemento(null);
            atual.setProximo(null);
            atual = proximo; 
        }
    }

    public int busca(T elem) {
        Celula<T> atual = this.inicio; 
        int pos = 0; 

        while (atual != null) {
            Celula<T> proximo = atual.getProximo(); 
            if (atual.getElemento().equals(elem)) {
                return pos; 
            }
            pos++; 
            atual = proximo; 
        }
        
        return -1; 
    }

    //metodo que insere no final; 
    public void inserirFinal(T elem) {
        Celula<T> novo = new Celula(elem);
        fim.setProximo(novo);
        fim = novo; 
    }





}
