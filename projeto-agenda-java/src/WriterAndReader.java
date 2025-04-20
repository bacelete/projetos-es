import java.io.BufferedWriter;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;
import java.io.BufferedReader;

public class WriterAndReader {

    public WriterAndReader() {
    }

    public static void escrever(Contato contato, String path) throws IOException {
        try (BufferedWriter buffer = new BufferedWriter(new FileWriter(path, true))) {
            String data = contato.getNome() + ";" + contato.getTelefone() + ";" + contato.getEmail();

            // escreve salta uma linha e escreve os dados:
            buffer.newLine();
            buffer.append(data);

            // certifica de que o buffer vai ser limpo apos adicionar os dados:
            buffer.flush();

            System.out.print("\n");
            System.out.println("Data is flushed to the file. ");

            // fecha o buffer
            buffer.close();
        } catch (IOException e) {
            e.getStackTrace();
        }
    }

    public static void excluirContato(Contato contato, String path) throws IOException {}

    public static ArrayList<Contato> carregarContatos(String path) throws IOException {
        ArrayList<Contato> contatos = new ArrayList<>();

        try (BufferedReader buffer = new BufferedReader(new FileReader(path))) {
            String data = "";

            while ((data = buffer.readLine()) != null) {

                String[] dados = data.split(";");

                if (dados.length != 3) {
                    throw new IOException("Não foi possível carregar os dados.");
                }

                String nome = dados[0];
                String telefone = dados[1];
                String email = dados[2];

                contatos.add(new Contato(nome, telefone, email));
            }
        } catch (IOException e) {
            e.printStackTrace();
        }

        return contatos;
    }
}
