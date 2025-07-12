import java.math.BigInteger;
import java.util.*;

public class App {
    private static final Scanner scanner = new Scanner(System.in);

    public static void main(String[] args) {
        int n = scanner.nextInt(); //num of lines;
        List<List<Integer>> arrayOfLists = new ArrayList<>();

        for (int i = 0; i < n; i++) { //for each line.
            List<Integer> list = new ArrayList<>(); //creates a list
            int d = scanner.nextInt(); //quantity of integers;

            for (int j = 0; j < d; j++) {
                list.add(scanner.nextInt()); //add elements from inp.
            }

            arrayOfLists.add(list); //add the list to the array
        }

        int q = scanner.nextInt(); // number of queries:

        for (int aux = 0; aux < q; aux++) {
            int x = scanner.nextInt();
            int y = scanner.nextInt();

            //find the yth position of xth line;
            List<Integer> list = arrayOfLists.get(x - 1);

            try {
                int elem = list.get(y - 1);
                System.out.println(elem);
            }
            catch (Exception e) {
                System.out.println("ERROR!");
            }
        }




    }
}
