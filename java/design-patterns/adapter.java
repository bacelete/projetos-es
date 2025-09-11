import java.util.ArrayList;
import java.util.List;

//TIP To <b>Run</b> code, press <shortcut actionId="Run"/> or
// click the <icon src="AllIcons.Actions.Execute"/> icon in the gutter.
public class Main {
    public static void main(String[] args) {
        TomadaAmericanaAdapter adaptador = new TomadaAmericanaAdapter(new TomadaAmericana());
        adaptador.ligaDoisPinos();
    }
}

interface TomadaBrasileira {
    void ligaDoisPinos();
}

class TomadaAmericana  {
    public void liga() {
        System.out.println("Conectando na tomada...");
    }
}

class TomadaAmericanaAdapter implements TomadaBrasileira {
    private TomadaAmericana tomadaAmericana;
    public TomadaAmericanaAdapter(TomadaAmericana tomadaAmericana) {
        this.tomadaAmericana = tomadaAmericana;
    }

    @Override
    public void ligaDoisPinos() {
        tomadaAmericana.liga();
    }
}




