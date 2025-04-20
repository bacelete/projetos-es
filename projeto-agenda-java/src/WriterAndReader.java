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
        try (BufferedWriter buffer = new BufferedWriter(new FileWriter(path))) {
            String data = contato.getNome() + ";" + contato.getTelefone() + ";" + contato.getEmail();

            // escreve o dado e salta uma linha
            buffer.append(data);
            buffer.newLine();

            // certifica de que o buffer vai ser limpo
            buffer.flush();
            System.out.println("Data is flushed to the file. ");

            // fecha o buffer
            buffer.close();
        } catch (IOException e) {
            e.getStackTrace();
        }
    }

    public static ArrayList<Contato> carregarContatos(String path) throws IOException {
        ArrayList<Contato> contatos = new ArrayList<>();

        try (BufferedReader buffer = new BufferedReader(new FileReader(path))) {
            String data = "";

            while ((data = buffer.readLine()) != null) {

                String[] dados = data.split(";");

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
