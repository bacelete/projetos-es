public class No<T> {
    public T valor; 
    public No<T> esq, dir; 

    public No(T valor) {
        this.valor = valor; 
        esq = null; 
        dir = null; 
    }

    public T getValor() {
        return valor; 
    }

}
