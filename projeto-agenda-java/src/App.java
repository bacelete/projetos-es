import java.util.ArrayList;
import java.util.Scanner;

public class App {
    public static Scanner s = new Scanner(System.in); 

    public static void menu() {
        int opcao = -1; 

        while (opcao != 0) {
            System.out.println("\nSistema de Agenda:");
            System.out.println("1. Adicionar contato");
            System.out.println("2. Buscar contato pelo nome");
            System.out.println("3. Remover contato");
            System.out.println("4. Listar todos os contatos");
            System.out.println("0 - Sair do menu");
            System.out.println("Digite a opção que deseja: ");
            opcao = s.nextInt(); 
        }
    }

    public static void main(String[] args) {
        menu();  
    }
}
