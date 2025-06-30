package obter_subconjunto_maior;

public class Arvore<T extends Comparable<T>> {
    public No<T> raiz;

    public Arvore(No<T> raiz) {
        this.raiz = raiz;
    }

    public boolean isEmpty() {
        return raiz == null;
    }

    public Arvore<T> obterSubconjuntoMaiores(T item) {
        return new Arvore<>(obterSubconjunto(this.raiz, item));
    }

    private No<T> obterSubconjunto(No<T> atual, T item) {
        if (atual == null) {
            return null;
        }

        int comparacao = item.compareTo(atual.valor);

        // entra na sub arvore a direita
        if (comparacao >= 0) {
            No<T> novo = new No<>(atual.valor); // cria um novo no com o valor atual
            novo.esq = obterSubconjunto(atual.esq, item); // cria os nos da esquerda e atualiza a ref;
            novo.dir = obterSubconjunto(atual.dir, item); // cria os nos da direita e atualiza a ref;
            return novo;
        } else {
            return obterSubconjunto(atual.dir, item);
        }

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
        raiz.dir = new No<>(20);
        raiz.esq = new No<>(10);

        Arvore<Integer> arvore = new Arvore<>(raiz);
        arvore.obterSubconjuntoMaiores(10).imprimir();
    }
}
