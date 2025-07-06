public class Hash {
    public Hash() {

    }

    public int inserir(int[] tabela, int chave) {
        int M = tabela.length; 
        int index = chave % M; 

        for (int i = 0; i < M; i++) {
            int newIndex = (index + i) % M;
            if (tabela[newIndex] == 0) { //se estiver vazia
                tabela[newIndex] = chave;
                return chave; 
            }
        }

    }

    public static void main(String[] args) {
        int[] arr = {10, 21, 32, 43, 54}; 
        int M = 7;
        int[] tabela = new int[M];

        Hash hash = new Hash(); 
        for (int chave : arr) {
            hash.inserir(tabela, chave); 
        }
        
    }
}
