package adicionar;


public class Arvore<T extends Comparable<T>> {
    public No<T> raiz;

    public Arvore() {
        this.raiz = null;
    }

    public boolean isEmpty() {
        return raiz == null; 
    }

    public No<T> adicionar(T chave) {
        this.raiz = adicionar(this.raiz, chave); 
        return this.raiz; 
    }

    private No<T> adicionar(No<T> atual, T chave) {
        if (atual == null) {
            atual = new No<T>(chave);
        }
        int comparacao; 
        comparacao = chave.compareTo(atual.valor); 

        if (comparacao < 0) {
            atual.esq = adicionar(atual.esq, chave); 
        }
        else if (comparacao > 0) {
            atual.dir = adicionar(atual.dir, chave); 
        }

        return atual; 
    }

    public static void main(String[] args) {
        Arvore arvore = new Arvore(); 
        arvore.adicionar(12);
        arvore.adicionar(10); 
        arvore.adicionar(5); 
        
        System.out.println(arvore.raiz.valor);
    }
}
