public class Fila<T> {
    private T[] fila; 
    private int frente;
    private int tras;
    private int tamanho; 

    public Fila(int tamanho) {
        fila = (T[]) new Object[tamanho];  
        this.tamanho = tamanho; 
        this.frente = this.tras = 0; 
    }

    public boolean isFull() {
        return (obterIndice(tras + 1)) == (obterIndice(frente)); 
    }

    public boolean isEmpty() {
        return frente == tras; 
    }

    public int obterIndice(int valor) {
        return (valor % tamanho); 
    }

    public void enfileirar(T elem) {
        if (isFull()) { throw new RuntimeException("Stack Overflow!"); }
        fila[obterIndice(tras)] = elem;
        tras++;
    }

    public T desenfileirar() {
        if (isEmpty()) { throw new RuntimeException("Empty"); }
        T item = fila[obterIndice(frente)]; 
        frente++;         
        return item; 
    }

    public void imprimir() {
        if (isEmpty()) { throw new RuntimeException("Empty"); }

        for (int i = this.frente; i < this.tras; i++) {
            System.out.println(fila[obterIndice(i)]);
        }
    }
}
