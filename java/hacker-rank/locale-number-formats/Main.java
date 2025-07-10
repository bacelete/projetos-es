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
        //instancias de formato de cada localidada:
        NumberFormat us = NumberFormat.getInstance(Locale.US);
        NumberFormat china = NumberFormat.getInstance(Locale.CHINA);
        NumberFormat france = NumberFormat.getInstance(Locale.FRANCE);

        // Formato indiano manual (não existe pronto)
        DecimalFormatSymbols symbols = new DecimalFormatSymbols();
        symbols.setGroupingSeparator(',');
        symbols.setDecimalSeparator('.');

        // Padrão indiano: separação 2, depois 2 em 2 (##,##,###.##)
        DecimalFormat india = new DecimalFormat("##,##,###.##", symbols);

        double num = scanner.nextDouble(); //leitura da entrada

        System.out.println("US: " + "$" + us.format(num));
        System.out.println("India: " + "Rs."+ india.format(num));
        System.out.println("China: " + "¥" + china.format(num));
        System.out.println("France: "+ france.format(num) +" €");


    }
}