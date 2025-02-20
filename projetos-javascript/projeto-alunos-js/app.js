let turma = []; 

function adicionarAluno(nome, notas) {
    const aluno = {
        nome: nome,
        notas: notas
    }

    turma.push(aluno);
    console.log(`Aluno ${nome} adicionado na turma!`)
}

function registrarNotas(nome, notas) {
    if(turma.length === 0) {
        console.log("Turma sem alunos cadastrados!")
        return; 
    }
    const aluno = turma.find((aluno) => (aluno.nome === nome) || (aluno.nome.toLowerCase() === nome) || (aluno.nome.toUpperCase() === nome));

    if (aluno == null) {
       console.log(`Aluno ${aluno.nome} não foi encontrado!`);
       return; 
    }
    aluno.notas.push(notas); 
}

function calcularMedia(nome) {
    const aluno = turma.find((aluno) => 
        (aluno.nome === nome) || (aluno.nome.toLowerCase() === nome) || (aluno.nome.toUpperCase() === nome)
    );

    let soma = 0; 
    aluno.notas.forEach((nota) => {
        soma+=nota
    })

    const media = soma / aluno.notas.length; 
    return media; 
}

function listarAlunos() {
    if(turma.length === 0) {
        console.log("Turma sem alunos cadastrados!")
        return; 
    }

    turma.forEach((aluno) => {
        console.log(`Nome: ${aluno.nome} | Notas: [${aluno.notas}]`)
    }); 
}