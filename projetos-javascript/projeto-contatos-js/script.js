let contatos = []; 

function adicionarContato(nome, telefone, email) { 
    const contato = { 
        nome: nome,
        telefone: telefone,
        email: email
    }
    contatos.push(contato); 
    console.log(`Contato ${contato.nome} salvo com sucesso!`); 
}

function listarContatos() {
    if (contatos.length === 0) {
        console.log("Não há contatos salvos!");
        return; 
    }
    contatos.forEach((contato) => {
        console.log(`Nome: ${contato.nome}, Telefone ${contato.telefone}, Email: ${contato.email}`)
    }); 
}

function buscarContato(nome) {
    if (contatos.length === 0) {
        console.log("Não há contatos salvos!");
        return; 
    }
    const contato = contatos.find((contato) => (contato.nome === nome) || (contato.nome.toUpperCase() === nome) || (contato.nome.toLowerCase() === nome)); 
    console.log(`Nome: ${contato.nome}, Telefone ${contato.telefone}, Email: ${contato.email}`);
}