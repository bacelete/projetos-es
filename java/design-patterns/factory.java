import java.io.*;
import java.util.*;

public class factory {
    private static Scanner scanner = new Scanner(System.in);

    public static void main(String[] args) {
        FoodFactory factory = new FoodFactory();

        String type = scanner.nextLine();
        Food food = factory.getFood(type);

        System.out.println("The factory returned class "+food.getType());
        food.print();
    }
}

interface Food {
    public String getType();
    public void print();
}

class FoodFactory {
    public FoodFactory () {}

    public Food getFood(String type) {
        type = type.toLowerCase();
        switch (type) {
            case "cake": return new Cake();
            case "pizza": return new Pizza();
            default: return null;
        }
    }

}

class Pizza implements Food{
    @Override
    public String getType() { return "Pizza"; }

    @Override
    public void print() {
        System.out.println("Someone ordered Fast Food!");
    }
}

class Cake implements Food {
    @Override
    public String getType() { return "Cake"; }

    @Override
    public void print() {
        System.out.println("Someone ordered a Dessert!");
    }
}