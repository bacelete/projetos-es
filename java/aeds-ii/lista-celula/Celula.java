public class Celula<T> {
    public Celula<T> proximo;
    public T item; 

    public Celula(T item) {
        this.item = item;
        setProximo(null);
    }

    public void setProximo(Celula<T> proximo) {
        this.proximo = null; 
    }

    public Celula<T> getProximo() {
        return proximo; 
    }

    public void setElemento(T item) {
        this.item = item; 
    }

    public T getElemento() {
        return item; 
    }
}