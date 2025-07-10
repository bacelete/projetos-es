import java.math.BigInteger;
import java.util.*;

public class App {
    private static Scanner scanner = new Scanner(System.in);

    public static class Student {
        public int ID;
        public String firstName;
        public double CGPA;

        public Student(int ID, String firstName, double CGPA) {
            this.ID = ID;
            this.firstName = firstName;
            this.CGPA = CGPA;
        }

        public double getCGPA() {
            return CGPA;
        }

        public String getNome() {
            return firstName;
        }

        public int getID() {
             return ID;
        }

    }

    public static void main(String[] args) {
        int n = scanner.nextInt();
        ArrayList<Student> students = new ArrayList<>();

        for (int i = 0; i < n; i++) {
            String line = scanner.nextLine().trim(); // lê linha inteira e remove espaços
            while (line.isEmpty()) { // ignora linhas vazias causadas por nextInt()
                line = scanner.nextLine().trim();
            }

            String[] parts = line.split("\\s+"); // divide por espaços

            int ID = Integer.parseInt(parts[0]);
            String firstName = parts[1];
            double CGPA = Double.parseDouble(parts[2]);

            students.add(new Student(ID, firstName, CGPA));
        }

        Collections.sort(students, new Comparator<Student>() {
            @Override
            public int compare(Student a, Student b) {
                //se os CGPA's forem diferentes, ordena em ordem decrescente:
                if (Double.compare(b.getCGPA(), a.getCGPA()) != 0) {
                    return Double.compare(b.getCGPA(), a.getCGPA());
                }

                //se os CGPA's forem iguais, ordena os nomes em ordem crescente:
                if (a.getNome().compareTo(b.getNome()) != 0) {
                    return a.getNome().compareTo(b.getNome());
                }

                //se os nomes forem iguais, ordena os IDs em ordem crescente;
                return a.getID() - b.getID();
            }
        });

        for (Student student : students) {
            System.out.println(student.getNome());
        }


    }
}
