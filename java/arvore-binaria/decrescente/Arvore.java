package decrescente; 

public class Arvore<T extends Comparable<T>> {
    public No<T> raiz;

    public Arvore(No<T> raiz) {
        this.raiz = raiz;
    }

    public boolean isEmpty() {
        return raiz == null; 
    }

    public void caminhamentoDecrescente() {
        caminhamentoDecrescente(this.raiz);
    }

    private void caminhamentoDecrescente(No<T> atual) {
        if (atual != null) {
            caminhamentoDecrescente(atual.dir); 
            System.out.println(atual.valor);
            caminhamentoDecrescente(atual.esq);
        }
    }

    public static void main(String[] args) {
        No<Integer> raiz = new No<>(12); 
        raiz.dir = new No<>(20); 
        raiz.esq = new No<>(10); 

        Arvore<Integer> arvore = new Arvore<>(raiz); 
        arvore.caminhamentoDecrescente(); 
    }
}
