//TIP To <b>Run</b> code, press <shortcut actionId="Run"/> or
// click the <icon src="AllIcons.Actions.Execute"/> icon in the gutter.
import java.util.*;

class Main {
    class Solution {
        public static boolean isValid(String s) {
            Stack<Character> pilhaDeCaracter = new Stack<>();
            char[] vetorDeCaracter = s.toCharArray();

            if (s.length() <= 1) {
                return false;
            }

            for (int i = 0; i < s.length(); i++) {
                char charString = vetorDeCaracter[i];
                if ((charString == '{' || charString == '[' || charString == '(')) {
                    pilhaDeCaracter.push(charString);
                }

                else {
                    if (pilhaDeCaracter.isEmpty()) {
                        return false;
                    }

                    char topo = pilhaDeCaracter.peek();
                    if (verificaSeColchetesSeCompletam(charString, topo)) {
                        pilhaDeCaracter.pop();
                    }
                    else {
                        return false;
                    }
                }
            }
            return pilhaDeCaracter.isEmpty();
        }

        private static boolean verificaSeColchetesSeCompletam(char ch, char topo) {
            return ch == '}' && topo == '{' ||
                    ch == ')' && topo == '(' ||
                    ch == ']' && topo == '[';
        }

        public static void main(String[] args) {
            System.out.println(isValid("(["));
        }
    }

}