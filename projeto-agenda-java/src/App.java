import java.util.Scanner;
import service.AgendaService;
import model.Contato;

public class App {
    public static Scanner s = new Scanner(System.in);
    public static AgendaService agenda = new AgendaService(); 

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
                    
                    break; 
                case 2: 
                    System.out.println("Nome: ");
                    nome = s.nextLine(); 

                    agenda.buscarContato(nome); 
                    break; 
                case 3: 
                    System.out.println("Nome: ");
                    nome = s.nextLine(); 
                    
                    agenda.removerContato(nome);
                    break; 
                case 4: agenda.listarContatos(); break; 
            }
        }
    }

    public static void main(String[] args) {   
        menu();     
    }
}
