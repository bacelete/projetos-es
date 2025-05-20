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

    public boolean verificarExistencia(T item) {
        Celula<T> atual = frente.getProximo(); 

        while (atual != null) {
            if (atual.getItem().equals(item)) {
                return true;
            }
            atual = atual.getProximo(); 
        }
        return false;
    }

    //lembrando que o frente nesse caso é a célula logo após o sentinela (variável de controle)
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

    public void concatenar(Fila<T> outra) {
        if (this.isEmpty() || outra.isEmpty()) { throw new RuntimeException("Fila vazia");}
        this.tras.setProximo(outra.frente.getProximo());
        this.tras = outra.tras; 
    }

    public int obterNumItensAFrente(T item) {
        
    }

    public void copiar() {
        Fila copia = new Fila(); 
        Celula<T> atual = frente.getProximo(); 

        while(atual != null) {
            copia.enfileirar(atual.getItem());
            atual = atual.getProximo();  
        }
    }   

    public void imprimir() {
        if (this.isEmpty()) { throw new RuntimeException("Fila vazia"); }
        Celula<T> atual = frente.getProximo(); 

        while (atual != null) {
            System.out.println(atual.getItem());
            atual = atual.getProximo(); 
        }
    }

    public static void main(String[] args) {
        Fila fila = new Fila();

        fila.enfileirar(1);
        fila.enfileirar(2);
        fila.enfileirar(3);

        System.out.println(fila.obterNumItensAFrente(1));
    }
}