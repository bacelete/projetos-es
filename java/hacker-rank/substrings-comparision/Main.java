import java.util.Arrays;
import java.util.Scanner;

//TIP To <b>Run</b> code, press <shortcut actionId="Run"/> or
// click the <icon src="AllIcons.Actions.Execute"/> icon in the gutter.
public class Main {
    public static String getSmallestAndLargest(String s, int k) {
        int numSubStrings = s.length() - k + 1;
        String[] subStrings = new String[numSubStrings];

        int tmh = s.length(); //13;

        for (int i = 0; i < numSubStrings; i++) {
            subStrings[i] = s.substring(i, i + k);
        }

        Arrays.sort(subStrings);
        return subStrings[0] + "\n" + subStrings[numSubStrings - 1];
    }

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        String s = scanner.nextLine(); //welcometojava;
        int k = scanner.nextInt(); //3

        System.out.println(getSmallestAndLargest(s, k));
    }
}