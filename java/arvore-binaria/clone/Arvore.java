package clone;

public class Arvore<T extends Comparable<T>> {
    public No<T> raiz;

    public Arvore(No<T> no) {
        this.raiz = no;
    }

    public boolean isEmpty() {
        return raiz == null; 
    }

    public Arvore<T> clonar() {
        return new Arvore(clonarSubArvore(this.raiz));
    }

    public No<T> clonarSubArvore(No<T> atual) {
        if (atual != null) {
            No<T> novo = new No<>(atual.valor);
            novo.esq = clonarSubArvore(atual.esq);
            novo.dir = clonarSubArvore(atual.dir);  
        }
        return atual; 
    }

    public void imprimir() {
        imprimir(this.raiz);
    }

    private void imprimir(No<T> atual) {
        if (atual != null) {
            imprimir(atual.esq);
            System.out.println(atual.valor);
            imprimir(atual.dir);
        }
    }
    

    public static void main(String[] args) {
        No<Integer> raiz = new No<>(12);

        raiz.esq = new No<>(10); 
        raiz.dir = new No<>(20); 

        Arvore<Integer> arvore = new Arvore<>(raiz);

        Arvore<Integer> clone = arvore.clonar(); 
        clone.imprimir();

    }
}
