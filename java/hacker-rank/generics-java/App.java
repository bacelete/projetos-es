import java.math.BigInteger;
import java.util.Scanner;

public class App<T>{
    private static final Scanner scanner = new Scanner(System.in);

    public static <T> void printArray(T[] arr)  {
        for (T o : arr) {
            System.out.println(o);
        }
    }

    public static void main(String[] args) {
        Integer[] arr = {1, 2, 3};
        String[] strings = {"Hello", "World"};

        printArray(arr);
        printArray(strings);
    }
}
