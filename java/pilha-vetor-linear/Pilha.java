import javax.management.RuntimeErrorException;

public class Pilha<E> {
    private int topo; 
    private E[] pilha; 
    
    public Pilha(int tamanho) {
        this.topo = 0;
        this.pilha = (E[]) new Object[tamanho]; 
    }

    public boolean isEmpty() {
        return topo == 0;
    }

    public void push(E elem) {
        if (isFull()) { throw new RuntimeException("Stack overflow!");}
        pilha[topo] = elem; 
        topo++;
    }

    public E pop() {
        if (isEmpty()) { throw new RuntimeException("Empty stack"); }
        E itemTopo = pilha[topo - 1]; 
        topo--; 
        return itemTopo;
    }   

    public void show() {
        if (isEmpty()) { throw new RuntimeException("Empty stack!"); }
        for(int i = topo - 1; i >= 0; i--) {
            System.out.println(pilha[i]);
        }
    }

    public boolean isFull() {
        return topo == pilha.length;
    }

    public static void main(String[] args) {
        Pilha<String> p = new Pilha<String>(3); 
        p.push("feijao");
        p.push("farinha");
        p.push("arroz");

        p.pop(); 
        p.show(); 
    }
}
