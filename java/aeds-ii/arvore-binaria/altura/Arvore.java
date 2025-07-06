package altura;

public class Arvore<T extends Comparable<T>> {
    public No<T> raiz;

    public Arvore(No<T> raiz) {
        this.raiz = raiz;
    }

    public boolean isEmpty() {
        return raiz == null;
    }

    public int calcularAltura() {
        return calcularAltura(this.raiz); 
    }

    private int calcularAltura(No<T> raiz) {
        if (raiz == null) {
            return -1;
        }
        int alturaEsq = calcularAltura(raiz.esq);
        int alturaDir = calcularAltura(raiz.dir);

        return Math.max(alturaEsq, alturaDir) + 1;
    }

    public static void main(String[] args) {

        No<Integer> raiz = new No<>(12);
        raiz.dir = new No<>(18);
        raiz.esq = new No<>(8);
        raiz.esq.esq = new No<>(5);
        raiz.esq.dir = new No<>(11);

        Arvore<Integer> arvore = new Arvore<>(raiz); 
        int maxHeight = arvore.calcularAltura();

        System.out.println(maxHeight);
    }
}
