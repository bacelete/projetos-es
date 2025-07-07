import java.util.Arrays;
import java.util.Scanner;
import java.util.regex.Pattern;

//TIP To <b>Run</b> code, press <shortcut actionId="Run"/> or
// click the <icon src="AllIcons.Actions.Execute"/> icon in the gutter.
public class Main {
    private static Scanner scanner = new Scanner(System.in);

    private static class MyRegex {
        private final String string;
        //0-255
        static String pattern = "^(([0-1]?[0-9]?[0-9]?|2[0-4][0-9]|25[0-5])\\.){3}([0-1]?[0-9]?[0-9]?|2[0-4][0-9]|25[0-5]){1}$";

        private MyRegex(String string) {
            this.string = string;
            print();
        }

        private boolean isValid() {
            return string.matches(pattern);
        }

        private void print() {
            System.out.println(isValid());
        }
    }

    public static void main(String[] args) {
        String IP = "-1";
        while (IP.compareTo("") != 0) {
            IP = scanner.nextLine();
            new MyRegex(IP);
        }
    }
}