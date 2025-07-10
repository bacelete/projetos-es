import java.math.BigInteger;
import java.util.Scanner;

public class App<T>{
    private static final Scanner scanner = new Scanner(System.in);

    public void printArray(T[] arr)  {
        for (T o : arr) {
            System.out.println(o);
        }
    }

    public static void main(String[] args) {
        Integer[] arr = {1, 2, 3};
        String[] strings = {"Hello", "World"};

        App<Integer> app1 = new App<Integer>();
        app1.printArray(arr);

        App<String> app2 = new App<String>();
        app2.printArray(strings);

    }
}
