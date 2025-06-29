package pesquisar;

public class Arvore<T extends Comparable<T>> {
    public No<T> raiz;

    public Arvore(No<T> no) {
        this.raiz = no;
    }

    public boolean isEmpty() {
        return raiz == null; 
    }

    public T pesquisar(T chave) {
        return pesquisar(this.raiz, chave); 
    }

    private T pesquisar(No<T> atual, T chave) {
        int comparacao; 

        if (atual == null) { throw new ArithmeticException("Item não encontrado"); }
        comparacao = chave.compareTo(atual.valor); 

        if (comparacao == 0) {
            return atual.valor;
        }
        else if (comparacao < 0) {
            return pesquisar(atual.esq, chave);
        }
        else {
            return pesquisar(atual.dir, chave);
        }
    }
    

    public static void main(String[] args) {
        No<Integer> raiz = new No<>(12);

        raiz.esq = new No<>(10); 
        raiz.dir = new No<>(20); 

        Arvore<Integer> arvore = new Arvore<>(raiz);

        System.out.println(arvore.pesquisar(20));
        //System.out.println(arvore.pesquisar(100));

    }
}
