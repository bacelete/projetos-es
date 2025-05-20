public class Celula<T> {
    private T item; 
    private Celula<T> proximo; 

    public Celula(T item) {
        this.item = item;
        setProximo(null); 
    }

    public Celula() {
        this.item = null;
        setProximo(null); 
    }

    public void setProximo(Celula<T> proximo) {
        this.proximo = proximo; 
    }

    public Celula<T> getProximo() {
        return proximo; 
    }

    public T getItem() {
        return item; 
    }

}