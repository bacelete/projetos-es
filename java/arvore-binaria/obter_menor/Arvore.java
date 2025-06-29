package obter_menor; 

public class Arvore<T extends Comparable<T>> {
    public No<T> raiz;

    public Arvore(No<T> raiz) {
        this.raiz = raiz;
    }

    public boolean isEmpty() {
        return raiz == null; 
    }

    public T obterMenor() {
        return obterMenor(this.raiz); 
    }

    private T obterMenor(No<T> atual) {
        //caso recursivo
        if (atual.esq != null) {
            return obterMenor(atual.esq); 
        }
        //caso base -> atual.esq == null; 
        return atual.valor;
    }


    public static void main(String[] args) {
        No<Integer> raiz = new No<>(12); 
        raiz.dir = new No<>(20); 
        raiz.esq = new No<>(10); 

        Arvore<Integer> arvore = new Arvore<>(raiz); 
        System.out.println(arvore.obterMenor());  
    }
}
