import java.math.BigInteger;
import java.sql.SQLOutput;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Scanner;

public class App {
    private static final Scanner scanner = new Scanner(System.in);

    public static void calcularArea(int B, int H) throws Exception {
        if (B <= 0 || H <= 0) {
            throw new Exception("Breadth and height must be positive");
        }
        System.out.println(B * H);
    }

    public static void main(String[] args) {
        int B = scanner.nextInt();
        int H = scanner.nextInt();

        try {
            calcularArea(B, H);
        }
        catch (Exception e) {
            System.out.println(e.toString());
        }


    }
}
