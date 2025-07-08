import java.util.Arrays;
import java.util.Scanner;
import java.util.regex.Pattern;

//TIP To <b>Run</b> code, press <shortcut actionId="Run"/> or
// click the <icon src="AllIcons.Actions.Execute"/> icon in the gutter.
public class Main {
    private static final Scanner scanner = new Scanner(System.in);

    private static class Username {
        private static String regex = "^[a-zA-Z][a-zA-Z0-9_]{7,29}$";

        public static void validarUsuario(int n) {
            scanner.nextLine();
            for (int i = 0; i < n; i++) {
                String user = scanner.nextLine();
                if (user.matches(regex)) {
                    System.out.println("Valid");
                }
                else {
                    System.out.println("Invalid");
                }
            }
        }

    }

    public static void main(String[] args) {
        int n = scanner.nextInt();
        Username.validarUsuario(8);
    }
}