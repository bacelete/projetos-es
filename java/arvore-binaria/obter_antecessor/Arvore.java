package obter_antecessor;

public class Arvore<T extends Comparable<T>> {
    public No<T> raiz;

    public Arvore(No<T> raiz) {
        this.raiz = raiz;
    }

    public boolean isEmpty() {
        return raiz == null;
    }

    public T obterAntecessor(T item) {
        return obterAntecessor(this.raiz, item);
    }

    private T obterAntecessor(No<T> atual, T item) {
        No<T> pre = null;

        while (atual != null) {
            int comparacao = item.compareTo(atual.valor);

            // se item > atual.valor
            if (comparacao > 0) {
                pre = atual; // salva o atual como candidato;
                atual = atual.dir; // percorre recursivamente para direita;
            }
            // se item <= atual.valor; 
            else {
                atual = atual.esq;
            }
        }

        return pre.valor;
    }

    public static void main(String[] args) {
        No<Integer> raiz = new No<>(12);
        raiz.dir = new No<>(20);
        raiz.esq = new No<>(10);

        Arvore<Integer> arvore = new Arvore<>(raiz);
        System.out.println(arvore.obterAntecessor(12));
    }
}
