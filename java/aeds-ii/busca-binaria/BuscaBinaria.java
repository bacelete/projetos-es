public class BuscaBinaria {
    public static int comps = 0; 

    public static int pesquisa(int[] arr, int inicio, int fim, int chave) {
        int meio = inicio + (fim - inicio) / 2;

        // casos bases:
        // 1. para quando acha a chave na posição do meio
        // 2. para quando o fim é < início;
        if (fim >= inicio) {
            comps++; 
            if (arr[meio] == chave) {
                return chave;
            }

            // caso recursivo: procura a chave até encontrar
            if (chave > arr[meio]) {

                return pesquisa(arr, meio + 1, fim, chave);
            }

            // else
            return pesquisa(arr, inicio, meio - 1, chave);
        }

        return -1;
    }

    public static void main(String[] args) {
        int[] ids = {
                1012, 1030, 1055, 1090, 1121, 1150, 1183, 1200, 1245, 1299,
                1340, 1388, 1402, 1430, 1455, 1499, 1512, 1540, 1580, 1623
        };
        
        int chave = BuscaBinaria.pesquisa(ids, 0, ids.length - 1, 1184); 
        System.out.println(chave);
        System.out.println("Número de comparações: "+comps);
    }
}
