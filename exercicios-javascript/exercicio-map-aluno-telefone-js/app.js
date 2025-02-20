class Contatos {
    constructor() {
        this.contatos = new Map();
    }
    adicionarContato(nome, telefone) {
        this.contatos.set(nome, telefone); 
    }
    removerContato(nome) {
        if (!this.contatos.has(nome)) {
            console.log(`Contato ${nome} inexistente.`);
        }
        this.contatos.delete(nome);
    }
    buscarContato(nome) {
        if(!this.contatos.has(nome)) {
            console.log(`Contato ${nome} inexistente.`);
        }
        console.log(`Telefone: ${this.contatos.get(nome)}`)
        return this.contatos.get(nome);
    }
    listarContatos() {
        this.contatos.forEach((key, value) => {
            console.log(`Nome: ${key} | Telefone: ${value}`)
        });
    }
}

const contatos = new Contatos(); 

contatos.adicionarContato("Arthur", "(31) 1234-5678");
contatos.adicionarContato("Manu", "(31) 4444-5555"); 
contatos.buscarContato("Manu");
contatos.listarContatos(); 
contatos.removerContato("Arthur");