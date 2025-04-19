import java.util.ArrayList;
import java.util.Scanner;
import java.io.IOException;

public class App {
    public static Scanner s = new Scanner(System.in);
    public static Agenda agenda = new Agenda();

    public static void menu() {
        int opcao = -1; 
        String nome, telefone, email; 

        while (opcao != 0) {
            System.out.println("\nSistema de Agenda:");
            System.out.println("1. Adicionar contato");
            System.out.println("2. Buscar contato pelo nome");
            System.out.println("3. Remover contato");
            System.out.println("4. Listar todos os contatos");
            System.out.println("0 - Sair do menu");
            System.out.println("Digite a opção que deseja: ");
            opcao = s.nextInt(); 
            s.nextLine(); 

            switch (opcao) {
                case 1: 
                    System.out.println("Nome: ");
                    nome = s.nextLine();
                    System.out.println("Telefone: ");
                    telefone = s.nextLine(); 
                    System.out.println("E-mail: ");
                    email = s.nextLine(); 

                    Contato contato = new Contato(nome, telefone, email); 
                    agenda.adicionarContato(contato);

                    System.out.println("\nContato salvo com sucesso!");
                    break; 
                case 2: 
                    System.out.println("Nome: ");
                    nome = s.nextLine(); 

                    agenda.buscarContato(nome); 
                    System.out.println("\nContato salvo com sucesso!");
                    break; 
                case 3: 
                    System.out.println("Nome: ");
                    nome = s.nextLine(); 
                    
                    agenda.removerContato(nome);
                    System.out.println("\nContato removido com sucesso!");
                    break; 
                case 4: agenda.listarContatos(); break; 
            }
        }
    }

    public static void carregarContatos() {
        try {
            WriterAndReader.leitura("agenda.txt");
        }
        catch (IOException e) {
            System.out.println(e.getMessage());
        }
    }

    public static void main(String[] args) {
        menu();           
    }
}
