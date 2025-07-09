import java.util.ArrayList;
import java.util.Arrays;
import java.util.Scanner;
import java.util.regex.Pattern;

//TIP To <b>Run</b> code, press <shortcut actionId="Run"/> or
// click the <icon src="AllIcons.Actions.Execute"/> icon in the gutter.
public class Main {
    private static final Scanner scanner = new Scanner(System.in);
    private static int n = 1;

    public static void main(String[] args) {
        while (scanner.hasNext()) {
            String string = scanner.nextLine();
            System.out.println(n + " " + string);
            n++;
        }
    }
}