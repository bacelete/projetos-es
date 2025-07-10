import java.math.BigInteger;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Scanner;

public class App {
    private static final Scanner scanner = new Scanner(System.in);
    public static void main(String[] args) {
        BigInteger a = new BigInteger(scanner.nextLine());
        BigInteger b = new BigInteger(scanner.nextLine());

        BigInteger sum = a.add(b);
        BigInteger mult = a.multiply(b);

        System.out.println(sum.toString());
        System.out.println(mult.toString());

    }
}
