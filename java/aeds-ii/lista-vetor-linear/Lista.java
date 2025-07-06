public class Lista<T> {
    private int primeiro;
    private int ultimo;
    private T[] lista;

    public Lista(int tmh) {
        this.primeiro = this.ultimo = 0;
        this.lista = (T[]) new Object[tmh];
    }

    public boolean isEmpty() {
        return primeiro == ultimo;
    }

    public boolean isFull() {
        return ultimo == lista.length;
    }

    public void inserir(T elem, int posicao) {
        if (isFull()) {
            throw new RuntimeException("Full!");
        }
        if (posicao < 0 || (posicao > this.ultimo)) {
            throw new ArrayIndexOutOfBoundsException("Error");
        }

        for (int i = this.ultimo; i > posicao; i--) {
            lista[i] = lista[i - 1];
        }

        lista[posicao] = elem;
        this.ultimo++;
    }

    public T retirar(int posicao) {
        if (isEmpty()) {
            throw new RuntimeException("Empty!");
        }
        if (posicao < 0 || (posicao >= this.ultimo)) {
            throw new ArrayIndexOutOfBoundsException("Error");
        }

        T item;
        item = lista[posicao];

        for (int i = posicao; i < this.ultimo; i++) {
            lista[i] = lista[i + 1];
        }

        this.ultimo--;
        return item;
    }

}