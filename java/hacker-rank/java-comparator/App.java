import java.math.BigInteger;
import java.util.*;

public class App {
    private static final Scanner scanner = new Scanner(System.in);

    public static class Player {
        public String name;
        public int score;

        public Player(String name, int score) {
            this.name = name;
            this.score = score;
        }

        public String getName() {
            return name;
        }

        public int getScore() {
            return score;
        }
    }

    public static class ScoreComparator {
        public static Comparator<Player> myComparator = new Comparator<Player>() {
            @Override
            public int compare(Player o1, Player o2) {
                if (o2.score - o1.score != 0) {
                    return o2.score - o1.score;
                }
                return o1.getName().compareTo(o2.getName());
            }
        };
    }

    public static void main(String[] args) {
        int n = scanner.nextInt();
        scanner.nextLine(); //consome o \n
        ArrayList<Player> players = new ArrayList<>();

        for (int i = 0; i < n; i++) {
            String line = scanner.nextLine();       // lê a linha toda: "Alex 100"
            String[] parts = line.split(" ");       // divide em ["Alex", "100"]
            String name = parts[0];
            int score = Integer.parseInt(parts[1]);
            players.add(new Player(name, score));
        }

        Collections.sort(players, ScoreComparator.myComparator);

        for (Player p : players) {
            System.out.println(p.getName() + " " + p.getScore());
        }

    }
}
