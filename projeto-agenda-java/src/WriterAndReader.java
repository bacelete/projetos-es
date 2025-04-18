import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.IOException;
import java.io.BufferedReader;

public class WriterAndReader {
    public static void escrever(String path) throws IOException {
        try (BufferedWriter buffer = new BufferedWriter(new FileWriter(path))) {

            
            buffer.close();
        }
        catch (IOException e) {
            System.out.println(e);
        }
    }

}
