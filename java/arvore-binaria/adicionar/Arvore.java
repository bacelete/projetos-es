
package adicionar;

public class Arvore<T extends Comparable<T>> {
    public No<T> raiz;

    public Arvore(No raiz) {
        this.raiz = raiz;
    }

    public boolean isEmpty() {
        return raiz == null; 
    }

    public void caminhamentoEmOrdem() {
        caminhamentoEmOrdem(this.raiz);
    }

    private void caminhamentoEmOrdem(No<T> atual) {
        if (raiz == null) { throw new ArithmeticException(""); }
        if (atual != null) {
            caminhamentoEmOrdem(atual.esq); 
            System.out.println(atual.valor);
            caminhamentoEmOrdem(atual.dir);
        }
    }

    public static void main(String[] args) {
        No raiz = new No(12); 
        raiz.dir = new No(20); 
        raiz.esq = new No(10); 

        Arvore arvore = new Arvore(raiz); 
        arvore.caminhamentoEmOrdem(); 
    }
}
