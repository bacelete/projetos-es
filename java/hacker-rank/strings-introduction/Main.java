import java.text.DecimalFormat;
import java.text.DecimalFormatSymbols;
import java.text.Format;
import java.text.NumberFormat;
import java.util.*;
import java.util.regex.Pattern;

//TIP To <b>Run</b> code, press <shortcut actionId="Run"/> or
// click the <icon src="AllIcons.Actions.Execute"/> icon in the gutter.
public class Main {
    private static final Scanner scanner = new Scanner(System.in);

    public static void main(String[] args) {
        String a = scanner.nextLine();
        String b = scanner.nextLine();

        System.out.println(a.length() + b.length());
        if (a.compareTo(b) > 0) {
            System.out.println("Yes");
        }
        else {
            System.out.println("No");
        }

        String firstLetterA = a.substring(0, 1).toUpperCase();
        String firstLetterB = b.substring(0, 1).toUpperCase();

        String remainingA = a.substring(1);
        String remainingB = b.substring(1);

        System.out.println(firstLetterA + remainingA + " " + firstLetterB + remainingB);

    }
}