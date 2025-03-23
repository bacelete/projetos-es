const input = document.getElementById('task-input'); 
const addTask = document.getElementById('addTask');
const taskList = document.getElementById('task-list');

const port = process.env.port || "8000"; 

function adicionarTarefa() {
    let strInput = input.value;
    if (strInput !== "" && typeof(strInput) === 'string') {
        gerarTarefa(strInput);
    }
}

function gerarTarefa(input) {
    let task = document.createElement('li');
    task.className = 'task'; 
    task.innerHTML = input;
    
    salvarTarefa(task);
    taskList.appendChild(task);
}

function salvarTarefa(tarefa) {
    const request = new Request(`http://localhost:${port}/task`, {
        method: 'POST',
        body: {nome: tarefa.nome, status: tarefa.status}
    });
}

addTask.addEventListener('click', adicionarTarefa);
