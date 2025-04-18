import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.IOException;
import java.io.BufferedReader;

public class WriterAndReader {
    public static void escrever(Contato contato, String path) throws IOException {
        try (BufferedWriter buffer = new BufferedWriter(new FileWriter(path))) {
            String data = contato.toString(); 
            
            //escreve o dado e salta uma linha
            buffer.write(data); 
            buffer.newLine();

            //certifica de que o buffer vai ser limpo 
            buffer.flush();
            System.out.println("Data is flushed to the file. ");

            //fecha o buffer 
            buffer.close();
        }
        catch (IOException e) {
            e.getStackTrace();
        }
    }

}
