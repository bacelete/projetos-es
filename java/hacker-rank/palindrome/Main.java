import java.util.Arrays;
import java.util.Scanner;

//TIP To <b>Run</b> code, press <shortcut actionId="Run"/> or
// click the <icon src="AllIcons.Actions.Execute"/> icon in the gutter.
public class Main {
    public static void isPalindrome(String str) {
        //obo
        char[] arr = str.toCharArray();
        int n = arr.length;
        char[] rev = new char[n];
        int j = 0;

        for (int i = n - 1; i >= 0; i--) {
            rev[j] = arr[i];
            j++;
        }

        String reverse = new String(rev);

        if (str.compareToIgnoreCase(reverse) == 0) {
            System.out.println("Yes");
        }
        else {
            System.out.println("No");
        }

    }

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        String str = scanner.nextLine();
        isPalindrome(str);
    }
}